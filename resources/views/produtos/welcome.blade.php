<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Cadastro de Produtos</h1>

    <form action="/produtos" method="post">
        @csfr

        <label for="nome">Nome</label>
        <label type="text" id="nome" nome="nome" required><br><br>

        <label for="preco">Preco</label>
        <label type="text" step="0.01" id="preco" nome="preco" required><br><br>

        <label for="estoque">Estoque</label>
        <label type="text" id="estoque" nome="estoque" required><br><br>

        <button type="submit">Salvar</button>
    </form>

    <h2>Lista de produtos</h2>

    @if($produtos->isEmpy())
    @else
    @endif

</body>
</html>