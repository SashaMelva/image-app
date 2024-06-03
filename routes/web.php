<?php

use App\Http\Controllers\ImageController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('images');
});
Route::get('/form', function () {
    return view('form');
})->name('form');

Route::prefix('image')->group(function () {

    Route::controller(ImageController::class)->group(function () {

        Route::post('/add', 'add')->name('image.add');

        Route::get('/{id}', 'showById')->where(['id' => '[0-9]+'])->name('image.id');

        Route::get('/', 'show')->name('image.all');
    });
});
