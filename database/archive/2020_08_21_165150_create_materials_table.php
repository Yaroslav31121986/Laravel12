<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMaterialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('materials', function (Blueprint $table) {
            $table->increments('m_id')->comment('ID материала');
            $table->string('m_name')->comment('Название материала');
            $table->string('m_units')->comment('Единицы измерения');
            $table->string('m_units_type')->comment('Тип измирения материала');
            $table->decimal('m_price', 10, 3)->comment('Цена за единицу (кг/м/шт/м2....)');
            $table->integer('m_critical_limit')->nullable()->unsigned()->comment('Критический предел (по количеству)');
            $table->integer('m_minimal_limit')->nullable()->unsigned()->comment('Минимальный предел (по количеству)');
            $table->integer('m_create_uid')->nullable()->unsigned()->comment('UID того, кто добавил материал');
            $table->integer('m_edit_uid')->nullable()->unsigned()->comment('UID того, кто редктировал материал');
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
        Schema::dropIfExists('materials');
    }
}
