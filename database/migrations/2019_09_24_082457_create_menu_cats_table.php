<?php
use App\menuCat;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMenuCatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menu_cats', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->timestamps();
        });
        menuCat::create(['name' => 'Desayuno']);
        menuCat::create(['name' => 'Colacion 1']);
        menuCat::create(['name' => 'Comida']);
        menuCat::create(['name' => 'Colacion 2']);
        menuCat::create(['name' => 'Cena']);
        menuCat::create(['name' => 'Colacion 3']);
        menuCat::create(['name' => 'Colacion 4']);
        menuCat::create(['name' => 'Colacion 5']);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('menu_cats');
    }
}
