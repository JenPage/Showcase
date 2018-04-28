<?php

use Faker\Generator as Faker;

$factory->define(App\Trophy::class, function (Faker $faker) {
    return [
        'name' => 'Sample Item',
        'link' => 'http://google.com',
        'image_url' => 'http://lorempixel.com/640/480',
        'description' => 'A boring item which links somewhere.',
        'display_id' => 1
    ];
});
