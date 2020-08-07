<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Session;
use App\Customer;
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
            if($user->status == 2){
                Session::flash('error', 'Sorry! Your account has been deactivated');
                return back();
            }  
            if($user->type == 2){
                Session::flash('success', 'Authentication was successfull');
                return redirect('customers/profile');
                
            }    
                if($user->type == 1){
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
            $customer = Customer::where("user_id", $user->id)->first();
            if($user->status == 2){
                return response()->json(['error'=> 'Sorry! Your account has been deactivated']);
            }  
            if($user->type == 2){
                return response()->json(['success'=> 'Authentication was successfull', "customer"=>$customer]);
                
            }    
                if($user->type == 1){
                    return response()->json(['error'=> 'Sorry! You cannot login with an admin account']);
            }   
           
        }
        else if (Auth::attempt(['phone' => $email, 'password' => $password])){
            $user = Auth::user();
            $customer = Customer::where("user_id", $user->id)->first();
            if($user->status == 2){
                return response()->json(['error'=> 'Sorry! Your account has been deactivated']);
            }  
            if($user->type == 2){
                return response()->json(['success'=> 'Authentication was successfull', "customer"=>$customer]);
                
            }    
                if($user->type == 1){
                    return response()->json(['error'=> 'Sorry! You cannot login with an admin account']);
            }   
        }
        else{		
            return response()->json(['error'=> 'Authentication failed. Kindly try again with valid details']);
        }

    }


    public function logout(){
        
        Auth::logout();
        return redirect('/');
    }

}
