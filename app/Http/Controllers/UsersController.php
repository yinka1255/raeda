<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

use Session;
use Redirect;
use App\User;
use App\Course;
use App\Program;
use App\Category;
use App\CategoryStudent;
use App\FlexiRegistration;
use App\Student;
use App\Admin;
use App\Book;
use App\Picture;
use App\Sale;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\DB;
use Mail;

class UsersController extends Controller{

    public function index(){
        $programs = Program::leftjoin("categories", "categories.program_id", "=", "programs.id")
        ->select("programs.*", "categories.id as category_id", "categories.name as category_name", "categories.method_of_delivery as category_method_of_delivery", "categories.duration as category_duration", "categories.sessions as category_sessions", "categories.days_of_lecture as category_days_of_lecture")
                    ->where("programs.status", 1)->orderBy("categories.id", "ASC")->get();
        $books = Book::where("status", 1)->get();
        return view('students/index')->with(["programs"=>$programs, "books"=> $books]);
    }

    public function gallery(){
        $programs = Program::leftjoin("categories", "categories.program_id", "=", "programs.id")
        ->select("programs.*", "categories.id as category_id", "categories.name as category_name", "categories.method_of_delivery as category_method_of_delivery", "categories.duration as category_duration", "categories.sessions as category_sessions", "categories.days_of_lecture as category_days_of_lecture")
                    ->where("programs.status", 1)->orderBy("categories.id", "ASC")->get();
        $pictures = Picture::where("status", 1)->get();
        return view('students/gallery')->with(["programs"=>$programs, "pictures"=> $pictures]);
    }
    public function orders(){
        $user = Auth::user();
        if($user == null || $user->type != 2){
            $loggedInUser = null;
        }else{
        $loggedInUser = Student::join("users", "students.user_id", "=", "users.id")
                        ->where("students.user_id", $user->id)
                        ->select("students.*",  "users.id as user_id", "users.status as user_status")->first();
        }
        $programs = Program::leftjoin("categories", "categories.program_id", "=", "programs.id")
        ->select("programs.*", "categories.id as category_id", "categories.name as category_name", "categories.method_of_delivery as category_method_of_delivery", "categories.duration as category_duration", "categories.sessions as category_sessions", "categories.days_of_lecture as category_days_of_lecture")
                    ->where("programs.status", 1)->orderBy("categories.id", "ASC")->get();
        $sales = Sale::join("books", "sales.book_id", "books.id")
                    ->select("books.name as book_name", "books.image", "books.author as author", "sales.*")
                    ->where(["sales.status"=> 1, "student_id"=>$loggedInUser->id])->get();
        return view('students/orders')->with(["programs"=>$programs, "sales"=> $sales, "loggedInUser"=> $loggedInUser]);
    }
    public function login(){
        $programs = Program::leftjoin("categories", "categories.program_id", "=", "programs.id")
        ->select("programs.*", "categories.id as category_id", "categories.name as category_name", "categories.method_of_delivery as category_method_of_delivery", "categories.duration as category_duration", "categories.sessions as category_sessions", "categories.days_of_lecture as category_days_of_lecture")
                    ->where("programs.status", 1)->orderBy("categories.id", "ASC")->get();
                   
        return view('students/login')->with(["programs"=>$programs]);
    }
    public function about(){
        $programs = Program::leftjoin("categories", "categories.program_id", "=", "programs.id")
        ->select("programs.*", "categories.id as category_id", "categories.name as category_name", "categories.method_of_delivery as category_method_of_delivery", "categories.duration as category_duration", "categories.sessions as category_sessions", "categories.days_of_lecture as category_days_of_lecture")
                    ->where("programs.status", 1)->orderBy("categories.id", "ASC")->get();
        return view('students/about')->with(["programs"=>$programs]);
    }


    public function terms(){
        return view('terms');
    }

    public function faq(){
        return view('faq');
    }

    public function contact(){
        $programs = Program::leftjoin("categories", "categories.program_id", "=", "programs.id")
        ->select("programs.*", "categories.id as category_id", "categories.name as category_name", "categories.method_of_delivery as category_method_of_delivery", "categories.duration as category_duration", "categories.sessions as category_sessions", "categories.days_of_lecture as category_days_of_lecture")
                    ->where("programs.status", 1)->orderBy("categories.id", "ASC")->get();
        return view('students/contact')->with(["programs"=>$programs]);
    }

    public function register($category_id){

        $user = Auth::user();
        $program = Program::leftjoin("categories", "categories.program_id", "=", "programs.id")
        ->select("programs.*",  "categories.id as category_id", "categories.registration_fee as category_registration_fee", "categories.name as category_name", "categories.method_of_delivery as category_method_of_delivery", "categories.duration as category_duration", "categories.sessions as category_sessions", "categories.days_of_lecture as category_days_of_lecture")
                    ->where(["categories.id"=> $category_id])->first();
        if($user == null || $user->type != 2){
            if($program->id == 2){
                Session::flash('error', 'Sorry! You must register for the basic certificate program first. If you have done so already, kindly login to your account and register for the advanced certificate program');
                return back();
            }
            $loggedInUser = null;
            $check_id = null;
        }else{
        $loggedInUser = Student::join("users", "students.user_id", "=", "users.id")
                        ->where("students.user_id", $user->id)
                        ->select("students.*",  "users.id as user_id", "users.status as user_status")->first();
        $check_id = $loggedInUser->id;
        if($program->id == 2){
            $check_if_reg_for_program1 = CategoryStudent::where(["student_id"=> $check_id, "program_id"=>1])->first();
            if($check_if_reg_for_program1 == null){
                Session::flash('error', 'Sorry! You must register for the basic certificate program first.');
                return back();
            }
        }

        if($program->id == 1){
            $check_if_reg_for_program1 = CategoryStudent::where(["student_id"=> $check_id, "program_id"=>1])->first();
            if($check_if_reg_for_program1 != null){
                Session::flash('error', 'Sorry! You have registered for the basic certificate program already. You can proceed to register for the advanced certificate program.');
                return back();
            }
        }
        }

        $programs = Program::leftjoin("categories", "categories.program_id", "=", "programs.id")
        ->select("programs.*", "categories.id as category_id", "categories.name as category_name", "categories.method_of_delivery as category_method_of_delivery", "categories.duration as category_duration", "categories.sessions as category_sessions", "categories.days_of_lecture as category_days_of_lecture")
                    ->where("programs.status", 1)->orderBy("categories.id", "ASC")->get();
        
        
        
        $courses = Course::where(["category_id"=> $category_id, "status"=> 1])->get();
        $courses_sum = Course::where(["category_id"=> $category_id, "status"=> 1])->sum('price');
        $total_fee = $courses_sum + $program->category_registration_fee;
        if($category_id == 3 || $category_id == 6){
            return view('students/register-flexi')->with(["program"=>$program,"programs"=>$programs, "loggedInUser"=>$loggedInUser, "courses"=>$courses, "total_fee"=> $total_fee, "time"=>time()]);
        }else{
            return view('students/register')->with(["program"=>$program,"programs"=>$programs, "loggedInUser"=>$loggedInUser, "courses"=>$courses, "total_fee"=> $total_fee, "time"=>time()]);
        }
    }

    public function visitorsRegister($id_number){
        return view('visitors/register')->with("id_number", $id_number);
    }
    public function visitorsLogin($id_number){
        return view('visitors/login')->with("id_number", $id_number);
    }

    public function studentNormalRegister(Request $request){
        
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
            $student = new Student;
            $student->user_id = $user->id;
            $student->email = $request->input("email");
            $student->phone = $request->input("phone");
            $student->name = $request->input("name");
            $student->sex = $request->input("sex");
            $student->marital_status = $request->input("marital_status");
            $student->country = $request->input("country");
            if($student->save()){
                Auth::loginUsingId($user->id);
                //$this->sendWelcomeMail($member);
                
                Session::flash('success', 'Thank you for being a part of YUL. You are now logged in');
                return redirect('/students/profile');
            }
            else{
                Session::flash('error', 'Sorry! An error occured while trying to save your information. Kindly contact administrator');
                return back();
            }
        }     
    }

    public function buyBook(Request $request){
        
        $user = Auth::user();
        if($user == null || $user->type != 2){
            Session::flash('error', 'Sorry! You do not have access to this page');
            return redirect('/');
        }
        $loggedInUser = Student::join("users", "students.user_id", "=", "users.id")
            ->where("students.user_id", $user->id)
            ->select("students.*",  "users.id as user_id", "users.status as user_status")->first();
        $book = Book::where("id", $request->input("book_id"))->first();
        $sale = new Sale;
        $sale->book_id = $request->input("book_id");
        $sale->price = $request->input("price");
        $sale->student_id = $loggedInUser->id;
        $sale->status = 1;
        if($sale->save()){
            
            Session::flash('success', 'Thank you for your purchase. Be blessed');
            return response()->download(storage_path().'/app/public/'.$book->book);
        }
        else{
            Session::flash('error', 'Sorry! An error occured. Kindly contact administrator');
            return back();
        }
    }

    public function studentRegister(Request $request){
        
        $check = Student::join("users", "students.user_id", "=", "users.id")
        ->where("users.email", $request->input("email"))
        ->select("students.*",  "users.id as user_id", "users.status as user_status")->first();
        if($check != null){

            if($request->input("program_id") == 2){
                $check_if_reg_for_program1 = CategoryStudent::where(["student_id"=> $check->id, "program_id"=>1])->first();
                if($check_if_reg_for_program1 == null){
                    Session::flash('error', 'Sorry! You must register for the basic certificate program first.');
                    return back();
                }
            }

            $category_student = new CategoryStudent;
                $category_student->category_id = $request->input("category_id");
                $category_student->student_id = $check->id;
                $category_student->program_id = $request->input("program_id");
                $category_student->amount = $request->input("amount");
                $category_student->status = 1;
                if($category_student->save()){
                    if($request->input("category_id") == 3 || $request->input("category_id") == 6){
                        $cos = Course::where("category_id", $request->input("category_id"))->get();
                        foreach($cos as $co){
                            if($request->input($co->id) == "on"){
                                $flexi_registration = new FlexiRegistration;
                                $flexi_registration->course_id = $co->id;
                                $flexi_registration->category_id = $request->input("category_id");
                                $flexi_registration->program_id = $request->input("program_id");
                                $flexi_registration->student_id = $check->id;
                                $flexi_registration->amount = $request->input("amount");
                                $flexi_registration->category_student_id = $category_student->id;
                                $flexi_registration->status = 1;
                                $flexi_registration->save();
                            }
                        }
                    }
                    Auth::loginUsingId($check->user_id);
                    Session::flash('success', 'Thank you for being a part of YUL. You are now logged in');
                    return redirect('/students/profile');
                }
        }
        /*
        if($request->input("program_id") == 2){
            Session::flash('error', 'Sorry! You must register for the basic certificate program first. If you have done so already, kindly login to your account and register for the advanced certificate program');
            return back();
        }
        */
        $user = new User;
        $user->email = $request->input("email");
        $user->password = bcrypt($request->input("password"));
        $user->status = 1;
        $user->type = 2;
        if($user->save()){
            $student = new Student;
            $student->user_id = $user->id;
            $student->email = $request->input("email");
            $student->phone = $request->input("phone");
            $student->name = $request->input("name");
            $student->sex = $request->input("sex");
            $student->marital_status = $request->input("marital_status");
            $student->country = $request->input("country");
            if($student->save()){
                $category_student = new CategoryStudent;
                $category_student->category_id = $request->input("category_id");
                $category_student->student_id = $student->id;
                $category_student->program_id = $request->input("program_id");
                $category_student->amount = $request->input("amount");
                $category_student->status = 1;
                if($category_student->save()){
                    if($request->input("category_id") == 3 || $request->input("category_id") == 6){
                        $cos = Course::where("category_id", $request->input("category_id"))->get();
                        foreach($cos as $co){
                            if($request->input($co->id) == "on"){
                                $flexi_registration = new FlexiRegistration;
                                $flexi_registration->course_id = $co->id;
                                $flexi_registration->category_id = $request->input("category_id");
                                $flexi_registration->program_id = $request->input("program_id");
                                $flexi_registration->student_id = $student->id;
                                $flexi_registration->amount = $request->input("amount");
                                $flexi_registration->category_student_id = $category_student->id;
                                $flexi_registration->status = 1;
                                $flexi_registration->save();
                            }
                        }
                    }


                    Auth::loginUsingId($user->id);
                    //$this->sendWelcomeMail($member);
                    
                    Session::flash('success', 'Thank you for being a part of YUL. You are now logged in');
                    return redirect('/students/profile');
                }
                else{
                    Session::flash('error', 'Sorry! An error occured while trying to save your information. Kindly contact administrator');
                    return back();
                }
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
            $message->from('info@yul.ng', 'Yul school contact form');
            $message->SMTPDebug = 4; 
            $message->to("info@yul.ng");
            $message->subject('Contact form enquiry');
            
        });   
        Session::flash('success', 'We have received your message. We will get back to you in due course');
        return back();
    }


    public function sendWelcomeMail($member){
        $data = [
        'email'=> $member->email,
        'name'=> $member->first_name,
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
        if($user->type == 2){
            $student = Student::where("user_id", $user->id)->first();
            $this->sendResetMail($student, $token);
        }elseif($user->type == 1){
            $admin = Admin::where("user_id", $user->id)->first();
            $this->sendResetMail($admin, $token);
        }
        Session::flash('success', 'An Email has been sent to your account. Pls check to proceed');
        return back();
    }
    public function memberForgotPasswordPost(Request $request){

        if(empty($request->input("id_number"))){
            Session::flash('error', 'Kindly provide your ID number');
            return back();
        }
        $user = User::where("id_number", $request->input("id_number"))->first();
        if($user == null){
            Session::flash('error', 'No user associated with the provided id number');
            return back();
        }
        $token = substr(str_shuffle(str_repeat("0123456789abcdefghijklmnopqrstuvwxyz", 4)), 0, 4);
        $user->password = bcrypt($token);
        $user->save();
        
            $member = Member::where("user_id", $user->id)->first();
            $this->sendResetMailMember($member, $token);
        Session::flash('success', 'An Email has been sent to your account. Pls check to proceed');
        return back();
    }

    public function sendResetMail($member, $token){
        $data = [
        'email'=> $member->email,
        'name'=> $member->name,
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
    public function sendResetMailMember($member, $token){
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

    public function profile(){
        $user = Auth::user();
        if($user == null || $user->type != 2){
            Session::flash('error', 'Sorry! You do not have access to this page');
            return redirect('/');
        }
        $loggedInUser = Student::join("users", "students.user_id", "=", "users.id")
            ->where("students.user_id", $user->id)
            ->select("students.*",  "users.id as user_id", "users.status as user_status")->first();

            $programs = Program::leftjoin("categories", "categories.program_id", "=", "programs.id")
            ->select("programs.*", "categories.id as category_id", "categories.name as category_name", "categories.method_of_delivery as category_method_of_delivery", "categories.duration as category_duration", "categories.sessions as category_sessions", "categories.days_of_lecture as category_days_of_lecture")
                        ->where("programs.status", 1)->orderBy("programs.id", "ASC")->get();
            $my_programs = CategoryStudent::where("category_students.student_id", $loggedInUser->id)
                            ->join("programs", "programs.id", "=", "category_students.program_id")
                            ->join("categories", "categories.id", "=", "category_students.category_id")
                            ->leftjoin("courses", "categories.id", "=", "courses.category_id")
            ->select("programs.*", "courses.name as course_name", "courses.price as course_price", "categories.id as category_id", "categories.registration_fee as category_registration_fee", "categories.name as category_name", "categories.method_of_delivery as category_method_of_delivery", "categories.duration as category_duration", "categories.sessions as category_sessions", "categories.days_of_lecture as category_days_of_lecture", "category_students.amount as category_student_price")
                        ->get();
            $flexi_reg_courses1 = FlexiRegistration::where(["student_id"=>$loggedInUser->id, "program_id"=> 1])
                                    ->join("courses", "courses.id", "=", "flexi_registrations.course_id")
                                    ->select("courses.*")->get();
            $flexi_reg_courses2 = FlexiRegistration::where(["student_id"=>$loggedInUser->id, "program_id"=> 2])
                                    ->join("courses", "courses.id", "=", "flexi_registrations.course_id")
                                    ->select("courses.*")->get();
        $my_programs_count = CategoryStudent::where("category_students.student_id", $loggedInUser->id)->count();
        return view('students/profile')->with(["programs"=>$programs,"my_programs"=>$my_programs,"my_programs_count"=>$my_programs_count, "loggedInUser"=>$loggedInUser, "flexi_reg_courses1"=>$flexi_reg_courses1, "flexi_reg_courses2"=>$flexi_reg_courses2, "time"=>time()]);
    }
}
