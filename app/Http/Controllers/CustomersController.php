<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

use Session;
use Redirect;
use App\User;
use App\Customer;
use App\Order;;
use App\Transaction;;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\DB;
use Mail;
use Carbon\Carbon;

class CustomersController extends Controller{


    public function index(){
        return view('customers/index');
    }
    public function indexa(){
        return redirect('/');
    }

    public function services(){
        return view('customers/services');
    }

    

   
    public function orders(){
        $user = Auth::user();
        return view('customers/orders');
    }
    public function login(){
        return view('customers/login');
    }
    public function about(){
        return view('customers/about');
    }
    public function contact(){
        return view('customers/contact');
    }
    public function faq(){
        return view('customers/faq');
    }
public function bonus(){
        return view('bonus');
    }

    public function terms(){
        return view('customers/terms');
    }

    public function sellPost(Request $request){
        $user = Auth::user();
        if($user == null ){
            Session::flash('error', 'Sorry! kindly login to have access to this page');
            return redirect('/');
        }
        $loggedInUser = Customer::join("users", "customers.user_id", "=", "users.id")
            ->where("customers.user_id", $user->id)
            ->select("customers.*",  "users.id as user_id", "users.status as user_status")->first();
        $order = new Order;
                $order->customer_id = $loggedInUser->id;
                $order->bitcoin_address = $request->input('bitcoin_address');
                $order->btc_value = $request->input('btc_value');
                $order->dollar_value = $request->input('dollar_value');
                $order->payment_method = $request->input('payment_method');
                $order->email = $request->input('email');
                $order->status = 'Processing';
                if($order->save()){
                    Session::flash('success', 'We have received your submission. We shall attend to it as soon as possible');
                        return back();
                }else{
                    Session::flash('error', 'Sorry! An unexpected error occured. Pls try again.');
                    return back();
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
