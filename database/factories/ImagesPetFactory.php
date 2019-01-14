<?php

use Faker\Generator as Faker;

$factory->define(App\ImagesPet::class, function (Faker $faker) {
    return [
        'uid' => $faker->uuid,
        'pet_uid' => function () {
            return factory(App\Pet::class)->create()->uid;
        },
        'filename' => str_random(10) . '.jpg'
    ];
});
