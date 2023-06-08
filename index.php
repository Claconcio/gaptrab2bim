<?php
/**
 * Sistema de controle de supermercado *Market Software*
 * Iniciado em: 2023-05-29
 * 
 * @author claconcio <carlosmirandaum@gmail.com>
 * @author lanjoni <joaoaugustolanjoni@gmail.com>
 * @author 
 * 
 * @version 1.0.0
 */

require_once('./components/header.php');

$path = $_SERVER['REQUEST_URI'];
if($path == '/') {
    require_once('./pages/inicio.php');    
} else {
    $fileToInclude = substr($path, 1);
    $fileToInclude = str_replace('/', '-', $fileToInclude);

    $existentFiles = glob('./pages/*.php');
    $existentFiles = array_map(fn ($file) => str_replace(['./pages/', '.php'], '', $file), $existentFiles);

    if (in_array($fileToInclude, $existentFiles)) {
        require_once(sprintf('./pages/%s.php', $fileToInclude));
    } else {
        $fileToInclude = substr($path, 1);
        $fileToInclude = str_replace('editar/', '', $fileToInclude);

        $existentFiles = glob('./pages/editar/*.php');
        $existentFiles = array_map(fn ($file) => str_replace(['./pages/editar/', '.php'], '', $file), $existentFiles);

        $parameters = str_replace('cliente', '', $fileToInclude);

        if ($parameters != ""){
            $fileToInclude = strstr($fileToInclude, '?', true);
        }

        if (in_array($fileToInclude, $existentFiles)) { 
            require_once(sprintf('./pages/editar/%s.php', $fileToInclude));
        } else {
            require_once('./pages/404.php');
        }
    }
}

require_once('./components/footer.php');