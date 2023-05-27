<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
/*-----------------------------------------------
    Backend route are here
|-----------------------------------------------*/
Route::group(['prefix' => 'admin'], function(){
    /*----------------------------------------------
        Dashboard and Profile route are here
    |-----------------------------------------------*/
    Route::get('/', 'App\Http\Controllers\Backend\DashboardController@index')->name('admin.dashboard');
    /*----------------------------------------------
    Admin, Role and User route are here
    |-----------------------------------------------*/
    Route::resource('roles', 'App\Http\Controllers\Backend\RolesController', ['names'=>'admin.roles']);
    Route::resource('admins', 'App\Http\Controllers\Backend\AdminController', ['names'=>'admin.admins']);
    Route::resource('users', 'App\Http\Controllers\Backend\UserController', ['names'=>'admin.users']);
    /*----------------------------------------------
        Customer route are here
    |-----------------------------------------------*/
    Route::resource('customer', 'App\Http\Controllers\Backend\CustomerController', ['names'=>'admin.customer']);
    /*----------------------------------------------
        Products route are here
    |-----------------------------------------------*/
    Route::resource('products', 'App\Http\Controllers\Backend\ProductsController', ['names'=>'admin.product']);
    Route::get('/product/stocks', 'App\Http\Controllers\Backend\ProductsController@stocks')->name('admin.product.stock');
    Route::get('show-product/{id}','App\Http\Controllers\Backend\ProductsController@showProduct');
    Route::get('get-price/{id}','App\Http\Controllers\Backend\ProductsController@getPrice');
    /*----------------------------------------------
        Supplier route are here
    |-----------------------------------------------*/
    Route::resource('supplier', 'App\Http\Controllers\Backend\SupplierController', ['names'=>'admin.supplier']);
    Route::resource('supplier-invoice', 'App\Http\Controllers\Backend\SupplierInvoiceController', ['names'=>'admin.supplier.invoice']);
    Route::get('show-supplier','App\Http\Controllers\Backend\SupplierInvoiceController@shoSupplier');

    /*----------------------------------------------
        Login and Logout route are here
    |-----------------------------------------------*/
    Route::get('/login', 'App\Http\Controllers\Backend\Auth\LoginController@showLoginForm')->name('admin.login');
    Route::post('/login/submit', 'App\Http\Controllers\Backend\Auth\LoginController@login')->name('admin.login.submit');
    //Logout Route are here
    Route::post('/logout/submit', 'App\Http\Controllers\Backend\Auth\LoginController@logout')->name('admin.logout.submit');

});

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
