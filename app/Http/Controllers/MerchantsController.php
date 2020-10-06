<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

use Session;
use Redirect;
use App\User;
use App\Customer;
use App\Merchant;
use App\DispatchItemCategory;
use App\MerchantWithdrawal;
use App\MerchantReview;
use App\City;
use App\State;
use App\MerchantProduct;
use App\MerchantProductCategory;
use App\MerchantCategory;
use App\Order;
use App\MerchantOrder;
use App\MerchantOrderDetail;
use App\Transaction;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\DB;
use Mail;
use Carbon\Carbon;

class MerchantsController extends Controller{

    public function getMerchantProductsMobile ($merchant_id, $next){

        $merchant_products = MerchantProduct::join("merchant_product_categories", "merchant_product_categories.id", "merchant_products.merchant_product_category_id" )
        ->join("merchants", "merchants.id", "merchant_products.merchant_id" )
        ->where(["merchant_products.status"=>"Active","merchants.status"=>"Active","merchants.id"=> $merchant_id ])
        ->select("merchant_products.*", "merchants.business_name as merchant_name","merchants.merchant_category_id as merchant_category_id", "merchant_product_categories.name as merchant_product_category_name")
        ->orderBy('merchant_products.id', 'Desc')->take($next)->get();
        return response()->json(["success"=>  "Products fetched", "merchant_products"=>$merchant_products]);
    }
    public function getMerchantProductCategoriesMobile (){
        $merchant_product_categories = MerchantProductCategory::where("status", "Active")->get();
        return response()->json(["success"=>  "Categories fetched", "merchant_product_categories"=>$merchant_product_categories]);
    }

    public function getMerchantProductsSearchMobile ($merchant_id, $next, $search_id, $merchant_product_category_id){

        if($merchant_product_category_id == "not-set"){
            if($search_id == "not-set"){
                $merchant_products = MerchantProduct::join("merchant_product_categories", "merchant_product_categories.id", "merchant_products.merchant_product_category_id" )
                ->join("merchants", "merchants.id", "merchant_products.merchant_id" )
                ->where(["merchants.id" => $merchant_id, "merchant_products.status"=>"Active","merchants.status"=>"Active" ])
                ->select("merchant_products.*", "merchants.business_name as merchant_name", "merchants.merchant_category_id as merchant_category_id","merchant_product_categories.name as merchant_product_category_name")
                ->orderBy('merchant_products.id', 'Desc')->take($next)->get();
            }
            elseif($search_id != "not-set"){
                $merchant_products = MerchantProduct::join("merchant_product_categories", "merchant_product_categories.id", "merchant_products.merchant_product_category_id" )
                ->join("merchants", "merchants.id", "merchant_products.merchant_id" )
                ->where(["merchants.id" => $merchant_id, "merchant_products.status"=>"Active","merchants.status"=>"Active" ])
                ->where(function ($query) use ($search_id) {
                    $query->where('merchant_products.name',  'like', '%' . $search_id . '%');
                })
                ->select("merchant_products.*", "merchants.business_name as merchant_name", "merchants.merchant_category_id as merchant_category_id","merchant_product_categories.name as merchant_product_category_name")
                ->orderBy('merchant_products.id', 'Desc')->take($next)->get();
            }
            
        }else{
            if($search_id == "not-set"){
                $merchant_products = MerchantProduct::join("merchant_product_categories", "merchant_product_categories.id", "merchant_products.merchant_product_category_id" )
                ->join("merchants", "merchants.id", "merchant_products.merchant_id" )
                ->where(["merchants.id" => $merchant_id, "merchant_products.status"=>"Active","merchants.status"=>"Active","merchant_products.merchant_product_category_id"=>$merchant_product_category_id ])
                ->select("merchant_products.*", "merchants.business_name as merchant_name", "merchants.merchant_category_id as merchant_category_id","merchant_product_categories.name as merchant_product_category_name")
                ->orderBy('merchant_products.id', 'Desc')->take($next)->get();
            }
            elseif($search_id != "not-set"){
                $merchant_products = MerchantProduct::join("merchant_product_categories", "merchant_product_categories.id", "merchant_products.merchant_product_category_id" )
                ->join("merchants", "merchants.id", "merchant_products.merchant_id" )
                ->where(["merchants.id" => $merchant_id, "merchant_products.status"=>"Active","merchants.status"=>"Active","merchant_products.merchant_product_category_id"=>$merchant_product_category_id ])
                ->where(function ($query) use ($search_id) {
                    $query->where('merchant_products.name',  'like', '%' . $search_id . '%');
                })
                ->select("merchant_products.*", "merchants.business_name as merchant_name", "merchants.merchant_category_id as merchant_category_id","merchant_product_categories.name as merchant_product_category_name")
                ->orderBy('merchant_products.id', 'Desc')->take($next)->get();
            }
        }
        return response()->json(["success"=>  "Products fetched", "merchant_products"=>$merchant_products]);
    }

    public function getCities (){
        $cities = City::join("states", "states.id", "cities.state_id")
        ->select("cities.*", "cities.id as key", "cities.name as city_name", "states.name as state_name")
        ->get();
        foreach($cities as $key=>$city){
            $cities[$key]['label'] = $city->state_name . " - " . $city->city_name;
        }
        return response()->json(["success"=>  "Cities fetched", "cities"=>$cities]);
    }

    public function getOrders ($merchant_id){
        $orders = MerchantOrder::orderBy('merchant_orders.id', 'Desc')
        ->join("merchant_order_details", "merchant_orders.id", "merchant_order_details.merchant_order_id")
        ->join("merchant_products", "merchant_products.id", "merchant_order_details.merchant_product_id")
        ->where("merchant_order_details.merchant_id", $merchant_id)
        ->select("merchant_orders.*", "merchant_order_details.id as order_detail_id", "merchant_order_details.status as order_details_status", "merchant_order_details.quantity", "merchant_order_details.total as order_details_total", "merchant_products.name as merchant_product_name", "merchant_products.image", "merchant_products.description")
        ->get();
        
        return response()->json(["success"=>  "orders fetched", "orders"=>$orders]);
    }

    public function getOrderDetails ($order_id){
        $orders = MerchantOrder::leftJoin("merchant_order_details", "merchant_orders.id", "merchant_order_details.merchant_order_id")
        ->join("merchant_products", "merchant_products.id", "merchant_order_details.merchant_product_id" )
        ->join("merchant_product_categories", "merchant_product_categories.id", "merchant_products.merchant_product_category_id" )
        ->join("merchants", "merchants.id", "merchant_products.merchant_id" )
        ->select("merchant_orders.*", "merchant_order_details.id as order_detail_id", "merchant_order_details.price as order_detail_price", "merchant_order_details.quantity as order_detail_quantity", "merchant_order_details.total as order_detail_total", "merchant_products.image as merchant_product_image", "merchant_products.description as merchant_product_description", "merchant_products.name as merchant_product_name", "merchants.business_name as merchant_name", "merchant_product_categories.name as merchant_product_category_name")
        ->where("merchant_orders.id", $order_id)
        ->get();
        
        return response()->json(["success"=>  "orders fetched", "order_details"=>$orders]);
    }
    public function getReviews ($merchant_id){
        $reviews = MerchantReview::join("merchant_products", "merchant_products.id", "merchant_reviews.merchant_product_id" )
        ->join("merchant_product_categories", "merchant_product_categories.id", "merchant_products.merchant_product_category_id" )
        ->join("merchants", "merchants.id", "merchant_products.merchant_id" )
        ->select("merchant_reviews.*",  "merchant_products.*", "merchant_products.image as merchant_product_image", "merchant_products.description as merchant_product_description", "merchant_products.name as merchant_product_name", "merchants.business_name as merchant_name", "merchant_product_categories.name as merchant_product_category_name")
        ->where("merchants.id", $merchant_id)
        ->get();
        
        return response()->json(["success"=>  "reviews fetched", "reviews"=>$reviews]);
    }

    public function getDashboardInfo($merchant_id){
        $products_count = MerchantProduct::where("merchant_id", $merchant_id)->count();
        $order_details_pending_count = MerchantOrderDetail::where(["merchant_id"=> $merchant_id, "status"=>"pending"])->count();
        $order_details_completed_count = MerchantOrderDetail::where(["merchant_id"=> $merchant_id])->where("status", "!=", "pending")->count();
        $ratings_count = MerchantReview::where(["merchant_id"=> $merchant_id])->count();
        return response()->json(["success"=>  "counts fetched", "products_count"=>$products_count, "order_details_pending_count"=>$order_details_pending_count, "order_details_completed_count"=> $order_details_completed_count, "ratings_count"=>$ratings_count ]);
    }

    public function confirmMerchantOrderDetails ($order_detail_id){
        $order_detail = MerchantOrderDetail::where("id", $order_detail_id)
        ->first();
        $order_detail->status = "Merchant confirmed";
        if($order_detail->save()){
            return response()->json(["success"=>  "The order item has been confirmed", "status"=>$order_detail->status]);
        }else{
            return response()->json(["success"=>  "An unexpected server error occured"]);
        }
    }

    public function mobileRequestWithdrawal(Request $request){
        $withdrawal = new MerchantWithdrawal;
        $withdrawal->merchant_id = $request->input('merchantId');
        $withdrawal->amount = $request->input('amount');
        $withdrawal->status= "pending";
        if($withdrawal->save()){
            return response()->json(["success"=>  "The request has been received and is being processed."]);
        }else{
            return response()->json(["success"=>  "An unexpected server error occured"]);
        }
    }

    public function mobileRetailerEditProfile(Request $request){
        $merchant = Merchant::where("id", $request->input('merchantId'))->first();
        $merchant->business_name = $request->input('businessName');
        $merchant->merchant_category_id = $request->input('businessCategoryId');
        //$merchant->business_name = $request->input('businessName');
        $merchant->city_id = $request->input('cityId');
        $merchant->state_id = $request->input('stateId');
        $merchant->address = $request->input('address');
        $merchant->longitude= substr($request->input('longitude'), 0, 8);
        $merchant->latitude = substr($request->input('latitude'), 0, 8);
        $merchant->cac_no = $request->input('cacNo');
        $merchant->bank_name = $request->input('bankName');
        $merchant->bank_account_name = $request->input('bankAccountName');
        $merchant->bank_account_number = $request->input('bankAccountNumber');
        $merchant->bank_account_type = $request->input('bankAccountType');
        $merchant->status = "Active";
        if($request->hasFile('image')){
            $image = $request->file('image');
            $imageName  = time() . '.' . $image->guessExtension();
            $path = "storage/app/public/merchants/logo/";
            $image->move($path, $imageName);
            $merchant->logo = "storage/merchants/logo/".$path.$imageName;
        }
        if($merchant->save()){
            $user = User::where("merchant_id", $request->input("merchantId"))->first();
            $user->email = $request->input("email");
            //$user->password = bcrypt($request->input("password"));
            $user->phone1 = $request->input("phone");
            $user->first_name = $request->input("firstName");
            $user->last_name = $request->input("lastName");
            //$user->city = $request->input("city");
            //$user->status = "Active";
            //$user->merchant_id = $merchant->id;
            //$user->role = "merchant";
            $user->save();
            $merchant = Merchant::join("users", "users.merchant_id", "merchants.id")
            ->join("cities", "cities.id", "merchants.city_id")
            ->join("states", "states.id", "merchants.state_id")
            ->select("users.*", "merchants.*", "states.name as state_name", "states.id as state_id", "cities.name as city_name", "cities.id as city_id",  "users.id as id")
            ->where("users.id", $user->id)
            ->first();
            return response()->json(['success' => 'Your account has been updated',  "user"=>$merchant],200);
        }else{
            return response()->json(['error' => 'An error occured while trying to upload picture'],200);
        }
        
    }

    
    public function getMerchantCategories (){
        $merchant_categories = MerchantCategory::where(['status'=>'Active'])
        ->get();
        
        return response()->json(["success"=>  "merchant categories fetched", "merchant_categories"=>$merchant_categories]);
    }

    public function mobileAddProduct(Request $request){
        
        $product = new MerchantProduct;
        $product->name = $request->input("name");
        $product->merchant_product_category_id = $request->input("merchantProductCategoryId");
        $product->merchant_id = $request->input("merchant_id");
        $product->description = $request->input("description");
        $product->price= $request->input("price");
        $product->weight= $request->input("weight");
        //$product->preparation_duration = $request->input("preparationDuration");
        if($request->hasFile('image')){
            $image = $request->file('image');
            $imageName  = time() . '.' . $image->guessExtension();
            $path = "storage/app/public/merchants/products/";
            $image->move($path, $imageName);
            $product->image = "storage/merchants/products/".$imageName;
        }

        $product->status = "Active"; 
        if($product->save()){
            

            //$this->sendWelcomeMail($member);
            return response()->json(["success"=> "Thank you. Your product was saved successfully"]);
        }
        else{
            return response()->json(['error'=> 'Sorry! An error occured while trying to save your information. Kindly contact administrator']);
        }
        
    }
   
   
    public function profile(){
        $user = Auth::user();
        if($user == null ){
            Session::flash('error', 'Sorry! kindly login to have access to this page');
            return redirect('/');
        }
        $loggedInUser = Customer::join("users", "customers.user_id", "=", "users.id")
            ->where("customers.user_id", $user->id)
            ->select("customers.*",  "users.id as user_id", "users.status as user_status")->first();
            
        //$customer = Customer::where("user_id", $user->id)->first();
        $transactions = Order::where("customer_id", $loggedInUser->id)->get();
       
    return view('customers/profile')->with([ "loggedInUser"=>$loggedInUser, "transactions"=>$transactions]);
    }

    public function updateProfile(Request $request){
    
        $user = Auth::user();
        if($user == null ){
            Session::flash('error', 'Sorry! You do not have access to this page');
            return redirect('/');
        }
        $customer = Customer::where("customers.user_id", $user->id)->first();
        $customer->name = $request->input("name");
        $customer->email = $request->input("email");
        $user = User::where("id", $user->id)->first();
        $user->email = $request->input("email");
        if($customer->save()){
            $user->save();
            Session::flash('success', "Profile updated succeessfully");
            return back();
        }else{
            Session::flash('error', 'An error occured while trying to update profile.');
            return back();
        }    
    }  

    public function mobileUpdateProfile(Request $request){
    
        
        $customer = Customer::where("id", $request->input('id'))->first();
        $customer->name = $request->input("name");
        $customer->email = $request->input("email");
        $customer->phone = $request->input("phone");
        $user = User::where("id", $customer->user_id)->first();
        $user->email = $request->input("email");
        if($customer->save()){
            $user->save();
            return response()->json(["success"=>  "Profile updated succeessfully", "customer"=>$customer]);
        }else{
            return response()->json(['error'=> 'Sorry! An error occured while trying to update your information. Kindly contact administrator']);
        }    
    }  
    public function updatePassword(Request $request){

        if($request->input("password") != $request->input("cpassword")){
            Session::flash('error', 'Sorry!, The two passwords provided must match');
            return back();
        }
        $user = Auth::user();
        
        $user = User::where("id", $user->id)->first();

        $user->password = bcrypt($request->input("password"));

        $user->save();

        Session::flash('success', 'Thank you, your password has been updated successfully');
        return back();
    }
    public function mobileUpdatePassword(Request $request){

        
        $user = User::where("id", $request->input('user_id'))->first();

        $user->password = bcrypt($request->input("password"));

        $user->save();

        return response()->json(["success"=>  "Profile updated succeessfully"]);
    }

    
}
