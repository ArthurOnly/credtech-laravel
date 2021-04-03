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
            $table->string('person_id')->primary();
            $table->foreign('person_id')->references('id')->on('persons');
            $table->string('cpnj');
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
