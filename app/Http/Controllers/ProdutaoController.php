<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Produtao;
use Illuminate\Http\Request;

class ProdutaoController extends Controller
{
    /**
     * Lista todos os produtaos carregando a categoria relacionada (Eager Loading).
     */
    public function index()
    {
        $produtaos = Produtao::with('categoria')->orderBy('id', 'desc')->paginate(10);
        return view('produtaos.index', compact('produtaos'));
    }

    /**
     * Exibe o formulário de cadastro enviando a lista de categorias.
     */
    public function create()
    {
        $categorias = Categoria::orderBy('nome', 'asc')->get();
        return view('produtaos.create', compact('categorias'));
    }

    /**
     * Valida os dados e salva o novo produtao no banco.
     */
    public function store(Request $request)
    {
        $dadosValidados = $request->validate([
            'nome' => 'required|min:3|max:255',
            'preco' => 'required|numeric|min:0.01',
            'quantidade_estoque' => 'required|integer|min:0',
            'categoria_id' => 'required|exists:categorias,id',
        ]);

        Produtao::create($dadosValidados);

        return redirect()->route('produtaos.index')->with('sucesso', 'Produtao cadastrado com sucesso');
    }

    /**
     * Exibe os detalhes de um produtao específico.
     */
    public function show(Produtao $produtao)
    {
        return view('produtaos.show', compact('produtao'));
    }

    /**
     * Exibe o formulário de edição com os dados atuais e as categorias disponíveis.
     */
    public function edit(Produtao $produtao)
    {
        $categorias = Categoria::orderBy('nome', 'asc')->get();
        return view('produtaos.edit', compact('produtao', 'categorias'));
    }

    /**
     * Valida e atualiza as informações do produtao.
     */
    public function update(Request $request, Produtao $produtao)
    {
        $dadosValidados = $request->validate([
            'nome' => 'required|min:3|max:255',
            'preco' => 'required|numeric|min:0.01',
            'quantidade_estoque' => 'required|integer|min:0',
            'categoria_id' => 'required|exists:categorias,id',
        ]);

        $produtao->update($dadosValidados);

        return redirect()->route('produtaos.index')->with('sucesso', 'Produtao atualizado com sucesso');
    }

    /**
     * Exclui o produtao do banco de dados.
     */
    public function destroy(Produtao $produtao)
    {
        $produtao->delete();

        return redirect()->route('produtaos.index')->with('sucesso', 'Produtao removido com sucesso');
    }
}
