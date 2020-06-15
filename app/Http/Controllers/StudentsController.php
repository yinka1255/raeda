<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

use Session;
use Redirect;
use App\User;
use App\Student;
use App\Course;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\DB;
use Mail;
use Carbon\Carbon;

class StudentsController extends Controller{

    
    public function appointmentMail($member){
        $data = [
        'email'=> $member->email,
        'name'=> $member->first_name,
        ];
 
        Mail::send('member-mail-for-appointment', $data, function($message) use($data){
            $message->from('info@yul.ng', 'Team YUL');
            $message->SMTPDebug = 4; 
            $message->to($data['email']);
            $message->subject('New appointment notification');
            //return response()->json(["succeess"=>'An Email has been sent to your account. Pls check to proceed']);
        });   
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

    
}
