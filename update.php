<?php
//session_start();
//include_once("seguranca.php");

//if($_SESSION['email'] != ""){
	include_once("connect.php");

	$name = $_POST['campo1'];
	$description = $_POST['campo2'];
	$id = $_POST['campo3'];
	$status = $_POST['campo4'];
	

	$sql = "UPDATE produtos set name ='$name', description ='$description', status ='$status' WHERE id = $id";
	$conexao->query($sql);
	$conexao->close();
	$url = 'index.php';
	echo'<META HTTP-EQUIV=Refresh CONTENT="0; URL='.$url.'">';
	//$_SESSION['update'] = "Cadastro Atualizado com Sucesso!";
//}
?>