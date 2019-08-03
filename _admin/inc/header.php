<!DOCTYPE html>
<? session_start();
include('../config.php');
include('../conexion.php');

include('clases/usuarios.php');
include('clases/productos.php');
include('clases/categorias.php');
//include('clases/regiones.php');
include('clases/marcas.php');
include('clases/perfil.php');
include('clases/comentarios.php');


try {
        $con = new PDO('mysql:host='.$hostname.';port='.$port.';dbname='.$database, $username, $password, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES  \'UTF8\''));
} catch (PDOException $e) {
        print "¡Error!: " . $e->getMessage();
        die();
}


$user = new Usuario($con);
$producto = new Producto($con);
$categoria = new Categoria($con);
//$region = new Region($con);
$marca = new Marca($con);
$comentario = new Comentario($con);

if(isset($_POST['login'])){
	$user->login($_POST);
}
 
if(isset($_GET['logout'])){
    unset($_SESSION['usuario']); 

}
	
if($user->notLogged()){
	 header('Location: login.php');
}
?>
<html lang="es">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>Dashboard with Off-canvas Sidebar</title>
		<meta name="generator" content="Bootply" />
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<!--[if lt IE 9]>
			<script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		<link href="css/styles.css" rel="stylesheet">
	</head>
	<body>
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Hola <?=$_SESSION['usuario']['nombre']?></a>
        </div>
      </div>
</nav>