<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetailsLibTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('details_lib', function (Blueprint $table) {
            $table->increments('d_id')->comment('ID детали');
            $table->string('d_abbr')->unique()->comment('Наименование детали');
            $table->string('d_notice')->nullable()->comment('Примечание к детали');
            $table->integer('d_who_create')->unsigned()->comment('UID создавшего');
            $table->integer('d_who_lastedit')->unsigned()->nullable()->comment('UID редактировавшего');
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
        Schema::dropIfExists('details_lib');
    }
}
