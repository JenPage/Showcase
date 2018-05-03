<?php

Route::middleware(config('showcase.middleware'))->group(function () {
    Route::resource('displays', 'Showcase\App\Http\Controllers\DisplayController');
    Route::resource('trophies', 'Showcase\App\Http\Controllers\TrophyController');
});
