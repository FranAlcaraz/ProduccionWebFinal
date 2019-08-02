<?php
	require dirname( __FILE__ ) . '/' . '../config.php';
	require dirname( __FILE__ ) . '/' . '../conexion.php';
    if(empty($_POST['nombre']) || empty($_POST['apellido']) || empty($_POST['correo']) || empty($_POST['telefono']) || empty($_POST['asunto']) || empty($_POST['mensaje'])){
        echo json_encode("obligatorio");
        //header("Location:../index.php?url=contacto&respuesta=obligatorio");
        //die();
    }else{
        //SI HAY QUE MOSTRAR LOS DATOS PROCESADOS EN LA MISMA PETICION AJAX:
        //Aca se podria devolver un OK con json encode y hacer que el cliente arme todo el html.
        //Otra opcion seria armar el html en el procesar, y devolverselo al cliente con json encode.
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $correo = trim($_POST['correo']);
        $telefono = trim($_POST['telefono']);
        $asunto = trim($_POST['asunto']);
        $mensaje = nl2br(trim($_POST['mensaje']));
        $copia = isset($_POST['copia']) ? 'Si' : 'No'; 
        $copia = trim($copia);
        $ofertas = isset($_POST['ofertas']) ? $_POST['ofertas'] : ''; 
        $ofertas = empty($ofertas) ? '' : $ofertas; 
		$ip_origen = $_SERVER['REMOTE_ADDR'];

        $html = "
        <p>¡Mensaje enviado, muchas gracias $nombre $apellido! En breve te estaremos respondiendo.</p>
        <p>Los datos que recibimos son:</p>
        Nombre: $nombre<br>
        Apellido: $apellido<br>
        Correo: $correo<br>
        Telefono: $telefono<br>
        Asunto: $asunto<br>
        <p>Mensaje: $mensaje</p>
        <p>Copia email: $copia</p>
        Ofertas: <br>";

        if(empty($ofertas)){
            $html = $html . "Ninguna";
        }else{
            $unarray = $ofertas;
            $html = $html . '<ul>';
            foreach($unarray as $valor){
                $html = $html . "<li>".$valor."</li>";
            }
            $html = $html . "</ul>";
        }
		
		$sql = "INSERT INTO contacto (IP_ORIGEN, FECHA, TXT_NOMBRE, TXT_APELLIDO, TXT_EMAIL, TXT_TELEFONO, TXT_ASUNTO, TXT_MENSAJE) 
		SELECT '$ip_origen', NOW(), '$nombre', '$apellido', '$correo', '$telefono', '$asunto', '$mensaje'";
		$ejecutar = $con->query($sql);
		
        echo json_encode($html);
        //SI HAY QUE MOSTRAR LOS DATOS PROCESADOS EN LA MISMA PETICION AJAX.
        
        
        //ANTES DE MANEJAR TODO DEL LADO DEL CLIENTE SERIA:
            /*$nombre = trim($_POST['nombre']);
            $apellido = trim($_POST['apellido']);
            $correo = trim($_POST['correo']);
            $telefono = trim($_POST['telefono']);
            $asunto = trim($_POST['asunto']);
            $mensaje = trim($_POST['mensaje']);
            $copia = isset($_POST['copia']) ? 'Si' : 'No'; 
            $ofertas = isset($_POST['ofertas']) ? serialize($_POST['ofertas']) : ''; 
            $mensaje = urlencode($mensaje);
            header("Location:../index.php?url=gracias&nombre=$nombre&apellido=$apellido&correo=$correo&telefono=$telefono&asunto=$asunto&mensaje=$mensaje&copia=$copia&ofertas=$ofertas"); 
            die(); */
        //ANTES DE MANEJAR TODO DEL LADO DEL CLIENTE SERIA.
    }
 ?>
