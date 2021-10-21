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

Route::get('/', 'HomeController@index')->name('home');

Route::get('login', 'Auth\LoginController@showLoginForm')->name("login");
Route::post('login', 'Auth\LoginController@login')->name("login");


Route::middleware(['auth'])->group(function () {

    Route::get('/dashboard', 'HomeController@dashboard')->name('dashboard');

    Route::resource('products', 'ProductController');
    Route::resource('couriers', 'CourierController');
    Route::resource('shipments', 'ShipmentController');
    Route::get('logout', 'Auth\LoginController@logout')->name("logout");
});
