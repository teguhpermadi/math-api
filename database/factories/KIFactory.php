<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\KompetensiInti;
use App\Model;
// use Faker\Generator as Faker;
use Faker\Factory as Faker;

$factory->define(KompetensiInti::class, function ($faker) {
    $faker = Faker::create('id_ID');

    return [
        'user_id' => $faker->numberBetween(31,35),
        'deskripsi' => $faker->text($maxNbChars = 100),
    ];
});
