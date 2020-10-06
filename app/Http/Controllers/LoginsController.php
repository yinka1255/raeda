<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Session;
use App\Customer;
use App\Merchant;
use App\Member;
use App\Visitor;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\DB;

class LoginsController extends Controller
{

    /**
	 * Handles authentication attempt
	 *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
    */
   
    public function Authenticate(Request $request){
    	$email = $request->input('email');
        $password = $request->input('password');
    	if (Auth::attempt(['email' => $email, 'password' => $password])){
            $user = Auth::user();
            if($user->status == "Inactive"){
                Session::flash('error', 'Sorry! Your account has been deactivated');
                return back();
            }  
            if($user->role == "customer"){
                Session::flash('success', 'Authentication was successfull');
                return redirect('customers/dashboard');
                
            }    
                if($user->role == "admin"){
                Session::flash('success', 'Authentication was successfull');
                return redirect('admin/index');
            }   
           
        }
        
        else{		
                Session::flash('error', 'Authentication failed. Kindly try again with valid details');
                return back();
        }

    }

    public function mobileAuthenticate(Request $request){
    	$email = $request->input('email');
        $password = $request->input('password');
    	if (Auth::attempt(['email' => $email, 'password' => $password])){
            $user = Auth::user();
            if($user->status == "Inactive"){
                return response()->json(['error'=> 'Sorry! Your account has been deactivated']);
            }  
            if($user->role == "customer"){
                return response()->json(['success'=> 'Authentication was successfull', "customer"=>$user]);
                
            } else{
                    return response()->json(['error'=> 'Sorry! You can only login to this app with a customer account']);
            }   
           
        }
        else if (Auth::attempt(['phone1' => $email, 'password' => $password])){
            $user = Auth::user();
            if($user->status == "Inactive"){
                return response()->json(['error'=> 'Sorry! Your account has been deactivated']);
            }  
            if($user->role == "Customer"){
                return response()->json(['success'=> 'Authentication was successfull', "customer"=>$customer]);
                
            } else{
                    return response()->json(['error'=> 'Sorry! You can only login to this app with a customer account']);
            }   
        }
        else{		
            return response()->json(['error'=> 'Authentication failed. Kindly try again with valid details']);
        }

    }
    public function mobileRetailerAuthenticate(Request $request){
    	$email = $request->input('email');
        $password = $request->input('password');
    	if (Auth::attempt(['email' => $email, 'password' => $password])){
            $user = Auth::user();
            if($user->status == "Inactive"){
                return response()->json(['error'=> 'Sorry! Your account has been deactivated']);
            }  
            if($user->role == "merchant"){
                $merchant = Merchant::join("users", "users.merchant_id", "merchants.id")
                ->join("cities", "cities.id", "merchants.city_id")
                ->join("states", "states.id", "merchants.state_id")
                ->select("users.*", "merchants.*", "states.name as state_name", "states.id as state_id", "cities.name as city_name", "cities.id as city_id",  "users.id as id")
                ->where("users.id", $user->id)
                ->first();
                return response()->json(['success'=> 'Authentication was successfull', "user"=>$merchant]);
                
            } else{
                    return response()->json(['error'=> 'Sorry! You can only login to this app with a merchant account']);
            }   
           
        }
        else if (Auth::attempt(['phone1' => $email, 'password' => $password])){
            $user = Auth::user();
            if($user->status == "Inactive"){
                return response()->json(['error'=> 'Sorry! Your account has been deactivated']);
            }  
            if($user->role == "merchant"){
                $merchant = Merchant::join("users", "users.merchant_id", "merchants.id")
                ->join("cities", "cities.id", "merchants.city_id")
                ->join("states", "states.id", "merchants.state_id")
                ->select("users.*", "merchants.*", "states.name as state_name", "states.id as state_id", "cities.name as city_name", "cities.id as city_id",  "users.id as id")
                ->where("users.id", $user->id)
                ->first();
                return response()->json(['success'=> 'Authentication was successfull', "user"=>$merchant]);
                
            } else{
                    return response()->json(['error'=> 'Sorry! You can only login to this app with a merchant account']);
            }   
        }
        else{		
            return response()->json(['error'=> 'Authentication failed. Kindly try again with valid details']);
        }
    }


    public function logout(){
        Auth::logout();
        return redirect('/login');
    }

}
