<?php

include_once("connect.php");

	$id = $_GET['id'];
	

	$sql = "UPDATE produtos set status ='reservado' WHERE id = $id";
	$conexao->query($sql);
	$conexao->close();
	$url = 'index.php';
	echo'<META HTTP-EQUIV=Refresh CONTENT="0; URL='.$url.'">';

?>