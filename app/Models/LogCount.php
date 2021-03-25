<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LogCount extends Model
{
    protected $fillable = ["u_login", "counter", "waiting_time"];
    protected $table = "log_count";
    public $timestamps = false;
    const EXPECTATIONS = 900;//время через которое пользователь сможет повторно авторизоваться

    //Проверяем есть ли такой Логин в БД
    public function LogExist($login)
    {
        return $this->where('u_login', $login)->first();
    }

    //Добавить счетчик
    public function LodAddCounter($login)
    {
        $this->counter = 1;
        $this->u_login = $login;
        $this->save();
    }

    //Увеличить счетчик
    public function LogIncreaseCounter($login)
    {
        $count = $this->where('u_login', $login)->first();
        $count->increment('counter');
        $count->save();
    }

    //Проверяем счетчик больше 2 и есть ли временная метка
    public function LogCheckTime($login)
    {
        $check_time = $this->where('u_login', $login)->first();

        if($check_time->counter > 2 && !$check_time->waiting_time) {
            return true;
        } else {
            return false;
        }
    }

    //Добавить временную метку
    public function LogAddTime($login)
    {
        $add_time = $this->where('u_login', $login)->first();
        $add_time->waiting_time = time();
        $add_time->save();
    }

    //Проверяем прошли ли 15 мин. ожидания если да то true если нет то false
    public function LogFinishTime($login)
    {
        $finish_time = $this->where('u_login', $login)->first();

        if($finish_time->waiting_time > 2 &&  (time() - $finish_time->waiting_time) > self::EXPECTATIONS) {
            return true;
        } else {
            return false;
        }
    }

    //Удаляем поле в БД с таким Логом
    public function LogDelete($login)
    {
        $log_delete = $this->where('u_login', $login)->first();
        $log_delete->delete();
    }

    //Проверяем время. Если 15 мин. не прошло то возвращяем true
    public function LogGetTime($login)
    {
        $finish_time = $this->where('u_login', $login)->first();

        if($finish_time->waiting_time > 2 && (time() - $finish_time->waiting_time) < self::EXPECTATIONS) {
            return true;
        } else {
            return false;
        }
    }
}
