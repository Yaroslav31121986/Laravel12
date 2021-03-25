<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoutesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('routes', function (Blueprint $table) {
            $table->id('r_id')->comment('ID записи');
            $table->string('r_path')->unique()->comment('Путь');
            $table->string('r_name')->nullable()->comment('Наименование');
            $table->string('r_notice')->nullable()->comment('Примечание');
            $table->integer('r_create_uid')->unsigned()->comment('UID создавшего пользователя');
            $table->integer('r_update_uid')->unsigned()->nullable()->comment('UID обновившего');
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
        Schema::dropIfExists('routes');
    }
}
