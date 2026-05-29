<?php

namespace App\Http\Controllers;

use App\Models\Livro;
use Illuminate\Http\Request;


class LivroControler extends Controller
{
    
    public function index()
    {
        $livros = Livro::orderBy('titulo')->get();
        return view('livros.index', compact('livros'));
    }

    public function store(Request $request)
    {
        $dados = $request->validate([
            'titulo' => 'required|min:3',
            'autor' => 'required|numeric|min:0',
            'ano_publicacao' => 'required|integer|min:1', //pode acrecentar tambem: min:1|max:' . date('Y'), --> faz que o ano noa ultrapasse o ano atual!!
        ]);

        Livro::create($dados);

        return redirect('/livros');
    }
}
