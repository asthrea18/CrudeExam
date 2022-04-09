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

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::group(['middleware' => ['auth']], function() {
    /**
    * Logout Route
    */
    Route::get('/logout', 'LogoutController@perform')->name('logout.perform');
    Route::get('/profile', 'HomeController@viewProfile');
    Route::get('/accounts', 'HomeController@viewAccounts');
    Route::get('/fetchdata','HomeController@fetchdata');
    Route::post('/newAccount','AccountController@AddNewAccount');
 });


