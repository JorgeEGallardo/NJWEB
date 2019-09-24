<?php
use App\days;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDaysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('days', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->timestamps();
        });
        days::create(['name' => 'Lunes']);
        days::create(['name' => 'Martes']);
        days::create(['name' => 'Miercoles']);
        days::create(['name' => 'Jueves']);
        days::create(['name' => 'Viernes']);
        days::create(['name' => 'Sabado']);
        days::create(['name' => 'Domingo']);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('days');
    }
}
