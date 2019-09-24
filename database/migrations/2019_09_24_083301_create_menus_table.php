<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menus', function (Blueprint $table) {
            $table->engine = 'InnoDB'; // Motor por si acaso no esta definido de default
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('portion');
            $table->BigInteger('patient_id')->unsigned();
            $table->BigInteger('day_id')->unsigned();
            $table->BigInteger('cat_id')->unsigned();
            //Foreign constraits
            $table->foreign('patient_id')->references('id')->on('patients')->onDelete('cascade');
            $table->foreign('day_id')->references('id')->on('days')->onDelete('cascade');
            $table->foreign('cat_id')->references('id')->on('menu_cats')->onDelete('cascade');

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
        Schema::dropIfExists('menus');
    }
}
