<?php
include_once "inc/header.php";
include "../app/Load.php";

$mensagem = "";

$sessao = new Sessao();
$sessao->verifica();
$id = $_GET["id"];

if(isset($_POST['btConfirmar'])){
  $senha = $_POST['inSenha'];
  if(empty($senha)){
    $mensagem = '<div class="alert alert-danger" role="alert">Você não preencheu a senha</div>';
  }else{
    $senha = md5(base64_encode($senha));
    if($senha != $_SESSION['credencial']['senhaSessao']){
      $mensagem = '<div class="alert alert-danger" role="alert">Senha incorreta</div>';
    }else{
      $dalpessoafisica = new PessoaFisicaDAL();
      $dalpessoafisica->excluir($_SESSION['credencial']['idSessao']);

      $dalusuario = new UsuarioDAL();
      $dalusuario->excluir($_SESSION['credencial']['idSessao']);
      echo "<meta http-equiv='refresh' content='0;url=logout.php'>";
    }
  }
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
              .form-control {
                width: 50%
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
                <li class="breadcrumb-item active">Desativar</li>
                  <li class="breadcrumb-item active">Excluir</li>
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
                  <h2>Excluir perfil</h2>
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
                      <p>Por favor, para <b>excluir</b> seu cadastro insira sua senha e clique e confirmar</p>
                      <div class="form-group">
                        <input type="password" class="form-control" id="exampleFormControlInput1" name="inSenha" value="">
                      </div>
                    </div>
                    <?php

                      //}
                    ?>
                    <form action="" method="post">
                      <button type="submit" class="link" name="btConfirmar"><b>Sim</b>, Desejo <b>excluir</b> meu perfil</button><br>
                      <!--
                      <button type="submit" class="link" name="btDesativar"><b>Excluir</b> minha conta</button><br>
                      <button type="submit" class="link" name="btDesativar">Apenas <b>desativar</b></button>
                      -->
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
