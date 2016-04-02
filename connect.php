<?php
$conexao = new mysqli('localhost', 'root', '', 'prolongar');

if($conexao->connect_errno){
	//echo $conexao->connect_error;
	die('Desculpe, estamos tendo alguns problemas');
	
}

?>