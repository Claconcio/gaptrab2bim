<?php session_start();

$qtd_produto = $_SESSION['qtd_produto'];
$id = $_POST['id_produto'];

for ($i = 1; $i < $qtd_produto; $i++){
    if ($id == $_SESSION['produto'][$i]['id']){
        $_SESSION['produto'][$i]['nome'] = $_POST['nome'];
        $_SESSION['produto'][$i]['marca'] = $_POST['marca'];
        $_SESSION['produto'][$i]['preco'] = $_POST['preco'];
        $_SESSION['produto'][$i]['medida'] = $_POST['medida'];
    }
}

$_SESSION['produto_editado'] = true;
header("Location: /produto");
exit();