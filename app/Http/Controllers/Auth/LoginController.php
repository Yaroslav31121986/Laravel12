<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\LogCount;
use Illuminate\Support\Str;

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
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/api';


    public function username()
    {
        return 'u_login';
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function authenticate($request, $login, $password)
    {
        //если логин и пароль в бд User совпадают, идем дальше иначе redirect
        if (Auth::attempt(['u_login' => $login, 'password' => $password])) {
            $log_delete = new LogCount();
            if ($log_delete->LogExist($login)) {
                $log_delete->LogDelete($login);
            }
            // Аутентификация успешна
            $token = Str::random(60);
            $user = Auth::user();
            $user->setRememberToken($token);
            $user->save();

            return redirect()->intended('/');
        } else {
            return $this->sendFailedLoginResponse($request);
        }
    }

    public function login(Request $request)
    {
        $login = $request->input('u_login');
        $password = $request->input('password');

        //Валидация логина и пароля
        $this->validateLogin($request);

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

    protected function sendFailedLoginResponse(Request $request)
    {
        return redirect()->back()
            ->withInput($request->only($this->username(), 'remember'))
            ->withErrors([
                $this->username() => 'Вы не верно ввели данные ']);
    }
}
