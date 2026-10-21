<?php
use App\Models\User;
use App\Http\Controllers\LivroControler;
use App\Http\Controllers\OficinaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CantinaController;

Route::get('/', function () {
    return view('home');
});

Route::view('/landing', 'landing');

// Rota da listagem e painel administrativo (GET)
Route::get('/admin', [UserController::class, 'index']);

// Rota para carregar o formulário (GET)
Route::get('/usuarios/novo', [UserController::class, 'create']);

// Rota para salvar os dados enviados (POST)
Route::post('/usuarios', [UserController::class, 'store']);

// Rotas de edição e atulização
Route::get('/usuarios/{id}/editar', [UserController::class, 'edit']);
Route::put('/usuarios/{id}', [UserController::class, 'update']);

Route::get('/produtos', [ProdutoController::class , 'index']);
Route::post('/produtos', [ProdutoController::class , 'store']);

Route::get('/teste-orm', function() {
    User::create([
        'name' => 'Icaro Davies',
        'email' => 'icaro.davies@escola.sp.gov.br',
        'password' => '12345678',
    ]);

    return User::all();
    
});

// Registra todas as rotas do CRUD em uma 
Route::resource('cantinas', CantinaController::class);

