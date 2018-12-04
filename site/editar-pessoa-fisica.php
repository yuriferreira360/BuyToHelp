<?php include_once "inc/header.php"; ?>
<?php
        include "../app/Load.php";

        $sessao = new Sessao();
        $sessao->verifica();
        $id = $_GET["id"];

        if($id != $_SESSION["credencial"]["idSessao"]){
          echo "<script>window.location.href = 'editar-pessoa-fisica?id={$_SESSION['credencial']['idSessao']}'; </script>";
        }

        $dalpessoa = new PessoaFisicaDAL();
        $resultado = $dalpessoa->visualizar($id);

        # Define mensagem vazia
        $mensagem = "";
        if($_SESSION["credencial"]["primeiroAcesso"] == 1){
            $mensagem = '<div class="alert alert-warning" role="alert">Você precisa preencher as informações do seu perfil para prosseguir</div>';
        }

        if (isset($_POST['btSalvar'])) {

            $nome         = $_POST["inNome"];
            $sobrenome    = $_POST["inSobrenome"];
            $descricao    = $_POST["inDescriaco"];
            $cpf          = $_POST["inCpf"];
            $cep          = $_POST["inCep"];
            $bairro       = $_POST["inBairro"];
            $rua          = $_POST["inRua"];
            $numero       = $_POST["inNumero"];
            $complemento  = $_POST["inComplemento"];
            $uf           = $_POST["inUf"];
            $cidade       = $_POST["inCidade"];
            $foto = "";

              if(empty($nome) || empty($sobrenome) || empty($descricao) || empty($cpf) || empty($cep) || empty($bairro) || empty($rua) || empty($uf) ||empty($cidade)){
                   $mensagem = '<div class="alert alert-danger" role="alert">Você não preencheu todos os campos obrigatórios </div>';
              }else{
                $editPessoaFisica = new PessoaFisica
                (0, $nome, $sobrenome, $descricao, $cpf, $foto, $cep, $rua,
                $bairro, $numero, $complemento, $uf, $cidade);

                $dalpessoa = new PessoaFisicaDAL();
                $dalpessoa->alterar($editPessoaFisica);
                $sessao->alteraPrimeiroAcesso();
                $mensagem = '<div class="alert alert-success" role="alert">Obrigado '.$nome.', perfil atualizado com sucesso!</div>';
                echo "<meta http-equiv='refresh' content='3;url=perfil?id={$_SESSION['credencial']['idSessao']}'>";

            }
        }
        ?>
            <style type="text/css">
              .label-editar{
                font-weight: 500
              }

              .obrigatorio {
                color: red
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
                    <a href="desativar-pessoa-fisica.php?id=<?= $_SESSION['credencial']['idSessao'] ?>" class="list-group-item">Desativar</a>
                  </div>
                </div>
                <!-- Content Column -->
                <div class="col-lg-6 mb-4" style="background-color: #E9ECEF;color: black">
                  <!-- <h2>Section Heading</h2> -->
                  <br>
                  <?php echo $mensagem; ?>
                  <form method="post" action="">
                    <?php
                      while ($registro = $resultado->fetch_array()){
                            extract($registro)
                    ?>
                    <div class="form-group">
                      <label class="label-editar" for="exampleFormControlInput1">Nome <span class="obrigatorio">*</span></label>
                      <input type="text" class="form-control" id="exampleFormControlInput1" name="inNome" value="<?= $nome ?>">
                    </div>

                    <div class="form-group">
                      <label class="label-editar" for="exampleFormControlInput1">Sobrenome <span class="obrigatorio">*</span></label>
                      <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Seu sobrenome" name="inSobrenome" value="<?= $sobrenome ?>">
                    </div>

                    <div class="form-group">
                      <label class="label-editar" for="descricao">Descrição <span class="obrigatorio">*</span></label>
                      <textarea class="form-control" rows="5" id="" maxlength="300" placeholder="Adicione uma breve descrição sobre você ..." name="inDescriaco"><?= $descricao ?></textarea>
                    </div>

                    <div class="form-group">
                      <label class="label-editar" for="exampleFormControlInput1">CPF <span class="obrigatorio">*</span></label>
                      <input type="text" class="form-control" id="cpf" placeholder="Ex: 999.999.999-99" name="inCpf" value="<?= $cpf ?>">
                    </div>

                    <div class="form-group">
                      <label class="label-editar" for="exampleFormControlInput1">CEP <span class="obrigatorio">*</span></label>
                      <input type="text" class="form-control" id="cep" placeholder="Ex: 999999-99" name="inCep" value="<?= $cep ?>">
                    </div>

                    <div class="form-group">
                      <label class="label-editar" for="exampleFormControlInput1">Bairro <span class="obrigatorio">*</span></label>
                      <input type="text" class="form-control" id="bairro" placeholder="Seu bairro" name="inBairro" value="<?= $bairro ?>">
                    </div>

                    <div class="form-group">
                      <label class="label-editar" for="exampleFormControlInput1">Rua <span class="obrigatorio">*</span></label>
                      <input type="text" class="form-control" id="rua" placeholder="Nome da sua rua" name="inRua" value="<?= $rua ?>">
                    </div>

                    <div class="form-group">
                      <label class="label-editar" for="exampleFormControlInput1">Numero <span class="obrigatorio">*</span></label>
                      <input type="text" class="form-control" id="" placeholder="Ex: 999" name="inNumero" value="<?= $numero ?>">
                    </div>

                    <div class="form-group">
                      <label class="label-editar" for="exampleFormControlInput1">Complemento <span class="obrigatorio">*</span></label>
                      <input type="text" class="form-control" id="" placeholder="Ex: Atrás da Faculdade Senac" name="inComplemento" value="<?= $complemento ?>">
                    </div>

                    <div class="form-group">
                      <label class="label-editar" for="exampleFormControlInput1">Estado <span class="obrigatorio">*</span></label>
                      <input type="text" class="form-control" id="uf" placeholder="Insira seu estado" name="inUf" value="<?= $uf ?>">
                    </div>

                    <div class="form-group">
                      <label class="label-editar" for="exampleFormControlInput1">Cidade <span class="obrigatorio">*</span></label>
                      <input type="text" class="form-control" id="cidade" placeholder="Insira sua ciidade" name="inCidade" value="<?= $cidade ?>">
                    </div>
                    <!--
                    <div class="form-group">
                      <label for="exampleFormControlFile1">Foto</label>
                      <input type="file" class="form-control-file" id="exampleFormControlFile1" name="fiFoto">
                    </div>
                    -->
                    <?php
                      }
                    ?>
                    <button type="submit" name="btSalvar" class="btn btn-primary"><img src="../storage/icons/pessoa-fisica/icon-salvar.png" height="20" alt="Icon salvar"> Salvar</button>
                    <!--<input type="submit" name="btSalvar" value="Salvar" class="btn btn-primary"style="width: 20%">-->

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

            <!-- Bootstrap core JavaScript
            <script src="vendor/jquery/jquery.min.js"></script>
            <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
            -->


          </body>


        <script type="text/javascript" >


                $(document).ready(function() {

                    $("#cpf").mask("999.999.999-99");
                    $("#cep").mask("999999-99");


                    function limpa_formulário_cep() {
                        // Limpa valores do formulário de cep.
                        $("#rua").val("");
                        $("#bairro").val("");
                        $("#cidade").val("");
                        $("#uf").val("");
                        $("#ibge").val("");
                    }

                    //Quando o campo cep perde o foco.
                    $("#cep").blur(function() {

                        //Nova variável "cep" somente com dígitos.
                        var cep = $(this).val().replace(/\D/g, '');

                        //Verifica se campo cep possui valor informado.
                        if (cep != "") {

                            //Expressão regular para validar o CEP.
                            var validacep = /^[0-9]{8}$/;

                            //Valida o formato do CEP.
                            if(validacep.test(cep)) {

                                //Preenche os campos com "..." enquanto consulta webservice.
                                $("#rua").val("...");
                                $("#bairro").val("...");
                                $("#cidade").val("...");
                                $("#uf").val("...");
                                $("#ibge").val("...");

                                //Consulta o webservice viacep.com.br/
                                $.getJSON("https://viacep.com.br/ws/"+ cep +"/json/?callback=?", function(dados) {

                                    if (!("erro" in dados)) {
                                        //Atualiza os campos com os valores da consulta.
                                        $("#rua").val(dados.logradouro);
                                        $("#bairro").val(dados.bairro);
                                        $("#cidade").val(dados.localidade);
                                        $("#uf").val(dados.uf);
                                        $("#ibge").val(dados.ibge);
                                    } //end if.
                                    else {
                                        //CEP pesquisado não foi encontrado.
                                        limpa_formulário_cep();
                                        alert("CEP não encontrado.");
                                    }
                                });
                            } //end if.
                            else {
                                //cep é inválido.
                                limpa_formulário_cep();
                                alert("Formato de CEP inválido.");
                            }
                        } //end if.
                        else {
                            //cep sem valor, limpa formulário.
                            limpa_formulário_cep();
                        }
                    });
                });

        </script>

        <!-- Mirrored from blackrockdigital.github.io/startbootstrap-modern-business/sidebar.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 28 Oct 2018 00:35:45 GMT -->
        </html>
