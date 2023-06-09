<?php session_start();

if (!isset($_SESSION['produto'])){
    $_SESSION['qtd_produto'] = 1;
}

$qtd_produto = $_SESSION['qtd_produto']; 

for ($i = 1; $i < $qtd_cliente; $i++){
    if (($_POST['nome'] == $_SESSION['produto'][$i]['nome']) && 
        ($_POST['medida'] == $_SESSION['produto'][$i]['medida']) &&
        ($_POST['marca'] == $_SESSION['produto'][$i]['marca'])) {
        $_SESSION['produto_existe'] = true;
        header("Location: /produto");
        exit();
    }
}

$_SESSION['produto'][$qtd_produto]['id'] = $qtd_produto;
$_SESSION['produto'][$qtd_produto]['nome'] = $_POST['nome'];
$_SESSION['produto'][$qtd_produto]['marca'] = $_POST['marca'];
$_SESSION['produto'][$qtd_produto]['preco'] = $_POST['preco'];
$_SESSION['produto'][$qtd_produto]['medida'] = $_POST['medida'];

$_SESSION['qtd_produto']++;

$_SESSION['produto_cadastrado'] = true;
header("Location: /produto");
exit();