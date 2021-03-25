<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserGroupsPermTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_groups_perm', function (Blueprint $table) {
            $table->increments('ugp_id');
            $table->string('ugp_operation')->nullable()->comment('Название действия/события требующего доступа');
            $table->string('ugp_access_level')->comment('Уровень доступа');
            $table->integer('route_id')->unsigned()->nullable()->comment('ID роута');
            $table->string('ugp_description')->comment('Описание доступа');
            $table->string('ugp_notice')->comment('Примечание');
            $table->integer('ugp_who_create')->unsigned()->nullable()->comment('UID создавшего пользователя');
            $table->integer('ugp_who_lastedit')->unsigned()->nullable()->comment('UID редактировавшего пользователя');
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
        Schema::dropIfExists('user_groups_perm');
    }
}
