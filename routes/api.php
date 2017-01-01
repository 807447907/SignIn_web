<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::any('/teacher/login', 'Teacher\TeacherLoginController@apiLogin');//user_id password

Route::group(['middleware' => 'teacherToken'], function () {//user_id token

    Route::any('/teacher/course/create', 'Teacher\CourseController@create');//name description=null
    Route::any('/teacher/course', 'Teacher\CourseController@show');
    Route::any('/teacher/course/{course_id}', 'Teacher\CourseController@show');
    Route::any('/teacher/course/{course_id}/delete', 'Teacher\CourseController@delete');


    Route::any('/teacher/course/{course_id}/sign_in/create', 'Teacher\SignInController@create');//name description=null
    Route::any('/teacher/course/{course_id}/sign_in', 'Teacher\SignInController@show');
    Route::any('/teacher/course/{course_id}/sign_in/{sign_in_id}', 'Teacher\SignInController@show');
    Route::any('/teacher/course/{course_id}/sign_in/{sign_in_id}/delete', 'Teacher\SignInController@delete');

    Route::any('/teacher/course/{course_id}/sign_in/{sign_in_id}/start', 'Teacher\SignInController@start');//address AA:BB:CC:00:01:02
    Route::any('/teacher/course/{course_id}/sign_in/{sign_in_id}/stop', 'Teacher\SignInController@stop');
});


Route::any('/student/login', 'Student\StudentLoginController@apiLogin');//user_id password

Route::group(['middleware' => 'studentToken'], function () {//user_id token
    Route::any('/student/search', 'Student\DoSignInController@search');//address_list jsonArray(address1,address2,address3)
    Route::any('/student/sign_in/{sign_in_id}', 'Student\DoSignInController@doSignIn');
    Route::any('/student/history', 'Student\DoSignInController@history');
});


