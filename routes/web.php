<?php

use Illuminate\Routing\Route as RoutingRoute;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Student;
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

//login system routes
Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::GET('admin/home','AdminController@index');

Route::GET('admin/editor','EditorController@index');
Route::GET('admin/test','EditorController@test');

Route::GET('admin/login','Admin\LoginController@showLoginForm')->name('admin.login');
Route::POST('admin/login','Admin\LoginController@login');
Route::POST('admin-password/email','Admin\ForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
Route::GET('admin-password/reset','Admin\ForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
Route::POST('admin-password/reset','Admin\ResetPasswordController@reset');
Route::GET('admin-password/reset/{token}','Admin\ResetPasswordController@showResetForm')->name('admin.password.reset');
Route::GET('admin/register','Admin\RegisterController@showRegistrationForm')->name('admin.register');
Route::POST('admin/register','Admin\RegisterController@register');

//qrcode
Route::GET('admin/student/addqrcode','QrcodeController@index');

//student
Route::POST('admin/student/store','StudentController@store');
Route::GET('admin/student/create','StudentController@create');
Route::GET('admin/student/index','StudentController@index');
Route::GET('admin/student/edit/{id}','StudentController@edit');
Route::GET('admin/student/show/{id}','StudentController@show');
Route::POST('admin/student/update/{id}','StudentController@update');
Route::GET('admin/student/delete/{id}','StudentController@destroy');
Route::GET('admin/student/status/{id}','StudentController@updatestatus');

 
