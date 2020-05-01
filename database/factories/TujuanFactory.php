<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Tujuan;
use Faker\Generator as Faker;

$factory->define(Tujuan::class, function (Faker $faker) {
    return [
        'user_id' => $faker->numberBetween(1,5),
        'kd3_id' => $faker->randomElement($array = array (2, 5)), // kd jenis pengetahuan,
        'kd4_id' => $faker->randomElement($array = array (1,3,4)), // kd jenis keterampilan,
        'deskripsi' => $faker->text($maxNbChars = 200),
    ];
});
