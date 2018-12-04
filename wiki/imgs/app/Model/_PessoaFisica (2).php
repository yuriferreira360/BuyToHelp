<?php
class PessoaFisica {
   private $usuarioId;

   function __construct($usuarioId=0){
      $this->setUsuarioId($usuarioId);
   }

   public function getUsuarioId(){
      return $this->usuarioId;
   }

   public function setUsuarioId($usuarioId){
      $this->usuarioId = $usuarioId;
   }

}
