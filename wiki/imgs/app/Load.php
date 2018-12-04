<?php
function __autoload($classe) {
	$dir = str_replace("\\","/",dirname(__FILE__));
	if(file_exists($dir."/".$classe.".php")) {
		include($dir."/".$classe.".php");
	} else {
		if(file_exists($dir."/Model/".$classe.".php")) {
			include($dir."/Model/".$classe.".php");
		} else {
			if(file_exists($dir."/DAL/".$classe.".php")) {
				include($dir."/DAL/".$classe.".php");
			} else {

				/* Comentei por causa do autoloader do PHPExcel */
				echo $classe;
				exit(" arquivo não encontrado!");
			}
		}
	}
}
?>
