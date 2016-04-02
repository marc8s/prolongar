<!DOCTYPE html>
<?php
session_start();
include_once("connect.php");

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
		<script src="http://maps.googleapis.com/maps/api/js?sensor=false" type="text/javascript"></script>
		<script type="text/javascript" src="js/gmap3.js"></script>
		<script type="text/javascript">
		<?php
			$resultado = $conexao->query("SELECT * FROM produtos");
			
		?>
		// inicializa jquery
		 $(function(){
			 
			<?php 
				while($row = $resultado->fetch_object()){
				//}
			?>	
				
				// conteudo das infowindows 
				var conteudo = '<div id="balao">'+
				 '<img src="img/armario.jpg" />'+
										'<p><strong><?php echo $row->name; ?></strong></p>'+
										'<p>Descrição: <?php echo $row->description; ?></p>'+
										'<p><a href="#" target="_blank">Tenho interesse</a></p>'+
										'</div>';
				var latitudeProduto = <?php echo $row->lat; ?>;
				var longitudeProduto = <?php echo $row->lng; ?>;
				/*var conteudoArmario = '<div id="balao">'+
				 '<img src="img/armario.jpg" />'+
										'<p><strong>Armário</strong></p>'+
										'<p>Descrição: armário amarelo</p>'+
										'<p><a href="#" target="_blank">Tenho interesse</a></p>'+
										'</div>';
					 
				var conteudoCamisa = '<div id="balao">'+
				 '<img src="img/camisa.jpg" />'+
										'<p><strong>Camisa</strong></p>'+
										'<p>Descrição: Camisa hipster</p>'+
										'<p><a href="#" target="_blank">Tenho interesse</a></p>'+
										'</div>';	 
										
				var conteudoBrinquedo = '<div id="balao">'+
				 '<img src="img/brinquedo.jpg" />'+
										'<p><strong>Trator</strong></p>'+
										'<p>Descrição: Trator para crianças</p>'+
										'<p><a href="#" target="_blank">Tenho interesse</a></p>'+
										'</div>';
											 
				var conteudoLivro = '<div id="balao">'+
				 '<img src="img/livro.jpg" />'+
										'<p><strong>Livro</strong></p>'+
										'<p>Descrição: O pequeno principe</p>'+
										'<p><a href="#" target="_blank">Tenho interesse</a></p>'+
										'</div>';	 */						
		// inicializa plugin gmap3			 
		$("#mapa").gmap3({
			map:
			{
			  // local padrão onde o mapa irá aparecer quando carregado
			  latLng: [-12.205764, -38.9688321],
			  options:
			  {
				// zoom inicial (aproximação)  
				zoom:17,
				// opções de controle do tipo do mapa (ruas, satélite, etc).
				// mapTypeControl como FALSE não mostra opções
				mapTypeControl: true,
				mapTypeControlOptions: 
				{
				  // define controles no formato dropdown
				  style: google.maps.MapTypeControlStyle.DROPDOWN_MENU
				},
				// permite navegar com o botão scroll do mouse
				scrollwheel: true,
				// mostra bonequinho para habilitar modo streetview
				streetViewControl: true
			  }
			},
			// marcadores
			marker:{
			// valores (localização dos marcadores)	
			values:[
				{latLng:[latitudeProduto, longitudeProduto], data:conteudo, options:{icon:"img/marcador.png", shadow:"img/marcador_sombra.png"}}
			// pode ser uma latitude/longitude
			  //{latLng:[-12.205046, -38.972019], data:conteudoArmario, options:{icon:"img/marcador.png", shadow:"img/marcador_sombra.png"}},
			// podem ser palavras-chave ou endereços
			  /*{latLng:[-12.206734, -38.969315], data:conteudoCamisa, options:{icon:"img/marcador.png", shadow:"img/marcador_sombra.png"}},
			  {latLng:[-12.203604, -38.969793], data:conteudoBrinquedo, options:{icon:"img/marcador.png", shadow:"img/marcador_sombra.png"}},
			  {latLng:[-12.208386, -38.972186], data:conteudoLivro, options:{icon:"img/marcador.png", shadow:"img/marcador_sombra.png"}}*/
			],
			// evita reposicionar marcadores
			options:{
			  draggable: false
			},
			// listener de eventos
			events:{
			  // evento de clique		
			  click: function(marker, event, context)
			  {
				// cria a infowindow
				var map = $(this).gmap3("get"),
				  infowindow = $(this).gmap3({get:{name:"infowindow"}});
			   
			   // 
				if (infowindow)
				{
				  infowindow.open(map, marker);
				  infowindow.setContent(context.data);
				} else {
				  $(this).gmap3({
					infowindow:
					{
					  anchor:marker,
					  options:{content: context.data}
					}
				  });
				}
			  }
			}
		  }
		  }); 
		  <?php 
				//while($row = $resultado->fetch_object()){
				}
			?>	
		});     
		</script>
	</head>
	<body>	
		<div class="container-fluid" id="div-with-all-rows">	
			<header class="row">
				
				<nav class="navbar navbar-default navbar-fixed-top ">
					<img id="logo" src="img/262.png" alt="logo" class="put-left">
					<ul class="white-bg menu" >					
						<li><a href="#sessao1" style="color: black">Home</a></li>
						<li><a href="#sessao2" style="color: black">Como Funciona</a></li>
						<li><a href="#sessao3" style="color: black">Login</a></li>
						<li><a href="#sessao4" style="color: black">Mapa</a></li>
						<li><a href="#sessao5" style="color: black">Contato</a></li>
					</ul>
				</nav>			
			</header>		
			<section id="sessao1" class="size-section row">				
				<div class="col-md-4"> </div>
				<div class="col-md-4  ">
													
				</div>				
			</section>			
			<section id="sessao2" class="size-section row content-justify">
				<br><br><br><br>
				<header>
					
				<header>
				<footer>					
					
				</footer>
			</section>
			<section id="sessao3" class="gray-bg size-section row content-justify">
				<br><br><br><br>
				<header>
					<div id="main" class="container-fluid">
						<h3 class="page-header text-center">Login</h3>
					</div>
					<div class="row">
						<div class="col-md-5"></div>
						<div class="col-md-2">
						  <form class="form-signin" method="POST">
							<label for="inputEmail" class="sr-only">Email</label>
							<input type="email" id="inputEmail" name ="email" class="form-control" placeholder="Email">
							<label for="inputPassword" class="sr-only">Senha</label>
							<input type="password" id="inputPassword" name ="senha" class="form-control" placeholder="Senha">
							<div class="checkbox">
							  <label>
								<input type="checkbox" value="remember-me"> Lembre-me
							  </label>
							</div>
							<button class="btn btn-lg btn-primary btn-block" type="submit">Entrar</button>
							<button class="btn btn-lg btn-primary btn-block" type="submit">Cadastre-se</button>
						  </form>
						</div> <!-- /container -->
					</div>
					
				</header>
				<footer>
					
				</footer>
			</section>
			<section id="sessao4" class="white-bg size-section row" >
				<div class="col-md-7" id="mapa" style=" height: 100%"></div>		
				<div class="col-md-5 checkbox">
					<div class="content-center">
						<h2>Diz pra gente o que você está procurando</h2>
						<br><h4>Selecione os itens que você deseja que sejam exibidos no mapa.</h4></p>		
						<br><br>
					</div>
					<label>
						<input type="checkbox" value="">Roupas<br>
						<input type="checkbox" value="">Calçados<br>
						<input type="checkbox" value="">Brinquedos<br>
						<input type="checkbox" value="">Móveis<br>
						<input type="checkbox" value="">Eletrônicos<br>
						<input type="checkbox" value="">Acessórios<br>
						<input type="checkbox" value="">Livros<br>
						<input type="checkbox" value="">Bolsas<br>
						<input type="checkbox" value="">Cobertores<br>	
						<input type="checkbox" value="">Outros<br>
					</label>
					<div class="content-center">
						<br><br><br>
						<button type="button" class="btn btn-primary center">Busca ai pra mim</button>
						<!--<button type="button" class="btn btn-info">Eu quero doar um produto</button>-->
						<a href="preencher_add.php" class="btn btn-default">Quero doar um produto</a>
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