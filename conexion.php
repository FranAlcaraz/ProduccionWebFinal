<?php 
include('config.php');
	try {         
		$con = new PDO('mysql:host='.$hostname.';port='.$port.';dbname='.$database, $username, $password, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES  \'UTF8\''));
	}
	catch (PDOException $e) {
		print "¡Error al conectar a la base de datos!: " . $e->getMessage();
		throw new Exception("¡Error al conectar a la base de datos!: " . $e->getMessage());
		die();
	}
?>