<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Livros - Laravel</title>
</head>
<body>
    <h1>Cadastro de Livros</h1>

    <form action="/livros" method="post">
        @csrf

        <label for="titulo">Titulo</label><br>
        <input type="text" id="titulo" name="titulo" required><br><br>

        <label for="autor">Autor</label><br>
        <input type="text" id="autor" name="autor" required><br><br>

        <label for="ano">Ano da Publicacao</label><br>
        <input type="number" id="date" name="date" required><br><br>

        <button type="submit">Salvar</button>
    </form>

    <h2>Lista de Livros</h2>

    @if($livros->isEmpty())
        <p>Nenhum livros cadastrado.</p>
    @else
        <ul>
            @foreach($livros as $livro)
                <li>
                    {{ $livro->titulo }} - R$ {{ $livro->ano }} - Livros: {{ $livro->ano }}
                </li>
            @endforeach
        </ul>
    @endif
</body>
</html>