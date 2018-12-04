<?php

include_once "Conexao.php";
include_once "Sessao.php";
/**
 *
 */
class TipoInstituicaoDAL extends Conexao{

	function __construct(){
		parent::__construct();
	}

	public function cadastrar($TipoInstituicao){
		$sql = "SELECT id FROM instituicao WHERE usuario_id = {$_SESSION['credencial']['idSessao']}";
		$this->conectar();
		$banco = $this->getBanco();
		$resultado = $banco->query($sql);
		while ($registro = $resultado->fetch_array()) { $idUsuario = $registro['id'];}
		$sql = "INSERT INTO instituicao_tipo_instituicao (id, tipo_instituicao_id, instituicao_id)
				VALUES (NULL, {$TipoInstituicao->getId()}, {$idUsuario}); ";
		if($banco->query($sql)){
			return 1;
		}
   	}

   	public function visualizarTodos(){
   		$sql = "SELECT id, nome FROM tipo_instituicao";
   		$this->conectar();
		$banco = $this->getBanco();
		$retorno = $banco->query($sql);
		return $retorno;
   	}

   	public function visualizarPorId($id){
   		$sql = "SELECT id FROM instituicao WHERE usuario_id = $id";
			$this->conectar();
			$banco = $this->getBanco();
			$resultado = $banco->query($sql);
			while ($registro = $resultado->fetch_array()) { $idUsuario = $registro['id'];}
			$sql =
			"SELECT * FROM instituicao_tipo_instituicao INNER JOIN instituicao ON (instituicao.id =
					instituicao_tipo_instituicao.instituicao_id)
				INNER JOIN tipo_instituicao ON (
				tipo_instituicao.id = instituicao_tipo_instituicao.tipo_instituicao_id
			) WHERE instituicao_id = {$idUsuario} ORDER BY nome";
			$retorno = $banco->query($sql);
			return $retorno;
   	}

		public function excluirUm($id){
			//echo $id;
			$sql = "DELETE FROM instituicao_tipo_instituicao WHERE id = {$id}";
			$this->conectar();
			$banco = $this->getBanco();
			$banco->query($sql);
		}
}
