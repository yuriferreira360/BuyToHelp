  <?php
  //include_once "Conexao.php";
  /*
   * To change this license header, choose License Headers in Project Properties.
   * To change this template file, choose Tools | Templates
   * and open the template in the editor.
   */

  /**
   * Description of Session
   *
   * @author Yuri Ferreira
   */
  class Sessao extends Conexao{
      //put your code here
      function __construct(){
          parent::__construct();
      }


      public function verifica(){
          if(!isset($_SESSION['credencial'])){
            echo "<script>window.location.href='login'</script>";
          	//return header('Location: login');
          }
      }

      public function destroi(){
      	  session_destroy();
          return header("Location: index");
      }

      public function primeiroAcesso(){
          if($_SESSION["credencial"]["primeiroAcesso"] == 1){
              if($_SESSION["credencial"]["tipoUsuarioId"] == 1){
                  return header("Location: editar-pessoa-fisica?id={$_SESSION["credencial"]["idSessao"]}");
              }else{
                  return header("Location: editar-instituicao?id={$_SESSION["credencial"]["idSessao"]}");
              }
          }else{
            header("Location: index");
          }

      }

      public function alteraPrimeiroAcesso(){
          $sql = "UPDATE usuario SET primeiro_acesso = 0 WHERE id = {$_SESSION["credencial"]["idSessao"]}";
          $this->conectar();
          $banco = $this->getBanco();
          if($banco->query($sql)){
               $_SESSION["credencial"]["primeiroAcesso"] = 0;
          }
      }
  }
