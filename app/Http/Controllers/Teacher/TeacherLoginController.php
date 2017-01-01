<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Auth\LoginController;

class TeacherLoginController extends LoginController
{
    /**
     * Show the application's login form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showLoginForm()
    {
        return view('teacher.auth.login');
    }

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/teacher';

}
