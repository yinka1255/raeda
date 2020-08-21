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

Route::get('/', 'CustomersController@index');
Route::get('/adr0267', 'CustomersController@indexa');
Route::get('/about', 'CustomersController@about');
Route::get('/services', 'CustomersController@services');
Route::get('/terms', 'CustomersController@terms');
Route::get('/faq', 'CustomersController@faq');
Route::get('/contact', 'CustomersController@contact');


Route::post('/authenticate', 'LoginsController@authenticate');

Route::post('/forgot_password_post', 'UsersController@forgotPasswordPost');

Route::post('/register_post', 'UsersController@customerRegister');
Route::post('/register_sell_post', 'UsersController@customerRegisterSell');
Route::post('/customers/sell_post', 'CustomersController@sellPost');

Route::get('/customers/profile', 'CustomersController@profile');
Route::post('/customers/update_profile', 'CustomersController@updateProfile');
Route::post('/customers/update_password', 'CustomersController@updatePassword');


Route::post('/post_contact', 'UsersController@postContact');


Route::get('/admin', 'AdminsController@index');
Route::get('/admin/index', 'AdminsController@index');
Route::get('/admin/admins', 'AdminsController@admins');
Route::get('/admin/new_admin', 'AdminsController@newAdmin');
Route::get('/admin/edit_admin/{id}', 'AdminsController@editAdmin');
Route::post('/admin/save_admin', 'AdminsController@saveAdmin');
Route::post('/admin/update_admin', 'AdminsController@updateAdmin');
Route::get('/admin/deactivate_admin/{id}', 'AdminsController@deactivateAdmin');
Route::get('/admin/activate_admin/{id}', 'AdminsController@activateAdmin');
Route::get('/admin/profile', 'AdminsController@profile');
Route::get('/admin/customers', 'AdminsController@customers');
Route::get('/admin/customer/{customer_id}', 'AdminsController@customer');
Route::get('/admin/transactions', 'AdminsController@transactions');
Route::get('/admin/bonuses', 'AdminsController@bonuses');
Route::post('/admin/add_bonus', 'AdminsController@addBonus');
Route::post('/admin/update_bonus_setting', 'AdminsController@updateBonusSetting');

Route::post('/admin/update_profile', 'AdminsController@updateProfile');
Route::post('/admin/update_password', 'AdminsController@updatePassword');
