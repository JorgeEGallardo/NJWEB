<?php

use Illuminate\Database\Seeder;
use App\menu;
class MenusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(menu::class, 10)->create();
    }
}
