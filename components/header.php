<?php
    $existentFiles = glob('./pages/*.php'); 
    $existentFiles = array_map(fn ($file) => str_replace(['./pages/', '.php'], '', $file), $existentFiles);
    $existentFiles = array_filter($existentFiles, fn ($file) => $file !== '404');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Estoca Software</title>
    <link rel="stylesheet" href="https://bootswatch.com/5/lux/bootstrap.min.css">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <div class="container">
    <a class="navbar-brand" href="/">Estoca Software</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarColor01">
      <ul class="navbar-nav me-auto">
        <?php
        foreach($existentFiles as $menuItem) {
            // Caso o menu item seja o inicio, não exibir
            if ($menuItem === 'inicio') {
              continue;
            }
            ?>
            <li class="nav-item">
                <a class="nav-link active" href="/<?= $menuItem ?>"><?= str_replace('-', ' ', ucfirst($menuItem)) ?>
                    
                </a>
            </li>
            <?php
        }
        ?>
      </ul>
    </div>
  </div>
</nav>

<div class="container">
    
