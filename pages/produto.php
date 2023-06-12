<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Produtos</title>
</head>
<body>
    <br>
    <h1>Cadastro de Produtos</h1>

    <form action="" method="POST">
        <label for="nomeProduto">Nome do Produto:</label>
        <input type="text" id="nomeProduto" name="nomeProduto" required>

        <br><br>

        <label for="categoria">Categoria:</label>
        <select id="categoria" name="categoria" required>
            <option value="">Selecione a categoria</option>
            <option value="eletronicos">Eletrônicos</option>
            <option value="vestuario">Vestuário</option>
            <option value="alimentos">Alimentos</option>
        </select>

        <br><br>

        <label for="galpao">Galpão:</label>
        <select id="galpao" name="galpao" required>
            <option value="">Selecione o galpão</option>
            <option value="galpaoA">Galpão A</option>
            <option value="galpaoB">Galpão B</option>
            <option value="galpaoC">Galpão C</option>
        </select>

        <br><br>

        <button type="submit" name="cadastrar">Cadastrar</button>
    </form>

    <?php

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_POST['cadastrar'])) {
            $nomeProduto = $_POST['nomeProduto'];
            $categoria = $_POST['categoria'];
            $galpao = $_POST['galpao'];

            $produto = "Nome do Produto: $nomeProduto\nCategoria: $categoria\nGalpão: $galpao\n\n";
            file_put_contents("produtos.txt", $produto, FILE_APPEND);

            echo "<p>Produto cadastrado com sucesso!</p>";
            echo "<p>Nome: $nomeProduto</p>";
            echo "<p>Categoria: $categoria</p>";
            echo "<p>Galpão: $galpao</p>";
        }
    }
    ?>
</body>
</html>
