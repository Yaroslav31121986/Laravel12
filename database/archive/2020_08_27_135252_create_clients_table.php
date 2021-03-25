<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->increments('c_id');
            $table->string('c_name')->unique()->comment('Наименование');
            $table->integer('c_manager')->unsigned()->comment('Ответственный менеджер (ID из →users)');
            $table->integer('c_company_code')->unsigned()->unique()->comment('Код ЕГРПОУ');
            $table->string('c_contact_person_1')->comment('Контактное лицо 1');
            $table->string('c_position_1')->comment('Должность 1');
            $table->string('c_phone_1')->comment('Телефон 1');
            $table->string('c_email_1')->comment('Email 1');
            $table->string('c_contact_person_2')->nullable()->comment('Контактное лицо 2');
            $table->string('c_position_2')->nullable()->comment('Должность 2');
            $table->string('c_phone_2')->nullable()->comment('Телефон 2');
            $table->string('c_email_2')->nullable()->comment('Email 2');
            $table->string('c_contact_person_3')->nullable()->comment('Контактное лицо 3');
            $table->string('c_position_3')->nullable()->comment('Должность 3');
            $table->string('c_phone_3')->nullable()->comment('Телефон 3');
            $table->string('c_email_3')->nullable()->comment('Email 3');
            $table->string('c_city')->comment('Город');
            $table->string('c_legal_address')->nullable()->comment('Юридический адрес');
            $table->string('с_physical_adress')->nullable()->comment('Физический адрес');
            $table->string('с_notice')->nullable()->comment('Примечание');
            $table->integer('с_created_uid')->unsigned()->comment('UID того, кто создал');
            $table->integer('c_edit_uid')->nullable()->unsigned()->comment('UID того, кто редактировал');
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
        Schema::dropIfExists('clients');
    }
}
