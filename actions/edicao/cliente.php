<?php session_start();

$qtd_cliente = $_SESSION['qtd_cliente'];
$id = $_POST['id_cliente'];

for ($i = 1; $i < $qtd_cliente; $i++){
    // Verificação de clientes existentes
    if ($_SESSION['cliente'][$i]['cpf'] == $_POST['cpf'] &&
        $_SESSION['cliente'][$i]['email'] == $_POST['email']){
            $_SESSION['cliente_existe'] = true;
            header("Location: /editar/cliente?id=$id");
            exit();
        }

    if ($id == $_SESSION['cliente'][$i]['id']){
        $id_cliente = $id;
    }
}

$_SESSION['cliente'][$id_cliente]['nome'] = $_POST['nome'];
$_SESSION['cliente'][$id_cliente]['cpf'] = $_POST['cpf'];
$_SESSION['cliente'][$id_cliente]['email'] = $_POST['email'];
$_SESSION['cliente'][$id_cliente]['telefone'] = $_POST['telefone'];
$_SESSION['cliente'][$id_cliente]['cep'] = $_POST['cep'];
$_SESSION['cliente'][$id_cliente]['endereco'] = $_POST['endereco'];
$_SESSION['cliente'][$id_cliente]['numero'] = $_POST['numero'];
$_SESSION['cliente'][$id_cliente]['bairro'] = $_POST['bairro'];
$_SESSION['cliente'][$id_cliente]['cidade'] = $_POST['cidade'];
$_SESSION['cliente'][$id_cliente]['estado'] = $_POST['estado'];

$_SESSION['cliente_editado'] = true;
header("Location: /cliente");
exit();