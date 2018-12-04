  <?php
    include "inc/header.php";
    include "../app/Load.php";

    $sessao = new Sessao();
    $sessao->verifica();

    $id = $_GET["id"];

    if($id != $_SESSION["credencial"]["idSessao"]){
      header("Location: editar-instituicao?id={$_SESSION['credencial']['idSessao']}");
    }

    $daltipoinstituicao = new TipoInstituicaoDAL();
    $resultado = $daltipoinstituicao->visualizarTodos();
    /*
    $resultado2 = $daltipoinstituicao->visualizarTodos();
    $resultado3 = $daltipoinstituicao->visualizarTodos();
    */

    # Define mensagem vazia
    $mensagem = "";
    if($_SESSION["credencial"]["primeiroAcesso"] == 1){
        $mensagem = '<div class="alert alert-warning" role="alert">Você precisa selecionar ao menos uma categoria</div>';
    }

    if (isset($_POST['btProxima'])) {

        $categoria = $_POST["seCategoria"];

        if(empty($categoria)){
            $mensagem = '<div class="alert alert-danger" role="alert">Você não selecionou nenhuma categoria</div>';
        }else{
            $categoria = explode(",", $categoria);
            $novaCategoria = new TipoInstituicao($categoria[0],"");
            $daltipoinstituicao = new TipoInstituicaoDAL();
            if($daltipoinstituicao->cadastrar($novaCategoria) > 0){
                $mensagem = '<div class="alert alert-success" role="alert">Categoria <b>' .$categoria[1]. '</b> adicionada</div>';
            }
        }

    }else if(isset($_POST['btSalvar'])){
        //echo '<script>alert("Teste teste teste")</script>';
        $mensagem = '<div class="alert alert-success" role="alert">Alterções cocnluidas</div>';
        $sessao->alteraPrimeiroAcesso();
        sleep(3);
        echo "<script>window.location.href = 'instituicao?id={$_SESSION['credencial']['idSessao']}'; </script>";
        //header("Location: instituicao?id={$_SESSION["credencial"]["idSessao"]}");
    }
  ?>
        <!-- Page Content -->
        <style type="text/css">
          .form{

          }
        </style>
        <div class="container">

          <!-- Page Heading/Breadcrumbs -->
          <h1 class="mt-4 mb-3">Configurações da Instituição
            <!-- <small>Subheading</small> -->
          </h1>

          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="index-2.html">Configurações</a>
            </li>
            <li class="breadcrumb-item active">Instituição</li>
            <li class="breadcrumb-item active">Categorias</li>
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
              <div class="container">
              <!-- <h2>Section Heading</h2> -->
              <br>
              <?php echo $mensagem; ?>
              <?php
              $atuais = $daltipoinstituicao->visualizarPorId($id);
              echo '<table style="width:100%">
                        <tr>
                        </tr>
                        <tr>
                          <td><b>Categoria</b></td>
                          <td><b>Opções</b></td>
                        </tr>
                        <tr>';
              while ($tipos = $atuais->fetch_array()){
                echo      '<td>'.$tipos["nome"].'</td>
                          <th style"text-align:right"><a href="excluir-tipo-instituicao.php?id='.$tipos[0].'"><img src="../storage/icons/instituicao/icon-remove.png" alt="" style="height:20px"></a></span></th>
                          </tr>';

              }
              echo '</table>';
              ?>



              <form method="post" action="" style="margin-top: 2%">

                <label for="sel1">Selecione uma Categoria:</label>
                  <select class="form-control" id="sel1" name="seCategoria" style="width: 40%">
                  <option value="0"> -- Selecione</option>
                  <?php
                    while ($registro = $resultado->fetch_array()){
                    extract($registro);
                      echo "<option value='{$id},{$nome}'>{$nome}</option>";
                    }
                  ?>
                  </select>
                <br>
                <!--<input type="submit" name="btProxima" value="Próxima" class="btn btn-warning"> -->
                <button type="submit" name="btProxima" class="btn btn-warning" style="color:white"><img src="../storage/icons/instituicao/icon-mais.png" height="20" alt="Icon salvar"> Adicionar</button>
                <button type="submit" name="btSalvar" class="btn btn-primary"><img src="../storage/icons/instituicao/icon-salvar.png" height="20" alt="Icon salvar"> Salvar</button>
                <!--
                <input type="submit" name="btSalvar" value="Concluir" class="btn btn-primary">
                -->
              </form>
              <br>
            </div>
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
