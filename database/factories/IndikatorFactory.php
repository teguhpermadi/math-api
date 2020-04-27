<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Indikator;
use App\Model;
use Faker\Generator as Faker;

$factory->define(Indikator::class, function (Faker $faker) {
    return [
        'user_id' => $faker->numberBetween(31,35),
        'kompetensidasar_id' => $faker->numberBetween(1,10),
        'kode' => $faker->numberBetween(1,20),
        'deskripsi' => $faker->text($maxNbChars = 200),
    ];
});
