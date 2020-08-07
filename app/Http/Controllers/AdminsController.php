<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

use Session;
use Redirect;
use App\User;
use App\Customer;
use App\Bonus;
use App\UsedBonus;
use App\BonusSetting;
use App\Transaction;
use App\Admin;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\DB;
use Mail;
use Carbon\Carbon;

class AdminsController extends Controller{
public function index(){
    
        $user = Auth::user();
        if($user == null || $user->type != 1){
            Session::flash('error', 'Sorry! You do not have access to this page');
            return redirect('admin/login');
        }
        $loggedInUser = Admin::join("users", "admins.user_id", "=", "users.id")
                        ->where("admins.user_id", $user->id)
                        ->select("admins.*", "users.id as user_id", "users.status as user_status")->first();
        $customers_count = Customer::count();
        $transactions_count = Transaction::count();
        $customers_count_year = Customer::whereYear('created_at', Carbon::now()->year)->count();
        $transactions_count_year = Transaction::whereYear('created_at', Carbon::now()->year)->count();
        return view('admin/index')->with(["loggedInUser"=>$loggedInUser, "customers_count_year"=>$customers_count_year, "transactions_count_year"=>$transactions_count_year, "customers_count"=>$customers_count, "transactions_count"=>$transactions_count]);
    }
    
    public function admins(){
    
        $user = Auth::user();
        if($user == null || $user->type != 1){
            Session::flash('error', 'Sorry! You do not have access to this page');
            return redirect('admin/login');
        }
        $loggedInUser = Admin::join("users", "admins.user_id", "=", "users.id")
                        ->where("admins.user_id", $user->id)
                        ->select("admins.*", "users.id as user_id", "users.status as user_status")->first();

        $admins = Admin::join("users", "admins.user_id", "=", "users.id")
                    ->orderBy("users.id", "desc")
                    ->select("admins.*", "users.id as user_id", "users.status as user_status")->get();

        return view('admin/admins')->with(["admins"=>$admins, "loggedInUser"=>$loggedInUser]);
    } 

    public function transactions(){
    
        $user = Auth::user();
        if($user == null || $user->type != 1){
            Session::flash('error', 'Sorry! You do not have access to this page');
            return redirect('admin/login');
        }
        $loggedInUser = Admin::join("users", "admins.user_id", "=", "users.id")
                        ->where("admins.user_id", $user->id)
                        ->select("admins.*", "users.id as user_id", "users.status as user_status")->first();

        $transactions = Transaction::join("customers", "customers.id", "=", "transactions.customer_id")
                    ->orderBy("transactions.id", "desc")
                    ->select("transactions.*", "customers.id as customer_id", "customers.name as customer_name")->get();

        return view('admin/transactions')->with(["transactions"=>$transactions, "loggedInUser"=>$loggedInUser]);
    } 
    public function bonuses(){
    
        $user = Auth::user();
        if($user == null || $user->type != 1){
            Session::flash('error', 'Sorry! You do not have access to this page');
            return redirect('admin/login');
        }
        $loggedInUser = Admin::join("users", "admins.user_id", "=", "users.id")
                        ->where("admins.user_id", $user->id)
                        ->select("admins.*", "users.id as user_id", "users.status as user_status")->first();

        $bonuses = Bonus::all();
        $bonus_total = Bonus::sum('amount');
        $used_bonus = UsedBonus::sum('amount');
        $balance = $bonus_total - $used_bonus;
        $bonus_setting = BonusSetting::first();

        return view('admin/bonuses')->with(["bonuses"=>$bonuses, "balance"=>$balance, "bonus_setting"=>$bonus_setting, "loggedInUser"=>$loggedInUser]);
    } 

    public function customers(){
    
        $user = Auth::user();
        if($user == null || $user->type != 1){
            Session::flash('error', 'Sorry! You do not have access to this page');
            return redirect('admin/login');
        }
        $loggedInUser = Admin::join("users", "admins.user_id", "=", "users.id")
                        ->where("admins.user_id", $user->id)
                        ->select("admins.*", "users.id as user_id", "users.status as user_status")->first();

        $customers = Customer::join("users", "customers.user_id", "=", "users.id")
                    ->orderBy("users.id", "desc")
                    ->select("customers.*", "users.id as user_id", "users.status as user_status")->get();

        return view('admin/customers')->with(["customers"=>$customers, "loggedInUser"=>$loggedInUser]);
    } 

    public function customer($customer_id){
        $user = Auth::user();
        if($user == null || $user->type != 1){
            Session::flash('error', 'Sorry! You do not have access to this page');
            return redirect('admin/login');
        }
        $loggedInUser = Admin::join("users", "admins.user_id", "=", "users.id")
                        ->where("admins.user_id", $user->id)
                        ->select("admins.*", "users.id as user_id", "users.status as user_status")->first();

        $customer = Customer::join("users", "customers.user_id", "=", "users.id")
                    ->orderBy("users.id", "desc")
                    ->where([ "customers.id"=>$customer_id])
                    ->select("customers.*", "users.id as user_id", "users.status as user_status")->first();
        $transactions = Transaction::where(["status"=> 1, "customer_id"=>$customer_id])->get();
        return view('admin/customer')->with(["customer"=>$customer, "transactions"=>$transactions, "loggedInUser"=>$loggedInUser]);
    } 

    
    public function profile(){
        $user = Auth::user();
        if($user == null || $user->type != 1){
            Session::flash('error', 'Sorry! You do not have access to this page');
            return redirect('admin/login');
        }
        $loggedInUser = Admin::join("users", "admins.user_id", "=", "users.id")
                        ->where("admins.user_id", $user->id)
                        ->select("admins.*", "users.id as user_id", "users.status as user_status")->first();

        return view('admin/profile')->with(["loggedInUser"=>$loggedInUser]);
    } 

    public function newAdmin(){
        $user = Auth::user();
        if($user == null || $user->type != 1){
            Session::flash('error', 'Sorry! You do not have access to this page');
            return redirect('admin/login');
        }
        $loggedInUser = Admin::join("users", "admins.user_id", "=", "users.id")
                        ->where("admins.user_id", $user->id)
                        ->select("admins.*", "users.id as user_id", "users.status as user_status")->first();
        return view('admin/new_admin')->with(["loggedInUser"=>$loggedInUser]);
    }
    
    
    
    public function editAdmin($id){
        $user = Auth::user();
        if($user == null || $user->type != 1){
            Session::flash('error', 'Sorry! You do not have access to this page');
            return redirect('admin/login');
        }
        $loggedInUser = Admin::join("users", "admins.user_id", "=", "users.id")
                        ->where("admins.user_id", $user->id)
                        ->select("admins.*", "users.id as user_id", "users.status as user_status")->first();
        $admin = Admin::where("id", $id)->first();
        return view('admin/edit_admin')->with(["admin"=>$admin, "loggedInUser"=>$loggedInUser]);
    }
    
    

    public function admin($id){
    
        $admin = Admin::where("id", $id)->first();

        return response()->json(['error' => false, 'admin' => $admin], 200);
    }  

    public function deactivateAdmin($id){
    
        $user = User::where("id", $id)->first();

        $user->status = 2;

        $user->save();

        Session::flash('success', 'Thank you, User has been deactivated successfully');
        return back();
    }  
    public function activateAdmin($id){
    
        $user = User::where("id", $id)->first();

        $user->status = 1;

        $user->save();

        Session::flash('success', 'Thank you, User has been activated successfully');
        return back();
    }  

    

    public function sendWelcomeMail($member){
        $data = [
        'email'=> $member->email,
        'name'=> $member->name,
        ];
 
        Mail::send('member-mail-for-visitor-reg', $data, function($message) use($data){
            $message->from('info@yul.ng', 'Team YUL');
            $message->SMTPDebug = 4; 
            $message->to($data['email']);
            $message->subject('New prospect notification');
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
        
            $admin = Admin::where("id", $user->id)->first();
            $this->sendResetMail($admin, $token);
        
        Session::flash('success', 'An Email has been sent to your account. Pls check to proceed');
        return back();
    }
    public function addBonus(Request $request){
        $check = User::where("email", $request->input("email"))->first();
        if($check != null){
            Session::flash('error', 'Sorry! Email already exist');
            return back();
        }  
        $bonus = new Bonus;
        $bonus->amount = $request->input("amount");
        if($bonus->save()){
            Session::flash('success', 'Thank you, bonus has been saved successfully');
            return back();
        }else{
            Session::flash('error', 'Sorry! An error occured while trying to save bonus');
            return back();
        }    
    }  

    public function updateBonusSetting(Request $request){
        $check = User::where("email", $request->input("email"))->first();
        if($check != null){
            Session::flash('error', 'Sorry! Email already exist');
            return back();
        }  
        $bonus_setting = BonusSetting::where('id', 1)->first();
        $bonus_setting->percentage = $request->input("percentage");
        $bonus_setting->minimum_amount_to_qualify = $request->input("minimum_amount_to_qualify");
        $bonus_setting->no_of_correct_boxes = $request->input("no_of_correct_boxes");
        if($bonus_setting->save()){
            Session::flash('success', 'Thank you, bonus setting has been saved successfully');
            return back();
        }else{
            Session::flash('error', 'Sorry! An error occured while trying to save bonus setting');
            return back();
        }    
    }  

    public function saveAdmin(Request $request){
        $check = User::where("email", $request->input("email"))->first();
        if($check != null){
            Session::flash('error', 'Sorry! Email already exist');
            return back();
        }  
        $user = new User;
        $user->email = $request->input("email");
        $password = $request->input("password");
        $user->password = bcrypt($password);
        $user->type = 1;
        $user->status = 1;
        if($user->save()){
            $admin = new Admin;
            $admin->user_id = $user->id;
            $admin->name = $request->input("name");
            $admin->phone = $request->input("phone");
            $admin->email = $request->input("email");
            
            if($admin->save()){
                //$this->adminMail($request->input("email"), $request->input("name"), $password);
                Session::flash('success', 'Thank you, admin account has been created successfully');
                return redirect('/admin/admins');
            }else{
                Session::flash('error', 'Sorry! An error occured while trying to create account');
                return back();
            }    
        }else{
            Session::flash('error', 'Sorry! An error occured while trying to create account');
                return back();
        }    
    }  

    public function updateAdmin(Request $request){
    
        $admin = Admin::where("user_id", $request->input("user_id"))->first();
        $admin->name = $request->input("name");
        //$admin->phone = $request->input("phone");
        //$admin->address = $request->input("address");
        $admin->email = $request->input("email");
        $user = User::where("id", $request->input("user_id"))->first();
        $user->email = $request->input("email");
        if($admin->save()){
            //$this->adminMail($request->input("email"), $request->input("name"), $password);
            Session::flash('success', 'Thank you, admin account has been updated successfully');
            return back();
        }else{
            Session::flash('error', 'Sorry! An error occured while trying to update account');
            return back();
        }    
    }  

    public function updateProfile(Request $request){
    
        $user = Auth::user();
        if($user == null || $user->type != 1){
            Session::flash('error', 'Sorry! You do not have access to this page');
            return redirect('admin/login');
        }
        $admin = Admin::where("admins.user_id", $user->id)->first();
        $admin->name = $request->input("name");
        $admin->phone = $request->input("phone");
        $admin->email = $request->input("email");
        $user = User::where("id", $user->id)->first();
        $user->email = $request->input("email");
        if($admin->save()){
            $user->save();
            Session::flash('success', "Profile updated succeessfully");
            return back();
        }else{
            Session::flash('error', 'An error occured while trying to update profile.');
            return back();
        }    
    }  

    public function updatePassword(Request $request){

        if($request->input("password") != $request->input("password1")){
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

    public function updateAdminPassword(Request $request){

        if($request->input("password") != $request->input("cpassword")){
            Session::flash('error', 'Sorry!, The two passwords provided must matchy');
            return back();
        }
        $user = Auth::user();
        
        //$user = User::where("username", $user->username)->first();

        $user->password = bcrypt($request->input("password"));

        $user->save();

        Session::flash('success', 'Thank you, your password has been updated successfully');
        return back();
    }

    public function sendResetMail($member, $token){
        $data = [
        'email'=> $member->email,
        'name'=> $member->first_name,
        'token'=> $token,
        'date'=>date('Y-m-d')
        ];
 
        Mail::send('reset-mail', $data, function($message) use($data){
            $message->from('info@yul.ng', 'Team YUL');
            $message->SMTPDebug = 4; 
            $message->to($data['email']);
            $message->subject('Password Recovery');
            
        });   
    }
}
