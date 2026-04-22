<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/painel-exportacao', [App\Http\Controllers\PainelExportacaoController::class, 'exibirPainel'])->name('painel.exportacao');
Route::get('/historico-cotacoes', [App\Http\Controllers\PainelExportacaoController::class, 'exibirHistorico'])->name('historico.cotacoes');