<?php session_start();

$qtd_produto = $_SESSION['qtd_produto'];
$id = $_POST['id_produto'];

for ($i = 1; $i < $qtd_produto; $i++){
    // Verificação de produtos existentes
    if ($_SESSION['produto'][$i]['nome'] == $_POST['nome'] && 
        $_SESSION['produto'][$i]['marca'] == $_POST['marca'] && 
        $_SESSION['produto'][$i]['preco'] == $_POST['preco'] && 
        $_SESSION['produto'][$i]['medida'] == $_POST['medida']) {
        $_SESSION['produto_existe'] = true;
        header("Location: /editar/produto?id=$id");
        exit();
    }

    if ($id == $_SESSION['produto'][$i]['id']){
        $id_produto = $id;
    }
}

$_SESSION['produto'][$id_produto]['nome'] = $_POST['nome'];
$_SESSION['produto'][$id_produto]['marca'] = $_POST['marca'];
$_SESSION['produto'][$id_produto]['preco'] = $_POST['preco'];
$_SESSION['produto'][$id_produto]['medida'] = $_POST['medida'];

$_SESSION['produto_editado'] = true;
header("Location: /produto");
exit();