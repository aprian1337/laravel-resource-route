<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
    if(Auth::check()){
        return view('dashboard');
    }else{
        return view('login');
    }
});

Route::get('login', 'AuthController@index')->name('login');
Route::post('login', 'AuthController@proses');
Route::get('dashboard', 'DashboardController@index')->middleware('auth')->name('dashboard');
Route::get('logout', 'AuthController@logout');
Route::POST('/customer/insert', 'CustomerController@insert');
Route::get('customer', 'DashboardController@customer');
