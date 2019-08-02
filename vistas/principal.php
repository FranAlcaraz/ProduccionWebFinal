				<div id="slider">
                    <figure class="animfigure">
                        <?php foreach($sliders as $item){ ?>
                            <a href="<?= $item['url'] ?>">
								<img src="<?= $item['src'] ?>" alt="<?= $item['alt'] ?>" title="<?= $item['title'] ?>" width="<?= $item['width'] ?>" height="<?= $item['height'] ?>">
							</a>
                        <?php } ?> 
                    </figure>
                </div>
                <div id="hora" class="hora"><?= obtenerFecha(date_default_timezone_get()); ?></div>
				<h1 id="titulo">Ofertas más valoradas y destacadas: </h1>
                <?php 
					$tipo_producto = -1; $categoria = -1; $id_producto = -1; $soloDestacados = -1; $orden = 'p.sn_destacado, RAND() DESC'; $limite = 6;
					$productos = obtenerProductos($con, $tipo_producto, $categoria, $id_producto, $soloDestacados, $orden, $limite);
					$numColumnas = 3;
					$contFila = 0;
					$tamColumna = 12 / $numColumnas;
					$tamTitulo = "height: 42px;";
					$tamDescrip = "height: 100px;";
					$tamParrafos = "height: 14px;";
					include('dibujar_productos.php'); 
				?>
				<div class="wrapper-testimonios">
                    <div class="slider-testimonios" id="testimonios">
                        <?php include("leer-comentarios.php"); ?>
                    </div>
                </div>