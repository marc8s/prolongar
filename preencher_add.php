<!DOCTYPE html>


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
				<div class="container-fluid">
			<br><br><br><br><br>
			<form method="post" action="insert.php"> <!--action diz respeito ao fluxo da página, substituir depois o index.html pelo correto provavelmente um script de back-end-->
				<!-- area de campos do form -->
				<div class="row">
					<div class="form-group col-md-4">
					   <label for="campo1">Nome do Produto</label>
					   <input type="text" class="form-control" name="campo1" id="campo1">
					</div>					 
					<div class="form-group col-md-4">
					   <label for="campo2">Descrição</label>
					   <input type="text" class="form-control" name="campo2" id="campo2">
					</div>
					<div class="form-group col-md-4">
					   <label for="campo3">Latitude</label>
					   <input type="floatval" class="form-control" name="campo3" id="campo3">
					</div>
				</div>
				<div class="row">
					<div class="form-group col-md-4">
					   <label for="campo4">Longitude</label>
					   <input type="floatval" class="form-control" name="campo4" id="campo4">
					</div>	 
					
				</div>
				<hr />
				<div id="actions" class="row">
					<div class="col-md-12">
						<button type="submit" class="btn btn-success">Salvar</button>
						<a href="index.php" class="btn btn-default">Cancelar</a>
					</div>
				</div>				
			</form>
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