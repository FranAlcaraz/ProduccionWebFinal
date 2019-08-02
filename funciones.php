<?php
    function obtenerFecha($local){
        date_default_timezone_set($local);
        return "Fecha actual: " . date("d") . "/" . date("m") . "/" . date("Y") . ".";
    }
	
	function obtenerProductos($con, $marca, $categoria, $id_producto, $soloDestacados, $orden, $limite){
		if($marca != -1){
			$marca = ' AND (p.marca = '.$marca.' OR '.$marca.' = -1) ';
		}else{
			$marca = '';
		}
		if($categoria != -1){
			$categoria = ' AND (p.categoria = '.$categoria.' OR '.$categoria.' = -1) ';
		}else{
			$categoria = '';
		}
		if($id_producto != -1){
			$id_producto = ' AND p.id_producto = '.$id_producto.' ';
		}else{
			$id_producto = '';
		}
		if($soloDestacados == -1){
			$soloDestacados = ' AND ((c.id_producto_c is not null AND c.cant_estrellas >= 4) OR p.sn_destacado = -1) ';
		}else{
			$soloDestacados = '';
		}
		if($orden != ''){
			$orden = ' ORDER BY '.$orden.' ';
		}else{
			$orden = '';
		}
		if($limite != -1){
			$limite = ' LIMIT '.$limite.' ';
		}else{
			$limite = '';
		}
		
		$sql = 'SELECT p.*, IFNULL(c.cant_estrellas, "Sin rank") cant_estrellas, pp.precio, p.sn_destacado
				FROM productos p
				LEFT JOIN (SELECT c.id_producto id_producto_c, SUM(c.cant_estrellas)/COUNT(*) cant_estrellas
							FROM comentarios c 
							GROUP BY c.id_producto) c ON c.id_producto_c = p.id_producto
				JOIN precios pp ON pp.id_producto = p.id_producto
								AND pp.fecha_desde = (SELECT MAX(tmp.fecha_desde)
														FROM precios tmp
														WHERE tmp.id_producto = pp.id_producto
														AND DATE(tmp.fecha_desde) <= DATE(NOW()))
				WHERE p.sn_habilitado = -1
				'.$region.'
				'.$categoria.'
				'.$id_producto.'
				'.$soloDestacados.'
				'.$orden.'
				'.$limite;
		$productos = $con->query($sql);
		return $productos;
	}
	
	function obtenerCategorias($con, $padre = 0){
		$sql = "SELECT c.*, (select count(1) from categorias cc where cc.id_padre = c.id_categoria) hijas 
				FROM categorias c WHERE c.id_padre = $padre and sn_habilitada = -1 ORDER BY c.txt_desc DESC";
		$categorias = $con->query($sql);
		foreach($categorias as $index => $item){
			
			if ($item['hijas'] > 0){
				echo '<li class="dropdown dropdown-submenu"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="'.$item['txt_icon'].'"></i>'.$item['txt_desc'].'</a>';
				echo '<ul class="dropdown-menu">';

				obtenerCategorias($con, $item['id_categoria']);
				echo '</ul>';
				echo '</li>';
			}else{
				echo '<li><a href="index.php?url=productos&cat='.$item['id_categoria'].'" id="'.$item['id_categoria'].'" ><i class="'.$item['txt_icon'].'"></i>'.$item['txt_desc'].'</a></li>';
			}
			
			
		}
	}
	
	function obtenerRegiones($con){
		$region = -1;
		if(empty($_POST['region']) == false){
			$region = $_POST['region'];
			if(is_numeric($region) == false){
				$region = -1;
			}
		}
		$sql = "SELECT * from regiones ";
		$regiones = $con->query($sql);
		foreach($regiones as $index => $item){
			if($region == $item['id_region']){
				echo '<option value="'.$item['id_region'].'" selected>'.$item['txt_desc'].'</option>';
			}else{
				echo '<option value="'.$item['id_region'].'">'.$item['txt_desc'].'</option>';
			}
		}
	}
				
?>