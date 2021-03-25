<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDMaterialsIncTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('d_materials_inc', function (Blueprint $table) {
            $table->increments('dm_id');
            $table->integer('dm_detail_id')->unsigned()->comment('ID детали');
            $table->integer('dm_material_id')->unsigned()->comment('ID материала');
            $table->decimal('dm_qty', 10, 3)->comment('Кол-во материала');
            $table->string('dm_calc')->nullable()->comment('Формула расчета');
            $table->integer('dm_who_create')->unsigned()->comment('UID создавшего');
            $table->integer('dm_who_lastedit')->unsigned()->nullable()->comment('UID редактировавшего');
            $table->foreign('dm_detail_id')->references('d_id')->on('details_lib')
                ->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('d_materials_inc');
    }
}
