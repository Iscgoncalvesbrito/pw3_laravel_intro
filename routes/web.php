<?php
use App\Models\User;
use App\Http\Controllers\LivroControler;
use App\Http\Controllers\OficinaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdutoController;

Route::get('/', function () {
    return view('home');
});

Route::view('/landing', 'landing');
Route::view('/admin', 'admin.dashboard');

Route::get('/test-orm', function () {
    User::create([
        'name' => 'Ana Clara Santos',
        'email' => 'ana.santos@escola.sp.gov.br',
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


use App\Http\Controllers\UserController;

Route::get('/admin', [UserController::class, 'index']);

// Rotas de criação
Route::get('/usuarios/novo', [UserController::class, 'create']);
Route::post('/usuarios', [UserController::class, 'store']);

// Rotas de edição
Route::get('/usuarios/{id}/editar', [UserController::class, 'edit']);
Route::put('/usuarios/{id}', [UserController::class, 'update']);

// Rota de exclusão (DELETE)
Route::delete('/usuarios/{id}', [UserController::class, 'destroy']);
