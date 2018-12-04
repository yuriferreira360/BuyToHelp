<?php
class Instituicao {
   private $id;
   private $razaoSocial;
   private $nomeFantasia;
   private $descricao;
   private $cnpj;
   private $foto;
   private $cep;
   private $bairro;
   private $rua;
   private $numero;
   private $complemento;
   private $uf;
   private $cidade;
   private $usuarioId;

   function __construct($id=0, $razaoSocial="", $nomeFantasia="", $descricao="",$cnpj="", $foto="", $cep="", $rua="", $numero="", $bairro="", $complemento="", $uf="", $cidade="", $usuarioId="") {
      $this->setId($id);
      $this->setRazaoSocial($razaoSocial);
      $this->setNomeFantasia($nomeFantasia);
      $this->setDescricao($descricao);
      $this->setCnpj($cnpj);
      $this->setFoto($foto);
      $this->setCep($cep);
      $this->setRua($rua);
      $this->setBairro($bairro);
      $this->setNumero($numero);
      $this->setComplemento($complemento);
      $this->setUf($uf);
      $this->setCidade($cidade);
      $this->setUsuarioId($usuarioId);
   }

   public function getId(){
      return $this->id;
   }

   public function setId($id){
      $this->id = $id;
   }

   public function getRazaoSocial(){
      return $this->razaoSocial;
   }

   public function setRazaoSocial($razaoSocial){
      $this->razaoSocial = $razaoSocial;
   }

   public function getNomeFantasia(){
      return $this->nomeFantasia;
   }

   public function setNomeFantasia($nomeFantasia){
      $this->nomeFantasia = $nomeFantasia;
   }

   public function getDescricao(){
      return $this->descricao;
   }

   public function setDescricao($descricao){
      $this->descricao = $descricao;
   }

   public function getCnpj(){
      return $this->cnpj;
   }

   public function setCnpj($cnpj){
      $this->cnpj = $cnpj;
   }

   public function getFoto(){
      return $this->foto;
   }

   public function setFoto($foto){
      $this->foto = $foto;
   }

   public function getCep(){
      return $this->cep;
   }

   public function setCep($cep){
      $this->cep = $cep;
   }

   public function getBairro(){
      return $this->bairro;
   }

   public function setBairro($bairro){
      $this->bairro = $bairro;
   }

   public function getRua(){
      return $this->rua;
   }

   public function setRua($rua){
      $this->rua = $rua;
   }

   public function getNumero(){
      return $this->numero;
   }

   public function setNumero($numero){
      $this->numero = $numero;
   }

   public function getComplemento(){
      return $this->complemento;
   }

   public function setComplemento($complemento){
      $this->complemento = $complemento;
   }

   public function getUf(){
      return $this->uf;
   }

   public function setUf($uf){
      $this->uf = $uf;
   }

   public function getCidade(){
      return $this->cidade;
   }

   public function setCidade($cidade){
      $this->cidade = $cidade;
   }

   public function getUsuarioId(){
      return $this->usuarioId;
   }

   public function setUsuarioId($usuarioId){
      $this->usuarioId = $usuarioId;
   }

}
