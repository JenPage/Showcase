<?php

Route::middleware(config('showcase.middleware'))->group('showcase', function () {
    Route::resource('DisplayController');
    Route::resource('TrophyController');
});