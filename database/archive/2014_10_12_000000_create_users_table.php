<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id')->comment('ID пользователя');
            $table->string('u_name')->comment('Имя пользователя');
            $table->string('u_surname')->nullable()->comment('Фамилия пользователя');
            $table->string('u_second_name')->nullable()->comment('Отчество пользователя');
            $table->string('u_login')->unique()->comment('Логин для входа');
            $table->string('password')->comment('Пароль для входа');
            $table->string('u_notice')->nullable()->comment('Примечание');
            $table->boolean('u_bot')->default('0')->comment('Доступ к боту Telegram');
            $table->integer('u_group')->unsigned()->comment('ID группы пользователей');
            $table->boolean('u_active')->default('1')->comment('Блокировка/активация пользователя');
            $table->string('u_email')->unique()->nullable()->comment('Email пользователя');
            $table->enum('u_lang', ['en', 'ru', 'ua'])->comment('Язык интерфейса для пользователя');
            $table->integer('u_position')->nullable()->unsigned()->comment('ID должности пользователя');
            $table->integer('u_department')->nullable()->unsigned()->comment('ID отдела');
            $table->string('u_phone')->nullable()->comment('Телефон пользователя');
            $table->integer('u_who_create')->unsigned()->nullable()->comment('UID создавшего пользователя');
            $table->integer('u_who_lastedit')->unsigned()->nullable()->comment('UID редактировавшего пользователя');
            $table->string('u_lastlogin_ip', 15)->nullable()->comment('IP последнего входа в систему');
            $table->integer('u_lastlogin_timestamp')->unsigned()->nullable()->comment('Время последнего входа в систему');
            $table->string('u_timezone')->default('Europe/Kiev')->comment('Временная зона пользователя');
            $table->boolean('u_ip_restrict')->default('0')->comment('Ограничение доступа к системе по IP');
            $table->string('u_ip_list')->nullable()->comment('Список IP для доступа к системе');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
