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



