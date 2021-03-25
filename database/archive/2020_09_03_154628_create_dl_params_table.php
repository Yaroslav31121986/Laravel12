<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDlParamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dl_params', function (Blueprint $table) {
            $table->increments('dlpa_id');
            $table->integer('dlpa_detail_id')->unsigned()->comment('ID детали');
            $table->integer('dlpa_param_id')->unsigned()->comment('ID параметра');
            $table->integer('dlpa_value')->nullable()->unsigned()->comment('Минимальное значение');
            $table->string('dlpa_notice')->nullable()->comment('Примечание');
            $table->integer('dlpa_who_create')->unsigned()->comment('UID создавшего');
            $table->integer('dlpa_who_lastedit')->unsigned()->nullable()->comment('UID редактировавшего');
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
        Schema::dropIfExists('dl_params');
    }
}
