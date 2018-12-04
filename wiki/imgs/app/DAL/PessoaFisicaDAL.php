<?php

include_once "Conexao.php";

class PessoaFisicaDAL extends Conexao{

		function __construct(){
			parent::__construct();
		}

		public function cadastrar($pessoaFisica){
			$sql = "INSERT INTO pessoa_fisica (id, nome, sobrenome, descricao, cpf, foto, cep, rua, bairro, numero, complemento, uf, cidade, usuario_id) values(";
			$sql =	$sql . $pessoaFisica->getId() . ",'";
			$sql =	$sql . $pessoaFisica->getNome() . "','";
			$sql =	$sql . $pessoaFisica->getSobrenome() . "','";
			$sql =	$sql . $pessoaFisica->getDescricao() . "','";
			$sql =	$sql . $pessoaFisica->getCpf() . "','";
			$sql =	$sql . $pessoaFisica->getFoto() . "','";
			$sql =	$sql . $pessoaFisica->getCep() . "','";
			$sql =	$sql . $pessoaFisica->getRua() . "','";
			$sql =	$sql . $pessoaFisica->getBairro() . "','";
			$sql =	$sql . $pessoaFisica->getNumero() . "','";
			$sql =	$sql . $pessoaFisica->getComplemento() . "','";
			$sql =	$sql . $pessoaFisica->getUf() . "','";
			$sql =	$sql . $pessoaFisica->getCidade() . "',";
			$sql =	$sql . $pessoaFisica->getUsuarioId() . ")";
			$this->conectar();
			$banco = $this->getBanco();
			if($banco->query($sql)){
				return header("Location: criacao-de-conta-sucess");
			}else{
				return 0;
			}

		}

		public function alterar($pessoaFisica){
			$sql = "UPDATE pessoa_fisica
					SET
					nome = '{$pessoaFisica->getNome()}',
					sobrenome = '{$pessoaFisica->getSobrenome()}',
					descricao = '{$pessoaFisica->getDescricao()}',
					cpf = '{$pessoaFisica->getCpf()}',
					cep = '{$pessoaFisica->getCep()}',
					bairro = '{$pessoaFisica->getBairro()}',
					rua = '{$pessoaFisica->getRua()}',
					numero = '{$pessoaFisica->getNumero()}',
					complemento = '{$pessoaFisica->getComplemento()}',
					uf = '{$pessoaFisica->getUf()}',
					cidade = '{$pessoaFisica->getCidade()}'
					WHERE usuario_id = {$_SESSION['credencial']['idSessao']}";
					$this->conectar();
					$banco = $this->getBanco();
					$banco->query($sql);
					//$banco->query("SET NAMES utf8");
					/*
					if($banco->query($sql)){
						return header("Location: perfil?id=16");
					}else{
						return 0;
					}
					*/
		}

		public function alterarFoto($id, $foto){
					$sql =  "UPDATE pessoa_fisica
							SET foto = '{$foto}'
							WHERE usuario_id={$id}";
					$this->conectar();
					$banco = $this->getBanco();
					$banco->query($sql);
		}

		public function visualizar($id){
			$sql = "SELECT * FROM pessoa_fisica INNER JOIN usuario ON pessoa_fisica.usuario_id = usuario.id WHERE usuario_id = {$id} LIMIT 1";
			//$sql = "SELECT * FROM pessoa_fisica WHERE usuario_id = {$id}";
			$this->conectar();
			$banco = $this->getBanco();
			$retorno = $banco->query($sql);
			return $retorno;
		}

		public function visualizarFoto($id){
			$sql = "SELECT foto FROM pessoa_fisica INNER JOIN usuario ON pessoa_fisica.usuario_id = usuario.id WHERE usuario_id = {$id} LIMIT 1";
			$this->conectar();
			$banco = $this->getBanco();
			$retorno = $banco->query($sql);
			return $retorno;
		}

		public function excluir($id){
			$sql = "DELETE FROM pessoa_fisica WHERE usuario_id = {$id}";
			$this->conectar();
			$banco = $this->getBanco();
			$banco->query($sql);
		}
}
