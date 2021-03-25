<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDlMaterialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dl_materials', function (Blueprint $table) {
            $table->increments('dlm_id');
            $table->integer('dlm_detail_id')->unsigned()->comment('ID детали');
            $table->integer('dlm_material_id')->unsigned()->comment('ID материала');
            $table->decimal('dlm_qty', 10, 3)->comment('Кол-во материала');
            $table->string('dlm_calc')->nullable()->comment('Формула расчета');
            $table->integer('dlm_who_create')->unsigned()->comment('UID создавшего');
            $table->integer('dlm_who_lastedit')->unsigned()->nullable()->comment('UID редактировавшего');
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
        Schema::dropIfExists('dl_materials');
    }
}
