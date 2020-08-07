<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

use Session;
use Redirect;
use App\User;
use App\Customer;
use App\Order;
use App\Profile;
use App\Admin;
use App\Book;
use App\Picture;
use App\Sale;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\DB;
use Mail;

class UsersController extends Controller{

    public function register($category_id){

        $user = Auth::user();
        
        return view('customers/register');
        
    }

    public function customerRegister(Request $request){
        
        $check = User::where("email", $request->input("email"))->first();
        if($check != null){
            
            Session::flash('error', 'Sorry! The email provided already exist. Kindly login to your account');
            return back();
        }

        $user = new User;
        $user->email = $request->input("email");
        $user->password = bcrypt($request->input("password"));
        $user->status = 1;
        $user->type = 2;
        if($user->save()){
            $customer = new Customer;
            $customer->user_id = $user->id;
            $customer->email = $request->input("email");
            $customer->name = $request->input("name");
            if($customer->save()){
                Auth::loginUsingId($user->id);
                
                Session::flash('success', 'Thank you for being a part of Andora MFG. You are now logged in');
                return redirect('customers/profile');
            }
            else{
                Session::flash('error', 'Sorry! An error occured while trying to save your information. Kindly contact administrator');
                return back();
            }
        }  
    }

    public function customerRegisterSell(Request $request){
        
        $check = User::where("email", $request->input("email"))->first();
        if($check != null){
            
            Session::flash('error', 'Sorry! The email provided already exist. Kindly login to your account');
            return back();
        }

        $user = new User;
        $user->email = $request->input("email");
        $user->password = bcrypt($request->input("password"));
        $user->status = 1;
        $user->type = 2;
        if($user->save()){
            $customer = new Customer;
            $customer->user_id = $user->id;
            $customer->email = $request->input("email");
            $customer->name = $request->input("name");
            if($customer->save()){
                $order = new Order;
                $order->customer_id = $customer->id;
                $order->bitcoin_address = $request->input('bitcoin_address');
                $order->btc_value = $request->input('btc_value');
                $order->dollar_value = $request->input('dollar_value');
                $order->payment_method = $request->input('payment_method');
                $order->email = $request->input('email');
                $order->save();
                Auth::loginUsingId($user->id);
                
                Session::flash('success', 'We have received your submission. We shall attend to it as soon as possible');
                return redirect('customers/profile');
            }
            else{
                Session::flash('error', 'Sorry! An error occured while trying to save your information. Kindly contact administrator');
                return back();
            }
        }  
    }

    public function mobileRegister(Request $request){
        
        $check = User::where("email", $request->input("email"))->first();
        if($check != null){
            
            return response()->json(['error'=> 'Sorry! The email provided already exist. Kindly login to your account']);
        }

        $cus = Customer::where("phone", $request->input("phone"))->first();
        if($cus != null){
            $user = User::where("id", $cus->user_id)->first();
            $user->email = $request->input("email");
            $user->phone = $request->input("phone");
            $user->password = bcrypt($request->input("password"));
            $user->status = 1;
            $user->type = 2;
            if($user->save()){
                $customer = $cus;
                $customer->user_id = $user->id;
                $customer->email = $request->input("email");
                $customer->name = $request->input("name");
                $customer->phone = $request->input("phone");
                if($customer->save()){
                    //Auth::loginUsingId($user->id);
                    $this->sendWelcomeMail($customer);
                    
                    return response()->json(["success"=> "Thank you for being a part of AirTnd. You are now logged in", "customer"=>$customer]);
                }
                else{
                    return response()->json(['error'=> 'Sorry! An error occured while trying to save your information. Kindly contact administrator']);
                }
            }     
            else{
                return response()->json(['error'=> 'Sorry! An error occured while trying to save your information. Kindly contact administrator']);
            }
        }else{
            $user = new User;
            $user->email = $request->input("email");
            $user->password = bcrypt($request->input("password"));
            $user->phone = $request->input("phone");
            $user->status = 1;
            $user->type = 2;
            if($user->save()){
                $customer = new Customer;
                $customer->user_id = $user->id;
                $customer->email = $request->input("email");
                $customer->name = $request->input("name");
                $customer->phone = $request->input("phone");
                if($customer->save()){
                    //Auth::loginUsingId($user->id);
                    $this->sendWelcomeMail($member);
                    
                    return response()->json(["success"=> "Thank you for being a part of AirTnd. You are now logged in", "customer"=>$customer]);
                }
                else{
                    return response()->json(['error'=> 'Sorry! An error occured while trying to save your information. Kindly contact administrator']);
                }
            }     
            else{
                return response()->json(['error'=> 'Sorry! An error occured while trying to save your information. Kindly contact administrator']);
            }
        }
    }

    
    
    public function postContact(Request $request){
        $data = [
        'email'=> $request->input('email'),
        'name'=> $request->input('name'),
        'phone'=> $request->input('phone'),
        'date'=>date('Y-m-d')
        ];
        $body = $request->input('message'). " phone: ".$data['phone']. " email: ".$data['email'];
        Mail::raw($body,  function($message) use($data){
            $message->from('info@airtnd.com', 'AirTnd contact form');
            $message->SMTPDebug = 4; 
            $message->to("info@airtnd.com");
            $message->subject('Contact form enquiry');
            
        });   
        Session::flash('success', 'We have received your message. We will get back to you in due course');
        return back();
    }


    public function sendWelcomeMail($member){
        $data = [
        'email'=> $member->email,
        'name'=> $member->name,
        ];
 
        Mail::send('welcome-mail', $data, function($message) use($data){
            $message->from('info@airtnd.com', 'Team AirTnD');
            $message->SMTPDebug = 4; 
            $message->to($data['email']);
            $message->subject('Welcome to AirTnD');
            //return response()->json(["succeess"=>'An Email has been sent to your account. Pls check to proceed']);
        });   
    }

    public function forgotPasswordPost(Request $request){

        if(empty($request->input("email"))){
            Session::flash('error', 'Kindly provide your email address');
            return back();
        }
        $user = User::where("email", $request->input("email"))->first();
        if($user == null){
            Session::flash('error', 'No user associated with the provided email');
            return back();
        }
        $token = substr(str_shuffle(str_repeat("0123456789abcdefghijklmnopqrstuvwxyz", 4)), 0, 4);
        $user->password = bcrypt($token);
        $user->save();
        if($user->type == 2){
            $customer = Customer::where("user_id", $user->id)->first();
            $this->sendResetMail($customer, $token);
        }elseif($user->type == 1){
            $admin = Admin::where("user_id", $user->id)->first();
            $this->sendResetMail($admin, $token);
        }
        Session::flash('success', 'An Email has been sent to your account. Pls check to proceed');
        return back();
    }

    public function mobileForgotPasswordPost(Request $request){

        if(empty($request->input("email"))){
            return response()->json(["error"=>'Kindly provide your email address']);
        }
        $user = User::where("email", $request->input("email"))->first();
        if($user == null){
            return response()->json(["error"=>'No user associated with the provided email']);
        }
        $token = substr(str_shuffle(str_repeat("0123456789abcdefghijklmnopqrstuvwxyz", 4)), 0, 4);
        $user->password = bcrypt($token);
        $user->save();
        if($user->type == 2){
            $customer = Customer::where("user_id", $user->id)->first();
            $this->sendResetMail($customer, $token);
        }elseif($user->type == 1){
            $admin = Admin::where("user_id", $user->id)->first();
            $this->sendResetMail($admin, $token);
        }
        return response()->json(["error"=>'An Email has been sent to you. Pls check to proceed']);
    }
    

    public function sendResetMail($member, $token){
        $data = [
        'email'=> $member->email,
        'name'=> $member->name,
        'token'=> $token,
        'date'=>date('Y-m-d')
        ];
 
        Mail::send('reset-mail', $data, function($message) use($data){
            $message->from('info@airtnd.com', 'Team AirTnd');
            $message->SMTPDebug = 4; 
            $message->to($data['email']);
            $message->subject('Password Recovery');
            
        });   
    }

    
}
