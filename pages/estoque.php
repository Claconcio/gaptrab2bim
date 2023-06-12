<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <br>
    <title>Buscar Estoque</title>
</head>
<body>
    <h1>Buscar Estoque</h1>

    <form action="" method="POST">
        <label for="categoria">Categoria:</label>
        <select id="categoria" name="categoria">
            <option value="">Todas as categorias</option>
            <option value="eletronicos">Eletrônicos</option>
            <option value="vestuario">Vestuário</option>
            <option value="alimentos">Alimentos</option>
        </select>

        <br><br>

        <label for="galpao">Galpão:</label>
        <select id="galpao" name="galpao">
            <option value="">Todos os galpões</option>
            <option value="galpaoA">Galpão A</option>
            <option value="galpaoB">Galpão B</option>
            <option value="galpaoC">Galpão C</option>
        </select>

        <br><br>

        <button type="submit" name="buscar">Buscar</button>
        <br>
        <br>
    </form>

    <?php

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_POST['buscar'])) {
            $categoria = $_POST['categoria'];
            $galpao = $_POST['galpao'];

            echo "<h2>Resultados da busca</h2>";
            echo "<p>Categoria: " . ($categoria !== "" ? $categoria : "Todas as categorias") . "</p>";
            echo "<p>Galpão: " . ($galpao !== "" ? $galpao : "Todos os galpões") . "</p>";

            echo "<table>";
            echo "<tr><th>Produto</th><th>Categoria</th><th>Galpão</th></tr>";

            if (file_exists("produtos.txt")) {
                $produtos = file_get_contents("produtos.txt");
                $produtos = explode("\n\n", $produtos);

                foreach ($produtos as $produto) {
                    $dados = explode("\n", $produto);
                    $nomeProduto = str_replace("Nome do Produto: ", "", $dados[0]);
                    $categoriaProduto = str_replace("Categoria: ", "", $dados[1]);
                    $galpaoProduto = str_replace("Galpão: ", "", $dados[2]);

                    if (($categoria === "" || $categoriaProduto === $categoria) && ($galpao === "" || $galpaoProduto === $galpao)) {
                        echo "<tr><td>$nomeProduto</td><td>$categoriaProduto</td><td>$galpaoProduto</td></tr>";
                    }
                }
            } else {
                echo "<tr><td colspan='3'>Nenhum produto cadastrado.</td></tr>";
            }

            echo "</table>";
        }
    }
    ?>
</body>
</html>
