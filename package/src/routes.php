<?php

Route::middleware(config('showcase.middleware', ['web', 'auth']))->group(function () {
    Route::resource('displays', 'Showcase\App\Http\Controllers\DisplayController');
    Route::resource('trophies', 'Showcase\App\Http\Controllers\TrophyController');
});
