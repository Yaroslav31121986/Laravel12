<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetailsListTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('details_list', function (Blueprint $table) {
            $table->increments('dl_id');
            $table->integer('dl_detail_id')->unsigned()->comment('ID детали');
            $table->integer('dl_order_id')->unsigned()->comment('ID заказа');
            $table->integer('dl_type_id')->unsigned()->comment('ID шаблона');
            $table->integer('dl_qty')->unsigned()->comment('Кол-во деталей');
            $table->boolean('dl_active')->default('1')->comment('Статус производства (производится или нет)');
            $table->boolean('dl_status')->default('1')->comment('Статус готовности (готово или нет)');
            $table->string('dl_notice')->nullable()->comment('Примечание');
            $table->integer('dl_who_create')->unsigned()->comment('UID создавшего');
            $table->integer('dl_who_lastedit')->unsigned()->nullable()->comment('UID редактировавшего');
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
        Schema::dropIfExists('details_list');
    }
}
