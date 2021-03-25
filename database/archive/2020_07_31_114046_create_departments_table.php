<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDepartmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('departments', function (Blueprint $table) {
            $table->increments('dep_id')->comment('ID отдела');
            $table->string('dep_name')->comment('Название отдела');
            $table->string('dep_location')->comment('Офис отдела (Киев/Одесса)');
            $table->string('dep_comment')->nullable()->comment('Примечание');
            $table->integer('dep_who_create')->unsigned()->nullable()->comment('UID создавшего пользователя');
            $table->integer('dep_who_lastedit')->unsigned()->nullable()->comment('UID редактировавшего пользователя');
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
        Schema::dropIfExists('departments');
    }
}
