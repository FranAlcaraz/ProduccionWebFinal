<div class="row">
	<?php 
	if($productos != false) { 
		foreach($productos as $index => $item){ ?>
		  <div class="col-md-<?php echo $tamColumna; ?>">
			<div class="thumbnail">
			  <img src="<?= $item['img'] ?>" alt="<?= $item['alt'] ?>">
			  <div class="caption">
				<h3 style="<?= $tamTitulo; ?>"><?= $item['txt_desc'] ?></h3>
				<p style="<?= $tamDescrip; ?>"><?= substr($item['descripcion'], 0, 161)."..."; ?></p>
				<p><strong>Precio: $ <?= $item['precio']; ?></strong></p>
				<?php
					if(isset($item['cant_estrellas']) and $item['sn_destacado'] == -1){
						echo "<p style='".$tamParrafos."'><strong>Oferta destacada!</strong></p>";
						echo "<p style='".$tamParrafos."'><strong>Cantidad de estrellas: ".$item['cant_estrellas']."</strong></p>";
					}elseif(isset($item['cant_estrellas']) and $item['sn_destacado'] != -1){
						echo "<p style='".$tamParrafos."'><strong>Cantidad de estrellas: ".$item['cant_estrellas']."</strong></p>";
						echo "<p style='".$tamParrafos."'></p>";
					}elseif(!isset($item['cant_estrellas']) and $item['sn_destacado'] == -1){
						echo "<p style='".$tamParrafos."'><strong>Oferta destacada!</strong></p>";
						echo "<p style='".$tamParrafos."'></p>";
					}
				?>
				<p>
				  <a class="btn btn-primary" role="button" onClick="obtenerProducto(document, <?= $item['id_producto']; ?>);">Más información</a>
				  <a href="index.php?url=comentar&producto=<?= urlencode($item['txt_desc']) ?>&idproducto=<?= urlencode($item['id_producto']); ?>" class="btn btn-default" role="button">Valorar</a>
				</p>
			  </div>
			</div>
		  </div>
		<?php 
		$contFila++;
		if($contFila % $numColumnas == 0) echo '</div><div class="row">';
		}
	}
	?> 
</div>