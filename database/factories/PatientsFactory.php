<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;
use App\patient;

$factory->define(patient::class, function (Faker $faker) {
    return [
        'username'=>$faker->word,
        'password'=>$faker->word
    ];
});
