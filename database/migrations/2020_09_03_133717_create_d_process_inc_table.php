<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDProcessIncTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('d_process_inc', function (Blueprint $table) {
            $table->increments('dpr_id');
            $table->integer('dpr_detail_id')->unsigned()->comment('ID детали');
            $table->integer('dpr_process_id')->unsigned()->comment('ID процесса');
            $table->integer('dpr_parent_id')->unsigned()->nullable()->comment('ID родительского процесса');
            $table->string('dpr_options')->nullable()->comment('Опции');
            $table->string('dpr_notice')->nullable()->comment('Примечание');
            $table->integer('dpr_who_create')->unsigned()->comment('UID создавшего');
            $table->integer('dpr_who_lastedit')->unsigned()->nullable()->comment('UID редактировавшего');
            $table->foreign('dpr_detail_id')->references('d_id')->on('details_lib')
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
        Schema::dropIfExists('d_process_inc');
    }
}
