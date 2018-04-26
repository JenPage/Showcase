<?php

Route::middleware(config('showcase.middleware'))->group('showcase', function () {
    \Illuminate\Support\Facades\Route::resource('DisplayController');
});