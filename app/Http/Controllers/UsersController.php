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
use App\Merchant;
use App\City;
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
        $user->first_name = $request->input("first_name");
        $user->last_name = $request->input("last_name");
        $user->phone1 = $request->input("phone");
        $user->email = $request->input("email");
        $user->password = bcrypt($request->input("password"));
        $user->status = "Active";
        $user->role = "customer";
        if($user->save()){
            Auth::loginUsingId($user->id);
            Session::flash('success', 'Thank you for being a part of Andora MFG. You are now logged in');
            return redirect('customers/dashboard');
        }
        else{
            Session::flash('error', 'Sorry! An error occured while trying to save your information. Kindly contact administrator');
            return back();
        }
    }

    

    public function mobileRegister(Request $request){
        
        $check = User::where("email", $request->input("email"))->first();
        if($check != null){
            return response()->json(['error'=> 'Sorry! The email provided already exist. Kindly login to your account']);
        }

        $user = new User;
        $user->email = $request->input("email");
        $user->password = bcrypt($request->input("password"));
        $user->phone1 = $request->input("phone");
        $user->first_name = $request->input("firstName");
        $user->last_name = $request->input("lastName");
        //$user->city = $request->input("city");
        $user->status = "Active";
        $user->role = "Customer";
        if($user->save()){
            //$this->sendWelcomeMail($member);
            return response()->json(["success"=> "Thank you for being a part of Errand360. You are now logged in", "customer"=>$user]);
        }
        else{
            return response()->json(['error'=> 'Sorry! An error occured while trying to save your information. Kindly contact administrator']);
        }
        
    }
    public function mobileRetailerRegister(Request $request){
        $merchant = new Merchant;
        $merchant->business_name = $request->input('businessName');
        $merchant->merchant_category_id = $request->input('businessCategoryId');
        //$merchant->business_name = $request->input('businessName');
        $merchant->city_id = $request->input('cityId');
        $merchant->state_id = $request->input('stateId');
        $merchant->address = $request->input('address');
        $merchant->longitude= substr($request->input('longitude'), 0, 8);
        $merchant->latitude = substr($request->input('latitude'), 0, 8);
        $merchant->cac_no = $request->input('cacNo');
        $merchant->status = "Active";
        if($request->hasFile('image')){
            $image = $request->file('image');
            $imageName  = time() . '.' . $image->guessExtension();
            $path = "storage/app/public/merchants/logo/";
            $image->move($path, $imageName);
            $merchant->logo = $path.$imageName;
            if($merchant->save()){
                $user = new User;
                $user->email = $request->input("email");
                $user->password = bcrypt($request->input("password"));
                $user->phone1 = $request->input("phone");
                $user->first_name = $request->input("firstName");
                $user->last_name = $request->input("lastName");
                //$user->city = $request->input("city");
                $user->status = "Active";
                $user->merchant_id = $merchant->id;
                $user->role = "merchant";
                $user->save();
                $merchant = Merchant::join("users", "users.merchant_id", "merchants.id")
                ->join("cities", "cities.id", "merchants.city_id")
                ->join("states", "states.id", "merchants.state_id")
                ->select("users.*", "merchants.*", "states.name as state_name", "states.id as state_id", "cities.name as city_name", "cities.id as city_id",  "users.id as id")
                ->where("users.id", $user->id)
                ->first();
                return response()->json(['success' => 'Your account has been created',  "user"=>$merchant],200);
            }else{
                return response()->json(['error' => 'An error occured while trying to upload picture'],200);
            }
        }
        
        else{
            return response()->json(['error' => 'You must upload a logo'],200);
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
