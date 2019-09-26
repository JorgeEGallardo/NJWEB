<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoutinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('routines', function (Blueprint $table) {
            $table->bigIncrements('id');
            
            $table->string('name');
            $table->integer('series');
            $table->integer('repetitions');
            $table->integer('intensity');
            $table->string('rest');
            $table->string('link');

            $table->BigInteger('patient_id')->unsigned();
            $table->BigInteger('day_id')->unsigned();
            
            $table->foreign('patient_id')->references('id')->on('patients')->onDelete('cascade');
            $table->foreign('day_id')->references('id')->on('days')->onDelete('cascade');

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
        Schema::dropIfExists('routines');
    }
}
