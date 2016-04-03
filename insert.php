<?php
//session_start();
//include_once("seguranca.php");

//if($_SESSION['email'] != ""){
	include_once("connect.php");
	
	

	$name = $_POST['campo1'];
	$description = $_POST['campo2'];
	$lat = $_POST['campo3'];
	$lng = $_POST['campo4'];
	$id = $_POST['campo5'];
	$type = $_POST['campo6'];
	
	

	$sql = "INSERT INTO produtos VALUES";
	$sql .= "('$id', '$name', '$description', '$lat', '$lng', '$type', 'disponivel')";
	
	$conexao->query($sql);
	$conexao->close();
	//include("index.php");
	$url = 'index.php';
	echo'<META HTTP-EQUIV=Refresh CONTENT="0; URL='.$url.'">';
	//$_SESSION['update'] = "Escola cadastrada com Sucesso!";
//}
?>