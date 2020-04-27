<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\KompetensiDasar;
use App\Model;
use Faker\Generator as Faker;

$factory->define(KompetensiDasar::class, function (Faker $faker) {
    return [
        'user_id' => $faker->numberBetween(31,35),
        'jenis' => $faker->randomElement($array = array ('pengetahuan','keterampilan')),
        'kode' => $faker->unique()->numberBetween(1,20),
        'deskripsi' => $faker->text($maxNbChars = 200),
    ];
});
