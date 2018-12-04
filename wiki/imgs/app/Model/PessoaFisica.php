<?php
class PessoaFisica {
   private $id;
   private $nome;
   private $sobrenome;
   private $descricao;
   private $cpf;
   private $foto;
   private $cep;
   private $bairro;
   private $rua;
   private $numero;
   private $complemento;
   private $uf;
   private $cidade;
   private $usuarioId;

   function __construct($id=0, $nome="", $sobrenome="", $descricao="", $cpf="", $foto="", $cep="", $rua="", $numero="", $bairro="", $complemento="", $uf="", $cidade="", $usuarioId="") {
      $this->setId($id);
      $this->setNome($nome);
      $this->setSobrenome($sobrenome);
      $this->setDescricao($descricao);
      $this->setCpf($cpf);
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

   public function getNome(){
      return $this->nome;
   }

   public function setNome($nome){
      $this->nome = $nome;
   }

   public function getSobrenome(){
      return $this->sobrenome;
   }

   public function setSobrenome($sobrenome){
      $this->sobrenome = $sobrenome;
   }

   public function getDescricao(){
      return $this->descricao;
   }

   public function setDescricao($descricao){
      $this->descricao = $descricao;
   }

   public function getCpf(){
      return $this->cpf;
   }

   public function setCpf($cpf){
      $this->cpf = $cpf;
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
