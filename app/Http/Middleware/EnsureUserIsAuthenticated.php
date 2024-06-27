<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EnsureUserIsAuthenticated
{
    public function handle(Request $request, Closure $next)
    {
        // Проверяем, что пользователь аутентифицирован и имеет действительный токен
        if (Auth::user() && $request->user()->currentAccessToken()) {
            return $next($request);
        }

        // Если нет аутентификации или действительного токена, перенаправляем на страницу входа
        return redirect()->route('login');
    }
}
