<?php

	include_once "Conexao.php";
	include_once "Sessao.php";

	class UsuarioDAL extends Conexao{
		function __construct(){
			parent::__construct();
		}

		public function cadastrar($usuario){
			$sql = "INSERT INTO usuario (id, email, login, senha, ativo, primeiro_acesso, tipo_usuario_id) values(";
			$sql =	$sql . $usuario->getId() . ",'";
			$sql =	$sql . $usuario->getEmail() . "','";
			$sql =	$sql . $usuario->getLogin() . "','";
			$sql =	$sql . $usuario->getSenha() . "',";
			$sql =	$sql . $usuario->getPrimeiroAcesso() . ",";
			$sql =	$sql . $usuario->getAtivo() . ",";
			$sql =	$sql . $usuario->getTipo() . ")";
			$this->conectar();
			$banco = $this->getBanco();
			if($banco->query($sql)){
				//echo "{$sql}<br>";
				return $banco->insert_id;
			}else{
				return 0;
			}
			//$banco->Desconectar();
		}
		/*
		public function loginPorUsuario($usuario){
			$_SESSION['credencial'] = "";
			$sql = "SELECT * FROM usuario WHERE login = '{$usuario->getLogin()}'

			AND senha = '{$usuario->getSenha()}'";
			echo $sql;
			$this->conectar();
			$banco = $this->getBanco();
			$resultado = $banco->query($sql);
			if($resultado ->num_rows > 0){
				while ($registro = $resultado->fetch_array()) {
					$idSessao 	 		= $registro['id'];
					$loginSessao 		= $registro['login'];
					$emailSessao 		= $registro['email'];
					$senhaSessao 		= $registro['senha'];
					$ativoSessao 		= $registro['ativo'];
					$primeiroAcesso 	= $registro['primeiro_acesso'];
					$tipoUsuarioId  	= $registro['tipo_usuario_id'];
				}
				session_start();
				$_SESSION['credencial'] = array(
				'idSessao' 	 			=> $idSessao,
				'loginSessao' 			=> $loginSessao,
				'emailSessao' 			=> $emailSessao,
				'senhaSessao' 			=> $senhaSessao,
				'ativoSessao' 			=> $ativoSessao,
				'primeiroAcesso' 		=> $primeiroAcesso,
				'tipoUsuarioId' 		=> $tipoUsuarioId);

				$sessao = new Sessao();
				$sessao->primeiroAcesso();
				/*
  			if(!$sessao->primeiroAcesso()){
					header('Location: index');
				}

			}else{
				return 0;
			}
		}
		*/

		public function loginPorEmail($usuario){
			$_SESSION['credencial'] = "";
			$sql = "SELECT * FROM usuario WHERE email = '{$usuario->getEmail()}'
			AND senha = '{$usuario->getSenha()}'";
			$this->conectar();
			$banco = $this->getBanco();
			$resultado = $banco->query($sql);
			if($resultado ->num_rows > 0){
				while ($registro = $resultado->fetch_array()) {
					$idSessao 	 		= $registro['id'];
					$loginSessao 		= $registro['login'];
					$emailSessao 		= $registro['email'];
					$senhaSessao 		= $registro['senha'];
					$ativoSessao 		= $registro['ativo'];
					$primeiroAcesso 	= $registro['primeiro_acesso'];
					$tipoUsuarioId  	= $registro['tipo_usuario_id'];
				}
				session_start();
				$_SESSION['credencial'] = array(
				'idSessao' 	 			=> $idSessao,
				'loginSessao' 			=> $loginSessao,
				'emailSessao' 			=> $emailSessao,
				'senhaSessao' 			=> $senhaSessao,
				'ativoSessao' 			=> $ativoSessao,
				'primeiroAcesso' 		=> $primeiroAcesso,
				'tipoUsuarioId' 		=> $tipoUsuarioId);

				$sessao = new Sessao();
  			$sessao->primeiroAcesso();
			}else{
				return 0;
			}
		}

		public function loginPorUsuario($usuario){
			$_SESSION['credencial'] = "";
			$sql = "SELECT * FROM usuario WHERE login = '{$usuario->getLogin()}'
			AND senha = '{$usuario->getSenha()}'";
			$this->conectar();
			$banco = $this->getBanco();
			$resultado = $banco->query($sql);
			if($resultado -> num_rows > 0){
				while ($registro = $resultado->fetch_array()) {
					$idSessao 	 		= $registro['id'];
					$loginSessao 		= $registro['login'];
					$emailSessao 		= $registro['email'];
					$senhaSessao 		= $registro['senha'];
					$ativoSessao 		= $registro['ativo'];
					$primeiroAcesso 	= $registro['primeiro_acesso'];
					$tipoUsuarioId  	= $registro['tipo_usuario_id'];
				}
				session_start();
				$_SESSION['credencial'] = array(
				'idSessao' 	 			=> $idSessao,
				'loginSessao' 			=> $loginSessao,
				'emailSessao' 			=> $emailSessao,
				'senhaSessao' 			=> $senhaSessao,
				'ativoSessao' 			=> $ativoSessao,
				'primeiroAcesso' 		=> $primeiroAcesso,
				'tipoUsuarioId' 		=> $tipoUsuarioId);

				$sessao = new Sessao();
  			$sessao->primeiroAcesso();
			}else{
				return 0;
			}
		}

		public function desativar($id){
				$sql = "UPDATE usuario SET ativo = 0 WHERE id = {$id}";
				$this->conectar();
				$banco = $this->getBanco();
				$banco->query($sql);
				//header("Location: aaa.php");
		}

		public function excluir($id){
				$sql = "DELETE FROM usuario WHERE id = {$id}";
				$this->conectar();
				$banco = $this->getBanco();
				$banco->query($sql);
		}
}
