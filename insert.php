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

	$foto = $_FILES["arquivo"];

	// Pega extensão da imagem
			preg_match("/\.(gif|bmp|png|jpg|jpeg){1}$/i", $foto["name"], $ext);
 
        	// Gera um nome único para a imagem
        	$nome_imagem = md5(uniqid(time())) . "." . $ext[1];
 
        	// Caminho de onde ficará a imagem
        	$caminho_imagem = "uploads/" . $nome_imagem;
 
			// Faz o upload da imagem para seu respectivo caminho
			move_uploaded_file($foto["tmp_name"], $caminho_imagem);
		
			// Insere os dados no banco
			//$sql = mysql_query("INSERT INTO usuarios VALUES ('', '".$nome."', '".$email."', '".$nome_imagem."')");
		
	
	

	$sql = "INSERT INTO produtos VALUES";
	$sql .= "('$id', '$name', '$description', '$lat', '$lng', '$type', 'disponivel', '".$nome_imagem."')";
	
	$conexao->query($sql);
	$conexao->close();
	//include("index.php");
	$url = 'index.php'; 
	//$url = 'add_imagem.php?id=<?php echo $id; 	
	echo'<META HTTP-EQUIV=Refresh CONTENT="0; URL='.$url.'">';
	//$_SESSION['update'] = "Escola cadastrada com Sucesso!";
//}
?>