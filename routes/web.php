<?php

use App\Http\Controllers\MessageController;
use App\Http\Controllers\reguser;
use App\Http\Controllers\userauth;
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
    return view('login');
 });//default view

 Route::post("user", [userauth::class,'userlogin']);//login module

 Route::get('/login', function () {
     if(session()->has('user')){
         return redirect('index');
     }
     return view('login');
  });//login view

 Route::view("/index", 'index');//index view

 Route::get('/logout', function () {
     if(session()->has('user')){
         session()->pull('user');
     }
     return redirect('login');
  });//logout view

  Route::get('/register', function () {
     if(session()->has('user')){
         return redirect('index');
     }
     return view('register');
  });//register view

  Route::post("reguser", [reguser::class,'registeruser']);//register module

  Route::post("/MessageController/messup", [MessageController::class,'messageup']);

  Route::post("MessageController", [MessageController::class,'messagedisplay']);
