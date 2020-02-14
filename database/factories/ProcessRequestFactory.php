<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\ProcessRequest;
use Faker\Generator as Faker;

$factory->define(ProcessRequest::class, function (Faker $faker) {
    return [
        'date_from' => $faker->dateTimeBetween('-200 hours', '-100 hours'),
        'date_to' => $faker->dateTimeBetween('-100 hours', 'now'),
        'camera_id' => factory(App\Camera::class),
    ];
});
