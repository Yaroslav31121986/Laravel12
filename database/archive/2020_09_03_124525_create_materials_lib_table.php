<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMaterialsLibTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('materials_lib', function (Blueprint $table) {
            $table->increments('m_id');
            $table->string('m_name')->unique()->comment('Название материала');
            $table->string('m_units')->comment('Единицы измерения');
            $table->string('m_units_type')->comment('Тип измерения');
            $table->decimal('m_price', 10, 2)->comment('Цена');
            $table->integer('m_critical_limit')->nullable()->unsigned()->comment('Критический предел');
            $table->integer('m_minimal_limit')->nullable()->unsigned()->comment('Минимальный предел');
            $table->string('m_notice')->nullable()->comment('Примечание');
            $table->integer('m_who_create')->unsigned()->comment('UID создавшего');
            $table->integer('m_who_lastedit')->unsigned()->nullable()->comment('UID редактировавшего');
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
        Schema::dropIfExists('materials_lib');
    }
}
