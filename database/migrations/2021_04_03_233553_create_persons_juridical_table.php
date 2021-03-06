<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonsJuridicalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('persons_juridical', function (Blueprint $table) {
            $table->bigInteger('person_id')->primary()->unsigned();
            $table->foreign('person_id')->references('id')->on('persons')->onDelete('cascade');;
            $table->string('cnpj');
            $table->string('cpf_partner')->nullable();
            $table->string('doc_address_comp_partner')->nullable();
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
        Schema::dropIfExists('persons_juridical');
    }
}
