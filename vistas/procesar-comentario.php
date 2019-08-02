<?php
	require dirname( __FILE__ ) . '/' . '../config.php';
	require dirname( __FILE__ ) . '/' . '../conexion.php';
    if(empty($_POST['nombre']) || empty($_POST['correo']) || empty($_POST['idproducto']) || empty($_POST['mensaje'])){
        echo json_encode("obligatorio");
        //header("Location:../index.php?url=contacto&respuesta=obligatorio");
        //die();
    }else{
        //SI HAY QUE MOSTRAR LOS DATOS PROCESADOS EN LA MISMA PETICION AJAX:
        //Aca se podria devolver un OK con json encode y hacer que el cliente arme todo el html.
        //Otra opcion seria armar el html en el procesar, y devolverselo al cliente con json encode.
        $idproducto = $_POST['idproducto'];
		$nombre = $_POST['nombre'];
		$estrellas = $_POST['estrellas'];
        $correo = trim($_POST['correo']);
        $mensaje = nl2br(trim($_POST['mensaje']));
		$ip_origen = $_SERVER['REMOTE_ADDR'];
		
		$sql = "SELECT distinct 1 existe FROM comentarios WHERE trim(IP_ORIGEN) = trim('$ip_origen') AND DATE(FECHA) = DATE(NOW())";
		$resultado = $con->query($sql);
		foreach($resultado as $index => $valor){
			if($valor[0] == 1){
				echo json_encode("yacomento");
				die();
			}
		}
        $html = "
        <p>Comentario enviado, muchas gracias $nombre! El mensaje será revisado por un administrador para ser aprobado.</p>
        <p>Los datos que recibimos son:</p>
        Nombre: $nombre<br>
        Correo: $correo<br>
        <p>Mensaje: $mensaje</p>
        <p>Calificacion: $estrellas</p>
        Ofertas: <br>";
        
		//mail("jorge.doural@davinci.edu.ar","Asunto","Probando");
		
        $sql = "INSERT INTO comentarios (ID_PRODUCTO, IP_ORIGEN, FECHA, TXT_NOMBRE, TXT_EMAIL, TXT_COMENTARIO, CANT_ESTRELLAS, SN_APROBADO) 
		SELECT $idproducto, '$ip_origen', NOW(), '$nombre', '$correo', '$mensaje', $estrellas, 0";
		$ejecutar = $con->query($sql);
		
		echo json_encode($html);
		//SI HAY QUE MOSTRAR LOS DATOS PROCESADOS EN LA MISMA PETICION AJAX.
    }
?>