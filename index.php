<!DOCTYPE html>
<html lang="es">
    <head>
      
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>TravelWorld</title>
        <meta name="author" content="Francisco Alcaraz">
        <meta name="description" content="Vape Argentina">
        <meta name="keywords" content="vapeo, equipos , smok, vaporesso, liquidos">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        
        <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
        <script src="js/functions.js"></script>
        <link rel="stylesheet" href="sss/sss.css">
		<link rel="stylesheet" href="css/landing.css">
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
	
		<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
		<script src="bootstrap/js/bootstrap.min.js"></script>
        <script src="sss/sss.js"></script>
		<link rel="stylesheet" href="css/main.css">
    </head>
    <body>
        <?php include("vistas/menu.php"); ?>  

        <!-- CONTENIDO:-->
        <div id="container">
		
            <!-- MAIN:-->
            <main id="body">
				<?php
					if(empty($_GET['url']) == false){
						$url = trim($_GET['url']);
						$urlok = false;
						foreach($menu as $item){ 
							if($item['id'] == $url){
								$urlok = true;
								include('vistas/'.$item['id'].'.php');
							}
						}
						if($urlok == false){
							include('vistas/404.php');
						}
					}else{
						include('vistas/principal.php');
					}
				?>
            </main>

			<!-- FOOTER:-->
            <?php include("vistas/footer.php"); ?>       
        </div>
    </body>
</html>
