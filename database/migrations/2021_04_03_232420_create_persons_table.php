<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('persons', function (Blueprint $table) {
            $table->id();
            $table->integer('type_id');
            $table->string('name');
            $table->string('address')->nullable();
            $table->string('CEP')->nullable();
            $table->string('email');
            $table->string('celphone');
            $table->string('monthly_income')->nullable();
            $table->string('doc_monthly_income')->nullable();
            $table->string('doc_address_comp')->nullable();
            $table->string('doc_selfie')->nullable();
            $table->string('doc_rg_verse')->nullable();
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
        Schema::dropIfExists('persons');
    }
}
