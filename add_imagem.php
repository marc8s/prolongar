<?php
	$id = $_GET['id'];

?>

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
			<form method="post"  action= "<?php echo $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data"> <!--enctype="multipart/form-data"-->
				<!-- area de campos do form -->
				

				<div class="row">
					
					
					<div class="form-group col-md-4">
						<label for="campo4">Selecione uma imagem</label>
						<input type="hidden" name="MAX_FILE_SIZE" value="10000000" />
						<input name="userfile" type="file" />
											
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

			<?php

			// check if a file was submitted
			if(!isset($_FILES['userfile']))
			{
			    echo '<p>Please select a file</p>';
			}
			else
			{
			    try {
			    $msg= upload();  //this will upload your image
			    echo $msg;  //Message showing success or failure.
			    }
			    catch(Exception $e) {
			    echo $e->getMessage();
			    echo 'Sorry, could not upload file';
			    }
			}

			// the upload function
			function upload() {
			    include "file_constants.php";
			    $maxsize = 10000000; //set to approx 10 MB

			    //check associated error code
			    if($_FILES['userfile']['error']==UPLOAD_ERR_OK) {

			        //check whether file is uploaded with HTTP POST
			        if(is_uploaded_file($_FILES['userfile']['tmp_name'])) {    

			            //checks size of uploaded image on server side
			            if( $_FILES['userfile']['size'] < $maxsize) {  
			  
			               //checks whether uploaded file is of image type
			              //if(strpos(mime_content_type($_FILES['userfile']['tmp_name']),"image")===0) {
			                 $finfo = finfo_open(FILEINFO_MIME_TYPE);
			                if(strpos(finfo_file($finfo, $_FILES['userfile']['tmp_name']),"image")===0) {    

			                    // prepare the image for insertion
			                    $imgData =addslashes (file_get_contents($_FILES['userfile']['tmp_name']));

			                    // put the image in the db...
			                    // database connection
			                    include_once("connect.php");
			                    //mysql_connect($host, $user, $pass) OR DIE (mysql_error());

			                    // select the db
			                   // mysql_select_db ($db) OR DIE ("Unable to select db".mysql_error());

			                    // our sql query
			                    $sql = "INSERT INTO test_image
			                    (image, name)
			                    VALUES
			                    ('{$imgData}', '{$_FILES['userfile']['name']}');";


			                    $sql = "UPDATE produtos set Escola ='$escola', Cidade ='$cidade', Identificador= '$identificador', Telefone='$telefone' WHERE id = $id";

			                    // insert the image
			                    //mysql_query($sql) or die("Error in Query: " . mysql_error());
			                    //$msg='<p>Image successfully saved in database with id ='. mysql_insert_id().' </p>';
			                }
			                else
			                    $msg="<p>Uploaded file is not an image.</p>";
			            }
			             else {
			                // if the file is not less than the maximum allowed, print an error
			                $msg='<div>File exceeds the Maximum File limit</div>
			                <div>Maximum File limit is '.$maxsize.' bytes</div>
			                <div>File '.$_FILES['userfile']['name'].' is '.$_FILES['userfile']['size'].
			                ' bytes</div><hr />';
			                }
			        }
			        else
			            $msg="File not uploaded successfully.";

			    }
			    else {
			        $msg= file_upload_error_message($_FILES['userfile']['error']);
			    }
			    return $msg;
			}
			// Function to return error message based on error code

			function file_upload_error_message($error_code) {
			    switch ($error_code) {
			        case UPLOAD_ERR_INI_SIZE:
			            return 'The uploaded file exceeds the upload_max_filesize directive in php.ini';
			        case UPLOAD_ERR_FORM_SIZE:
			            return 'The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form';
			        case UPLOAD_ERR_PARTIAL:
			            return 'The uploaded file was only partially uploaded';
			        case UPLOAD_ERR_NO_FILE:
			            return 'No file was uploaded';
			        case UPLOAD_ERR_NO_TMP_DIR:
			            return 'Missing a temporary folder';
			        case UPLOAD_ERR_CANT_WRITE:
			            return 'Failed to write file to disk';
			        case UPLOAD_ERR_EXTENSION:
			            return 'File upload stopped by extension';
			        default:
			            return 'Unknown upload error';
			    }
			}
			?>

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