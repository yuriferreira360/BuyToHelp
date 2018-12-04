    <?php
      //echo basename($_SERVER['PHP_SELF']);
      //echo $_SERVER['PHP_SELF'];
      include "inc/header.php";
      include "../app/Load.php";

      $id = $_GET["id"];
      if($id == 0){
          header("Location: index.php");
      }else{
          //$pessoafisica = new PessoaFisica($id);
          $dalpessoafisica = new PessoaFisicaDAL();
          $resultado = $dalpessoafisica->visualizar($id);
      }

      if(empty($_SESSION['credencial'])){
        $existeSessao = 0;
      }else{
        $existeSessao = 1;
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
            height: 8.5%
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
                <?php
                if($existeSessao == 1 ){
                if($id == $_SESSION['credencial']['idSessao']){
                  echo "<a href='editar-foto-pessoa-fisica?id={$_SESSION['credencial']['idSessao']}'><img class='info' src='../storage/icons/pessoa-fisica/icon-edita.png' style='height: 20px;float:'></a>";
                }}
                ?>
                <div class="circle">
                <?php
                    echo "<img class='' src='../storage/uploads/perfil_pessoa_fisica/{$foto}' alt=''>";
                ?>
                </div>
              </div>
              <div class="col-lg-6" style="margin-left: -10px">
                <h2><?php echo "{$nome} {$sobrenome} ";
                if($existeSessao == 1){
                if($id == $_SESSION['credencial']['idSessao']){
                  echo "<a href='editar-pessoa-fisica?id={$_SESSION['credencial']['idSessao']}'><img class='info' src='../storage/icons/pessoa-fisica/icon-edita.png' style='height: 20px'></a>";
                }}
                //<a href='editar-pessoa-fisica?id={$_SESSION['credencial']['idSessao']}'><img class='info' src='../storage/icons/pessoa-fisica/icon-edita.png' style='height: 28px'></a>";
                ?></h2>
                <h5></h5>
                <hr>
                <b></b>
                <p><?php echo "{$descricao}"; ?></p>
                <b><img class="info" src="../storage/icons/pessoa-fisica/icon-email.png" alt=""></b> <?php echo "{$email}"; ?>
                <br>
                <b><img class="info" src="../storage/icons/pessoa-fisica/icon-localidade.png" alt=""></b> <?php echo "{$cidade}, {$uf}"; ?>
                <?php
                  }
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

        </body>


      <!-- Mirrored from blackrockdigital.github.io/startbootstrap-modern-business/about.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 28 Oct 2018 00:35:44 GMT -->
      </html>
