<?
	require('inc/header.php');
	
	function resizeImagen($ruta, $nombre, $alto, $ancho,$nombreN,$extension){
		$rutaImagenOriginal = $ruta.$nombre;
		if($extension == 'GIF' || $extension == 'gif'){
		$img_original = imagecreatefromgif($rutaImagenOriginal);
		}
		if($extension == 'jpg' || $extension == 'JPG'){
		$img_original = imagecreatefromjpeg($rutaImagenOriginal);
		}
		if($extension == 'png' || $extension == 'PNG'){
		$img_original = imagecreatefrompng($rutaImagenOriginal);
		}
		$max_ancho = $ancho;
		$max_alto = $alto;
		list($ancho,$alto)=getimagesize($rutaImagenOriginal);
		$x_ratio = $max_ancho / $ancho;
		$y_ratio = $max_alto / $alto;
		if( ($ancho <= $max_ancho) && ($alto <= $max_alto) ){//Si ancho 
			$ancho_final = $ancho;
			$alto_final = $alto;
		} elseif (($x_ratio * $alto) < $max_alto){
			$alto_final = ceil($x_ratio * $alto);
			$ancho_final = $max_ancho;
		} else{
			$ancho_final = ceil($y_ratio * $ancho);
			$alto_final = $max_alto;
		}
		$tmp=imagecreatetruecolor($ancho_final,$alto_final);
		imagecopyresampled($tmp,$img_original,0,0,0,0,$ancho_final, $alto_final,$ancho,$alto);
		imagedestroy($img_original);
		$calidad=100;
		imagejpeg($tmp,$ruta.$nombreN,$calidad);
	}
	
	function saveImagen($producto){
		// el archivo es un JPG/GIF/PNG, entonces...
		$tmpVariable = explode('.', $_FILES['foto']['name']);
		$extension = end($tmpVariable);
		$foto = substr(md5(uniqid(rand())),0,10).".".$extension;
		$directorio = dirname(dirname(__FILE__)).'\img\productos'; // directorio de tu elección
		
		// almacenar imagen en el servidor
		move_uploaded_file($_FILES['foto']['tmp_name'], $directorio.'/'.$foto);
		$nueFoto = 'producto'.$producto.'.png';
		resizeImagen($directorio.'/', $foto, 500, 283,$nueFoto,'png');
		unlink($directorio.'/'.$foto);
	}
?> 

<div class="container-fluid">
      
    <?$productsMenu = 'Productos';
		$producto = new Producto($con);
		include('inc/side_bar.php');
		if(isset($_GET['error'])){
			$error = $_GET['error'];
			if ($error == "noFormato"){
				echo '<script>alert("El formato de la imagen no es válido");</script>';
			}else if($error == "noImagen"){
				echo '<script>alert("No has seleccionado una imagen para el producto");</script>';
			}else{
				echo '<script>alert("Error inesperado");</script>';
			}
		}

		if(isset($_POST['formulario_productos'])){ 
			if($_POST['id_producto'] > 0){			
				if($_FILES['foto']['name'] != ""){ 
					$allowedExts = array("jpg", "jpeg", "gif", "png", "JPG", "GIF", "PNG");
					$tmpVariable = explode(".", $_FILES['foto']['name']);
					$extension = end($tmpVariable);
					if ((($_FILES["foto"]["type"] == "image/gif")
						|| ($_FILES["foto"]["type"] == "image/jpeg")
						|| ($_FILES["foto"]["type"] == "image/png")
						|| ($_FILES["foto"]["type"] == "image/pjpeg"))
						&& in_array($extension, $allowedExts)) {
							saveImagen($_POST['id_producto']);
					}else { // El archivo no es JPG/GIF/PNG
						$malformato = $_FILES["foto"]["type"];
						header("Location: productos.php?error=noFormato&formato=$malformato");
						exit;
					}
				}
				$producto->edit($_POST); 
			}else{
				if($_FILES['foto']['name'] == ""){ 
					header("Location: productos.php?error=noImagen");
					exit;
				}
				if($_FILES['foto']['name'] != ""){ 
					$allowedExts = array("jpg", "jpeg", "gif", "png", "JPG", "GIF", "PNG");
					$tmpVariable = explode(".", $_FILES['foto']['name']);
					$extension = end($tmpVariable);
					if ((($_FILES["foto"]["type"] == "image/gif")
						|| ($_FILES["foto"]["type"] == "image/jpeg")
						|| ($_FILES["foto"]["type"] == "image/png")
						|| ($_FILES["foto"]["type"] == "image/pjpeg"))
						&& in_array($extension, $allowedExts)) {
							saveImagen($producto->save($_POST));
					}else { // El archivo no es JPG/GIF/PNG
						$malformato = $_FILES["foto"]["type"];
						header("Location: productos.php?error=noFormato&formato=$malformato");
						exit;
					}
				}
			}
			header('Location: productos.php');
		}	
		
		if(isset($_GET['del'])){
			$producto->del($_GET['del']);
			header('Location: productos.php');
		}
		
		if(  !in_array('product.add',$_SESSION['usuario']['permisos']) &&
			!in_array('product.del',$_SESSION['usuario']['permisos']) &&		
			!in_array('product.edit',$_SESSION['usuario']['permisos']) &&
			!in_array('product.see',$_SESSION['usuario']['permisos'])){ 
				header('Location: index.php');
		}

    ?>
	  
	  
        
        <div class="col-sm-9 col-md-10 main">
          
          <!--toggle sidebar button-->
          <p class="visible-xs">
            <button type="button" class="btn btn-primary btn-xs" data-toggle="offcanvas"><i class="glyphicon glyphicon-chevron-left"></i></button>
          </p>
          
		  <h1 class="page-header">
            <?=$productsMenu?>
          </h1>
 
			
			<h2 class="sub-header">Listado 
			<?if(in_array('product.add',$_SESSION['usuario']['permisos'])){?>
			<a href="productos_ae.php"><button type="button" class="btn btn-success" title="Agregar">A</button></a>
			<?}?>	
			</h2>
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Marca</th>
				  <th>Categoria</th>
				  <th>Nombre</th>
				  <th>Destacado S/N</th>
				  <th>Habilitado S/N</th>
                </tr>
              </thead>
			  <tbody> 
              <? 	 
						foreach($producto->getList() as $producto){?>
							<tr>
							  <td><?=$producto['id_producto'];?></td>
							  <td><?=$producto['tipoProducto'];?></td>
							  <td><?=$producto['categoria'];?></td>
							  <td><?=$producto['nombre'];?></td>
							  <td><?=$producto['sn_destacado'];?></td>
							  <td><?=$producto['sn_habilitado'];?></td>
							  
							  
							  
							  <td>
								  <?if(in_array('product.edit',$_SESSION['usuario']['permisos'])){?>
										<a href="productos_ae.php?edit=<?=$producto['id_producto']?>"><button type="button" class="btn btn-info" title="Modificar">M</button></a>
								  <?}?>
								   <?if(in_array('product.del',$_SESSION['usuario']['permisos'])){?>
										<a href="productos.php?del=<?=$producto['id_producto']?>"><button type="button" class="btn btn-danger" title="Borrar">X</button></a>
								<?}?>
							  </td>
							</tr>
							
						<?}?>         
              </tbody>
            </table>
          </div>
 
          
      </div><!--/row-->
	</div>
</div><!--/.container-->

<?include('inc/footer.php');?>