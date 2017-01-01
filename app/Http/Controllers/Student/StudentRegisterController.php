<?php

namespace App\Http\Controllers\Student;

use App\User;
use App\Http\Controllers\Auth\RegisterController;


class StudentRegisterController extends RegisterController
{
    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/student';

    /**
     * Show the application registration form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showRegistrationForm()
    {
        return view('student.auth.register');
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'user_id' => $data['user_id'],
            'name' => $data['name'],
            'password' => bcrypt($data['password']),
            'role_id' => 2,
        ]);
    }
}
