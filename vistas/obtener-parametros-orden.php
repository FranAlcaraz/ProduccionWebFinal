<?php
	$marca = -1;
	if(empty($_POST['marca']) == false){
		$marca = $_POST['marca'];
		$marcaText = $_POST['marcaText'];
		if(is_numeric($marca) == false){
			echo "<br>La Marca es incorrecta.";
			$marca = -1;
		}
	}
	if($marca != -1){
		echo "<h2 id='subtitulo'>Marca: $marcaText</h2>";
	}
	$urlActual = $_SERVER['REQUEST_URI'];
	$orden = "p.sn_destacado asc, c.cant_estrellas desc";
	$classBtnUno = 'btn btn-default';
	$classBtnDos = 'btn btn-default';
	$classBtnTres = 'btn btn-default';
	$classBtnCuatro = 'btn btn-default';
	if(empty($_POST['orden']) == false){
		$orden = $_POST['orden'];
		switch($orden){
			case "1":
				$orden = "p.sn_destacado asc, c.cant_estrellas desc";
				$classBtnUno = 'btn btn-info';
				break;
			case "2":
				$orden = "c.cant_estrellas desc, p.sn_destacado asc";
				$classBtnDos = 'btn btn-info';
				break;
			case "3":
				$orden = "p.txt_desc";
				$classBtnTres = 'btn btn-info';
				break;
			case "4":
				$orden = "p.txt_desc desc";
				$classBtnCuatro = 'btn btn-info';
				break;
			default:
				$orden = "p.sn_destacado asc, c.cant_estrellas desc";
				break;
		}
	}

?>


	<div class="hora">
		<div class="row">
		<form method="post" action="#" name="formMarca" id="formMarca">
			<div class="col-md-2">
			</div>
			<div class="col-md-3">
				<label for="marca">Marca</label>
				<input type="hidden" name="marcaText" value="">
				<select class="form-control" id="marca" name="marca" onchange="Enviar(0);">
					<?php obtenerMarcas($con); ?>
				</select>
			</div>
			<div class="col-md-5">
				<label for="ordenar">Ordenar por:</label>
				<input type="hidden" name="orden" value="">
				<a href="#" class="<?= $classBtnUno ?>" id="orden1" name="orden1" role="button" onclick="Enviar(1);">Destacados</a>
				<a href="#" class="<?= $classBtnDos ?>" id="orden2" name="orden2" role="button" onclick="Enviar(2);">Valorados</a>
				<a href="#" class="<?= $classBtnTres ?>" id="orden3" name="orden3" role="button" onclick="Enviar(3);">A-Z</a>
				<a href="#" class="<?= $classBtnCuatro ?>" id="orden4" name="orden4" role="button" onclick="Enviar(4);">Z-A</a>
			</div>
		</form>
		</div>
	</div>
	<hr>
		<script type="text/javascript">
		function Enviar(orden){
			var text = $('#marca').find(":selected").text();
			$('input[name="marcaText"]').val(text);
			$('input[name="orden"]').val(orden);
			formMarca.submit();
		}
	</script>