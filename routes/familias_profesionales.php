<?php

use App\Http\Controllers\FamiliaProfesionalController;

Route::group(['prefix' => 'familias_profesionales'], function(){
    Route::get('/', [FamiliaProfesionalController::class, 'getIndex']);

    Route::get('/show/{id}', [FamiliaProfesionalController::class, 'getShow'])->where('id', '[0-9]+');

    Route::get('/create', [FamiliaProfesionalController::class, 'getCreate']);
    Route::post('/', [FamiliaProfesionalController::class, 'store']);

    Route::get('/edit/{id}', [FamiliaProfesionalController::class, 'getEdit'])->where('id', '[0-9]+');
    Route::put('/{id}', [FamiliaProfesionalController::class, 'putEdit']);
});
