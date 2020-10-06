<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

use Session;
use Redirect;
use App\User;
use App\Customer;
use App\City;
use App\Role;
use App\Cart;
use App\Transaction;
use App\State;
use App\VehicleType;
use App\DispatchOrder;
use App\DispatchOrderDetail;
use App\DispatchItemCategory;
use App\Admin;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\DB;
use Mail;
use Carbon\Carbon;

class AdminsController extends Controller{

    public function index(){
        $completed_dispatches = DispatchOrder::where([ "status"=>"Delivered"])->count();
        $awaiting_payment_dispatches = DispatchOrder::where([ "payment_status"=>"Pending"])->count();
        $transit_dispatches = DispatchOrder::where(["status"=>"In transit"])->count();
        $recent_dispatches = DispatchOrder::join("users", "users.id", "dispatch_orders.user_id")
        ->select("dispatch_orders.*", "users.id as user_id", "users.first_name as user_first_name", "users.last_name as user_last_name")
        ->orderBy("id", "DESC")->take(10)->get();
        return view('admin/index')->with(compact('completed_dispatches', 'awaiting_payment_dispatches', 'transit_dispatches', 'recent_dispatches'));
        
    }
    public function dispatches(){
        $dispatches = DispatchOrder::join("users", "users.id", "dispatch_orders.user_id")
        ->select("dispatch_orders.*", "users.id as user_id", "users.first_name as user_first_name", "users.last_name as user_last_name")
        ->orderBy("id", "DESC")->get();
        $states = State::where("status", "Active")->get();
        return view('admin/dispatches')->with(compact('dispatches', 'states'));
        
    }
    public function dispatchesPost(Request $request){
        $status = $request->input('status');
        $from = $request->input('from');
        $to = $request->input('to');
        $state_id = $request->input('state_id');
        if($state_id == "All"){
            if($status == "All"){
                $dispatches = DispatchOrder::join("users", "users.id", "dispatch_orders.user_id")
                ->select("dispatch_orders.*", "users.id as user_id", "users.first_name as user_first_name", "users.last_name as user_last_name")
                ->whereBetween('dispatch_orders.created_at', [$from, $to])
                ->orderBy("id", "DESC")->get();
            }
            elseif($status == "Awaiting payment"){
                $dispatches = DispatchOrder::join("users", "users.id", "dispatch_orders.user_id")
                ->select("dispatch_orders.*", "users.id as user_id", "users.first_name as user_first_name", "users.last_name as user_last_name")
                ->whereBetween('dispatch_orders.created_at', [$from, $to])
                ->where("dispatch_orders.payment_status", $status)
                ->orderBy("id", "DESC")->get();
            }else{
                $dispatches = DispatchOrder::join("users", "users.id", "dispatch_orders.user_id")
                ->select("dispatch_orders.*", "users.id as user_id", "users.first_name as user_first_name", "users.last_name as user_last_name")
                ->whereBetween('dispatch_orders.created_at', [$from, $to])
                ->where("dispatch_orders.status", $status)
                ->orderBy("id", "DESC")->get();
            }
        }else{
            if($status == "All"){
                $dispatches = DispatchOrder::join("users", "users.id", "dispatch_orders.user_id")
                ->select("dispatch_orders.*", "users.id as user_id", "users.first_name as user_first_name", "users.last_name as user_last_name")
                ->whereBetween('dispatch_orders.created_at', [$from, $to])
                ->where("dispatch_orders.pickup_state_id", $state_id)
                ->orderBy("id", "DESC")->get();
            }
            elseif($status == "Awaiting payment"){
                $dispatches = DispatchOrder::join("users", "users.id", "dispatch_orders.user_id")
                ->select("dispatch_orders.*", "users.id as user_id", "users.first_name as user_first_name", "users.last_name as user_last_name")
                ->whereBetween('dispatch_orders.created_at', [$from, $to])
                ->where("dispatch_orders.payment_status", $status)
                ->where("dispatch_orders.pickup_state_id", $state_id)
                ->orderBy("id", "DESC")->get();
            }else{
                $dispatches = DispatchOrder::join("users", "users.id", "dispatch_orders.user_id")
                ->select("dispatch_orders.*", "users.id as user_id", "users.first_name as user_first_name", "users.last_name as user_last_name")
                ->whereBetween('dispatch_orders.created_at', [$from, $to])
                ->where("dispatch_orders.status", $status)
                ->where("dispatch_orders.pickup_state_id", $state_id)
                ->orderBy("id", "DESC")->get();
            }
        }
        return view('admin/dispatches')->with(compact('dispatches'));
        
    }

    public function stateDispatches(){
        $user = Auth::user();
        $state = State::where("id", $user->state_id)->first();
        $dispatches = DispatchOrder::join("users", "users.id", "dispatch_orders.user_id")
        ->select("dispatch_orders.*", "users.id as user_id", "users.first_name as user_first_name", "users.last_name as user_last_name")
        ->where("dispatch_orders.pickup_state_id", $user->state_id)
        ->orderBy("id", "DESC")->get();
        return view('admin/state_dispatches')->with(compact('dispatches', 'state'));
    }

    public function stateDispatchesPost(Request $request){
        $user = Auth::user();
        $state = State::where("id", $user->state_id)->first();
        $status = $request->input('status');
        $from = $request->input('from');
        $to = $request->input('to');
        $state_id = $user->state_id;
        
        if($status == "All"){
            $dispatches = DispatchOrder::join("users", "users.id", "dispatch_orders.user_id")
            ->select("dispatch_orders.*", "users.id as user_id", "users.first_name as user_first_name", "users.last_name as user_last_name")
            ->whereBetween('dispatch_orders.created_at', [$from, $to])
            ->where("dispatch_orders.pickup_state_id", $state_id)
            ->orderBy("id", "DESC")->get();
        }
        elseif($status == "Awaiting payment"){
            $dispatches = DispatchOrder::join("users", "users.id", "dispatch_orders.user_id")
            ->select("dispatch_orders.*", "users.id as user_id", "users.first_name as user_first_name", "users.last_name as user_last_name")
            ->whereBetween('dispatch_orders.created_at', [$from, $to])
            ->where("dispatch_orders.payment_status", $status)
            ->where("dispatch_orders.pickup_state_id", $state_id)
            ->orderBy("id", "DESC")->get();
        }else{
            $dispatches = DispatchOrder::join("users", "users.id", "dispatch_orders.user_id")
            ->select("dispatch_orders.*", "users.id as user_id", "users.first_name as user_first_name", "users.last_name as user_last_name")
            ->whereBetween('dispatch_orders.created_at', [$from, $to])
            ->where("dispatch_orders.status", $status)
            ->where("dispatch_orders.pickup_state_id", $state_id)
            ->orderBy("id", "DESC")->get();
        }
        
        return view('admin/state_dispatches')->with(compact('dispatches', 'state'));
    }
    public function myDispatches(){
        $user = Auth::user();
        $state = State::where("id", $user->state_id)->first();
        $dispatches = DispatchOrder::join("users", "users.id", "dispatch_orders.user_id")
        ->select("dispatch_orders.*", "users.id as user_id", "users.first_name as user_first_name", "users.last_name as user_last_name")
        ->where("dispatch_orders.user_id", $user->id)
        ->orderBy("id", "DESC")->get();
        return view('admin/my_dispatches')->with(compact('dispatches', 'state'));
    }

    public function myDispatchesPost(Request $request){
        $user = Auth::user();
        $state = State::where("id", $user->state_id)->first();
        $status = $request->input('status');
        $from = $request->input('from');
        $to = $request->input('to');
        $state_id = $user->state_id;
        
        if($status == "All"){
            $dispatches = DispatchOrder::join("users", "users.id", "dispatch_orders.user_id")
            ->select("dispatch_orders.*", "users.id as user_id", "users.first_name as user_first_name", "users.last_name as user_last_name")
            ->whereBetween('dispatch_orders.created_at', [$from, $to])
            ->where("dispatch_orders.user_id", $user->id)
            ->orderBy("id", "DESC")->get();
        }
        elseif($status == "Awaiting payment"){
            $dispatches = DispatchOrder::join("users", "users.id", "dispatch_orders.user_id")
            ->select("dispatch_orders.*", "users.id as user_id", "users.first_name as user_first_name", "users.last_name as user_last_name")
            ->whereBetween('dispatch_orders.created_at', [$from, $to])
            ->where("dispatch_orders.payment_status", $status)
            ->where("dispatch_orders.user_id", $user->id)
            ->orderBy("id", "DESC")->get();
        }else{
            $dispatches = DispatchOrder::join("users", "users.id", "dispatch_orders.user_id")
            ->select("dispatch_orders.*", "users.id as user_id", "users.first_name as user_first_name", "users.last_name as user_last_name")
            ->whereBetween('dispatch_orders.created_at', [$from, $to])
            ->where("dispatch_orders.status", $status)
            ->where("dispatch_orders.user_id", $user->id)
            ->orderBy("id", "DESC")->get();
        }
        
        return view('admin/my_dispatches')->with(compact('dispatches', 'state'));
    }
    

    public function roles(){
        $roles = Role::orderBy("id", "DESC")->get();
        return view('admin/roles')->with(compact('roles'));
    }
    public function newRole(){
        return view('admin/new_role');
    }
    public function states(){
        $states = State::orderBy("name", "ASC")->get();
        return view('admin/states')->with(compact('states'));
    }
    public function activateState($state_id){
        $state = State::where("id", $state_id)->first();
        $state->status = "Active";
        $state->save();
        Session::flash('success', 'State was successfully activated');
        return redirect('admin/states');
    }
    public function deactivateState($state_id){
        $state = State::where("id", $state_id)->first();
        $state->status = "Inactive";
        $state->save();
        Session::flash('success', 'State was successfully deativated');
        return redirect('admin/states');
    }
    public function state($state_id){
        $cities = City::where("state_id", $state_id)->orderBy("name", "ASC")->get();
        $state = State::where("id", $state_id)->first();
        return view('admin/state')->with(compact('cities', 'state'));
    }
    public function activateCity($city_id){
        $city = City::where("id", $city_id)->first();
        $city->status = "Active";
        $city->save();
        Session::flash('success', 'Landmark was successfully activated');
        return back();
    }
    public function deactivateCity($city_id){
        $city = City::where("id", $city_id)->first();
        $city->status = "Inactive";
        $city->save();
        Session::flash('success', 'Landmark was successfully deativated');
        return back();
    }

    public function updateStatePrice(Request $request){
        $state = State::where("id", $request->input("state_id"))->first();
        $state->price = $request->input("price");
        if($state->save()){
            Session::flash('success', "State updated succeessfully");
            return back();
        }else{
            Session::flash('error', 'An error occured while trying to update profile.');
            return back();
        }    
    }  

    public function updateCityPrice(Request $request){
        $city= City::where("id", $request->input("city_id"))->first();
        $city->price = $request->input("price");
        if($city->save()){
            Session::flash('success', "City updated succeessfully");
            return back();
        }else{
            Session::flash('error', 'An error occured while trying to update profile.');
            return back();
        }    
    }  

    public function newUser(){
        $roles = Role::orderBy("id", "DESC")->get();
        $states = State::orderBy("name", "ASC")->get();
        return view('admin/new_user')->with(compact('states','roles'));
    }

    public function editRole($id){
        $role = Role::where("id", $id)->first();
        return view('admin/edit_role')->with(compact('role'));
    }
    

    public function addRole(Request $request){

        
        if($request->input('manage_roles') == "Yes"){
            $manage_roles = "Yes";
        }else{
            $manage_roles= "No";
        }
        if($request->input('manage_states') == "Yes"){
            $manage_states = "Yes";
        }else{
            $manage_states = "No";
        }
        if($request->input('manage_cities') == "Yes"){
            $manage_cities = "Yes";
        }else{
            $manage_cities = "No";
        }
        if($request->input('manage_customers') == "Yes"){
            $manage_customers = "Yes";
        }else{
            $manage_customers = "No";
        }
        if($request->input('view_all_orders') == "Yes"){
            $view_all_orders = "Yes";
        }else{
            $view_all_orders = "No";
        }
        if($request->input('assign_all_orders_to_rider') == "Yes"){
            $assign_all_orders_to_rider = "Yes";
        }else{
            $assign_all_orders_to_rider = "No";
        }
        if($request->input('manage_all_orders_status') == "Yes"){
            $manage_all_orders_status = "Yes";
        }else{
            $manage_all_orders_status = "No";
        }
        if($request->input('view_state_orders') == "Yes"){
            $view_state_orders = "Yes";
        }else{
            $view_state_orders = "No";
        }
        if($request->input('assign_state_orders_to_rider') == "Yes"){
            $assign_state_orders_to_rider = "Yes";
        }else{
            $assign_state_orders_to_rider = "No";
        }
        if($request->input('manage_state_orders_status') == "Yes"){
            $manage_state_orders_status = "Yes";
        }else{
            $manage_state_orders_status = "No";
        }
        if($request->input('manage_user') == "Yes"){
            $manage_user = "Yes";
        }else{
            $manage_user = "No";
        }
        if($request->input('view_all_transactions') == "Yes"){
            $view_all_transactions = "Yes";
        }else{
            $view_all_transactions = "No";
        }
        if($request->input('create_transactions') == "Yes"){
            $create_transactions = "Yes";
        }else{
            $create_transactions = "No";
        }
        if($request->input('view_state_transactions') == "Yes"){
            $view_state_transactions = "Yes";
        }else{
            $view_state_transactions = "No";
        }
        if($request->input('create_state_transactions') == "Yes"){
            $create_state_transactions = "Yes";
        }else{
            $create_state_transactions = "No";
        }
        $role = new Role;
        $role->name = $request->input('name'); 
        $role->manage_roles = $manage_roles; 
        $role->manage_states = $manage_states; 
        $role->manage_cities = $manage_cities; 
        $role->manage_customers = $manage_customers; 
        $role->view_all_orders = $view_all_orders ;
        $role->assign_all_orders_to_rider = $assign_all_orders_to_rider; 
        $role->manage_all_orders_status = $manage_all_orders_status;
        $role->view_state_orders = $view_state_orders;
        $role->assign_state_orders_to_rider = $assign_state_orders_to_rider;
        $role->manage_state_orders_status = $manage_state_orders_status;
        $role->manage_user = $manage_user;
        $role->view_all_transactions = $view_all_transactions; 
        $role->create_transactions = $create_transactions; 
        $role->view_state_transactions = $view_state_transactions;
        $role->create_state_transactions = $create_state_transactions;
        if($role->save()){
            Session::flash('success', 'Role was successfully saved');
            return redirect('admin/roles');
        }else{
            Session::flash('error', 'An unknown error occured');
            return back();
        }
    }

    public function updateRole(Request $request){

        
        if($request->input('manage_roles') == "Yes"){
            $manage_roles = "Yes";
        }else{
            $manage_roles= "No";
        }
        if($request->input('manage_states') == "Yes"){
            $manage_states = "Yes";
        }else{
            $manage_states = "No";
        }
        if($request->input('manage_cities') == "Yes"){
            $manage_cities = "Yes";
        }else{
            $manage_cities = "No";
        }
        if($request->input('manage_customers') == "Yes"){
            $manage_customers = "Yes";
        }else{
            $manage_customers = "No";
        }
        if($request->input('view_all_orders') == "Yes"){
            $view_all_orders = "Yes";
        }else{
            $view_all_orders = "No";
        }
        if($request->input('assign_all_orders_to_rider') == "Yes"){
            $assign_all_orders_to_rider = "Yes";
        }else{
            $assign_all_orders_to_rider = "No";
        }
        if($request->input('manage_all_orders_status') == "Yes"){
            $manage_all_orders_status = "Yes";
        }else{
            $manage_all_orders_status = "No";
        }
        if($request->input('view_state_orders') == "Yes"){
            $view_state_orders = "Yes";
        }else{
            $view_state_orders = "No";
        }
        if($request->input('assign_state_orders_to_rider') == "Yes"){
            $assign_state_orders_to_rider = "Yes";
        }else{
            $assign_state_orders_to_rider = "No";
        }
        if($request->input('manage_state_orders_status') == "Yes"){
            $manage_state_orders_status = "Yes";
        }else{
            $manage_state_orders_status = "No";
        }
        if($request->input('manage_user') == "Yes"){
            $manage_user = "Yes";
        }else{
            $manage_user = "No";
        }
        if($request->input('view_all_transactions') == "Yes"){
            $view_all_transactions = "Yes";
        }else{
            $view_all_transactions = "No";
        }
        if($request->input('create_transactions') == "Yes"){
            $create_transactions = "Yes";
        }else{
            $create_transactions = "No";
        }
        if($request->input('view_state_transactions') == "Yes"){
            $view_state_transactions = "Yes";
        }else{
            $view_state_transactions = "No";
        }
        if($request->input('create_state_transactions') == "Yes"){
            $create_state_transactions = "Yes";
        }else{
            $create_state_transactions = "No";
        }
        $role = Role::where("id", $request->input('id'))->first();
        $role->name = $request->input('name');  
        $role->manage_roles = $manage_roles; 
        $role->manage_states = $manage_states; 
        $role->manage_cities = $manage_cities; 
        $role->manage_customers = $manage_customers; 
        $role->view_all_orders = $view_all_orders ;
        $role->assign_all_orders_to_rider = $assign_all_orders_to_rider; 
        $role->manage_all_orders_status = $manage_all_orders_status;
        $role->view_state_orders = $view_state_orders;
        $role->assign_state_orders_to_rider = $assign_state_orders_to_rider;
        $role->manage_state_orders_status = $manage_state_orders_status;
        $role->manage_user = $manage_user;
        $role->view_all_transactions = $view_all_transactions; 
        $role->create_transactions = $create_transactions; 
        $role->view_state_transactions = $view_state_transactions;
        $role->create_state_transactions = $create_state_transactions;
        if($role->save()){
            Session::flash('success', 'Role was successfully updated');
            return redirect('admin/roles');
        }else{
            Session::flash('error', 'An unknown error occured');
            return back();
        }
    }

    public function transactions(){
        $user = Auth::user();
        $transactions = Transaction::join("users", "users.id", "transactions.user_id")
        ->select("transactions.*", "users.id as user_id", "users.first_name as user_first_name", "users.last_name as user_last_name")
        ->get();
        $credit = Transaction::where(["type"=>"Credit"])->sum('amount');
        $debit = Transaction::where(["type"=>"Debit"])->sum('amount');
        $balance = $credit - $debit;
        return view('admin/transactions')->with(compact('transactions', 'balance'));
        
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
            return back();
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
        return view('admin/dispatch_details')->with(compact('dispatch'));
        
    }

    public function newDispatch(){
        $user = Auth::user();
        $dispatch_item_categories = DispatchItemCategory::all();
        $carts = Cart::where("user_id", $user->id)->get();
        return view('admin/new_dispatch')->with(compact('dispatch_item_categories', 'carts'));
        
    }
    public function newDispatchAddress(){
        $user = Auth::user();
        $vehicle_types = VehicleType::all();
        $cities = City::join("states", "states.id", "cities.state_id")
        ->select("cities.*", "cities.id as key", "cities.name as city_name", "states.name as state_name")
        ->get();
        $carts = Cart::where("user_id", $user->id)->get();
        return view('admin/new_dispatch_address')->with(compact('cities', 'carts', 'vehicle_types'));
        
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

    public function customer($customer_id){
        $transactions = Transaction::join("users", "users.id", "transactions.user_id")
        ->select("transactions.*", "users.id as user_id", "users.first_name as user__first_name", "users.last_name as user__last_name")
        ->where("transactions.user_id", $customer_id)
        ->get();
        $credit = Transaction::where(["type"=>"Credit", "user_id"=>$customer_id])->sum('amount');
        $debit = Transaction::where(["type"=>"Debit", "user_id"=>$customer_id])->sum('amount');
        $balance = $credit - $debit;
        $customer = User::where("id", $customer_id)->first();
        return view('admin/customer')->with(compact('transactions', 'customer', 'balance'));
   }
   public function customers(){
        $customers = User::where(["role"=>"Customer"])->get();
        return view('admin/customers')->with(compact('customers'));
    }

    public function profile(){
        return view('admin/profile');
    }

    public function users(){
        $users = User::join("roles", "users.role_id", "roles.id")
        ->join("states", "users.state_id", "states.id")
        ->select("users.*", "roles.name as role_name", "states.name as state_name")
        ->where(["users.status"=> "Active", "role"=>"admin"])->get();
        return view('admin/users')->with(compact('users'));
    }

    public function addUser(Request $request){
        $admin = new User;
        $admin->first_name = $request->input("first_name");
        $admin->last_name = $request->input("last_name");
        $admin->email = $request->input("email");
        $admin->phone1 = $request->input("phone");
        $admin->role_id = $request->input("role_id");
        $admin->state_id = $request->input("state_id");
        $admin->password = bcrypt($request->input("password"));
        $admin->role = "admin";
        if($admin->save()){
            Session::flash('success', "User saved succeessfully");
            return redirect('admin/users');
        }else{
            Session::flash('error', 'An error occured while trying to update profile.');
            return back();
        }    
    }  
    
    public function updateProfile(Request $request){
        $admin = User::where("id", Auth::user()->id)->first();
        $admin->first_name = $request->input("first_name");
        $admin->last_name = $request->input("last_name");
        $admin->phone1 = $request->input("phone");
        $admin->email = $request->input("email");
        if($admin->save()){
            Session::flash('success', "Profile updated succeessfully");
            return back();
        }else{
            Session::flash('error', 'An error occured while trying to update profile.');
            return back();
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
