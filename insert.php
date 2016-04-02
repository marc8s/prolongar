<?php
//session_start();
//include_once("seguranca.php");

//if($_SESSION['email'] != ""){
	include_once("connect.php");
	
	

	$name = $_POST['campo1'];
	$description = $_POST['campo2'];
	$lat = $_POST['campo3'];
	$lng = $_POST['campo4'];
	
	

	$sql = "INSERT INTO produtos VALUES";
	$sql .= "('', '$name', '$description', '$lat', '$lng', '')";
	
	//INSERT INTO `produtos`(`id`, `name`, `description`, `lat`, `lng`, `type`) VALUES ([value-1],[value-2],[value-3],[value-4],[value-5],[value-6])
	$conexao->query($sql);
	$conexao->close();
	//include("index.php");
	$url = 'index.php';
	echo'<META HTTP-EQUIV=Refresh CONTENT="0; URL='.$url.'">';
	//$_SESSION['update'] = "Escola cadastrada com Sucesso!";
//}
?>