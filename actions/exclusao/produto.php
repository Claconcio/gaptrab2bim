<?php session_start();

$id = $_GET['id'];

unset($_SESSION['produto'][$id]);

$_SESSION['produto_excluido'] = true;
header("Location: /produto");
exit();