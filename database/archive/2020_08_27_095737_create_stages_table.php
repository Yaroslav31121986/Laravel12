<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stages', function (Blueprint $table) {
            $table->increments('st_id');
            $table->string('st_abbr')->unique()->comment('Название процесса');
            $table->string('st_options')->nullable()->comment('Опции процесса');
            $table->string('st_notice')->nullable()->comment('Примечание процесса');
            $table->integer('st_create_uid')->unsigned()->nullable()->comment('UID того, кто добавил деталь');
            $table->integer('st_edit_uid')->unsigned()->nullable()->comment('UID того, кто редктировал деталь');
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
        Schema::dropIfExists('stages');
    }
}
