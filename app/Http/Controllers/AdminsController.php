<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

use Session;
use Redirect;
use App\User;
use App\Student;
use App\Program;
use App\Category;
use App\Course;
use App\Book;
use App\CategoryStudent;
use App\Sale;
use App\Picture;
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
        $books_count = Book::count();
        $programs_count = Program::count();
        $students_count = Student::whereYear('created_at', Carbon::now()->year)->count();
        $sales_count = Sale::whereYear('created_at', Carbon::now()->year)->count();
        return view('admin/index')->with(["loggedInUser"=>$loggedInUser, "books_count"=>$books_count, "programs_count"=>$programs_count, "students_count"=>$students_count, "sales_count"=>$sales_count]);
    }
    
    public function admins(){
    
        $user = Auth::user();
        if(!$user || $user->type != 1){
            Session::flash('error', 'Sorry! You do not have access to this page');
            return redirect('/login');
        }
        $loggedInUser = Admin::join("users", "admins.user_id", "=", "users.id")
                        ->where("admins.user_id", $user->id)
                        ->select("admins.*", "users.id as user_id", "users.status as user_status")->first();

        $admins = Admin::join("users", "admins.user_id", "=", "users.id")
                    ->orderBy("users.id", "desc")
                    ->select("admins.*", "users.id as user_id", "users.status as user_status")->get();

        return view('admin/admins')->with(["admins"=>$admins, "loggedInUser"=>$loggedInUser]);
    } 

    public function students(){
    
        $user = Auth::user();
        if(!$user || $user->type != 1){
            Session::flash('error', 'Sorry! You do not have access to this page');
            return redirect('/login');
        }
        $loggedInUser = Admin::join("users", "admins.user_id", "=", "users.id")
                        ->where("admins.user_id", $user->id)
                        ->select("admins.*", "users.id as user_id", "users.status as user_status")->first();

        $students = Student::join("users", "students.user_id", "=", "users.id")
                    ->orderBy("users.id", "desc")
                    ->select("students.*", "users.id as user_id", "users.status as user_status")->get();

        return view('admin/students')->with(["students"=>$students, "loggedInUser"=>$loggedInUser]);
    } 

    public function student($student_id){
        $user = Auth::user();
        if(!$user || $user->type != 1){
            Session::flash('error', 'Sorry! You do not have access to this page');
            return redirect('/login');
        }
        $loggedInUser = Admin::join("users", "admins.user_id", "=", "users.id")
                        ->where("admins.user_id", $user->id)
                        ->select("admins.*", "users.id as user_id", "users.status as user_status")->first();

        $my_programs = CategoryStudent::where("category_students.student_id", $student_id)
                        ->join("programs", "programs.id", "=", "category_students.program_id")
                        ->join("categories", "categories.id", "=", "category_students.category_id")
        ->select("programs.*", "categories.id as category_id", "categories.name as category_name", "categories.method_of_delivery as category_method_of_delivery", "categories.duration as category_duration", "categories.sessions as category_sessions", "categories.days_of_lecture as category_days_of_lecture", "category_students.amount as category_student_price")
                    ->get();
        $student = Student::join("users", "students.user_id", "=", "users.id")
                    ->orderBy("users.id", "desc")
                    ->where([ "students.id"=>$student_id])
                    ->select("students.*", "users.id as user_id", "users.status as user_status")->first();
        $sales = Sale::join("books", "sales.book_id", "books.id")
                    ->select("books.name as book_name", "books.image", "books.author as author", "sales.*")
                    ->where(["sales.status"=> 1, "student_id"=>$student_id])->get();
        return view('admin/student')->with(["student"=>$student, "my_programs"=>$my_programs, "sales"=> $sales,  "loggedInUser"=>$loggedInUser]);
    } 

    public function programs(){
        $user = Auth::user();
        if(!$user || $user->type != 1){
            Session::flash('error', 'Sorry! You do not have access to this page');
            return redirect('/login');
        }
        $loggedInUser = Admin::join("users", "admins.user_id", "=", "users.id")
                        ->where("admins.user_id", $user->id)
                        ->select("admins.*", "users.id as user_id", "users.status as user_status")->first();
        $programs = Program::where("status", 1)->get();
        return view('admin/programs')->with(["programs"=>$programs, "loggedInUser"=>$loggedInUser]);
    } 

    public function program($program_id){
        $user = Auth::user();
        if(!$user || $user->type != 1){
            Session::flash('error', 'Sorry! You do not have access to this page');
            return redirect('/login');
        }
        $loggedInUser = Admin::join("users", "admins.user_id", "=", "users.id")
                        ->where("admins.user_id", $user->id)
                        ->select("admins.*", "users.id as user_id", "users.status as user_status")->first();
        $program = Program::where("id", $program_id)->first();
        $categories = Category::where("program_id", $program_id)->get();
        return view('admin/program')->with(["program"=>$program, "categories"=>$categories, "loggedInUser"=>$loggedInUser]);
    } 
    

    public function courses($program_id, $category_id){
        $user = Auth::user();
        if(!$user || $user->type != 1){
            Session::flash('error', 'Sorry! You do not have access to this page');
            return redirect('/login');
        }
        $loggedInUser = Admin::join("users", "admins.user_id", "=", "users.id")
                        ->where("admins.user_id", $user->id)
                        ->select("admins.*", "users.id as user_id", "users.status as user_status")->first();
        $program = Program::where("id", $program_id)->first();
        $category = Category::where("id", $category_id)->first();
        $courses = Course::where("category_id", $category_id)->get();
        return view('admin/courses')->with(["program"=>$program, "category"=>$category, "courses"=>$courses, "loggedInUser"=>$loggedInUser]);
    } 

    public function editCategory($program_id, $category_id){
        $user = Auth::user();
        if(!$user || $user->type != 1){
            Session::flash('error', 'Sorry! You do not have access to this page');
            return redirect('/login');
        }
        $loggedInUser = Admin::join("users", "admins.user_id", "=", "users.id")
                        ->where("admins.user_id", $user->id)
                        ->select("admins.*", "users.id as user_id", "users.status as user_status")->first();
        $program = Program::where("id", $program_id)->first();
        $category = Category::where("id", $category_id)->first();
        return view('admin/edit_category')->with(["program"=>$program, "category"=>$category,"loggedInUser"=>$loggedInUser]);
    } 

    public function newCourse($program_id, $category_id){
        $user = Auth::user();
        if(!$user || $user->type != 1){
            Session::flash('error', 'Sorry! You do not have access to this page');
            return redirect('/login');
        }
        $loggedInUser = Admin::join("users", "admins.user_id", "=", "users.id")
                        ->where("admins.user_id", $user->id)
                        ->select("admins.*", "users.id as user_id", "users.status as user_status")->first();
        $program = Program::where("id", $program_id)->first();
        $category = Category::where("program_id", $program_id)->first();
        return view('admin/new_course')->with(["program"=>$program, "category"=>$category, "loggedInUser"=>$loggedInUser]);
    } 

    public function editCourse($program_id, $category_id, $id){
        $user = Auth::user();
        if(!$user || $user->type != 1){
            Session::flash('error', 'Sorry! You do not have access to this page');
            return redirect('/login');
        }
        $loggedInUser = Admin::join("users", "admins.user_id", "=", "users.id")
                        ->where("admins.user_id", $user->id)
                        ->select("admins.*", "users.id as user_id", "users.status as user_status")->first();
        $program = Program::where("id", $program_id)->first();
        $category = Category::where("program_id", $program_id)->first();
        $course = Course::where("id", $id)->first();
        return view('admin/edit_course')->with(["program"=>$program, "category"=>$category, "course"=>$course, "loggedInUser"=>$loggedInUser]);
    } 

    public function pictures(){
        $user = Auth::user();
        if(!$user || $user->type != 1){
            Session::flash('error', 'Sorry! You do not have access to this page');
            return redirect('/login');
        }
        $loggedInUser = Admin::join("users", "admins.user_id", "=", "users.id")
                        ->where("admins.user_id", $user->id)
                        ->select("admins.*", "users.id as user_id", "users.status as user_status")->first();
        $pictures = Picture::where("status", 1)->get();
        return view('admin/pictures')->with(["pictures"=>$pictures, "loggedInUser"=>$loggedInUser]);
    } 

    public function newPicture(){
        $user = Auth::user();
        if(!$user || $user->type != 1){
            Session::flash('error', 'Sorry! You do not have access to this page');
            return redirect('/login');
        }
        $loggedInUser = Admin::join("users", "admins.user_id", "=", "users.id")
                        ->where("admins.user_id", $user->id)
                        ->select("admins.*", "users.id as user_id", "users.status as user_status")->first();
        return view('admin/new_picture')->with([ "loggedInUser"=>$loggedInUser]);
    } 

    public function editPicture($program_id, $category_id, $id){
        $user = Auth::user();
        if(!$user || $user->type != 1){
            Session::flash('error', 'Sorry! You do not have access to this page');
            return redirect('/login');
        }
        $loggedInUser = Admin::join("users", "admins.user_id", "=", "users.id")
                        ->where("admins.user_id", $user->id)
                        ->select("admins.*", "users.id as user_id", "users.status as user_status")->first();
        $picture = Picture::where("id", $id)->first();
        return view('admin/edit_picture')->with(["picture"=>$picture, "loggedInUser"=>$loggedInUser]);
    } 

    public function books(){
        $user = Auth::user();
        if(!$user || $user->type != 1){
            Session::flash('error', 'Sorry! You do not have access to this page');
            return redirect('/login');
        }
        $loggedInUser = Admin::join("users", "admins.user_id", "=", "users.id")
                        ->where("admins.user_id", $user->id)
                        ->select("admins.*", "users.id as user_id", "users.status as user_status")->first();
        $books = Book::where("status", 1)->get();
        return view('admin/books')->with(["books"=>$books, "loggedInUser"=>$loggedInUser]);
    } 

    public function newBook(){
        $user = Auth::user();
        if(!$user || $user->type != 1){
            Session::flash('error', 'Sorry! You do not have access to this page');
            return redirect('/login');
        }
        $loggedInUser = Admin::join("users", "admins.user_id", "=", "users.id")
                        ->where("admins.user_id", $user->id)
                        ->select("admins.*", "users.id as user_id", "users.status as user_status")->first();
        return view('admin/new_book')->with([ "loggedInUser"=>$loggedInUser]);
    } 

    public function editBook($book_id){
        $user = Auth::user();
        if(!$user || $user->type != 1){
            Session::flash('error', 'Sorry! You do not have access to this page');
            return redirect('/login');
        }
        $loggedInUser = Admin::join("users", "admins.user_id", "=", "users.id")
                        ->where("admins.user_id", $user->id)
                        ->select("admins.*", "users.id as user_id", "users.status as user_status")->first();
        $book = Book::where("id", $book_id)->first();
        return view('admin/edit_book')->with(["book"=>$book, "loggedInUser"=>$loggedInUser]);
    } 
    
    public function profile(){
        $user = Auth::user();
        if(!$user || $user->type != 1){
            Session::flash('error', 'Sorry! You do not have access to this page');
            return redirect('/login');
        }
        $loggedInUser = Admin::join("users", "admins.user_id", "=", "users.id")
                        ->where("admins.user_id", $user->id)
                        ->select("admins.*", "users.id as user_id", "users.status as user_status")->first();

        return view('admin/profile')->with(["loggedInUser"=>$loggedInUser]);
    } 

    public function newAdmin(){
        $user = Auth::user();
        if(!$user || $user->type != 1){
            Session::flash('error', 'Sorry! You do not have access to this page');
            return redirect('/login');
        }
        $loggedInUser = Admin::join("users", "admins.user_id", "=", "users.id")
                        ->where("admins.user_id", $user->id)
                        ->select("admins.*", "users.id as user_id", "users.status as user_status")->first();
        return view('admin/new_admin')->with(["loggedInUser"=>$loggedInUser]);
    }
    
    
    
    public function editAdmin($id){
        $user = Auth::user();
        if(!$user || $user->type != 1){
            Session::flash('error', 'Sorry! You do not have access to this page');
            return redirect('/login');
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

    public function deactivateCourse($id){
    
        $course = Course::where("id", $id)->first();

        $course->status = 2;

        $course->save();

        Session::flash('success', 'Thank you, course has been deactivated successfully');
        return back();
    }  
    public function activateCourse($id){
    
        $course = Course::where("id", $id)->first();

        $course->status = 1;

        $course->save();

        Session::flash('success', 'Thank you, course has been activated successfully');
        return back();
    }  
    public function deactivatePicture($id){
    
        $picture = Picture::where("id", $id)->first();

        $picture->status = 2;

        $picture->save();

        Session::flash('success', 'Thank you, picture has been deactivated successfully');
        return back();
    }  
    public function activatePicture($id){
    
        $picture = Picture::where("id", $id)->first();

        $picture->status = 1;

        $picture->save();

        Session::flash('success', 'Thank you, picture has been activated successfully');
        return back();
    }  
    public function deactivateBook($id){
    
        $book = Book::where("id", $id)->first();
    
        $book->status = 2;
    
        $book->save();
    
        Session::flash('success', 'Thank you, book has been deactivated successfully');
        return back();
    }  
    public function activateBook($id){
    
        $book = Book::where("id", $id)->first();
    
        $book->status = 1;
    
        $book->save();
    
        Session::flash('success', 'Thank you, book has been activated successfully');
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

    public function saveCourse(Request $request){
        $check = User::where("email", $request->input("email"))->first();
        if($check != null){
            Session::flash('error', 'Sorry! Email already exist');
            return back();
        }  
        $course = new Course;
        $course->name = $request->input("name");
        $course->price = $request->input("price");
        //$course->program_id = $request->input("program_id");
        $course->category_id = $request->input("category_id");
        $course->status = 1;
        if($course->save()){
           if($course->save()){
                //$this->adminMail($request->input("email"), $request->input("name"), $password);
                Session::flash('success', 'Thank you, course has been created successfully');
                return redirect('/admin/courses/'.$request->input("program_id").'/'.$request->input("category_id"));
            }else{
                Session::flash('error', 'Sorry! An error occured while trying to create course');
                return back();
            }    
        }else{
            Session::flash('error', 'Sorry! An error occured while trying to create account');
                return back();
        }    
    }  

    public function updateCourse(Request $request){
        
        $course = Course::where("id", $request->input("course_id"))->first();
        $course->name = $request->input("name");
        $course->price = $request->input("price");
        //$course->program_id = $request->input("program_id");
        //$course->category_id = $request->input("category_id");
        $course->status = 1;
        if($course->save()){
           if($course->save()){
                //$this->adminMail($request->input("email"), $request->input("name"), $password);
                Session::flash('success', 'Thank you, course has been updated successfully');
                return redirect('/admin/courses/'.$request->input("program_id").'/'.$request->input("category_id"));
            }else{
                Session::flash('error', 'Sorry! An error occured while trying to create course');
                return back();
            }    
        }else{
            Session::flash('error', 'Sorry! An error occured while trying to create account');
                return back();
        }    
    }  
    public function savePicture(Request $request){
        $check = User::where("email", $request->input("email"))->first();
        if($check != null){
            Session::flash('error', 'Sorry! Email already exist');
            return back();
        }  
        $picture = new Picture;
        $picture->name = $request->input("name");
        if($request->hasFile('picture')){
            $image = $request->file('picture');
            $imageName  = time() . '.' . $image->getClientOriginalExtension();
            $path = storage_path()."/app/public/";
            $image->move($path, $imageName);
            $picture->image = $imageName;
            // list($width, $height) = getimagesize($path.$imageName);
            // $product->width = $width;
            // $product->height = $height;
        }
        $picture->status = 1;
        if($picture->save()){
            //$this->adminMail($request->input("email"), $request->input("name"), $password);
            Session::flash('success', 'Thank you, picture has been created successfully');
            return redirect('/admin/pictures');
        }else{
            Session::flash('error', 'Sorry! An error occured while trying to create picture');
            return back();
        } 
    }  
    public function saveBook(Request $request){
        $check = User::where("email", $request->input("email"))->first();
        if($check != null){
            Session::flash('error', 'Sorry! Email already exist');
            return back();
        }  
        $book = new Book;
        $book->name = $request->input("name");
        $book->author = $request->input("author");
        $book->price = $request->input("price");
        if($request->hasFile('book')){
            $image = $request->file('book');
            $imageName  = time() . '.' . $image->getClientOriginalExtension();
            $path = storage_path()."/app/public/";
            $image->move($path, $imageName);
            $book->book = $imageName;
            // list($width, $height) = getimagesize($path.$imageName);
            // $product->width = $width;
            // $product->height = $height;
        }
        if($request->hasFile('image')){
            $image = $request->file('image');
            $imageName  = time() . '.' . $image->getClientOriginalExtension();
            $path = storage_path()."/app/public/";
            $image->move($path, $imageName);
            $book->image = $imageName;
            // list($width, $height) = getimagesize($path.$imageName);
            // $product->width = $width;
            // $product->height = $height;
        }
        $book->status = 1;
        if($book->save()){
            //$this->adminMail($request->input("email"), $request->input("name"), $password);
            Session::flash('success', 'Thank you, book has been created successfully');
            return redirect('/admin/books');
        }else{
            Session::flash('error', 'Sorry! An error occured while trying to create book');
            return back();
        } 
    }  
    public function updateBook(Request $request){
        $check = User::where("email", $request->input("email"))->first();
        if($check != null){
            Session::flash('error', 'Sorry! Email already exist');
            return back();
        }  
        $book = Book::where("id", $request->input('book_id'))->first();
        $book->name = $request->input("name");
        $book->price = $request->input("price");
        
        if($book->save()){
            //$this->adminMail($request->input("email"), $request->input("name"), $password);
            Session::flash('success', 'Thank you, book has been updated successfully');
            return redirect('/admin/books');
        }else{
            Session::flash('error', 'Sorry! An error occured while trying to update book');
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
            $user->save();
            return response()->json(['success' => true, 'message' => "Profile updated succeessfully"], 200);
        }else{
            return response()->json(['error' => true, 'message' => "An error occured while trying to update profile."], 200);
        }    
    }  

    public function updateCategory(Request $request){
    
        $category = Category::where("id", $request->input("category_id"))->first();
        $category->name = $request->input("name");
        $category->method_of_delivery = $request->input("method_of_delivery");
        $category->duration = $request->input("duration");
        $category->days_of_lecture = $request->input("days_of_lecture");
        $category->sessions = $request->input("sessions");
        $category->registration_fee = $request->input("registration_fee");
        $category->registration_details = $request->input("registration_details");
        
        if($category->save()){
            Session::flash('success', 'Class updated successfully');
                return back();
        }else{
            Session::flash('error', 'Sorry! An error occured.');
                return back();
        }    
    }  

    public function updateProfile(Request $request){
    
        $user = Auth::user();
        if(!$user || $user->type != 1){
            Session::flash('error', 'Sorry! You do not have access to this page');
            return redirect('/login');
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
