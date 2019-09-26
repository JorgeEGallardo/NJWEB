<?php

use Illuminate\Database\Seeder;
use App\patient;
class PatientsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(patient::class, 7)->create();
    }
}
