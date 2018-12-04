	<?php
	class Conexao {
		private $servidor;
		private $usuario;
		private $senha;
		private $nomeBanco;
		private $banco;
		
		function __construct($servidor = "localhost",$usuario = "root",$senha = "",$nomeBanco = "buytohelp"){
			$this->SetServidor($servidor);
			$this->SetUsuario($usuario);
			$this->SetSenha($senha);
			$this->SetNomeBanco($nomeBanco);
			$this->Conectar();
		}
		
		public function SetServidor($valor){
			$this->servidor = $valor;
		}
		public function GetServidor(){
			return $this->servidor;
		}
		
		public function SetUsuario($valor){
			$this->usuario = $valor;
		}
		public function GetUsuario(){
			return $this->usuario;
		}
		
		public function SetSenha($valor){
			$this->senha = $valor;
		}	
		public function GetSenha(){
			return $this->senha;
		}
		
		public function SetNomeBanco($valor){
			$this->nomeBanco = $valor;
		}
		
		public function GetNomeBanco(){
			return $this->nomeBanco;
		}
		
		public function Conectar()
		{
			$this->banco = new mysqli(
				$this->GetServidor(),
				$this->GetUsuario(),
				$this->GetSenha(),
				$this->GetNomeBanco()
			);
			$this->banco->set_charset("utf8");
			if ($this->banco->connect_error) {
	    		die('Erro de conexão (' . $this->banco->connect_errno . '): '
	            . $this->banco->connect_error);
			}
		}
		
		public function GetBanco()
		{
			return $this->banco;	
		}
		
		public function Desconectar()
		{
			$this->banco->close();
		}
	}
	?>