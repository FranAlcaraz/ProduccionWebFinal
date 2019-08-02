<?php 
	require dirname( __FILE__ ) . '/' . '../config.php';
	require dirname( __FILE__ ) . '/' . '../conexion.php';
	require dirname( __FILE__ ) . '/' . '../funciones.php';
	
	if(empty($_POST['id_producto'])){
		echo json_encode("obligatorio");
		die();
	}
	
	
	$id_producto=$_POST['id_producto'];
	$tipo_producto = -1; $categoria = -1; $soloDestacados = 0; $orden = ''; $limite = -1;
	$productos = obtenerProductos($con, $tipo_producto, $categoria, $id_producto, $soloDestacados, $orden, $limite);
	$numColumnas = 1;
	$tamColumna = 12;
	$tamTitulo = "height: 42px;";
	$tamDescrip = "height: 100px;";
	$tamParrafos = "height: 14px;";
	$html = "<div class='row'>";

	foreach($productos as $index => $item){
	  $html = $html."<div class='col-md-$tamColumna'>
		<div class='thumbnail'>
		  <img src='".$item['img']."' alt='".$item['alt']."'>
		  <div class='caption'>
			<h3 style='".$tamTitulo."'>".$item['txt_desc']."</h3>
			<p>".$item['descripcion']."</p>
			<p><strong>Precio: $ ".$item['precio']."</strong></p>";
			if(isset($item['cant_estrellas']) and $item['sn_destacado'] == -1){
				$html = $html."<p style='".$tamParrafos."'><strong>Oferta destacada!</strong></p>";
				$html = $html."<p style='".$tamParrafos."'><strong>Cantidad de estrellas: ".$item['cant_estrellas']."</strong></p>";
			}elseif(isset($item['cant_estrellas']) and $item['sn_destacado'] != -1){
				$html = $html."<p style='".$tamParrafos."'><strong>Cantidad de estrellas: ".$item['cant_estrellas']."</strong></p>";
				$html = $html."<p style='".$tamParrafos."'></p>";
			}elseif(!isset($item['cant_estrellas']) and $item['sn_destacado'] == -1){
				$html = $html."<p style='".$tamParrafos."'><strong>Oferta destacada!</strong></p>";
				$html = $html."<p style='".$tamParrafos."'></p>";
			}
			$html = $html."<p>
			  <a href='index.php?url=comentar&producto=".urlencode($item['txt_desc'])."&idproducto=".urlencode($item['id_producto'])."' class='btn btn-default' role='button'>Valorar</a>
			</p>
		  </div>
		</div>
	  </div>";
	} 
	
	$html = $html."</div>";
	echo json_encode($html);
?> 