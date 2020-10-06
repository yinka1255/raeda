<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

use Session;
use Redirect;
use App\User;
use App\Customer;
use App\City;
use App\Cart;
use App\Transaction;
use App\State;
use App\VehicleType;
use App\DispatchOrder;
use App\DispatchOrderDetail;
use App\DispatchItemCategory;
use App\Order;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\DB;
use Mail;
use Carbon\Carbon;

class CustomersController extends Controller{

    public function index(){
        return view('customers/index');
    }
    public function about(){
        return view('customers/about');
    }

    public function services(){
        return view('customers/services');
    }
    public function contact(){
        return view('customers/contact');
    }
    public function login(){
        return view('customers/login');
    }
    public function register(){
        return view('customers/register');
    }
    public function dashboard(){
        $user = Auth::user();
        $completed_dispatches = DispatchOrder::where(["user_id"=>$user->id, "status"=>"Delivered"])->count();
        $awaiting_payment_dispatches = DispatchOrder::where(["user_id"=>$user->id, "payment_status"=>"Pending"])->count();
        $transit_dispatches = DispatchOrder::where(["user_id"=>$user->id, "status"=>"In transit"])->count();
        $recent_dispatches = DispatchOrder::orderBy("id", "DESC")->where(["user_id"=>$user->id])->take(10)->get();
        return view('customers/dashboard')->with(compact('completed_dispatches', 'awaiting_payment_dispatches', 'transit_dispatches', 'recent_dispatches'));
        
    }
    public function dispatches(){
        $user = Auth::user();
        $dispatches = DispatchOrder::orderBy("id", "DESC")->where(["user_id"=>$user->id])->paginate(15);
        return view('customers/dispatches')->with(compact('dispatches'));
        
    }
    public function transactions(){
        $user = Auth::user();
        $transactions = Transaction::where(["user_id"=>$user->id])->paginate(15);
        $credit = Transaction::where(["user_id"=>$user->id, "type"=>"Credit"])->sum('amount');
        $debit = Transaction::where(["user_id"=>$user->id, "type"=>"Debit"])->sum('amount');
        $balance = $credit - $debit;
        return view('customers/transactions')->with(compact('transactions', 'balance'));
        
    }

    public function getDispatchItemCategoriesMobile (){
        $dispatch_item_categories = DispatchItemCategory::where("status", "Active")->get();
        return response()->json(["success"=>  "Categories fetched", "dispatch_item_categories"=>$dispatch_item_categories]);
    }

    public function getVehicleTypesMobile (){
        $vehicle_types = VehicleType::where("status", "Active")->get();
        return response()->json(["success"=>  "Vehicles fetched", "vehicle_types"=>$vehicle_types]);
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

    public function getDispatchOrders ($user_id){
        $orders = DispatchOrder::orderBy('id', 'Desc')->where("dispatch_orders.user_id", $user_id)
        ->get();
        
        return response()->json(["success"=>  "orders fetched", "orders"=>$orders]);
    }

    public function getDispatchOrderDetails ($order_id){
        $orders = DispatchOrder::leftJoin("dispatch_order_details", "dispatch_orders.id", "dispatch_order_details.dispatch_order_id")
        ->select("dispatch_orders.*", "dispatch_order_details.id as order_detail_id", "dispatch_order_details.quantity as order_detail_quantity", "dispatch_order_details.item_description as order_detail_description")
        ->where("dispatch_orders.id", $order_id)
        ->get();
        
        return response()->json(["success"=>  "orders fetched", "order_details"=>$orders]);
    }

    public function getTransactions ($user_id){
        $transactions = Transaction::orderBy('id', 'Desc')->where("transactions.user_id", $user_id)
        ->get();
        $credit_transactions = Transaction::orderBy('id', 'Desc')->where(["transactions.user_id"=> $user_id, "type"=>"Credit"])
        ->get();
        $debit_transactions = Transaction::orderBy('id', 'Desc')->where(["transactions.user_id"=> $user_id, "type"=>"Debit"])
        ->get();
        $balance = $this->getBalance($user_id);
        return response()->json(["success"=>  "transactions fetched", "balance"=> $balance, "transactions"=>$transactions, "credit_transactions"=>$credit_transactions,  "debit_transactions"=>$debit_transactions]);
    }
    public function getBalance ($user_id){
        $credit = Transaction::where(["transactions.user_id"=> $user_id, "type"=>"Credit"])
        ->sum("amount");
        $debit = Transaction::where(["transactions.user_id"=> $user_id, "type"=>"Debit"])
        ->sum("amount");
        $balance = $credit - $debit;
        return $balance;
    }
    public function payDispatch(Request $request){
        if($this->getBalance(Auth::user()->id) >= $request->input('amount') ){
            if($this->execTransaction($request->input('order_number'), Auth::user()->id, $request->input('amount'), "Debit", "Customer") == true){
                $dispatch = DispatchOrder::where("order_number", $request->input('order_number'))->first();
                $dispatch->payment_method = $request->input('payment_method');
                $dispatch->payment_status = "Completed";
                $dispatch->save();
                Session::flash('success', 'Payment was successfully saved');
                return back();
            }
        }
        else{
            Session::flash('error', 'Insuficient fund');
            return back();
        }
    }

    public function mobilePayDispatch(Request $request){
        if($this->getBalance($request->input('user_id')) >= $request->input('amount') ){
            if($this->execTransaction($request->input('order_number'), $request->input('user_id'), $request->input('amount'), "Debit", "Customer") == true){
                $dispatch = DispatchOrder::where("order_number", $request->input('order_number'))->first();
                $dispatch->payment_method = $request->input('payment_method');
                $dispatch->payment_status = "Completed";
                $dispatch->save();
                return response()->json(["success"=> "Thank you. Your payment was successfully"]);
            }
        }
        else{
            return response()->json(["error"=> "Insuficient fund"]);
        }
    }


    public function payDispatchCard(Request $request){

        if($this->execTransaction($request->input('trn_ref'), Auth::user()->id, $request->input('amount'), "Credit", "Customer") == true){
            if($this->execTransaction($request->input('order_number'), Auth::user()->id, $request->input('amount'), "Debit", "Customer") == true){
                $dispatch = DispatchOrder::where("order_number", $request->input('order_number'))->first();
                $dispatch->payment_method = $request->input('payment_method');
                $dispatch->payment_status = "Completed";
                $dispatch->save();
                Session::flash('success', 'Payment was successfully saved');
                return back();
            }
        }
        else{
            Session::flash('error', 'Insuficient fund');
            return back();
        }
    }
    public function mobilePayDispatchCard(Request $request){

        if($this->execTransaction($request->input('trn_ref'), $request->input('user_id'), $request->input('amount'), "Credit", "Customer") == true){
            if($this->execTransaction($request->input('order_number'), $request->input('user_id'), $request->input('amount'), "Debit", "Customer") == true){
                $dispatch = DispatchOrder::where("order_number", $request->input('order_number'))->first();
                $dispatch->payment_method = $request->input('payment_method');
                $dispatch->payment_status = "Completed";
                $dispatch->save();
                return response()->json(["success"=> "Thank you. Your payment was successfully"]);
            }
        }
        else{
            return response()->json(["error"=> "Insuficient fund"]);
        }
    }

    public function execTransaction($trn_ref, $user_id, $amount, $type, $user_type){
        $transaction = new Transaction;
        $transaction->trn_ref = $trn_ref;
        $transaction->user_id = $user_id;
        $transaction->amount = $amount;
        $transaction->type = $type;
        $transaction->user_type = $user_type;
        $transaction->status = "Completed";
        $transaction->save();
        return true;
    }

    public function getDeliveryFeeWithDistanceWeight($distance, $weight){
        $vehicle_type = VehicleType::where("max_weight", ">=", $weight)->first();
        $delivery_fee = $vehicle_type->pricePerKm * $distance/1000;
        return response()->json(["success"=> "Got deievry fee", "delivery_fee"=>$delivery_fee]);
    }

    public function getDispatchDeliveryFee($distance, $vehicle_type_id){
        $vehicle_type = VehicleType::where("id", $vehicle_type_id)->first();
        $delivery_fee = $vehicle_type->pricePerKm * $distance;
        return $delivery_fee;
    }

    public function getDispatchDeliveryFee1($pickup_city_id, $pickup_state_id, $delivery_city_id, $delivery_state_id){
        if($pickup_state_id != $delivery_state_id){
            $pickup_state = State::where("id", $pickup_state_id)->first();
            $delivery_state = State::where("id", $delivery_state_id)->first();
            if($pickup_state->price > $delivery_state->price){
                $delivery_fee = $pickup_state->price;
                return $delivery_fee;
            }elseif($pickup_state->price < $delivery_state->price){
                $delivery_fee = $delivery_state->price;
                return $delivery_fee;
            }else{
                $delivery_fee = $delivery_state->price;
                return $delivery_fee;
            }
        }else {
            $pickup_city = City::where("id", $pickup_city_id)->first();
            $delivery_city = City::where("id", $delivery_city_id)->first();
            if($pickup_city->price > $delivery_city->price){
                $delivery_fee = $pickup_city->price;
                return $delivery_fee;
            }elseif($pickup_city->price < $delivery_city->price){
                $delivery_fee = $delivery_city->price;
                return $delivery_fee;
            }else{
                $delivery_fee = $delivery_city->price;
                return $delivery_fee;
            }
        }
        
    }

    public function mobilePlaceDispatchOrder(Request $request){
        //return response()->json(["error"=> $request->all()]);
        
        $order = new DispatchOrder;
        $order->pickup_city_id = $request->input("pickup_city_id");
        $pickup_city= City::where("id", $request->input('pickup_city_id'))->first();
        $order->pickup_state_id = $pickup_city->state_id;
        $order->pickup_address = $request->input("pickup_address");
        $order->pickup_latitude = $request->input("pickup_latitude");
        $order->pickup_longitude = $request->input("pickup_longitude");
        $order->sender_name = $request->input("sender_name");
        $order->sender_phone = $request->input("sender_phone");
        
        $order->delivery_city_id = $request->input("delivery_city_id");
        $delivery_city= City::where("id", $request->input('delivery_city_id'))->first();
        $order->delivery_state_id = $delivery_city->state_id;
        $order->delivery_address = $request->input("delivery_address");
        $order->delivery_latitude = $request->input("delivery_latitude");
        $order->delivery_longitude = $request->input("delivery_longitude");
        $order->receiver_name = $request->input("receiver_name");
        $order->receiver_phone = $request->input("receiver_phone");

        $order->distance= $request->input("distance")/1000;
        $order->vehicle_type_id = $request->input("vehicle_type_id");
        $order->delivery_fee = $this->getDispatchDeliveryFee($order->distance, $order->vehicle_type_id);
        $order->user_id= $request->input("user_id");
        //$order->payment_method = $request->input("payment_method");
        //$order->total = $request->input("total");
        // if($request->input("payment_method") == "Pay with card"){
        //     $order->payment_status = "Successful"; 
        // }else{
        //     $order->payment_status = "Pending"; 
        // }
        $order->order_number = time(); 
        if($order->save()){
            $cart_items = $request->input("cartItems");
            foreach($cart_items as $key=>$cart_item){
                $order_detail = new DispatchOrderDetail;
                $order_detail->dispatch_order_id = $order->id;
                $order_detail->item_description = $cart_item['itemDescription'];
                $order_detail->length= $cart_item['length'];
                $order_detail->width= $cart_item['width'];
                $order_detail->height= $cart_item['height'];
                $order_detail->weight= $cart_item['weight']/1000;
                $order_detail->quantity= $cart_item['quantity'];
                $order_detail->dispatch_item_category_id = $cart_item['dispatchItemCategoryId'];
                $order_detail->save();
            }
            $this->execTransaction($order->order_number, $order->user_id, $order->delivery_fee, "Debit", "Customer");
            //$this->sendWelcomeMail($member);
            return response()->json(["success"=> "Thank you. Your order was placed successfully", "order"=>$order->id]);
        }
        else{
            return response()->json(['error'=> 'Sorry! An error occured while trying to save your information. Kindly contact administrator']);
        }
        
        
    }


    public function mobilePlaceDispatchOrder1(Request $request){
        //return response()->json(["error"=> $request->all()]);
        
        $order = new DispatchOrder;
        $order->pickup_city_id = $request->input("pickup_city_id");
        $pickup_city= City::where("id", $request->input('pickup_city_id'))->first();
        $order->pickup_state_id = $pickup_city->state_id;
        $order->pickup_address = $request->input("pickup_address");
        $order->pickup_latitude = $request->input("pickup_latitude");
        $order->pickup_longitude = $request->input("pickup_longitude");
        $order->sender_name = $request->input("sender_name");
        $order->sender_phone = $request->input("sender_phone");
        
        $order->delivery_city_id = $request->input("delivery_city_id");
        $delivery_city= City::where("id", $request->input('delivery_city_id'))->first();
        $order->delivery_state_id = $delivery_city->state_id;
        $order->delivery_address = $request->input("delivery_address");
        $order->delivery_latitude = $request->input("delivery_latitude");
        $order->delivery_longitude = $request->input("delivery_longitude");
        $order->receiver_name = $request->input("receiver_name");
        $order->receiver_phone = $request->input("receiver_phone");

        $order->distance= $request->input("distance")/1000;
        $order->vehicle_type_id = $request->input("vehicle_type_id");
        $order->delivery_fee = $this->getDispatchDeliveryFee1($order->pickup_city_id, $order->pickup_state_id, $order->delivery_city_id, $order->delivery_state_id);
        $order->user_id= $request->input("user_id");
        //$order->payment_method = $request->input("payment_method");
        //$order->total = $request->input("total");
        // if($request->input("payment_method") == "Pay with card"){
        //     $order->payment_status = "Successful"; 
        // }else{
        //     $order->payment_status = "Pending"; 
        // }
        $order->order_number = time(); 
        if($order->save()){
            $cart_items = $request->input("cartItems");
            foreach($cart_items as $key=>$cart_item){
                $order_detail = new DispatchOrderDetail;
                $order_detail->dispatch_order_id = $order->id;
                $order_detail->item_description = $cart_item['itemDescription'];
                $order_detail->length= $cart_item['length'];
                $order_detail->width= $cart_item['width'];
                $order_detail->height= $cart_item['height'];
                $order_detail->weight= $cart_item['weight']/1000;
                $order_detail->quantity= $cart_item['quantity'];
                $order_detail->dispatch_item_category_id = $cart_item['dispatchItemCategoryId'];
                $order_detail->save();
            }
            //$this->execTransaction($order->order_number, $order->user_id, $order->delivery_fee, "Debit", "Customer");
            //$this->sendWelcomeMail($member);
            return response()->json(["success"=> "Thank you. Your order was placed successfully", "order"=>$order->id]);
        }
        else{
            return response()->json(['error'=> 'Sorry! An error occured while trying to save your information. Kindly contact administrator']);
        }
    }

    public function placeDispatchOrder1(Request $request){
        //return response()->json(["error"=> $request->all()]);
        
        $order = new DispatchOrder;
        $order->pickup_city_id = $request->input("pickup_city_id");
        $pickup_city= City::where("id", $request->input('pickup_city_id'))->first();
        $order->pickup_state_id = $pickup_city->state_id;
        $order->pickup_address = $request->input("pickup_address");
        $order->sender_name = $request->input("sender_name");
        $order->sender_phone = $request->input("sender_phone");
        
        $order->delivery_city_id = $request->input("delivery_city_id");
        $delivery_city= City::where("id", $request->input('delivery_city_id'))->first();
        $order->delivery_state_id = $delivery_city->state_id;
        $order->delivery_address = $request->input("delivery_address");
        $order->receiver_name = $request->input("receiver_name");
        $order->receiver_phone = $request->input("receiver_phone");

        $order->vehicle_type_id = $request->input("vehicle_type_id");
        $order->delivery_fee = $this->getDispatchDeliveryFee1($order->pickup_city_id, $order->pickup_state_id, $order->delivery_city_id, $order->delivery_state_id);
        $order->user_id= Auth::user()->id;
        
        $order->order_number = time(); 
        if($order->save()){
            $cart_items = Cart::where("user_id", Auth::user()->id)->get();
            foreach($cart_items as $key=>$cart_item){
                $order_detail = new DispatchOrderDetail;
                $order_detail->dispatch_order_id = $order->id;
                $order_detail->item_description = $cart_item->item_description;
                $order_detail->length= $cart_item->length;
                $order_detail->width= $cart_item->width;
                $order_detail->height= $cart_item->height;
                $order_detail->weight= $cart_item->weight;
                $order_detail->quantity= $cart_item->quantity;
                $order_detail->dispatch_item_category_id = $cart_item->dispatch_item_category_id;
                $order_detail->save();
            }
            //$this->execTransaction($order->order_number, $order->user_id, $order->delivery_fee, "Debit", "Customer");
            //$this->sendWelcomeMail($member);
            Cart::where("user_id", Auth::user()->id)->delete();
            Session::flash('success', 'Request was successfully saved');
            return redirect('customers/dispatch_details/'.$order->id);
        }
        else{
            Session::flash('error', 'An unexpected error occured');
            return back();
        }
    }
    public function dispatchDetails($dispatch_id){
        $user = Auth::user();
        $dispatch = DispatchOrder::leftJoin("dispatch_order_details", "dispatch_orders.id", "dispatch_order_details.dispatch_order_id")
        ->join("cities", "dispatch_orders.pickup_city_id", "cities.id")
        ->join("states", "dispatch_orders.pickup_state_id", "states.id")
        ->join("cities as c1", "dispatch_orders.delivery_city_id", "c1.id")
        ->join("states as s1", "dispatch_orders.pickup_state_id", "s1.id")
        ->select("dispatch_orders.*", "c1.name as delivery_city_name", "s1.name as delivery_state_name",  "cities.name as pickup_city_name", "states.name as pickup_state_name", "dispatch_order_details.id as order_detail_id", "dispatch_order_details.quantity as order_detail_quantity", "dispatch_order_details.item_description as order_detail_description", "dispatch_order_details.length", "dispatch_order_details.weight", "dispatch_order_details.width", "dispatch_order_details.height")
        ->where("dispatch_orders.id", $dispatch_id)
        ->get();
        return view('customers/dispatch_details')->with(compact('dispatch'));
        
    }

    public function newDispatch(){
        $user = Auth::user();
        $dispatch_item_categories = DispatchItemCategory::all();
        $carts = Cart::where("user_id", $user->id)->get();
        return view('customers/new_dispatch')->with(compact('dispatch_item_categories', 'carts'));
        
    }
    public function newDispatchAddress(){
        $user = Auth::user();
        $vehicle_types = VehicleType::all();
        $cities = City::join("states", "states.id", "cities.state_id")
        ->select("cities.*", "cities.id as key", "cities.name as city_name", "states.name as state_name")
        ->get();
        $carts = Cart::where("user_id", $user->id)->get();
        return view('customers/new_dispatch_address')->with(compact('cities', 'carts', 'vehicle_types'));
        
    }

    public function addToCart(Request $request){
        $user = Auth::user();
        $cart = new Cart;
        $cart->item_description = $request->input('item_description');
        $cart->length= $request->input('length');
        $cart->width= $request->input('width');
        $cart->height= $request->input('height');
        $cart->weight= $request->input('weight')/1000;
        $cart->quantity= $request->input('quantity');
        $cart->dispatch_item_category_id = $request->input('dispatch_item_category_id');
        $cart->user_id = $user->id;
        $cart->save();
        Session::flash('success', 'Item saved');
        return back();
    }
    public function deleteCartItem($id){
        $cart = Cart::where("id", $id)->first();
        $cart->delete();
        Session::flash('success', 'Item deleted');
        return back();
    }
   
   
    public function profile(){
        
    return view('customers/profile');
    }

    public function updateProfile(Request $request){
    
        
        $customer = User::where("id", Auth::user()->id)->first();
        $customer->first_name = $request->input("first_name");
        $customer->last_name = $request->input("last_name");
        $customer->email = $request->input("email");
        if($customer->save()){
            Session::flash('success', "Profile updated succeessfully");
            return back();
        }else{
            Session::flash('error', 'An error occured while trying to update profile.');
            return back();
        }    
    }  

    public function mobileUpdateProfile(Request $request){
    
        
        $customer = User::where("id", $request->input('id'))->first();
        $customer->first_name = $request->input("firstName");
        $customer->last_name = $request->input("lastName");
        $customer->email = $request->input("email");
        $customer->phone1 = $request->input("phone");
        if($customer->save()){
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
