<?php

include_once "Conexao.php";

class InstituicaoDAL extends Conexao{

		function __construct(){
			parent::__construct();
		}

		public function cadastrar($instituicao){
			$sql = "INSERT INTO instituicao (id, razao_social, nome_fantasia, descricao, cnpj, foto, cep, rua, bairro, numero, complemento, uf, cidade, usuario_id) values(";
			$sql =	$sql . $instituicao->getId() . ",'";
			$sql =	$sql . $instituicao->getRazaoSocial() . "','";
			$sql =	$sql . $instituicao->getNomeFantasia() . "','";
			$sql =	$sql . $instituicao->getDescricao() . "','";
			$sql =	$sql . $instituicao->getCnpj() . "','";
			$sql =	$sql . $instituicao->getFoto() . "','";
			$sql =	$sql . $instituicao->getCep() . "','";
			$sql =	$sql . $instituicao->getRua() . "','";
			$sql =	$sql . $instituicao->getBairro() . "','";
			$sql =	$sql . $instituicao->getNumero() . "','";
			$sql =	$sql . $instituicao->getComplemento() . "','";
			$sql =	$sql . $instituicao->getUf() . "','";
			$sql =	$sql . $instituicao->getCidade() . "',";
			$sql =	$sql . $instituicao->getUsuarioId() . ")";
			$this->conectar();
			$banco = $this->getBanco();
			if($banco->query($sql)){
				return header("Location: criacao-de-conta-sucess");
			}else{
				return 0;
			}

		}

		public function alterar($instituicao){
			$sql = "UPDATE instituicao
					SET
					razao_social = '{$instituicao->getRazaoSocial()}',
					nome_fantasia = '{$instituicao->getNomeFantasia()}',
					descricao = '{$instituicao->getDescricao()}',
					cnpj = '{$instituicao->getCnpj()}',
					cep = '{$instituicao->getCep()}',
					bairro = '{$instituicao->getBairro()}',
					rua = '{$instituicao->getRua()}',
					numero = '{$instituicao->getNumero()}',
					complemento = '{$instituicao->getComplemento()}',
					uf = '{$instituicao->getUf()}',
					cidade = '{$instituicao->getCidade()}'
					WHERE usuario_id = {$_SESSION['credencial']['idSessao']}";
					$this->conectar();
					$banco = $this->getBanco();
					$banco->query($sql);
					/*
					if($banco->query($sql)){
						return "<script>window.location.href = 'instituicao?id={$_SESSION['credencial']['idSessao']}'; </script>";
					}
					*/
		}

		public function alterarFoto($id, $foto){
					$sql =  "UPDATE instituicao
							SET foto = '{$foto}'
							WHERE usuario_id={$id}";
					$this->conectar();
					$banco = $this->getBanco();
					$banco->query($sql);
					/*
					if($banco->query($sql)){
						return header("Location: instituicao?id={$id}");
					}
					*/
		}

		public function visualizar($id){
			$sql = "SELECT * FROM instituicao INNER JOIN usuario ON instituicao.usuario_id = usuario.id WHERE usuario_id = {$id}";
			//$sql = "SELECT * FROM pessoa_fisica WHERE usuario_id = {$id}";
			$this->conectar();
			$banco = $this->getBanco();
			$retorno = $banco->query($sql);
			return $retorno;
		}

		public function visualizarTodas($limite){
			if($limite == 0 ){
				$sql = "SELECT * FROM instituicao INNER JOIN usuario ON instituicao.usuario_id = usuario.id";
			}else{
				$sql = "SELECT * FROM instituicao INNER JOIN usuario ON instituicao.usuario_id = usuario.id ORDER BY instituicao.id DESC LIMIT 3";
			}
			$this->conectar();
			$banco = $this->getBanco();
			$retorno = $banco->query($sql);
			return $retorno;
		}

		public function visualizarAoEditar($id){
			$sql = "SELECT * FROM instituicao INNER JOIN usuario ON instituicao.usuario_id = usuario.id WHERE instituicao.id = {$id}";
			//$sql = "SELECT * FROM pessoa_fisica WHERE usuario_id = {$id}";
			$this->conectar();
			$banco = $this->getBanco();
			$retorno = $banco->query($sql);
			return $retorno;
		}

		public function avaliar($avaliacao){
			$sql = "SELECT id FROM instituicao WHERE usuario_id = {$avaliacao->getIdInstituicao()}";
			$this->conectar();
			$banco = $this->getBanco();
			$resultado = $banco->query($sql);
			foreach ($resultado as $r) {
				$idInstituicao = $r['id'];
			}
			$sql = "SELECT id FROM pessoa_fisica WHERE usuario_id = {$avaliacao->getIdPessoa()}";
			$this->conectar();
			$banco = $this->getBanco();
			$resultado = $banco->query($sql);
			foreach ($resultado as $r) {
				$idPessoa = $r['id'];
			}
			$sql = "INSERT INTO avaliacao_instituicao (id, avaliacao, instituicao_id, pessoa_fisica_id, comentario)
			VALUES (NULL, {$avaliacao->getAvaliacao()}, {$idInstituicao},
			{$idPessoa}, '{$avaliacao->getComentario()}')";
			//echo $sql;
			//$this->conectar();
			//$banco = $this->getBanco();
			$banco->query($sql);
		}

		public function listaAvaliacoes($id, $limite){
			$sql = "SELECT id FROM instituicao WHERE usuario_id = {$id}";
			$this->conectar();
			$banco = $this->getBanco();
			$resultado = $banco->query($sql);
			foreach ($resultado as $r) {
				$idInstituicao = $r['id'];
			}
			$sql = "SELECT * FROM avaliacao_instituicao INNER JOIN pessoa_fisica
							ON avaliacao_instituicao.pessoa_fisica_id = pessoa_fisica.id
							WHERE instituicao_id = $idInstituicao ORDER BY avaliacao_instituicao.id DESC LIMIT {$limite}";
							//echo $sql;
			//echo $sql;
			return $resultado = $banco->query($sql);
		}
}
