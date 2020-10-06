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
Route::get('storage/merchants/products/{filename}', function ($filename)
{
    $path = storage_path('app/public/merchants/products/' . $filename);

    if (!File::exists($path)) {
        abort(404);
    }

    $file = File::get($path);
    $type = File::mimeType($path);

    $response = Response::make($file, 200);
    $response->header("Content-Type", $type);

    return $response;
});

Route::get('storage/merchants/categories/{filename}', function ($filename)
{
    $path = storage_path('app/public/merchants/categories/' . $filename);

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
Route::get('/about', 'CustomersController@about');
Route::get('/services', 'CustomersController@services');
Route::get('/terms', 'CustomersController@terms');
Route::get('/faq', 'CustomersController@faq');
Route::get('/contact', 'CustomersController@contact');


Route::post('/authenticate', 'LoginsController@authenticate');

Route::post('/forgot_password_post', 'UsersController@forgotPasswordPost');

Route::post('/register_post', 'UsersController@customerRegister');



Route::get('/customers/login', 'CustomersController@login');
Route::get('/login', [ 'as' => 'login', 'uses' => 'CustomersController@login']);
Route::get('/customers/register', 'CustomersController@register');
Route::get('/register', 'CustomersController@register');

Route::get('/customers/dashboard', 'CustomersController@dashboard')->middleware('auth');
Route::get('/customers/dispatches', 'CustomersController@dispatches')->middleware('auth');
Route::get('/customers/transactions', 'CustomersController@transactions')->middleware('auth');
Route::get('/customers/profile', 'CustomersController@profile')->middleware('auth');
Route::post('/customers/update_profile', 'CustomersController@updateProfile');
Route::post('/customers/update_password', 'CustomersController@updatePassword');
Route::post('/save_customer', 'UsersController@customerRegister');

Route::get('/customers/new_dispatch', 'CustomersController@newDispatch')->middleware('auth');
Route::post('/customers/save_item_to_cart', 'CustomersController@addToCart');
Route::get('/customers/delete_cart_item/{id}', 'CustomersController@deleteCartItem')->middleware('auth');
Route::get('/customers/new_dispatch_address', 'CustomersController@newDispatchAddress')->middleware('auth');
Route::post('/customers/place_dispatch_order1', 'CustomersController@placeDispatchOrder1');
Route::get('/customers/dispatch_details/{id}', 'CustomersController@dispatchDetails')->middleware('auth');
Route::post('/customers/pay_dispatch', 'CustomersController@payDispatch');
Route::post('/customers/pay_dispatch_card', 'CustomersController@payDispatchCard');

Route::post('/mobile/pay_dispatch', 'CustomersController@mobilePayDispatch');
Route::post('/mobile/pay_dispatch_card', 'CustomersController@mobilePayDispatchCard');


Route::post('/post_contact', 'UsersController@postContact');


Route::get('/admin/index', 'AdminsController@index')->middleware('auth');
Route::get('/admin/dispatches', 'AdminsController@dispatches')->middleware('auth');
Route::get('/admin/transactions', 'AdminsController@transactions')->middleware('auth');
Route::get('/admin/profile', 'AdminsController@profile')->middleware('auth');
Route::post('/admin/update_profile', 'AdminsController@updateProfile');
Route::post('/admin/update_password', 'AdminsController@updatePassword');
Route::post('/save_customer', 'UsersController@customerRegister');

Route::get('/admin/new_dispatch', 'AdminsController@newDispatch')->middleware('auth');
Route::post('/admin/save_item_to_cart', 'AdminsController@addToCart');
Route::get('/admin/delete_cart_item/{id}', 'AdminsController@deleteCartItem')->middleware('auth');
Route::get('/admin/new_dispatch_address', 'AdminsController@newDispatchAddress')->middleware('auth');
Route::post('/admin/place_dispatch_order1', 'AdminsController@placeDispatchOrder1');
Route::get('/admin/dispatch_details/{id}', 'AdminsController@dispatchDetails')->middleware('auth');
Route::post('/admin/pay_dispatch', 'AdminsController@payDispatch');
Route::post('/admin/pay_dispatch_card', 'AdminsController@payDispatchCard');

Route::get('/admin/roles', 'AdminsController@roles')->middleware('auth');
Route::get('/admin/new_role', 'AdminsController@newRole')->middleware('auth');
Route::post('/admin/add_role', 'AdminsController@addRole');
Route::get('/admin/edit_role/{role_id}', 'AdminsController@editRole')->middleware('auth');
Route::post('/admin/update_role', 'AdminsController@updateRole');


Route::get('/admin/users', 'AdminsController@users')->middleware('auth');
Route::get('/admin/new_user', 'AdminsController@newUser')->middleware('auth');
Route::post('/admin/add_user', 'AdminsController@addUser');

Route::get('/admin/activate_state/{state_id}', 'AdminsController@activateState')->middleware('auth');
Route::get('/admin/deactivate_state/{state_id}', 'AdminsController@deactivateState')->middleware('auth');

Route::get('/admin/states', 'AdminsController@states')->middleware('auth');
Route::get('/admin/state/{state_id}', 'AdminsController@state')->middleware('auth');

Route::get('/admin/activate_city/{citiy_id}', 'AdminsController@activateCity')->middleware('auth');
Route::get('/admin/deactivate_city/{citiy_id}', 'AdminsController@deactivateCity')->middleware('auth');

Route::post('/admin/update_state_price', 'AdminsController@updateStatePrice');
Route::post('/admin/update_city_price', 'AdminsController@updateCityPrice');

Route::post('/admin/dispatches', 'AdminsController@dispatchesPost')->middleware('auth');
Route::get('/admin/state_dispatches', 'AdminsController@stateDispatches')->middleware('auth');
Route::post('/admin/state_dispatches', 'AdminsController@stateDispatchesPost')->middleware('auth');

Route::get('/admin/my_dispatches', 'AdminsController@myDispatches')->middleware('auth');
Route::post('/admin/my_dispatches', 'AdminsController@myDispatchesPost')->middleware('auth');

Route::get('/admin/customers', 'AdminsController@customers')->middleware('auth');
Route::get('/admin/customer/{customer_id}', 'AdminsController@customer')->middleware('auth');




//mobile routes
Route::post('/mobile/register', 'UsersController@mobileRegister');
Route::post('/mobile/login', 'LoginsController@mobileAuthenticate');


Route::post('/mobile/retailerRegister', 'UsersController@mobileRetailerRegister');
Route::post('/mobile/retailerLogin', 'LoginsController@mobileRetailerAuthenticate');
Route::get('/mobile/get_vehicle_types', 'CustomersController@getVehicleTypesMobile');


Route::post('/mobile/place_dispatch_order', 'CustomersController@mobilePlaceDispatchOrder');
Route::post('/mobile/place_dispatch_order1', 'CustomersController@mobilePlaceDispatchOrder1');

Route::get('/mobile/get_cities', 'CustomersController@getCities');
Route::get('/mobile/get_delivery_fee_with_distance_weight/{distance}/{weight}', 'CustomersController@getDeliveryFeeWithDistanceWeight');
Route::get('/mobile/get_orders/{user_id}', 'CustomersController@getOrders');
Route::get('/mobile/get_order_details/{order_id}', 'CustomersController@getOrderDetails');
Route::get('/mobile/get_dispatch_item_categories', 'CustomersController@getDispatchItemCategoriesMobile');

Route::get('/mobile/get_dispatch_orders/{user_id}', 'CustomersController@getDispatchOrders');
Route::get('/mobile/get_dispatch_order_details/{order_id}', 'CustomersController@getDispatchOrderDetails');

Route::get('/mobile/get_transactions/{user_id}', 'CustomersController@getTransactions');

Route::post('/mobile/update_profile', 'CustomersController@mobileUpdateProfile');
Route::post('/mobile/update_password', 'CustomersController@mobileUpdatePassword');
