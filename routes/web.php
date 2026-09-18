<?php

use App\Models\User;
use App\Http\Controllers\LivroControler;
use App\Http\Controllers\OficinaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\EventoController;

Route::get('/', function () {
    return view('home');
});

Route::view('/landing', 'landing');
Route::view('/admin', 'admin.dashboard');

Route::get('/test-orm', function () {
    User::create([
        'name' => 'Isac Micael Gonçalves de Brito',
        'email' => 'IsacMicael@escola.sp.gov.br',
        'password' => '12345678'
    ]);

    return User::all();
});

Route::get('/oficinas', [OficinaController::class, 'index']);
Route::post('/oficinas', [OficinaController::class, 'store']);

Route::get('/livros', [LivroControler::class, 'index']);
Route::post('/livros', [LivroControler::class, 'store']);

Route::get('/produtos', [ProdutoController::class, 'index']);
Route::post('/produtos', [ProdutoController::class, 'store']);

// Rotas da Agenda de Eventos
Route::get('/eventos', [EventoController::class, 'index']);
Route::get('/eventos/novo', [EventoController::class, 'create']);
Route::post('/eventos', [EventoController::class, 'store']);


