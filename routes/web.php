<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
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
Route::get('/',[StudentController::class,'index']);
Route::view('index','index');
Route::get('/students',[StudentController::class,'index']);
Route::get('/createUser',[StudentController::class,'create'])->name('student.create');
Route::post('/storeUser',[StudentController::class,'store'])->name('student.store');
Route::get('/editUser/{student}',[StudentController::class,'edit'])->name('student.edit');
Route::post('/updateUser/{student}',[StudentController::class,'update'])->name('student.update');
Route::delete('/deleteUser/{student}',[StudentController::class,'destroy'])->name('student.destroy');


Route::post('/',[StudentController::class,'index'])->name('student.index');