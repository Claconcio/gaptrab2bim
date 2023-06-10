<?php session_start();

$id = $_GET['id'];

unset($_SESSION['venda'][$id]);

$_SESSION['venda_excluido'] = true;
header("Location: /venda");
exit();