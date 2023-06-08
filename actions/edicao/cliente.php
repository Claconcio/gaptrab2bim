<?php session_start();

$qtd_cliente = $_SESSION['qtd_cliente'];
$id = $_POST['id_cliente'];

for ($i = 1; $i < $qtd_cliente; $i++){
    if ($id == $_SESSION['cliente'][$i]['id']){
        $_SESSION['cliente'][$i]['nome'] = $_POST['nome'];
        $_SESSION['cliente'][$i]['cpf'] = $_POST['cpf'];
        $_SESSION['cliente'][$i]['email'] = $_POST['email'];
        $_SESSION['cliente'][$i]['telefone'] = $_POST['telefone'];
        $_SESSION['cliente'][$i]['cep'] = $_POST['cep'];
        $_SESSION['cliente'][$i]['endereco'] = $_POST['endereco'];
        $_SESSION['cliente'][$i]['numero'] = $_POST['numero'];
        $_SESSION['cliente'][$i]['bairro'] = $_POST['bairro'];
        $_SESSION['cliente'][$i]['cidade'] = $_POST['cidade'];
        $_SESSION['cliente'][$i]['estado'] = $_POST['estado'];
    }
}

$_SESSION['cliente_editado'] = true;
header("Location: /cliente");
exit();