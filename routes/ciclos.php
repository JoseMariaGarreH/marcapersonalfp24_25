<?php

use App\Http\Controllers\CicloController;

Route::group(['prefix' => 'ciclos'], function(){
    Route::get('/', [CicloController::class, 'getIndex']);

    Route::get('/show/{id}', [CicloController::class, 'getShow'])->where('id', '[0-9]+');

    Route::get('/create', [CicloController::class, 'getCreate']);

    Route::get('/edit/{id}', [CicloController::class, 'getEdit'])->where('id', '[0-9]+');
});
