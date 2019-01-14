<?php

use Carbon\Carbon;
use Faker\Generator as Faker;

$factory->define(App\Pet::class, function (Faker $faker) {
    return [
        'uid' => $faker->uuid,
        'user_uid' => '9e15970c-e61b-4be0-8549-2d2f8d17a45d',
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
        // 'approved_at' => now(),
        'created_at' => $faker->dateTime
    ];
});
