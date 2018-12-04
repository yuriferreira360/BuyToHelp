  <?php
  include "inc/header.php";
  include_once "../app/Load.php";

  $dalinstituicao = new InstituicaoDAL();
  $instituicoes = $dalinstituicao->visualizarTodas(3);
  ?>

        <header>
          <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
              <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
              <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
              <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner" role="listbox">
              <!-- Slide One - Set the background image for this slide in the line below -->
              <div class="carousel-item active" style="background-image: url('https://www.desktopbackground.org/download/1920x1080/2014/12/23/875959_high-resolution-happy-family-1920-1080-wallpapers-full-size_1920x1080_h.jpg')">
                <div class="carousel-caption d-none d-md-block">
                  <h3>Primeiro Slide</h3>
                  <p>Descrição do primeiro slide.</p>
                </div>
              </div>
              <!-- Slide Two - Set the background image for this slide in the line below -->
              <div class="carousel-item" style="background-image: url('https://www.techicy.com/wp-content/uploads/2014/11/Childrens-Day-Greetings-and-hd-Wallpapers-8.jpg')">
                <div class="carousel-caption d-none d-md-block">
                  <h3>Segundo Slide</h3>
                  <p>Descrição do segundo slide.</p>
                </div>
              </div>
              <!-- Slide Three - Set the background image for this slide in the line below -->
              <div class="carousel-item" style="background-image: url('https://www.desktopbackground.org/download/1920x1080/2014/12/23/875959_high-resolution-happy-family-1920-1080-wallpapers-full-size_1920x1080_h.jpg')">
                <div class="carousel-caption d-none d-md-block">
                  <h3>Terceiro Slide</h3>
                  <p>Descrição do segundo slide.</p>
                </div>
              </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>
          </div>
        </header>
        <!-- Page Content -->
        <div class="container">
          <br>
          <h2 style="text-align:center">Novas instituições</h2>
          <br>

          <!-- Marketing Icons Section -->
          <div class="row">
          <?php
          foreach ($instituicoes as $i => $instituicao) {
            extract($instituicao);
            //echo $nome_fantasia;
          ?>
            <div class="col-lg-4 mb-4">
              <div class="card h-100">
                <h4 class="card-header" style=""><?= $nome_fantasia ?></h4>
                <div class="card-body">
                  <div class="circle">
                      <img src="../storage/uploads/perfil_instituicao/<?= $foto ?>" alt="">
                  </div>
                  <p class="card-text"><?= $descricao ?></p>
                </div>
                <div class="card-footer">
                  <a href="instituicao?id=<?= $usuario_id ?>" class="btn btn-primary">Leia mais</a>
                </div>
              </div>
            </div>
            <?php } ?>

          </div>
          <h4 style="text-align:center"><a href="instituicoes.php">Ver todas<a/></h4>
          <!-- /.row -->

          <!-- Portfolio Section -->
            <br>
            <h2 style="text-align:center">Capanhas para você apoiar</h2>
            <br>

          <div class="row">
            <div class="col-lg-4 col-sm-6 portfolio-item">
              <div class="card h-100">
                <a href="#"><img class="card-img-top" src="http://placehold.it/700x400" alt=""></a>
                <div class="card-body">
                  <h4 class="card-title">
                    <a href="#">Capanha Um</a>
                  </h4>
                  <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet numquam aspernatur eum quasi sapiente nesciunt? Voluptatibus sit, repellat sequi itaque deserunt, dolores in, nesciunt, illum tempora ex quae? Nihil, dolorem!</p>
                </div>
              </div>
            </div>
            <div class="col-lg-4 col-sm-6 portfolio-item">
              <div class="card h-100">
                <a href="#"><img class="card-img-top" src="http://placehold.it/700x400" alt=""></a>
                <div class="card-body">
                  <h4 class="card-title">
                    <a href="#">Capanha Dois</a>
                  </h4>
                  <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam viverra euismod odio, gravida pellentesque urna varius vitae.</p>
                </div>
              </div>
            </div>
            <div class="col-lg-4 col-sm-6 portfolio-item">
              <div class="card h-100">
                <a href="#"><img class="card-img-top" src="http://placehold.it/700x400" alt=""></a>
                <div class="card-body">
                  <h4 class="card-title">
                    <a href="#">Capanha Três</a>
                  </h4>
                  <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quos quisquam, error quod sed cumque, odio distinctio velit nostrum temporibus necessitatibus et facere atque iure perspiciatis mollitia recusandae vero vel quam!</p>
                </div>
              </div>
            </div>
          </div>
          <!-- /.row -->
          <h4 style="text-align:center"><a href="instituicoes.php">Ver todas<a/></h4>
          <br>

          <!-- Features Section -->
          <h2 style="text-align:center">Como funciona</h2>
          <br>
          <div class="row">
            <div class="col-lg-6">

              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corporis, omnis doloremque non cum id reprehenderit</p>
              <ul>
                <li>
                  <strong>Bootstrap v4</strong>
                </li>
                <li>Lorem</li>
                <li>Ipsum</li>
                <li>Dolor</li>
                <li>Sit</li>
              </ul>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corporis, omnis doloremque non cum id reprehenderit, quisquam totam aspernatur tempora minima unde aliquid ea culpa sunt. Reiciendis quia dolorum ducimus unde.</p>
            </div>
            <div class="col-lg-6">
              <img class="img-fluid rounded" src="http://placehold.it/700x450" alt="">
            </div>
          </div>
          <!-- /.row -->

          <hr>

          <!-- Call to Action Section -->
          <div class="row mb-4">
            <div class="col-md-8">
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Molestias, expedita, saepe, vero rerum deleniti beatae veniam harum neque nemo praesentium cum alias asperiores commodi.</p>
            </div>
            <div class="col-md-4">
              <a class="btn btn-lg btn-secondary btn-block" href="#">Entre em contato</a>
            </div>
          </div>

        </div>
        <!-- /.container -->

        <!-- Footer -->
        <footer class="py-5 bg-dark">
          <div class="container">
            <p class="m-0 text-center text-white">Trabalho de Conclusão de Curso &copy; Faculdade Senac 2018</p>
          </div>
          <!-- /.container -->
        </footer>

        <!-- Bootstrap core JavaScript -->


      </body>


    <!-- Mirrored from blackrockdigital.github.io/startbootstrap-modern-business/ by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 28 Oct 2018 00:35:43 GMT -->
    </html>
