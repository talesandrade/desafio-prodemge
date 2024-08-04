<?php

use App\Http\Controllers\CepController;
use App\Http\Controllers\PessoaController;
use App\Http\Controllers\EnderecoController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::prefix('cep')->name('cep.')
    ->group(function () {
        Route::get('/getOnly/{cep}', [CepController::class, 'getOnly'])->name('api.cep.getOnly');
    });

Route::prefix('pessoa')->name('pessoa.')
->group(function () {
    Route::get('/list', [PessoaController::class, 'list'])->name('api.pessoa.list');
    Route::post('/getOnly', [PessoaController::class, 'getOnly'])->name('api.pessoa.getOnly');
    Route::post('/find', [PessoaController::class, 'find'])->name('api.pessoa.find');
    Route::post('/create', [PessoaController::class, 'create'])->name('api.pessoa.create');
    Route::post('/update', [PessoaController::class, 'update'])->name('api.pessoa.update');
});

Route::prefix('endereco')->name('endereco.')
->group(function () {
    Route::post('/list', [EnderecoController::class, 'list'])->name('api.endereco.list');
    Route::post('/getEnderecoAtual', [EnderecoController::class, 'getEnderecoAtual'])->name('api.endereco.getEnderecoAtual');
    Route::post('/find', [EnderecoController::class, 'find'])->name('api.endereco.find');
    Route::post('/create', [EnderecoController::class, 'create'])->name('api.endereco.create');
    Route::post('/update', [EnderecoController::class, 'update'])->name('api.endereco.update');
});