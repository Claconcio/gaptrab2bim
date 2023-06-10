<?php

session_start();

if (!isset($_SESSION['venda'])) {
    $_SESSION['qtd_venda'] = 1;
}

if (!isset($_SESSION['produto_venda'])) {
    $_SESSION['qtd_produto_venda'] = 1;
}

$qtd_venda = $_SESSION['qtd_venda'];
$qtd_produto_venda = $_SESSION['qtd_produto_venda'];

$_SESSION['venda'][$qtd_venda]['id'] = $qtd_venda;
$_SESSION['venda'][$qtd_venda]['cliente'] = $_POST['cliente'];
$_SESSION['venda'][$qtd_venda]['data'] = date("d/m/Y");

foreach ($_POST as $key=>$value){
    if ($key == 'comprador' || $value != "on"){
        continue;
    }

    $posicao = "qtd_produto_$key";
    $quantidade = $_POST[$posicao];

    $_SESSION['produto_venda'][$qtd_produto_venda]['id'] = $qtd_produto_venda;
    $_SESSION['produto_venda'][$qtd_produto_venda]['id_venda'] = $qtd_venda;
    $_SESSION['produto_venda'][$qtd_produto_venda]['id_produto'] = $key;
    $_SESSION['produto_venda'][$qtd_produto_venda]['quantidade'] = $quantidade;

    $qtd_produto_venda++;
    $_SESSION['qtd_produto_venda']++;
}

$_SESSION['qtd_venda']++;

$_SESSION['venda_cadastrada'] = true;
header("Location: /venda");
exit();