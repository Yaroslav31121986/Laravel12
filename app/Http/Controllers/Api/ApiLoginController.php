<?php

namespace App\Http\Controllers\Api;

use App\Models\LogCount;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class ApiLoginController extends Controller
{
    const IDLE_TIME = 2400; // время бездействия user (если оно превышает токен будет сбрасываться)

    public function login(Request $request)
    {
        $login = $request->input('u_login');
        $password = $request->input('password');

        if ($this->validateLogin($request)) {
            return response($this->validateLogin($request));
        }

        $Log_db = new LogCount();

        if ($Log_db->LogExist($login)) {

            //1.Проверяем есть ли ячейка waiting_time и больше ли она
            //EXPECTATIONS то удаляем login из сессии если нет то ничего не делаем

            //2. проверяем есть ли переменная counter и больше ли она 3
            //если да то создаем переменную waiting_time и присваеваем временную метку
            // если нет то counter++

            if ($Log_db->LogFinishTime($login)) {

                $Log_db->LogDelete($login);

            } elseif ($Log_db->LogGetTime($login)) {

                return redirect()->route('message');

            } elseif ($Log_db->LogCheckTime($login)) {

                $Log_db->LogAddTime($login);
                return redirect()->route('message');

            } else {
                $Log_db->LogIncreaseCounter($login);
            }
        } else {
            $Log_db->LodAddCounter($login);
        }

        return $this->authenticate($request, $login, $password);
    }

    public function validateLogin(Request $request)
    {
        //указываем правила валидации
        $validator = Validator::make($request->all(), [
            'u_login' => 'required|string',
            'password' => 'required|string',
        ],
        [
            'u_login.required' => 'Вы не ввели Логин',
            'u_login.string' => 'login должени быть тип данных string',
            'password.required' => 'Вы не ввели password',
            'password.string' => 'password должени быть тип данных string',
        ]
        );

        //если валидацию не прошли отправляем сообщение об ошибки
        if ($validator->fails()) {
            $messages['errors'] = $validator->messages();
            return $messages;
        }
    }

    public function authenticate($request, $login, $password)
    {
        if (Auth::attempt(['u_login' => $login, 'password' => $password])) {
            // Аутентификация успешна

            $log_delete = new LogCount();
            if ($log_delete->LogExist($login)) {
                $log_delete->LogDelete($login);
            }

            $token = Str::random(60);
            $user = Auth::user();

            //меняем в таблице user remember_token
            $user->setRememberToken($token);
            //сохраняем в модели user с какой машины он зашел
            $user->u_lastlogin_ip = $request->ip();
            $user->save();

            $id = Auth::id();
            $user = User::with('position', 'department', 'usersGroups', 'userPerm')->where('id', $id)
                ->get()->toArray();
            //удаляем лишние поля в ответе
            $user = array_except($user[0], ['u_group', 'u_position', 'u_department']);

            //сохраняем нашего user в кэш. Формат: key: $token => value: $user
            if (!Cache::has($token)) {
                Cache::put($token, $user, self::IDLE_TIME);
            } else {
                Cache::forget($token);
                Cache::put($token, $user, self::IDLE_TIME);
            }

            return response()->json(['token' => $token, 'user' => $user,], 200);
        } else {
            return response()->json(['massege' => 'not Autified'], 400);
        }
    }
}
