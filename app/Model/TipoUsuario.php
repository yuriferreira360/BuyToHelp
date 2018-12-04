<?php
class TipoUsuario {
   private $id;
   private $nome;	
    
   function __construct($id=0,$nome="") {
       $this->setId($id);
	   $this->setNome($nome);
   }
   
   public function setId($valor){
	   $this->id = $valor;
   }
   
   public function getId(){
	   return $this->id;
   }
   
   public function setNome($valor){
	   $this->nome = $valor;
   }
   
   public function getNome(){
	   return $this->nome;
   }
}
