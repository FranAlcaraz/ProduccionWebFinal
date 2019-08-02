               <?php 
					if(empty($_GET['cat']) == true){
						echo "Categoria inexistente";
						die();
					}else{
						$cat = $_GET['cat'];
						$sql = "SELECT TXT_DESC FROM categorias WHERE id_categoria = ".$cat;
						$resp = $con->query($sql);
						$titulo = "Tipo de producto inexistente";
						if($resp != false){
							foreach($resp as $index => $item){
								$titulo = strtoupper($item['TXT_DESC']);
							}
						}
					}
			   ?>
			   <h1 id="titulo"><?= $titulo ?></h1>
					<?php 
						include('obtener-parametros-orden.php');
						$id_producto = -1; $soloDestacados = 0; $limite = -1;
						$productos = obtenerProductos($con, $marca, $cat, $id_producto, $soloDestacados, $orden, $limite);
						$numColumnas = 3;
						$contFila = 0;
						$tamColumna = 12 / $numColumnas;
						$tamTitulo = "height: 42px;";
						$tamDescrip = "height: 100px;";
						$tamParrafos = "height: 14px;";
						include('dibujar_productos.php'); 
					?>
				
				
	
					
					