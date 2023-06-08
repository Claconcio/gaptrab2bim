<?php session_start();

if (!isset($_SESSION['cliente'])){
    $_SESSION['qtd_cliente'] = 1;
}

$qtd_cliente = $_SESSION['qtd_cliente']; 

for ($i = 1; $i < $qtd_cliente; $i++){
    if (($_POST['email'] == $_SESSION['cliente'][$i]['email']) || ($_POST['cpf'] == $_SESSION['cliente'][$i]['cpf'])) {
        $_SESSION['usuario_existe'] = true;
        header("Location: /cliente");
        exit();
    }
}

$_SESSION['cliente'][$qtd_cliente]['id'] = $qtd_cliente;
$_SESSION['cliente'][$qtd_cliente]['nome'] = $_POST['nome'];
$_SESSION['cliente'][$qtd_cliente]['cpf'] = $_POST['cpf'];
$_SESSION['cliente'][$qtd_cliente]['email'] = $_POST['email'];
$_SESSION['cliente'][$qtd_cliente]['telefone'] = $_POST['telefone'];
$_SESSION['cliente'][$qtd_cliente]['cep'] = $_POST['cep'];
$_SESSION['cliente'][$qtd_cliente]['endereco'] = $_POST['endereco'];
$_SESSION['cliente'][$qtd_cliente]['numero'] = $_POST['numero'];
$_SESSION['cliente'][$qtd_cliente]['bairro'] = $_POST['bairro'];
$_SESSION['cliente'][$qtd_cliente]['cidade'] = $_POST['cidade'];
$_SESSION['cliente'][$qtd_cliente]['estado'] = $_POST['estado'];

$_SESSION['qtd_cliente']++;

$_SESSION['cadastrado'] = true;
header("Location: /cliente");
exit();