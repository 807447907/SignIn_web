<?php

namespace App\Http\Middleware;

use Closure;
use App\Token;

class VerifyTeacherToken
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @param  string|null $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (($token = Token::where($request->only([$this->username(), 'token']))->first()) === null) {
            return response()->json([
                'errmsg' => 'token无效',
            ]);
        }

        if ($token->user->role->role_id > 1) {
            return response()->json([
                'errmsg' => '用户无权限',
            ]);
        }

        return $next($request);
    }

    public function username()
    {
        return 'user_id';
    }
}
