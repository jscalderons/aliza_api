<?php

use Carbon\Carbon;
use Faker\Generator as Faker;

$factory->define(App\Pet::class, function (Faker $faker) {
    return [
        'uid' => $faker->uuid,
        'user_uid' => '8b9f96d1-743b-462c-95da-87441126f426',
        'process_id' => rand(0, 1),
        'name' => $faker->name,
        'phone' => $faker->phoneNumber,
        'age' => rand(1, 100),
        'sterilized' => $faker->boolean,
        'vaccinated' => $faker->boolean,
        'gender' => $faker->boolean ? 'M' : 'F',
        'description' => $faker->paragraph,
        'location' => "{$faker->streetName} - {$faker->city}, {$faker->country}",
        'latitude' => $faker->latitude,
        'longitude' => $faker->longitude,
        'approved_at' => now(),
        'created_at' => $faker->dateTime
    ];
});
