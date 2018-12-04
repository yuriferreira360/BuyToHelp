<?php
class Usuario {
   private $id;
   private $email;
   private $login;
   private $senha;
   private $primeiroAcesso;
   private $ativo;
   private $tipo;
    
   function __construct($id=0,$email="",$login="",$senha="",$primeiroAcesso="" ,$ativo="", $tipo="") {
      $this->setId($id);
      $this->setEmail($email);
      $this->setLogin($login);
      $this->setSenha($senha);
      $this->setAtivo($ativo);
      $this->setTipo($tipo);
      $this->setPrimeiroAcesso($primeiroAcesso);
   }
   
   public function setId($valor){
	   $this->id = $valor;
   }
   
   public function getId(){
	   return $this->id;
   }
   
   public function setEmail($valor){
	   $this->email = $valor;
   }
   
   public function getEmail(){
	   return $this->email;
   }

   public function setLogin($valor){
      $this->login = $valor;
   }
   
   public function getLogin(){
      return $this->login;
   }

   public function setSenha($valor){
      $this->senha = $valor;
   }
   
   public function getSenha(){
      return $this->senha;
   }

   public function setPrimeiroAcesso($valor){
      $this->primeiroAcesso = $valor;
   }
   
   public function getPrimeiroAcesso(){
      return $this->primeiroAcesso;
   }

   public function setAtivo($valor){
      $this->ativo = $valor;
   }
   
   public function getAtivo(){
      return $this->ativo;
   }

   public function setTipo($valor){
      $this->tipo = $valor;
   }
   
   public function getTipo(){
      return $this->tipo;
   }
}
