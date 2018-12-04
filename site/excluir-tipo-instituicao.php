<?php
include "../app/Load.php";
$id = $_GET['id'];
$daltipoinstituicao = new TipoInstituicaoDAL();
$daltipoinstituicao->excluirUm($id);
header('Location: ' . $_SERVER['HTTP_REFERER']);
