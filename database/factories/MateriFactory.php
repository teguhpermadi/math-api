<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Materi;
use App\Model;
use Faker\Generator as Faker;

$factory->define(Materi::class, function (Faker $faker) {
    return [
        'user_id' => $faker->numberBetween(1,5),
        'tujuan_id' => $faker->numberBetween(1,3),
        'judul' => $faker->sentence($nbWords = 6, $variableNbWords = true),
        'apersepsi' => $faker->paragraph($nbSentences = 5, $variableNbSentences = true),
        'gambar' => $faker->imageUrl($width = 640, $height = 480),
    ];
});
