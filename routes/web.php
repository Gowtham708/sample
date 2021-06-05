<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ValidationController;
use App\Mail\getPassword;
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

Route::get('/register','App\Http\Controllers\ValidationController@formValidation')->name('form');
Route::post('/post-register', 'App\Http\Controllers\ValidationController@validateForm')->name('valid');
Route::get('/login', 'App\Http\Controllers\ValidationController@loginpage')->name('login');
Route::post('post-login', 'App\Http\Controllers\ValidationController@loginform')->name('auth');
Route::get('/home', 'App\Http\Controllers\ValidationController@homepage')->name('home');
Route::get('/logout','App\Http\Controllers\ValidationController@logout')->name('logout');
Route::get('/forgot','App\Http\Controllers\ValidationController@forgot')->name('forgot');
Route::get('/sent','App\Http\Controllers\ValidationController@sentemail')->name('sent');
Route::post('/forgotpassword','App\Http\Controllers\ValidationController@forgotpassword')->name('forgotpassword');
Route::get('/setpassword/{email}','App\Http\Controllers\ValidationController@setpassword')->name('setpassword');    
Route::post('/new-password','App\Http\Controllers\ValidationController@newPassword')->name('newpassword');



