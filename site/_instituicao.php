<?php
  include_once "inc/header.php";
  include_once "../app/Load.php";

  $sessao = new Sessao();
  $sessao->verifica();
  /*
  $sessao->primeiroAcesso();
  */

$id = $_GET["id"];
if ($id == 0) {
    header("Location: index.php");
} else {
    $dalinstituicao = new InstituicaoDAL();
    $daltipoinstituicao = new TipoInstituicaoDAL();
    $resultado = $dalinstituicao->visualizar($id);
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
  height: 90%;
  margin-top: 200px
}

.info {
    height: 6.5%
}
</style>
<!-- Page Content -->
<div class="container">

    <!-- Page Heading/Breadcrumbs -->
    <?php
    while ($registro = $resultado->fetch_array()) {
        extract($registro);
        ?>
        <h1 class="mt-4 mb-3">Sobre
            <small><?php echo "@{$login}"; ?></small>
        </h1>
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
                echo "<img class='img-fluid rounded mb-4' src='../storage/uploads/perfil_instituicao/{$foto}' height='650' width='400' alt=''><br><a href='editar-foto-instituicao?id={$_SESSION['credencial']['idSessao']}'>(Editar)</a>";
                ?>
                            </div>
            </div>
            <div class="col-lg-6">
                <h2><?php echo "{$nome_fantasia} <a href='editar-instituicao?id={$_SESSION['credencial']['idSessao']}'> <img src='../storage/icons/instituicao/icon-edita.png' alt=''></a>"; ?></h2>
                <h5></h5>
                <hr>
                <b></b>
                <p><?php echo "{$descricao}"; ?></p>
                <b><img class="info" src="../storage/icons/instituicao/icon-cnpj.png" alt=""></b> <?php echo "{$cnpj}"; ?>
                <br>
                <b><img class="info" src="../storage/icons/instituicao/icon-email.png" alt=""></b> <?php echo "{$email}"; ?>
                <br>
                <b><img class="info" src="../storage/icons/instituicao/icon-localidade.png" alt=""></b> <?php echo "{$cidade}, {$uf}"; ?>
                <?php
            }
            ?>
            <br><br>
            <b>Categorias: </b>
            <?php
            $resultado = $daltipoinstituicao->visualizarPorId();
            if ($resultado->num_rows < 1) {
                echo "Sua instituição ainda não está cadastrada em nenhuma categoria <a href='editar-tipo-instituicao?id={$_SESSION['credencial']['idSessao']}'>cadastrar</a>";
            } else {
                echo '<ul style="margin-left: -4%">';
                while ($registro = $resultado->fetch_array()) {
                    //echo ;
                    //echo "{$registro["nome"]}";
                    echo "<li class=''><a href='tipos-instituicao=id'>{$registro["nome"]}</a></li>";
                }

                echo '</ul>';
            }
            ?>
            <?php
            /*

              $resultado = $daltipoinstituicao->visualizarPorId();

             */
            ?>
        </div>
    </div>
    <!-- /.row -->

    <!-- Team Members -->
    <br>
    <h2>Ultimos leilões </h2>
    <br>

    <div class="row">
        <div class="col-lg-4 mb-4">
            <div class="card h-100 text-center">
                <img class="card-img-top" src="http://placehold.it/750x450" alt="">
                <div class="card-body">
                    <h4 class="card-title">Team Member</h4>
                    <p class="card-text">Descrição...</p>
                </div>
                <div class="card-footer">
                    <a href="#">instituição</a>
                </div>
            </div>
        </div>
        <div class="col-lg-4 mb-4">
            <div class="card h-100 text-center">
                <img class="card-img-top" src="http://placehold.it/750x450" alt="">
                <div class="card-body">
                    <h4 class="card-title">Team Member</h4>
                    <p class="card-text">Descrição...</p>
                </div>
                <div class="card-footer">
                    <a href="#">instituição</a>
                </div>
            </div>
        </div>
        <div class="col-lg-4 mb-4">
            <div class="card h-100 text-center">
                <img class="card-img-top" src="http://placehold.it/750x450" alt="">
                <div class="card-body">
                    <h4 class="card-title">Team Member</h4>
                    <p class="card-text">Descrição...</p>
                </div>
                <div class="card-footer">
                    <a href="#">instituição</a>
                </div>
            </div>
        </div>
    </div>
    <br>
    <h2>Ultimas doações </h2>
    <br>

    <div class="row">
        <div class="col-lg-4 mb-4">
            <div class="card h-100 text-center">
                <img class="card-img-top" src="http://placehold.it/750x450" alt="">
                <div class="card-body">
                    <h4 class="card-title">Team Member</h4>
                    <p class="card-text">Descrição...</p>
                </div>
                <div class="card-footer">
                    <a href="#">instituição</a>
                </div>
            </div>
        </div>
        <div class="col-lg-4 mb-4">
            <div class="card h-100 text-center">
                <img class="card-img-top" src="http://placehold.it/750x450" alt="">
                <div class="card-body">
                    <h4 class="card-title">Team Member</h4>
                    <p class="card-text">Descrição...</p>
                </div>
                <div class="card-footer">
                    <a href="#">instituição</a>
                </div>
            </div>
        </div>
        <div class="col-lg-4 mb-4">
            <div class="card h-100 text-center">
                <img class="card-img-top" src="http://placehold.it/750x450" alt="">
                <div class="card-body">
                    <h4 class="card-title">Team Member</h4>
                    <p class="card-text">Descrição...</p>
                </div>
                <div class="card-footer">
                    <a href="#">instituição</a>
                </div>
            </div>
        </div>
    </div>
    <!-- /.row -->

    <!--
    <h2>Our Customers</h2>
    <div class="row">
      <div class="col-lg-2 col-sm-4 mb-4">
        <img class="img-fluid" src="http://placehold.it/500x300" alt="">
      </div>
      <div class="col-lg-2 col-sm-4 mb-4">
        <img class="img-fluid" src="http://placehold.it/500x300" alt="">
      </div>
      <div class="col-lg-2 col-sm-4 mb-4">
        <img class="img-fluid" src="http://placehold.it/500x300" alt="">
      </div>
      <div class="col-lg-2 col-sm-4 mb-4">
        <img class="img-fluid" src="http://placehold.it/500x300" alt="">
      </div>
      <div class="col-lg-2 col-sm-4 mb-4">
        <img class="img-fluid" src="http://placehold.it/500x300" alt="">
      </div>
      <div class="col-lg-2 col-sm-4 mb-4">
        <img class="img-fluid" src="http://placehold.it/500x300" alt="">
      </div>
    </div>
    -->

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
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>


<!-- Mirrored from blackrockdigital.github.io/startbootstrap-modern-business/about.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 28 Oct 2018 00:35:44 GMT -->
</html>
<?php
include "inc/header.php";
include "../app/Load.php";

$sessao = new Sessao();
$sessao->verifica();
$sessao->primeiroAcesso();

$id = $_GET["id"];

if ($id == 0) {
    header("Location: index.php");
} else {
    $dalinstituicao = new InstituicaoDAL();
    $daltipoinstituicao = new TipoInstituicaoDAL();
    $resultado = $dalinstituicao->visualizar($id);
}
?>

<!-- Page Content -->
<div class="container">

    <!-- Page Heading/Breadcrumbs -->
    <?php
    while ($registro = $resultado->fetch_array()) {
        extract($registro);
        ?>
        <h1 class="mt-4 mb-3">Sobre
            <small><?php echo "@{$login}"; ?></small>
        </h1>
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
            <div class="col-lg-6">
                <?php
                echo "<img class='img-fluid rounded mb-4' src='../storage/uploads/perfil_instituicao/{$foto}' height='650' width='400' alt=''><br><a href='editar-foto-instituicao?id={$_SESSION['credencial']['idSessao']}'>(Editar)</a>";
                ?>
            </div>
            <div class="col-lg-6">
                <h2><?php echo "{$nome_fantasia} (<a href='editar-instituicao?id={$_SESSION['credencial']['idSessao']}'>Editar informações</a>)"; ?></h2>
                <h5></h5>
                <hr>
                <b></b>
                <p><?php echo "{$descricao}"; ?></p>
                <b>Contato: </b> <?php echo "{$email}"; ?>
                <br>
                <b>Localidade:</b> <?php echo "{$cidade}, {$uf}"; ?>
                <?php
            }
            ?>
            <br><br>
            <b>Categorias: </b>
            <br>
            <?php
            $resultado = $daltipoinstituicao->visualizarPorId();
            if ($resultado->num_rows < 1) {
                echo "Sua instituição ainda não está cadastrada em nenhuma categoria <a href='editar-tipo-instituicao?id={$_SESSION['credencial']['idSessao']}'>cadastrar</a>";
            } else {
                echo '<ul style="margin-left: -4%">';
                while ($registro = $resultado->fetch_array()) {
                    //echo ;
                    //echo "{$registro["nome"]}";
                    echo "<li class=''><a href='tipos-instituicao=id'>{$registro["nome"]}</a></li>";
                }

                echo '</ul>';
            }
            ?>
            <?php
            /*

              $resultado = $daltipoinstituicao->visualizarPorId();

             */
            ?>
        </div>
    </div>
    <!-- /.row -->

    <!-- Team Members -->
    <br>
    <h2>Ultimos leilões </h2>
    <br>

    <div class="row">
        <div class="col-lg-4 mb-4">
            <div class="card h-100 text-center">
                <img class="card-img-top" src="http://placehold.it/750x450" alt="">
                <div class="card-body">
                    <h4 class="card-title">Team Member</h4>
                    <p class="card-text">Descrição...</p>
                </div>
                <div class="card-footer">
                    <a href="#">instituição</a>
                </div>
            </div>
        </div>
        <div class="col-lg-4 mb-4">
            <div class="card h-100 text-center">
                <img class="card-img-top" src="http://placehold.it/750x450" alt="">
                <div class="card-body">
                    <h4 class="card-title">Team Member</h4>
                    <p class="card-text">Descrição...</p>
                </div>
                <div class="card-footer">
                    <a href="#">instituição</a>
                </div>
            </div>
        </div>
        <div class="col-lg-4 mb-4">
            <div class="card h-100 text-center">
                <img class="card-img-top" src="http://placehold.it/750x450" alt="">
                <div class="card-body">
                    <h4 class="card-title">Team Member</h4>
                    <p class="card-text">Descrição...</p>
                </div>
                <div class="card-footer">
                    <a href="#">instituição</a>
                </div>
            </div>
        </div>
    </div>
    <br>
    <h2>Ultimas doações </h2>
    <br>

    <div class="row">
        <div class="col-lg-4 mb-4">
            <div class="card h-100 text-center">
                <img class="card-img-top" src="http://placehold.it/750x450" alt="">
                <div class="card-body">
                    <h4 class="card-title">Team Member</h4>
                    <p class="card-text">Descrição...</p>
                </div>
                <div class="card-footer">
                    <a href="#">instituição</a>
                </div>
            </div>
        </div>
        <div class="col-lg-4 mb-4">
            <div class="card h-100 text-center">
                <img class="card-img-top" src="http://placehold.it/750x450" alt="">
                <div class="card-body">
                    <h4 class="card-title">Team Member</h4>
                    <p class="card-text">Descrição...</p>
                </div>
                <div class="card-footer">
                    <a href="#">instituição</a>
                </div>
            </div>
        </div>
        <div class="col-lg-4 mb-4">
            <div class="card h-100 text-center">
                <img class="card-img-top" src="http://placehold.it/750x450" alt="">
                <div class="card-body">
                    <h4 class="card-title">Team Member</h4>
                    <p class="card-text">Descrição...</p>
                </div>
                <div class="card-footer">
                    <a href="#">instituição</a>
                </div>
            </div>
        </div>
    </div>
    <!-- /.row -->

    <!--
    <h2>Our Customers</h2>
    <div class="row">
      <div class="col-lg-2 col-sm-4 mb-4">
        <img class="img-fluid" src="http://placehold.it/500x300" alt="">
      </div>
      <div class="col-lg-2 col-sm-4 mb-4">
        <img class="img-fluid" src="http://placehold.it/500x300" alt="">
      </div>
      <div class="col-lg-2 col-sm-4 mb-4">
        <img class="img-fluid" src="http://placehold.it/500x300" alt="">
      </div>
      <div class="col-lg-2 col-sm-4 mb-4">
        <img class="img-fluid" src="http://placehold.it/500x300" alt="">
      </div>
      <div class="col-lg-2 col-sm-4 mb-4">
        <img class="img-fluid" src="http://placehold.it/500x300" alt="">
      </div>
      <div class="col-lg-2 col-sm-4 mb-4">
        <img class="img-fluid" src="http://placehold.it/500x300" alt="">
      </div>
    </div>
    -->

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
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>


<!-- Mirrored from blackrockdigital.github.io/startbootstrap-modern-business/about.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 28 Oct 2018 00:35:44 GMT -->
</html>
