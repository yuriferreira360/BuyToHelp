<?php 
# Carrega autoload
include "../app/Load.php";
?>

<!DOCTYPE>
<html >
<head>
    <title></title>

      <link rel="stylesheet" type="text/css" href="css/login-style.css">
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

      <style type="text/css">
        
      </style>
    </head>
    <body>
        <div class="wrapper">
        <form class="form-signin" method="post" action="">       
          <h4 class="form-signin-heading" class="preto-claro" style="text-align: center">Editar Perfil</h4>
          <hr>

          <?php //echo $mensagem; ?>

          <b class="label-login-input">Nome completo:</b><br>
          <input type="text" class="form-control" name="inEmail" placeholder="Seu nome e sobrenome" autofocus="" maxlength="35" />

          <br>

          <b class="label-login-input">CPF:</b><br>
          <input type="text" class="form-control" name="inPass" placeholder="" maxlength="35"/>

          <br>

          <b class="label-login-input">CEP:</b><br>
          <input type="text" class="form-control" name="inEmail" placeholder="" autofocus="" maxlength="35" id="cep" />

          <br>

          <b class="label-login-input">Bairro:</b><br>
          <input type="text" class="form-control" name="inUser" placeholder="" maxlength="35" id="bairro"/>

          <br>

          <b class="label-login-input">Rua:</b><br>
          <input type="text" class="form-control" name="inPass" placeholder="" maxlength="35" id="rua"/>
          <br>

          <b class="label-login-input">Complemento:</b><br>
          <input type="text" class="form-control" name="inPass" placeholder="" maxlength="35" id="complemento"/>

          <br>

          <b class="label-login-input">Complemento:</b><br>
          <input type="text" class="form-control" name="inPass" placeholder="" maxlength="35" id="complemento"/>
          <br>

          <b class="label-login-input">UF:</b><br>
          <input type="text" class="form-control" name="inPass" placeholder="" maxlength="35" id="uf" width="" />
          <br>

          <b class="label-login-input">Cidade:</b><br>
          <input type="text" class="form-control" name="inPass" placeholder="" maxlength="35" id="cidade"/>
          <br>

          <b class="label-login-input">Foto:</b><br>

          <button class="btn btn-lg btn-primary btn-block" type="submit" name="btCriarConta">Concluir</button>   
          <!-- <b class="preto-claro">Já possui cadastro? <a href="#">clique aqui</a> para cadastra-se!</b> -->
        </form>
      </div>
</body>
<script src="https://code.jquery.com/jquery-3.2.1.min.js"
            integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
            crossorigin="anonymous"></script>

    <!-- Adicionando Javascript -->
    <script type="text/javascript" >

        $(document).ready(function() {

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
</html>

