<?php 
include "../app/Load.php";

session_start();
$sessao = new Sessao();
$sessao->destroi();