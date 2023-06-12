<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro e Consulta de Clientes</title>
</head>
<body>
    <br>
    <h1>Cadastro de Clientes</h1>

    <form action="" method="POST">
        <div>
            <label for="nome">Nome:</label>
            <input type="text" id="nome" name="nome" required>
        </div>
        <br>
        <div>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
        </div>
        <br>
        <div>
            <label for="telefone">Telefone:</label>
            <input type="tel" id="telefone" name="telefone" required>
        </div>
        <br>
        <div>
            <label for="endereco">Endereço:</label>
            <input type="text" id="endereco" name="endereco" required>
        </div>
        <br>
        <button type="submit" name="cadastrar">Cadastrar</button>
    </form>

    <hr>

    <h1>Consulta de Clientes</h1>

    <form action="" method="POST">
        <button type="submit" name="consultar">Consultar Clientes</button>
        <br>
    </form>
    <br>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        
        if (isset($_POST['cadastrar'])) {
            $nome = $_POST['nome'];
            $email = $_POST['email'];
            $telefone = $_POST['telefone'];
            $endereco = $_POST['endereco'];

            $cliente = "Nome: $nome\nEmail: $email\nTelefone: $telefone\nEndereço: $endereco\n\n";
            file_put_contents("clientes.txt", $cliente, FILE_APPEND);

            echo "<p>Cliente cadastrado com sucesso!</p>";
        }

        if (isset($_POST['consultar'])) {
            echo "<h2>Clientes Cadastrados</h2>";
            echo "<table>";
            echo "<tr><th>Nome</th><th>Email</th><th>Telefone</th><th>Endereço</th></tr>";

            if (file_exists("clientes.txt")) {
                $clientes = file_get_contents("clientes.txt");
                $clientes = explode("\n\n", $clientes);

                foreach ($clientes as $cliente) {
                    $dados = explode("\n", $cliente);
                    $nome = str_replace("Nome: ", "", $dados[0]);
                    $email = str_replace("Email: ", "", $dados[1]);
                    $telefone = str_replace("Telefone: ", "", $dados[2]);
                    $endereco = str_replace("Endereço: ", "", $dados[3]);

                    echo "<tr><td>$nome</td><td>$email</td><td>$telefone</td><td>$endereco</td></tr>";
                }
            } else {
                echo "<tr><td colspan='4'>Nenhum cliente cadastrado.</td></tr>";
            }

            echo "</table>";
        }
    }
    ?>
</body>
</html>
