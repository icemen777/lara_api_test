<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;

$factory->define(App\Models\Member::class, function (Faker $faker) {
    return [
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'email' => $faker->unique()->safeEmail,
        'event_item_id' => '3'
    ];
});
