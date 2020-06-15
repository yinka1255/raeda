<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/admin/login', function () {
    return view('admin/login');
});
Route::get('/forgot_password', function () {
    return view('forgot_password');
});
Route::get('/admin/forgot_password', function () {
    return view('admin/forgot_password');
});
Route::get('storage/{filename}', function ($filename)
{
    $path = storage_path('app/public/' . $filename);

    if (!File::exists($path)) {
        abort(404);
    }

    $file = File::get($path);
    $type = File::mimeType($path);

    $response = Response::make($file, 200);
    $response->header("Content-Type", $type);

    return $response;
});

Route::get('/logout', 'LoginsController@logout');
Route::get('/members/logout', 'LoginsController@membersLogout');
Route::get('/admin/logout', 'LoginsController@adminLogout');

Route::get('/', 'UsersController@index');
Route::get('/login', 'UsersController@login');
Route::get('/about', 'UsersController@about');
Route::get('/terms', 'UsersController@terms');
Route::get('/contact', 'UsersController@contact');
Route::get('/gallery', 'UsersController@gallery');
Route::get('/register/{category_id}', 'UsersController@register');

Route::get('/orders', 'UsersController@orders');


Route::post('/authenticate', 'LoginsController@authenticate');

Route::post('/forgot_password_post', 'UsersController@forgotPasswordPost');
Route::post('/member/forgot_password_post', 'UsersController@memberForgotPasswordPost');

Route::post('/register', 'UsersController@studentRegister');
Route::post('/normal_register', 'UsersController@studentNormalRegister');
Route::post('/buy_book', 'UsersController@buyBook');

Route::get('/students/profile', 'UsersController@profile');
Route::post('/students/update_profile', 'UsersController@updateProfile');
Route::post('/students/update_password', 'UsersController@updatePassword');

Route::get('/test', 'CustomersController@test');
Route::get('/test/sms/{phone}', 'UsersController@sendSms');

Route::post('/post_contact', 'UsersController@postContact');


Route::get('/admin', 'AdminsController@index');
Route::get('/admin/index', 'AdminsController@index');
Route::get('/admin/admins', 'AdminsController@admins');
Route::get('/admin/new_admin', 'AdminsController@newAdmin');
Route::get('/admin/edit_admin/{id}', 'AdminsController@editAdmin');
Route::post('/admin/save_admin', 'AdminsController@saveAdmin');
Route::get('/admin/deactivate_admin/{id}', 'AdminsController@deactivateAdmin');
Route::get('/admin/activate_admin/{id}', 'AdminsController@activateAdmin');
Route::get('/admin/profile', 'AdminsController@profile');
Route::get('/admin/students', 'AdminsController@students');
Route::get('/admin/student/{student_id}', 'AdminsController@student');

Route::get('/admin/programs', 'AdminsController@programs');
Route::get('/admin/program/{program_id}', 'AdminsController@program');
Route::get('/admin/courses/{program_id}/{category_id}', 'AdminsController@courses');

Route::get('/admin/deactivate_course/{id}', 'AdminsController@deactivateCourse');
Route::get('/admin/activate_course/{id}', 'AdminsController@activateCourse');

Route::get('/admin/new_course/{program_id}/{category_id}', 'AdminsController@newCourse');
Route::post('/admin/save_course', 'AdminsController@saveCourse');

Route::get('/admin/edit_course/{program_id}/{category_id}/{id}', 'AdminsController@editCourse');
Route::post('/admin/update_course', 'AdminsController@updateCourse');


Route::get('/admin/edit_category/{program_id}/{category_id}/', 'AdminsController@editCategory');
Route::post('/admin/update_category', 'AdminsController@updateCategory');



Route::get('/admin/new_picture', 'AdminsController@newPicture');
Route::post('/admin/save_picture', 'AdminsController@savepicture');

Route::get('/admin/edit_picture/{id}', 'AdminsController@editPicture');
Route::post('/admin/update_picture', 'AdminsController@updatePicture');

Route::get('/admin/pictures', 'AdminsController@pictures');
Route::get('/admin/picture/{picture_id}', 'AdminsController@picture');
Route::get('/admin/deactivate_picture/{id}', 'AdminsController@deactivatePicture');
Route::get('/admin/activate_picture/{id}', 'AdminsController@activatePicture');


Route::get('/admin/new_book', 'AdminsController@newBook');
Route::post('/admin/save_book', 'AdminsController@savebook');

Route::get('/admin/edit_book/{id}', 'AdminsController@editBook');
Route::post('/admin/update_book', 'AdminsController@updateBook');

Route::get('/admin/books', 'AdminsController@books');
Route::get('/admin/book/{book_id}', 'AdminsController@book');
Route::get('/admin/deactivate_book/{id}', 'AdminsController@deactivateBook');
Route::get('/admin/activate_book/{id}', 'AdminsController@activateBook');



Route::get('/admin/plans', 'AdminsController@plans');


Route::post('/admin/update_profile', 'AdminsController@updateProfile');
Route::post('/admin/update_password', 'AdminsController@updatePassword');
