<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;
use App\menu;

$factory->define(menu::class, function (Faker $faker) {
    return [
        'name'=>$faker->word,
        'portion'=>$faker->randomFloat(2,1,10),
        'patient_id'=>$faker ->numberBetween(1, 7),
        'day_id'=>$faker ->numberBetween(1,7),
        'cat_id'=>$faker->numberBetween(1,8)
    ];
});
