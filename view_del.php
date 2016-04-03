<!DOCTYPE html>
<?php
//session_start();
//include_once("seguranca.php");

//if($_SESSION['email'] != ""){
	$id = $_GET['id'];
	include_once("connect.php");
	//Executa consulta
	$result = $conexao->query("SELECT * FROM produtos WHERE id = '$id' LIMIT 1"); 
	$row = $result->fetch_object();

?>


<html>
	<head>
		<link href="css/style.css" rel="stylesheet" />
		<!-- Incluindo o CSS do Bootstrap -->
		<link href="bootstrap-3.3.5-dist/css/bootstrap.min.css" rel="stylesheet" media="screen" />
		<!-- Incluindo o jQuery que é requisito do JavaScript do Bootstrap localmente-->
		<script src="bootstrap-3.3.5-dist/js/jquery-1.11.3.js"></script>
		<!-- Incluindo o JavaScript do Bootstrap -->
		<script src="bootstrap-3.3.5-dist/js/bootstrap.min.js"></script>
		
	
		<title>
			PROLONGAR
		</title>		
	</head>
	<body>	
		<div class="container-fluid" id="div-with-all-rows">	
			<header class="row">
				
				<nav class="navbar navbar-default navbar-fixed-top ">
					<img id="logo" src="img/262.png" alt="logo" class="put-left">
					<ul class="white-bg menu" >					
						<li><a href="index.php" style="color: black">Home</a></li>						
						<li><a href="#sessao5" style="color: black">Contato</a></li>
					</ul>
				</nav>			
			</header>	
			
			<section id="sessao4" class="white-bg size-section row" >
				<br><br><br><br><br>
				<div id="main" class="container-fluid">
			<h3 class="page-header">Deseja realmente excluir esse item?</h3>
			<div class="row">
				<div class="col-md-4">
					<p><strong>Nome</strong></p>
					<p><?php echo $row->name; ?></p> <!--valor que for recuperado da base de dados - usar backend ou algum script para trazer essas informações-->
				</div>
				<div class="col-md-4">
					<p><strong>Descrição</strong></p>
					<p><?php echo $row->description; ?></p>
				</div>
				
			<hr />
			<div id="actions" class="row">
				<div class="col-md-12">
					<a href="index.php" class="btn btn-success">Cancelar</a>
					<a href="edit.php?id=<?php echo $row->Identificador; ?>" class="btn btn-primary">Editar</a>					
					<a href="delete.php?id=<?php echo $row->id; ?>" class="btn btn-default btn-danger">Excluir</a>
				</div>
			</div>
		</div>
				
			</section>
			<section id="sessao5" class="gray-bg size-section row">
				<div class="content-center">
					<h2>Diga Olá</h2>
					<br><p>Entre em contato conosco.</p>					
				</div>
				<div class="content-center white-bg " id="div-form" >
					<form >	
						<div class="row">
							<input type="text" placeholder="Nome" class="col-md-6">	
							<input type="text" placeholder="Email" class="col-md-6">
						</div>
						<div class="row">
							<br><br>
							<textarea placeholder="Mensagem" class="col-md-12"></textarea>							
						</div>							
						<br><br><button type="submit" class="btn ">Enviar</button>						  
					</form>					
				</div>
				
			</section>
			<footer class="white-bg row" style="color: black">			
					Prolongar - O essencial visível aos olhos.			
			</footer>
		</div>
		
		
	</body>
</html>