<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use function Ramsey\Uuid\v1;

class CreateLoansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('loans', function (Blueprint $table) {
            $table->id();
            $table->string('value');
            $table->string('cicle');
            $table->string('parcels');
            $table->bigInteger('segment_id')->unsigned();
            $table->foreign('segment_id')->references('id')->on('client_segments');
            $table->bigInteger('warranty_id')->unsigned();
            $table->foreign('warranty_id')->references('id')->on('warranties');
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
        Schema::dropIfExists('loans');
    }
}
