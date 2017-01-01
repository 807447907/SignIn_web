<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Faker\Provider\Uuid;
use App\Token;


class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
    }

    public function username()
    {
        return 'user_id';
    }

    public function apiLogin(Request $request)
    {
        $validator = Validator::make($request->all(), [
            $this->username() => 'required',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return [
                'errmsg' => $this->errorToString($validator->errors()),
            ];
        }
        if ($this->attemptLogin($request)) {
            $token = Token::firstOrNew($request->only($this->username()));
            $token->token = Uuid::uuid();
            $token->save();
            return [
                'msg' => '成功登录。',
                'name' => Auth::user()->name,
                'token' => $token->token,
            ];
        }
        return [
            'errmsg' => '账号或密码错误',
        ];
    }

    protected function errorToString($errors)
    {
        $str = null;
        foreach ($errors->toArray() as $key => $value) {
            $str .= $key . ': ' . $value[0] . '\n';
        }
        return $str;
    }
}
