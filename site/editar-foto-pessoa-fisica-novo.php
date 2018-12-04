<?php include "inc/header.php"; ?>
        <!-- Page Content -->
        <style type="text/css">
          .form{

          }
          .label-editar{
            font-weight: 500
          }
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
                <!--
                <a href="contact.html" class="list-group-item">Contact</a>
                <a href="portfolio-1-col.html" class="list-group-item">1 Column Portfolio</a>
                <a href="portfolio-2-col.html" class="list-group-item">2 Column Portfolio</a>
                <a href="portfolio-3-col.html" class="list-group-item">3 Column Portfolio</a>
                <a href="portfolio-4-col.html" class="list-group-item">4 Column Portfolio</a>
                <a href="portfolio-item.html" class="list-group-item">Single Portfolio Item</a>
                <a href="blog-home-1.html" class="list-group-item">Blog Home 1</a>
                <a href="blog-home-2.html" class="list-group-item">Blog Home 2</a>
                <a href="blog-post.html" class="list-group-item">Blog Post</a>
                <a href="full-width.html" class="list-group-item">Full Width Page</a>
                <a href="sidebar.html" class="list-group-item active">Sidebar Page</a>
                <a href="faq.html" class="list-group-item">FAQ</a>
                <a href="404.html" class="list-group-item">404</a>
                <a href="pricing.html" class="list-group-item">Pricing Table</a>
                -->
              </div>
            </div>
            <!-- Content Column -->
            <div class="col-lg-6 mb-4" style="background-color: #E9ECEF;color: black">
              <!-- <h2>Section Heading</h2> -->
              <br>
              <?php echo $mensagem; ?>
              <label for="exampleFormControlFile1" class="label-editar">Foto atual</label>
              <div class="circle">
              <?php while ($registro = $resultado->fetch_array()){
                    extract($registro);
                    echo "<img src='../storage/uploads/perfil_pessoa_fisica/{$foto}' alt=''>";
                  } ?>
              </div>
              <br>
              <hr>
              <form method="post" action="" enctype="multipart/form-data">
                <div class="form-group">
                  <label for="exampleFormControlFile1" class="label-editar">Alterar foto de perfil</label>
                  <input type="file" class="form-control-file" name="arquivo" id="exampleFormControlFile1">
                </div>
                <button type="submit" name="btEnviarFoto" class="btn btn-primary" style="width: 20%"><img src="../storage/icons/pessoa-fisica/icon-salvar.png" height="20" alt="Icon salvar"> Enviar</button>
                <!-- <button type="submit" name="btEnviarFoto" value="Salvar" class="btn btn-primary"style="width: 20%">Enviar</button> -->
              </form>
              <br>
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


      </body>


    <script type="text/javascript" >
    </script>
  </html>
