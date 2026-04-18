<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/indicadores', [App\Http\Controllers\IndicadorController::class, 'index'])->name('indicadores');