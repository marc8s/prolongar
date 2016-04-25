<!DOCTYPE html>
<?php
session_start();
include_once("connect.php");

?>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="">
		<meta name="author" content="">
		
		<!-- core CSS -->
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/font-awesome.min.css" rel="stylesheet">
		<link href="css/animate.min.css" rel="stylesheet">
		<link href="css/owl.carousel.css" rel="stylesheet">
		<link href="css/owl.transitions.css" rel="stylesheet">
		<link href="css/prettyPhoto.css" rel="stylesheet">
		<link href="css/main.css" rel="stylesheet">
		<link href="css/responsive.css" rel="stylesheet">         
		<link rel="shortcut icon" href="images/ico/favicon.ico">
		<link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
		<link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
		<link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
		<link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
		
		<link href="css/style.css" rel="stylesheet" />
		<script src="js/jquery.js"></script>
		<script src="js/bootstrap.min.js"></script>
		
		<script src="js/owl.carousel.min.js"></script>
		<script src="js/mousescroll.js"></script>
    
		<script src="js/jquery.prettyPhoto.js"></script>
		<script src="js/jquery.isotope.min.js"></script>
		<script src="js/jquery.inview.min.js"></script>
		<script src="js/wow.min.js"></script>
		<script src="js/main.js"></script>
		
	
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
				?>	
					
				// conteudo das infowindows 
				
				var conteudo = '<div id="balao">'+
				 '<img src="uploads/<?php echo $row->caminho_imagem; ?>"/>'+		 								 						
										'<p><strong><?php echo $row->name; ?></strong></p>'+
										'<p>Descrição: <?php echo $row->description; ?></p>'+
										'<p>Status: <?php echo $row->status; ?></p>'+										
										'<p><a href="view_del.php?id=<?php echo $row->id; ?>" target="_blank">Remover</a></p>'+
										'<p><a href="edit.php?id=<?php echo $row->id; ?>" target="_blank">Editar</a></p>'+
										'<p><a href="reservar.php?id=<?php echo $row->id; ?>" target="_blank">Reservar</a></p>'+
										'</div>';
				var latitudeProduto = <?php echo $row->lat; ?>;
				var longitudeProduto = <?php echo $row->lng; ?>;
											
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
					}
				?>	
			});     
		</script>
	</head>
	<body>	
		<div class="container-fluid" id="div-with-all-rows">	
			<header class="row">			
				<nav id="main-menu" class="navbar navbar-default navbar-fixed-top" role="banner">
		            <div class="container">
		                <div class="navbar-header">
		                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
		                        <span class="sr-only">Toggle navigation</span>
		                        <span class="icon-bar"></span>
		                        <span class="icon-bar"></span>
		                        <span class="icon-bar"></span>
		                    </button>
		                    <!--<a class="navbar-brand" href="index.html"><img src="img/262.png" alt="logo"></a>-->
		                </div>
						
		                <div class="collapse navbar-collapse navbar-right">
		                    <ul class="nav navbar-nav">
		                        <li class="scroll active"><a href="#main-slider">Home</a></li>
		                        <li class="scroll"><a href="#about">Como Funciona</a></li>
		                        <li class="scroll"><a href="#sessao3">Login</a></li>
		                        <li class="scroll"><a href="#sessao4">Mapa</a></li>    
								<li class="scroll"><a href="#">Contato</a></li>     								
		                                               
		                    </ul>
		                </div>
		            </div><!--/.container-->
		        </nav>	
			</header>		
			<section id="main-slider" class="size-section">				
				<div class="owl-carousel">
            <div class="item" style="background-image: url(img/bg1.jpg);">
                <div class="slider-inner">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="carousel-content">
                                    <h2><span>PROLONGAR</span> o essencial visivel aos olhos</h2>
                                    <p>Doe e receba doações de pessoas próximas a você de forma gratuita</p>
                                    <a class="btn btn-primary btn-lg" href="#about">Leia mais</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!--/.item-->
             <div class="item" style="background-image: url(img/bg2.jpg);">
                <div class="slider-inner">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="carousel-content">
                                    <h2><span>PROLONGAR</span> o essencial visivel aos olhos</h2>
                                    <p>Existe uma crescente preocupação da população com os excessos do mundo capitalista e com os limites do uso de recursos naturais da Terra. Ao passo que as pessoas desejam viver cada vez com menos, o movimento “Free Your Stuff” (liberte as suas coisas) cresce, as transações de produtos em desuso se tornam mais comuns e vão ficando menos dependentes do dinheiro em situações nas quais o capital social substitui, ou complementa, o capital financeiro. </p>
                                    <a class="btn btn-primary btn-lg" href="#about">Leia mais</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!--/.item-->
        </div><!--/.owl-carousel-->			
			</section>	
					
			<section id="about" class=" ">
				<div class="container">

            <div class="section-header">
                <h2 class="section-title text-center wow fadeInDown">Como Funciona</h2>
                <p class="text-center wow fadeInDown">Prolongar é uma plataforma online voltada para a realização de transações envolvendo doações de itens 
				em desuso. Pessoas físicas e organizações estão livres para doar ou receber os itens postados na plataforma e dispostos em um mapa com 
				destaque de proximidade.</p>
            </div>

            <div class="row">
                <div class="col-sm-6 wow fadeInLeft">
                    <h3 class="column-title">Video Tutorial</h3>
                    <!-- 16:9 aspect ratio -->
                    <div class="embed-responsive embed-responsive-16by9">
                        <iframe src="//player.vimeo.com/video/58093852?title=0&amp;byline=0&amp;portrait=0&amp;color=e79b39" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
                    </div>
                </div>

                <div class="col-sm-6 wow fadeInRight">
                    <h3 class="column-title">Para Doadores</h3>                   
                    <div class="row">
                        <div class="col-sm-12">
                            <ol class="nostyle">
                                <li><i class="fa fa-check-square"></i> Separe o item que você gostaria de doar.</li>
                                <li><i class="fa fa-check-square"></i> Capriche na Foto do item</li>
								<li><i class="fa fa-check-square"></i> Vá até o nosso mapa</li>
                                <li><i class="fa fa-check-square"></i> Clique em "Doar um produto"</li>
								<li><i class="fa fa-check-square"></i> Preencha as informações referente ao item na página para o qual você será redirecionado.</li>
                                <li><i class="fa fa-check-square"></i> Clique em salvar.</li>
								<li><i class="fa fa-check-square"></i> Pronto! Seu produto já esta visivel no mapa e logo encontrará um novo lar.</li>                                
                            </ol>
                        </div>                        
                    </div>
					
					<h3 class="column-title">Para Receptores</h3>                   
                    <div class="row">
                        <div class="col-sm-12">
                            <ol class="nostyle">
                                <li><i class="fa fa-check-square"></i> Vá até o nosso mapa</li>
                                <li><i class="fa fa-check-square"></i> Selecione as opções de itens que você está procurando</li>
								<li><i class="fa fa-check-square"></i> Clique em "Filtrar Busca" e encontre itens próximos a você</li>
                                <li><i class="fa fa-check-square"></i> Clique nos marcadores azuis do mapa para ver detalhes sobre o item disponivel.</li>
								<li><i class="fa fa-check-square"></i> Clique em reservar caso tenha interesse no item.</li>
                                <li><i class="fa fa-check-square"></i> Confira as formas de entrega disponiveis e escolha a melhor para você.</li>								                               
                            </ol>
                        </div>                        
                    </div>
                   

                </div>
            </div>
        </div>
			</section>

			<section id="sessao3" class="size-section row content-justify" style=" background: #f5f5f5">
				<br>
				<header>
					<div class="container">
	                <div class="row">
	                    <div class="col-sm-4 col-sm-offset-8">
	                        <div class="contact-form">
	                        	<div class="section-header">
									<h2 class="section-title text-center wow fadeInDown">Login</h2>
									<p class="text-center wow fadeInDown">Crie uma conta e junte-se a nossa comunidade ou faça login se já for um usuário cadastrado.</p>
								</div>	                            
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
	                      	</div>
	                    </div>
	                </div>					
				</header>
				<footer></footer>
			</section>

			<section id="sessao4" class="white-bg size-section row" style="" >
				<!--<div class=" container ">-->
				<div class="col-md-5 checkbox">
					
						<div class="section-header">
							<h2 class="section-title text-center wow fadeInDown">O que você está procurando?</h2>
							<p class="text-center wow fadeInDown">Selecione os itens que você deseja que sejam exibidos no mapa.</p>
								
							
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
							
							<button type="button" class="btn btn-primary center">Filtrar Busca</button>
							<!--<button type="button" class="btn btn-info">Eu quero doar um produto</button>-->
							<a href="preencher_add.php" class="btn btn-default">Doar um produto</a>
						</div>
						
					</div>
					<div class="col-md-7" id="mapa" style=" height: 100%"></div>		
					
					
				<!--</div>-->
				
			</section>
			

			<!-- <section id="sessao5" class="gray-bg size-section row">
				<header><div class="content-center">
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
				</header>
				<footer></footer>
				
			</section>
			<footer class="white-bg row" style="color: black">			
					Prolongar - O essencial visível aos olhos.			
			</footer> -->
		</div>
		
		
	</body>
</html>