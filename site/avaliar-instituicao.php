<?php
include "inc/header.php";
include "../app/Load.php";

$mensagem = "";
$sessao = new Sessao();
$sessao->verifica();

$id = $_GET["id"];
$id_pessoa = $_GET["p_id"];
if($id == 0){
  header("Location: index.php");
}else{
  $dalinstituicao = new InstituicaoDAL();
  $daltipoinstituicao = new TipoInstituicaoDAL();
  $resultado = $dalinstituicao->visualizar($id);
}

if(isset($_POST['btLike'])){
  $comentario = $_POST['inComentario'];
  $novaAvaliacao = new AvaliacaoInstituicao(0, 1, $id, $id_pessoa, $comentario);
  $novaAvaliacao->getIdInstituicao();
  $dalinstituicao->avaliar($novaAvaliacao);
  // ...
  $mensagem = "<div class='alert alert-primary' role='alert'>Obrigado <b>{$_SESSION['credencial']['loginSessao']}</b>, sua avaliação foi enviada!</div>";
  //echo "<meta http-equiv='refresh' content='3;url=window.history.back()'>";
  echo "<script>setTimeout('history.go(-2)', 2000)</script>";
}else if(isset($_POST['btDeslike'])){
  $comentario = $_POST['inComentario'];
  $novaAvaliacao = new AvaliacaoInstituicao(0, 0, $id, $id_pessoa, $comentario);
  $dalinstituicao->avaliar($novaAvaliacao);
  //...
  $mensagem = "<div class='alert alert-primary' role='alert'>Obrigado <b>{$_SESSION['credencial']['loginSessao']}</b>, sua avaliação foi enviada!</div>";
  //echo "<meta http-equiv='refresh' content='3;url=window.history.back()'>";
  echo "<script>setTimeout('history.go(-2)', 2000)</script>";
}
?>
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

    .info {
        height: 5.5%
    }
    .label-editar{
      font-weight: 500;
    }

    .obrigatorio {
      font-weight: 500;
      color: red
    }
    </style>
     <!-- Page Content -->
      <div class="container">

        <!-- Page Heading/Breadcrumbs -->
        <?php
            while ($registro = $resultado->fetch_array()){
                extract($registro);

        ?>
        <h1 class="mt-4 mb-3">Sobre
          <small><?php echo  "@{$login}";?></small>
        </h1>
        <?php } ?>
        <br>
        <!--
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="index-2.html">Home</a>
          </li>
          <li class="breadcrumb-item active">About</li>
        </ol>
        -->


        <!-- Intro Content -->

        <div class="row">
          <div class="col-lg-5">
            <div class="circle">
            <?php
                echo "<img class='' src='../storage/uploads/perfil_instituicao/{$foto}' alt=''>";
            ?>
            </div>
          </div>
          <div class="col-lg-6" style="margin-left: -10px">
            <h2><?php echo "Avaliar Instituição <i>{$nome_fantasia}</i>";?></h2>

            <hr>
            <?php echo $mensagem; ?>
            <p>Preencha o campo abaixo, para adicionar um comentário sobre essa instituição:</p>
            <form method="post" action="">
              <div class="form-group">
                <label class="label-editar" for="exampleFormControlInput1">Comentário </label>
                <textarea class="form-control" rows="5" id="comment" placeholder="Preencha com seu comentário ..." name="inComentario" ></textarea>
              </div>
              <p><span class="obrigatorio">*</span> Para concluir sua avaliação, de uma maneira geral, a sua experiência com essa instituição foi: </p>
              <button type="submit" class="link" name="btLike">Postiva</button>
              <button type="submit" class="link" name="btDeslike">Negativa</b></button>
            </form>
            <br>
          </div>
        </div>
        <!-- /.row -->

        <div class="row">
        </div>

        <div class="row">

        </div>

      </div>
      <!-- /.container -->

      <!-- Footer -->
      <footer class="py-5 bg-dark">
        <div class="container">
          <p class="m-0 text-center text-white">Copyright &copy; Your Website 2018</p>
        </div>
        <!-- /.container -->
      </footer>

      <!-- Bootstrap core JavaScript -->

    </body>


  <!-- Mirrored from blackrockdigital.github.io/startbootstrap-modern-business/about.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 28 Oct 2018 00:35:44 GMT -->
  </html>
