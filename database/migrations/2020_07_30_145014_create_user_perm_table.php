<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserPermTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //каким полям поставить nullable?
        Schema::create('user_perm', function (Blueprint $table) {
            $table->increments('up_id')->comment('ID доступа пользователя');
            $table->string('up_operation')->comment('Название действия/события требующего доступа');
            $table->string('up_access_level')->comment('Уровень доступа');
            $table->integer('route_id')->unsigned()->nullable()->comment('ID роута');
            $table->string('up_description')->comment('Описание доступа');
            $table->string('up_notice')->comment('Примечание');
            $table->integer('u_who_create')->unsigned()->nullable()->comment('UID создавшего права');
            $table->integer('u_who_lastedit')->unsigned()->nullable()->comment('UID редактировавшего права');
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
        Schema::dropIfExists('user_perm');
    }
}
