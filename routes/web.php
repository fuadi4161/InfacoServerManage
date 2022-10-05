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
    return view('/welcome');
});

Route::get('/home', 'HomeController@index');
Route::get('/load', 'HomeController@load');
Route::get('/uptime', 'HomeController@uptime');
Route::get('/freeMemory', 'HomeController@free_memory');
Route::get('/totalMemory', 'HomeController@total_memory');

// Hotspot
Route::get('/user', 'UserController@index');
Route::get('/hotspot/user/add', 'UserController@add');
Route::post('/hotspot/user/store', 'UserController@store');
Route::post('/hotspot/user/quick', 'UserController@quick');
Route::get('/hotspot/user/remove/{id}', 'UserController@destroy');
Route::get('/user/arp', 'ArpController@index');
