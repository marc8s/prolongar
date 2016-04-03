<?php
//session_start();
//include_once("seguranca.php");

//if($_SESSION['email'] != ""){
	$id = $_GET['id'];
	include_once("connect.php");

	$sql = "DELETE FROM produtos WHERE id = $id";
	//$sql .= "( Escola ='$escola', Cidade ='$cidade', Identificador= '$identificador', Telefone='$telefone')";
	$conexao->query($sql);
	$conexao->close();
	$url = 'index.php';
	echo'<META HTTP-EQUIV=Refresh CONTENT="0; URL='.$url.'">';
?>