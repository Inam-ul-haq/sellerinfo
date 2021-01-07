<?php

use Illuminate\Support\Facades\Route;

use App\Models\Order;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\InStockController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\ChangePasswordController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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
    return redirect()->route('orders.index');
});

Route::get('/user-read-notification', function () {
    Auth::user()->unreadNotifications->markAsRead();
    return 1;
});

Auth::routes();
Route::group(['middleware' => ['auth']], function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
 //Dashboard Routea
    Route::get('/dashboard', 'App\Http\Controllers\DashboardController@index')->name('dashboard');
    Route::get('/monthly_dashboard_table', 'App\Http\Controllers\DashboardController@MonthlyTableDashboard');
    Route::get('/yearly_dashboard_table', 'App\Http\Controllers\DashboardController@YearlyTableDashboard');
    
    //Orders Routea
    Route::resource('orders', 'App\Http\Controllers\OrdersController')->except('destroy', 'update');


    Route::post('/orders/update/{id}', 'App\Http\Controllers\OrdersController@update')->name('orders.update');
    Route::get('/orders/destroy/{id}', 'App\Http\Controllers\OrdersController@destroy')->name('orders.destroy');
    Route::get('/order_table', 'App\Http\Controllers\OrdersController@tableOrder');
    //Instocks Routea
    Route::get('/instock_table', 'App\Http\Controllers\InStockController@tableInStock');
    Route::resource('instock', 'App\Http\Controllers\InStockController')->except('update', 'destroy');
    Route::post('/instock/update/{id}', 'App\Http\Controllers\InStockController@update')->name('instock.update');
    Route::get('/instock/destroy/{id}', 'App\Http\Controllers\InStockController@destroy')->name('instock.destroy');
    //Change Password Routea
    Route::get('/changepassword', [App\Http\Controllers\Auth\ChangePasswordController::class, 'ShowChangePasswordForm']);
    Route::post('/changepassword', [App\Http\Controllers\Auth\ChangePasswordController::class, 'ChangePassword'])->name('changepassword');
    //Admin Routes
    Route::get('/admin','App\Http\Controllers\AdminController@index')->name('admin.index');
    Route::get('/admin/create','App\Http\Controllers\AdminController@create')->name('admin.create');
    Route::post('/admin/store','App\Http\Controllers\AdminController@store')->name('admin.store');
    Route::get('/admin_table', 'App\Http\Controllers\AdminController@tableAdmin');
    Route::get('/admin/{id}/edit','App\Http\Controllers\AdminController@edit')->name('admin.edit');
    Route::post('/admin/update/{id}', 'App\Http\Controllers\AdminController@update')->name('admin.update');
    ROute::get('/admin/destroy/{id}', 'App\Http\Controllers\AdminController@destroy')->name('admin.destroy');




    // Route::get('/orders', [App\Http\Controllers\OrdersController::class, 'index'])->name('orders');
    // Route::get('table_dashboard_quantity_monthly', 'App\Http\Controllers\DashboardController@MonthlyDashboardQuantity')->name('table_quantity');
    // Route::get('table_dashboard_quantity_yearly', 'App\Http\Controllers\DashboardController@YearlyDashboardQuantity')->name('table_quantity');
    // Route::get('table_dashboard_price_monthly', 'App\Http\Controllers\DashboardController@MonthlyDashboardPrice')->name('table_price');
    // Route::get('table_dashboard_price_yearly', 'App\Http\Controllers\DashboardController@YearlyDashboardPrice')->name('table_price');
});
    
     Route::get('/ordersend', 'App\Http\Controllers\OrdersController@ordersend')->name('orders.send');

    