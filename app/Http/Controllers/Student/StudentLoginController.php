<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Auth\LoginController;


class StudentLoginController extends LoginController
{
    /**
     * Show the application's login form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showLoginForm()
    {
        return view('student.auth.login');
    }

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/student';
}
