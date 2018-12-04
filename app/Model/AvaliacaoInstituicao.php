<?php

/**
 *
 */
class AvaliacaoInstituicao{

	private $id;
  private $avaliacao;
  private $idInstituicao;
  private $idPessoa;
  private $comentario;

	function __construct($id=0, $avaliacao="", $idInstituicao="", $idPessoa="", $comentario=""){
		$this->setId($id);
    $this->setAvaliacao($avaliacao);
    $this->setIdInstituicao($idInstituicao);
    $this->setIdPessoa($idPessoa);
    $this->setComentario($comentario);
	}

  public function setId($valor){
	   $this->id = $valor;
  }

  public function getId(){
	   return $this->id;
  }

  public function setAvaliacao($valor){
	   $this->avaliacao = $valor;
  }

  public function getAvaliacao(){
	   return $this->avaliacao;
  }

  public function setIdInstituicao($valor){
	   $this->idInstituicao = $valor;
  }

  public function getIdInstituicao(){
	   return $this->idInstituicao;
  }

  public function setIdPessoa($valor){
	   $this->idPessoa = $valor;
  }

  public function getIdPessoa(){
	   return $this->idPessoa;
  }

  public function setComentario($valor){
	   $this->comentario = $valor;
  }

  public function getComentario(){
	   return $this->comentario;
  }
}
