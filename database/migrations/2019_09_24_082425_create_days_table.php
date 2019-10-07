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
        days::create(['name' => 'Dia 1']);
        days::create(['name' => 'Dia 2']);
        days::create(['name' => 'Dia 3']);
        days::create(['name' => 'Dia 4']);
        days::create(['name' => 'Dia 5']);
        days::create(['name' => 'Dia 6']);
        days::create(['name' => 'Dia 7']);
        days::create(['name' => 'Dia 8']);
        days::create(['name' => 'Dia 9']);
        days::create(['name' => 'Dia 10']);
        days::create(['name' => 'Dia 11']);
        days::create(['name' => 'Dia 12']);
        days::create(['name' => 'Dia 13']);
        days::create(['name' => 'Dia 14']);
        days::create(['name' => 'Dia 15']);
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
