  <?php
  include "inc/header.php";
  include "../app/Load.php";
  $mensagem = "";

  $sessao = new Sessao();
  $sessao->verifica();


  $id = $_GET["id"];
  if($id == 0){
      header("Location: index");
  }else{
      //$pessoafisica = new PessoaFisica($id);
      $dalinstituicao = new InstituicaoDAL();
      $resultado = $dalinstituicao->visualizar($id);
  }

  if($id != $_SESSION["credencial"]["idSessao"]){
     header("Location: editar-pessoa-fisica?id={$_SESSION['credencial']['idSessao']}");
  }

  if(isset($_POST['btEnviarFoto'])){
    if(isset($_FILES['arquivo']['name']) && $_FILES["arquivo"]["error"] == 0)
    {
      /*
      echo "Você enviou o arquivo: <strong>" . $_FILES['arquivo']['name'] . "</strong><br />";
      echo "Este arquivo é do tipo: <strong>" . $_FILES['arquivo']['type'] . "</strong><br />";
      echo "Temporáriamente foi salvo em: <strong>" . $_FILES['arquivo']['tmp_name'] . "</strong><br />";
      echo "Seu tamanho é: <strong>" . $_FILES['arquivo']['size'] . "</strong> Bytes<br /><br />";
      */
      $arquivo_tmp = $_FILES['arquivo']['tmp_name'];
      $nome = $_FILES['arquivo']['name'];


      // Pega a extensao
      $extensao = strrchr($nome, '.');

      // Converte a extensao para mimusculo
      $extensao = strtolower($extensao);

      // Somente imagens, .jpg;.jpeg;.gif;.png
      // Aqui eu enfilero as extesões permitidas e separo por ';'
      // Isso server apenas para eu poder pesquisar dentro desta String
      if(strstr('.jpg;.jpeg;.gif;.png', $extensao))
      {
        // Cria um nome único para esta imagem
        // Evita que duplique as imagens no servidor.
        $novoNome = "foto_in_{$id}" . $extensao;

        // Concatena a pasta com o nome
        $destino = '../storage/uploads/perfil_instituicao/' . $novoNome;

        // tenta mover o arquivo para o destino
        if( @move_uploaded_file( $arquivo_tmp, $destino  ))
        {
          $mensagem = "Arquivo salvo com sucesso";
          #
          $dalinstituicao->alterarFoto($id, "{$novoNome}");
          echo "<meta http-equiv='refresh' content='3;url=instituicao?id={$_SESSION['credencial']['idSessao']}'>";
        }
        else
          $mensagem = "Erro ao salvar o arquivo. Aparentemente você não tem permissão de escrita.<br />";
      }
      else
        $mensagem = "Você poderá enviar apenas arquivos \"*.jpg;*.jpeg;*.gif;*.png\"<br />";
    }
    else
    {
     $mensagem = "Você não enviou nenhum arquivo!";
    }
  }

  ?>
        <!-- Page Content -->
        <style type="text/css">
          .form{

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
              </div>
            </div>
            <!-- Content Column -->
            <div class="col-lg-6 mb-4" style="background-color: #E9ECEF;color: black">
              <!-- <h2>Section Heading</h2> -->
              <br>
              <?php echo $mensagem; ?>
              <form method="post" action="" enctype="multipart/form-data">
                <div class="form-group">
                  <label for="exampleFormControlFile1">Alterar foto da instituição</label>
                  <input type="file" class="form-control-file" name="arquivo" id="exampleFormControlFile1">
                </div>
                <button type="submit" name="btEnviarFoto" class="btn btn-primary"><img src="../storage/icons/instituicao/icon-salvar.png" height="20" alt="Icon salvar"> Atualizar </button>
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
        <script src="vendor/jquery/jquery.min.js"></script>
        <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

      </body>


    <script type="text/javascript" >
    </script>
  </html>
