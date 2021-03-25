<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Cache;

class ApiMyGuard
{
    const IDLE_TIME = 2400; // время бездействия user (если оно превышает токен будет сбрасываться)
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $token = $request->header('Authorization');

        //проверяем есть в Кэше переменная с таким токеном если нету отправляем ошибку
        if (Cache::has($token)) {
            $user = Cache::get($token);

            //если пользователь зашел под тем же ip то пропускаем его дальше если нет то отправляем ошибку
            if ($user['u_lastlogin_ip'] === $request->ip()) {
                Cache::forget($token);
                Cache::put($token, $user, self::IDLE_TIME);
                return $next($request);
            }
            return response()->json(['massege' => 'You came from another IP'], 400);
        } else {
            return response()->json(['massege' => 'Old Token'], 502);
        }
    }
}
