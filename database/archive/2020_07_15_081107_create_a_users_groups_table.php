<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAUsersGroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_groups', function (Blueprint $table) {
            $table->increments('ugroups_id')->comment('ID группы');
            $table->string('ugroups_name')->comment('Название группы');
            $table->string('ugroups_description')->nullable()->comment('Описание группы');
            $table->integer('ugroups_who_create')->nullable()->unsigned()->comment('UID создавшего группу');
            $table->integer('ugroups_who_lastedit')->nullable()->unsigned()->comment('UID редактировавшего группу');
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
        Schema::dropIfExists('a_users_groups');
    }
}
