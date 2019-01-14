<?php require 'config.php'; ?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link rel="stylesheet" href="assets/css/styles.css">

    <title>Classificados</title>
  </head>
  <body>
  	
  <nav>
    <div class="nav-wrapper grey darken-4">
      <a href="./" class="brand-logo">Classificados</a>
      <ul id="nav-mobile" class="right hide-on-med-and-down">
        <?php if(isset($_SESSION['cLogin']) && !empty($_SESSION['cLogin']))  :?>
        <li><a href="meusanuncios.php">Meus Anuncios</a></li>
        <li><a href="logout.php">Sair</a></li>
        <?php else: ?>
          <li><a href="cadastro.php">Cadastrar</a></li>
        <li><a href="login.php">Login</a></li>
        <?php endif;?>
      </ul>
    </div>
  </nav>