<?php session_start();

$id = $_GET['id'];

unset($_SESSION['cliente'][$id]);

$_SESSION['cliente_excluido'] = true;
header("Location: /cliente");
exit();