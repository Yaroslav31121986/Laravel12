<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePositionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('positions', function (Blueprint $table) {
            $table->increments('upos_id')->comment('ID должности');
            $table->string('upos_name')->comment('Название должности');
            $table->string('upos_comment')->nullable()->comment('Примечание');
            $table->integer('upos_who_create')->unsigned()->nullable()->comment('UID создавшего пользователя');
            $table->integer('upos_who_lastedit')->unsigned()->nullable()->comment('UID редактировавшего пользователя');
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
        Schema::dropIfExists('positions');
    }
}
