<?php

use Faker\Generator as Faker;

$factory->define(App\Display::class, function (Faker $faker) {
    return [
        'name' => 'Sample Box',
        'component_view' => 'display_box'
    ];
});
