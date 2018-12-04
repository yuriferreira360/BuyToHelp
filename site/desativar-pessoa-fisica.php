<?php
include_once "inc/header.php";
include "../app/Load.php";

$mensagem = "";

$sessao = new Sessao();
$sessao->verifica();
$id = $_GET["id"];

if(isset($_POST['btDesativar'])){
  /*
  $dalusuario = new UsuarioDAL();
  $dalusuario->desativarConta($_SESSION['credencial']['idSessao']);
  echo "<meta http-equiv='refresh' content='0;logout.php'>";
  */
//  header("Location: index.php");
  echo "<script>window.location.href = 'confirmar-desativar-pessoa-fisica?id={$_SESSION['credencial']['idSessao']}'; </script>";
}else if(isset($_POST['btExcluir'])){
  echo "<script>window.location.href = 'confirmar-exclusao-pessoa-fisica?id={$_SESSION['credencial']['idSessao']}'; </script>";
}
?>

            <style type="text/css">
              .label-editar {
                font-weight: 500
              }
              .obrigatorio {
                color: red
              }
              .span {
                font-weight: 500;
                color: blue
              }
              a.span:hover{
                text-decoration: none;
              }

              .modal-close{
                font-weight: 900;
                color: red;
              }

              .link{
                background:none!important;
                color: blue;
                border:none;
                padding:0!important;
                text-decoration: none
                border-bottom:1px solid #444;
                cursor: pointer;

              }
            </style>
            <div class="container">

              <!-- Page Heading/Breadcrumbs -->
              <h1 class="mt-4 mb-3">Configurações de Perfil
                <!-- <small>Subheading</small> -->
              </h1>

              <ol class="breadcrumb">
                <li class="breadcrumb-item">
                  <a href="index-2.html">Configurações</a>
                </li>
                <li class="breadcrumb-item active">Perfil</li>
              </ol>

              <!-- Content Row -->
              <div class="row">
                <!-- Sidebar Column -->
                <div class="col-lg-3 mb-4">
                  <div class="list-group">
                    <a href="index-2.html" class="list-group-item">Perfil</a>
                    <a href="about.html" class="list-group-item">Pagamento</a>
                    <a href="services.html" class="list-group-item">Segurança</a>
                    <a href="services.html" class="list-group-item">Desativar</a>
                  </div>
                </div>
                <!-- Content Column -->
                <div class="col-lg-6 mb-4" style="background-color: #E9ECEF;color: black">
                  <br>
                  <?php echo $mensagem; ?>
                  <h2>Desativar perfil</h2>
                  <hr>
                  <!-- <h2>Section Heading</h2> -->

                  <form method="post" action="">
                    <?php
                    /*
                      while ($registro = $resultado->fetch_array()){
                            extract($registro)
                    */
                    ?>
                    <div class="form-group">
                      <p>Você está prestes a <b>desativar</b> seu perfil, nome de usuário e outras informações não ficarão mais
                        visíveis na plataforma mas permanecerão armazanadas para um retorno futuro. <p>Caso você deseje <b>excluir</b>
                        permanentemente sua conta, selecione a opção excluir.</p>
                      </p>
                    </div>
                    <?php

                      //}
                    ?>
                    <form action="" method="post">
                      <button type="submit" class="link" name="btExcluir"><b>Excluir</b> minha conta</button><br>
                      <button type="submit" class="link" name="btDesativar">Apenas <b>desativar</b></button>
                    </form>

                    <br>
                    <!--
                    <a href="" class="span" onclick="window.location.href = "google.com.br""><b>Excluir</b> minha conta</a><br>
                    <a href="" class="span" onclick="desativarConta()">Apenas <b>desativar</b></a>
                    -->
                  </form>
                  <br>
                </div>
              </div>
              <!-- /.row -->

            </div>
            <!-- /.container -->
            <br><br>
            <!-- Footer -->
            <footer class="py-5 bg-dark">
              <div class="container">
                <p class="m-0 text-center text-white">Copyright &copy; Your Website 2018</p>
              </div>
              <!-- /.container -->
            </footer>

</body>
</html>
