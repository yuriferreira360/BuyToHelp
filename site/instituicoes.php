<?php
include "inc/header.php";
include "../app/Load.php";

$dalinstituicao = new InstituicaoDAL();
$instituicoes = $dalinstituicao->visualizarTodas(0);
?>



    <!-- Page Content -->
    <div class="container">

      <!-- Page Heading/Breadcrumbs -->
      <h1 class="mt-4 mb-3">Instituições
        <!--<small>Subheading</small>-->
      </h1>

      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="index.php">Home</a>
        </li>
        <li class="breadcrumb-item active">Instituições</li>
      </ol>

      <div class="row">

        <!-- Blog Entries Column -->
        <div class="col-md-8">
          <?php
            foreach ($instituicoes as $in => $instituicao) {
              // code...
              extract($instituicao);

          ?>
          <!-- Blog Post -->
          <div class="card mb-4">
            <div class="circle">
              <img class="card-img-top" src="../storage/uploads/perfil_instituicao/<?= $foto ?>" alt="Card image cap">
            </div>
            <div class="card-body">
              <h2 class="card-title"><?= $nome_fantasia ?></h2>
              <p class="card-text"><?= $descricao ?></p>
              <a href="instituicao?id=<?= $id ?>" class="btn btn-primary">Leia Mais &rarr;</a>
            </div>
            <!--
            <div class="card-footer text-muted">
              Posted on January 1, 2017 by
              <a href="#">Start Bootstrap</a>
            </div>
            -->
          </div>
          <?php
            }
          ?>

          <!-- Pagination
          <ul class="pagination justify-content-center mb-4">
            <li class="page-item">
              <a class="page-link" href="#">&larr; Older</a>
            </li>
            <li class="page-item disabled">
              <a class="page-link" href="#">Newer &rarr;</a>
            </li>
          </ul>
          -->

        </div>

        <!-- Sidebar Widgets Column -->
        <div class="col-md-4">

          <!-- Search Widget -->
          <div class="card mb-4">
            <h5 class="card-header">Pesquisar</h5>
            <div class="card-body">
              <div class="input-group">
                <input type="text" class="form-control" placeholder="Pesquisar por...">
                <span class="input-group-btn">
                  <button class="btn btn-secondary" type="button">Go</button>
                </span>
              </div>
            </div>
          </div>

          <!-- Categories Widget -->
          <div class="card my-4">
            <h5 class="card-header">Categorias</h5>
            <div class="card-body">
              <div class="row">
                <div class="col-lg-6">
                  <ul class="list-unstyled mb-0">
                    <li>
                      <a href="#">Web Design</a>
                    </li>
                    <li>
                      <a href="#">HTML</a>
                    </li>
                    <li>
                      <a href="#">Freebies</a>
                    </li>
                  </ul>
                </div>
                <div class="col-lg-6">
                  <ul class="list-unstyled mb-0">
                    <li>
                      <a href="#">JavaScript</a>
                    </li>
                    <li>
                      <a href="#">CSS</a>
                    </li>
                    <li>
                      <a href="#">Tutorials</a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>

          <!-- Side Widget
          <div class="card my-4">
            <h5 class="card-header">Side Widget</h5>
            <div class="card-body">
              You can put anything you want inside of these side widgets. They are easy to use, and feature the new Bootstrap 4 card containers!
            </div>
          </div>
          -->

        </div>

      </div>
      <!-- /.row -->

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


<!-- Mirrored from blackrockdigital.github.io/startbootstrap-modern-business/blog-home-1.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 28 Oct 2018 00:35:45 GMT -->
</html>
