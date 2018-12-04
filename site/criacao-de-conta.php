<?php
# Carrega autoload
include "../app/Load.php";

# Define mensagem vazia
$mensagem = "";


if (isset($_POST['btCriarConta'])) {

    if (isset($_POST['rdTipo'])) {
        $mensagem = "<div class='alert alert-danger' role='alert'>Você não preencheu todos os campos!</div>";
    }

    $email = $_POST["inEmail"];
    $login = $_POST["inUser"];
    $senha = $_POST["inPass"];
    $tipo  = $_POST["rdTipo"];


    if(empty($email) || empty($login) || empty($senha) || empty($tipo)){
        # Caso não tenha reenchido algum dos campos
        $tipo = "pf";
        $mensagem = "<div class='alert alert-danger' role='alert'>Você não preencheu todos os campos!</div>";
    }else{
        # Caso tenha preenchido tudo
        $minSenha = strlen($senha);
        if($minSenha < 8){
          $mensagem = "<div class='alert alert-danger' role='alert'>Sua senha precisa ter no minimo 8 caracteres misturando letra e numeros!</div>";
        }else{
          #Efetua cadastro e cria hash sobre senha
          if($tipo == 1){
            $senha = md5(base64_encode($senha));

            $novousuario = new Usuario(0 ,$email, $login, $senha, 1, 1, $tipo);
            $dalusuario = new UsuarioDAL();
            $usuarioId = $dalusuario->cadastrar($novousuario);

            $novapessoa = new PessoaFisica(0, $login,"","","","profile_default.jpg","","","","","","","", $usuarioId);
            $dalpessoa = new PessoaFisicaDAL();
            $dalpessoa->cadastrar($novapessoa);

          }else{
            $senha = md5(base64_encode($senha));

            $novousuario = new Usuario(0 ,$email, $login, $senha, 1, 1, $tipo);
            $dalusuario = new UsuarioDAL();
            $usuarioId = $dalusuario->cadastrar($novousuario);

            $novainstituicao =
            new Instituicao(0, $login,"","","","profile_default.jpg","","","","","","","", $usuarioId);
            $dalinstituicao = new InstituicaoDAL();
            $dalinstituicao->cadastrar($novainstituicao);
          }
        }
    }
}
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
          <h4 class="form-signin-heading" class="preto-claro" style="text-align: center">Criação de Conta</h4>
          <hr>

          <?php echo $mensagem; ?>

          <b class="label-login-input">E-mail:</b><br>
          <input type="email" class="form-control" name="inEmail" placeholder="seunome@exemplo.com" autofocus="" maxlength="35" />

          <br>

          <b class="label-login-input">Usuário:</b><br>
          <input type="text" class="form-control" name="inUser" placeholder="Crie um login" maxlength="35"/>

          <br>

          <b class="label-login-input">Senha:</b><br>
          <input type="password" class="form-control" name="inPass" placeholder="Senha mínima de 8 caracteres" maxlength="35"/>

          <br>

          <b class="label-login-input">Tipo:</b><br>
          <div>
            <input type="radio" name="rdTipo" value="1" id="pf" checked="">
            <label for="pf">Pessoa Física</label>
          </div>
          <div>
            <input type="radio" name="rdTipo" value="2" id="in">
            <label for="in">Instituição</label>
          </div>
          <div id="log"></div>

          <button class="btn btn-lg btn-primary btn-block" type="submit" name="btCriarConta">Criar Conta</button>
          <!-- <b class="preto-claro">Já possui cadastro? <a href="#">clique aqui</a> para cadastra-se!</b> -->
        </form>
      </div>
</body>
<script>
        $( "input" ).on( "click", function() {
          if($( "input:checked" ).val() == "1"){
              $( "#log" ).html("<div class='alert alert-warning alert-dismissible fade show' role='alert'>Pessoa físicas podem relizar doações de produtos e/ou participar de leilões<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>");
          }else if($( "input:checked" ).val() == "2"){
              $( "#log" ).html("<div class='alert alert-warning alert-dismissible fade show' role='alert'>Instituições podem receber doações de produtos e relizar leilões com produtos<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>");
          }
        });
</script>
</html>
