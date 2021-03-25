<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDParamsIncTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('d_params_inc', function (Blueprint $table) {
            $table->increments('dpa_id');
            $table->integer('dpa_detail_id')->unsigned()->comment('ID детали');
            $table->string('dpa_abbr')->comment('Имя параметра');
            $table->integer('dpa_min')->unsigned()->nullable()->comment('Минимальное значение');
            $table->integer('dpa_max')->unsigned()->nullable()->comment('Максимальное значение');
            $table->integer('dpa_static')->unsigned()->nullable()->comment('Стандартное значение');
            $table->boolean('dpa_type')->default('1')->comment('Тип поля: обязательное или нет');
            $table->boolean('dpa_editable')->default('1')->comment('Редакутируемое или нет');
            $table->string('dpa_notice')->nullable()->comment('Примечание');
            $table->integer('dpa_who_create')->unsigned()->comment('UID создавшего');
            $table->integer('dpa_who_lastedit')->unsigned()->nullable()->comment('UID редактировавшего');
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
        Schema::dropIfExists('d_params_inc');
    }
}
