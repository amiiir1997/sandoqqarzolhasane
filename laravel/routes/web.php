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


Auth::routes();
Route::get('/logout1', '\App\Http\Controllers\Auth\LoginController@logout');

Route::get('/home','HomeController@index');

Route::get('/',function (){
    return redirect('/home');
});

Route::Post('/newuser','HomeController@newuser');
Route::Post('/checkidsearch','HomeController@searchusernum');
Route::Post('/checkusername','HomeController@searchusername');
Route::Get('/adminuser/{id}','HomeController@adminuser');
Route::Get('/loanlist','HomeController@loanlist');
Route::Post('/insertmassage','HomeController@insertmassage');
Route::Post('/readmassages','HomeController@readmassages');
Route::Post('/newterm','HomeController@newterm');
//Route::Post('/initialdata','HomeController@initialdata');
//Route::Get('/initialdata','HomeController@initialdata1');
Route::Post('/newpayment','HomeController@newpayment');
Route::Get('/test','HomeController@test');
Route::Post('/deletepayment','HomeController@deletepayment');
Route::Post('/deleteexpence','HomeController@deleteexpence');
Route::Post('/newloan','HomeController@newloan');
Route::Post('/newexpence','HomeController@newexpence');
Route::Post('/changepassword','HomeController@changepassword');
Route::Post('/dailymassage','HomeController@dailymassage');





