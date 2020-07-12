<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model\EventItem;
use Faker\Generator as Faker;

$factory->define(App\Models\EventItem::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence,
        'event_date' => $faker->dateTimeBetween('now', '+5 years'),
        'town' => $faker->city
    ];
});
