<?php

Route::middleware(config('showcase.middleware'))->group(function () {
    Route::resource('displays', 'DisplayController');
    Route::resource('trophies', 'TrophyController');
});
