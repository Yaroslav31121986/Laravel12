<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDlProcessTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dl_process', function (Blueprint $table) {
            $table->increments('dlpr_id');
            $table->integer('dlpr_detail_id')->unsigned()->comment('ID детали');
            $table->integer('dlpr_process_id')->unsigned()->comment('ID процесса');
            $table->integer('dlpr_qty')->unsigned()->comment('Кол-во');
            $table->string('dlpr_options')->nullable()->comment('Опции');
            $table->string('dlpr_notice')->nullable()->comment('Примечание');
            $table->integer('dlpr_who_create')->unsigned()->comment('UID создавшего');
            $table->integer('dlpr_who_lastedit')->unsigned()->nullable()->comment('UID редактировавшего');
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
        Schema::dropIfExists('dl_process');
    }
}
