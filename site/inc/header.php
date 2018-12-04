<?php
session_start();
?>

  <!DOCTYPE html>
  <html lang="pt-br">

  <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
  <head>

      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <meta name="description" content="">
      <meta name="author" content="">

      <title>BuyToHelp - Doe produtos e participe de leilões para ajudar instituições</title>

      <!-- Bootstrap core CSS -->
      <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
      <!-- Custom styles for this template -->
      <link href="css/modern-business.css" rel="stylesheet">
      <!-- Include jQuery Mask assets -->

      <!-- Include jQuery autocomplete assets -->
      <script src="vendor/jquery/jquery.min.js"></script>
      <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

      <script type="text/javascript" src="js/jquery-1.2.6.pack.js"></script>
      <script type="text/javascript" src="js/jquery.maskedinput-1.1.4.pack.js"></script>

      <style>
      .circle {
        background-color: #aaa;
        border-radius: 50%;
        width: 250px;
        height: 250px;
        overflow: hidden;
        position: relative;
      }

      .circle img {
        position: absolute;
        bottom: 0;
        width: 100%;
      }

      a:hover .circle{
        opacity: 0.3;
      }
      </style>

    </head>

    <body>

      <!-- Navigation -->
      <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg fixed-top" style="background-color: #00007F">
        <div class="container">
          <a class="navbar-brand" href="index">BuyToHelp</a>
          <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
              <li class="nav-item">
                <a class="nav-link" href="about.html" class="menu" style="color:white">Leilões</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="about.html" class="menu" style="color:white">Doar</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="about.html" class="menu" style="color:white">Histórico</a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownBlog" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color:white">
                  Categorias
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownBlog">
                  <a class="dropdown-item" href="full-width.html">Eletronicos</a>
                  <a class="dropdown-item" href="sidebar.html">Roupas</a>
                  <a class="dropdown-item" href="faq.html">Livro</a>
                  <a class="dropdown-item" href="404.html">Esporte</a>
                  <a class="dropdown-item" href="pricing.html">Brinquedos</a>
                </div>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="services.html" style="color:white">|</a>
              </li>
              <?php

                  if(isset($_SESSION['credencial'])){
                          if($_SESSION['credencial']['tipoUsuarioId'] == 1){
                            echo '<li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownBlog" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                      '.$_SESSION["credencial"]["loginSessao"].'
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownBlog">
                                      <a class="dropdown-item" href="perfil?id='.$_SESSION["credencial"]["idSessao"].'">Perfil</a>
                                      <a class="dropdown-item" href="configuracoes">Configurações</a>
                                      <a class="dropdown-item" href="logout.php">Sair</a>
                                    </div>
                                  </li>';
                          }else{
                            echo '<li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownBlog" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                      '.$_SESSION["credencial"]["loginSessao"].'
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownBlog">
                                      <a class="dropdown-item" href="instituicao?id='.$_SESSION["credencial"]["idSessao"].'">Perfil</a>
                                      <a class="dropdown-item" href="configuracoes">Configurações</a>
                                      <a class="dropdown-item" href="logout.php">Sair</a>
                                    </div>
                                  </li>';
                          }

                  }else{
                          echo "<li class='nav-item'>
                                <a class='nav-link' href='criacao-de-conta.php'>Crie sua Conta</a>
                                </li>
                                <li class='nav-item'>
                                  <a class='nav-link' href='login.php'> Entrar</a>
                                </li>
                                <li class='nav-item'>
                                  <a class='nav-link' href='contact.html'>Contato</button></a>
                                </li>";
                  }

              ?>
              <!--
              <li class="nav-item">
                <a class="nav-link" href="contact.html">Contato</button></a>
              </li>
              -->
            </ul>
          </div>
        </div>
      </nav>
