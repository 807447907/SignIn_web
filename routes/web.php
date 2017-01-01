<?php

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

Route::get('/test', 'TestController@test');

Route::get('teacher', 'Teacher\TeacherHomeController@index');
// Authentication Routes...
Route::get('teacher/login', 'Teacher\TeacherLoginController@showLoginForm');
Route::post('teacher/login', 'Teacher\TeacherLoginController@login');
Route::any('teacher/logout', 'Teacher\TeacherLoginController@logout');

// Registration Routes...
Route::get('teacher/register', 'Teacher\TeacherRegisterController@showRegistrationForm');
Route::post('teacher/register', 'Teacher\TeacherRegisterController@register');


Route::get('student', 'Student\StudentHomeController@index');
// Authentication Routes...
Route::get('student/login', 'Student\StudentLoginController@showLoginForm');
Route::post('student/login', 'Student\StudentLoginController@login');
Route::any('student/logout', 'Student\StudentLoginController@logout');

// Registration Routes...
Route::get('student/register', 'Student\StudentRegisterController@showRegistrationForm');
Route::post('student/register', 'Student\StudentRegisterController@register');

//// Authentication Routes...
//$this->get('login', 'Auth\LoginController@showLoginForm')->name('login');
//$this->post('login', 'Auth\LoginController@login');
//$this->post('logout', 'Auth\LoginController@logout')->name('logout');
//
//// Registration Routes...
//$this->get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
//$this->post('register', 'Auth\RegisterController@register');
//
//// Password Reset Routes...
//$this->get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm');
//$this->post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail');
//$this->get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm');
//$this->post('password/reset', 'Auth\ResetPasswordController@reset');
