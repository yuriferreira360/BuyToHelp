    <?php
    # Carrega autoload
    include "../app/Load.php";

    # Define mensagem vazia
    $mensagem = "";

    if (isset($_POST['btEntrar'])) {

        $login           = $_POST["inLogin"];
        $senha           = $_POST["inSenha"];
        # Verifica se o usuario quer manter-se conectado
        if(isset($_POST["ckManterConectado"])){
            $manterConectado = 1;
        }else{
            $manterConectado = 0;
        }


        if(empty($login) || empty($senha)){
            # Caso não tenha reenchido algum dos campos
            $mensagem = "<div class='alert alert-danger' role='alert'>Você não preencheu todos os campos!</div>";
        }else{
            # Caso  tenha preenchido os campos
            $senha = md5(base64_encode($senha));

            if (filter_var($login, FILTER_VALIDATE_EMAIL)) {
                # Invoca login por e-mail
                $usuario = new Usuario(0, $login, "", $senha, 0, 0 ,0);
                $dalusuario = new UsuarioDAL();
                $resultado = $dalusuario->loginPorEmail($usuario);
                if($resultado == 1){
                  $mensagem = "<div class='alert alert-danger' role='alert'>Usuario e/ou senha inválidos (<a href='#'>Ajuda</a>)</div>";
                }
            } else {
                # Invoca login por nome de usuario
                $usuario = new Usuario(0, "", $login, $senha, 0, 0 ,0);
                $dalusuario = new UsuarioDAL();
                $resultado = $dalusuario->loginPorUsuario($usuario);
                if($resultado == 0){
                  $mensagem = "<div class='alert alert-danger' role='alert'>Usuario e/ou senha inválidos (<a href='#'>Ajuda</a>)</div>";
                }
            }
        }
    }
    ?>

    <!DOCTYPE html>
    <html>
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
              <h4 class="form-signin-heading" class="preto-claro" style="text-align: center">Efetuar Login</h4>
              <hr>
              <?php echo $mensagem; ?>
              <b class="label-login-input">E-mail ou Usuário:</b><br>
              <input type="text" class="form-control" name="inLogin" placeholder="Seu email ou login de usuário" autofocus="">

              <br>

              <b class="label-login-input">Senha:</b><br>
              <input type="password" class="form-control" name="inSenha" placeholder="Sua senha" />

              <br>

              <div class="form-check">
              <label"><input type="checkbox" class="form-check-input" name="ckManterConectado" value="1">Matenha-me conectado</label>
              <br>


              <!--
        			<input class="form-check-input" type="checkbox" value="Mantenha-me conectado" id="defaultCheck1" style="text-align: ">

            			<label class="form-check-label" for="defaultCheck1">
            			    Mantenha-me conectado
            			</label>
        		  </div>
             -->

    		      <br>
              <button class="btn btn-lg btn-primary btn-block" type="submit" name="btEntrar">Entrar</button>
              <br>
              <a href="criacao-de-conta" class="link-criar-conta">Criar Conta</a>
            </form>

          </div>

          <script>

          </script>
    </body>
    </html>
