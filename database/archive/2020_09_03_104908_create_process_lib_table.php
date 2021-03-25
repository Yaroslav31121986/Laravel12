<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProcessLibTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('process_lib', function (Blueprint $table) {
            $table->increments('pr_id')->comment('ID процесса');
            $table->string('pr_name')->unique()->comment('Название процесса');
            $table->boolean('pr_active')->default('1')->comment('Блокировка/активация процесса');
            $table->integer('pr_type')->nullable()->unsigned()->comment('Тип процесса');
            $table->integer('pr_options')->nullable()->unsigned()->comment('Опциональные параметры');
            $table->string('pr_notice')->nullable()->comment('Примечание');
            $table->integer('pr_who_create')->unsigned()->comment('UID создавшего');
            $table->integer('pr_who_lastedit')->unsigned()->nullable()->comment('UID редактировавшего');
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
        Schema::dropIfExists('process_lib');
    }
}
