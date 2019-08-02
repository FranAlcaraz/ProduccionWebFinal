<?
require('inc/header.php');

//include('clases/productos.php');
?> 

<div class="container-fluid">
      
    <?$productsMenu = 'Productos';
		include('inc/side_bar.php');
		
		$producto = new Producto($con); 
		
		if(isset($_GET['edit'])){
				$producto = $producto->get($_GET['edit']); 
		} 
		
		$query = 'SELECT id_marca, txt_desc from marcas';
		$listaMarcas = $con->query($query);
		
		$query = 'SELECT id_categoria, txt_desc FROM categorias';
		$listaCategorias = $con->query($query);
	?>
	  
	  
        
        <div class="col-sm-9 col-md-10 main">
          
          <!--toggle sidebar button-->
          <p class="visible-xs">
            <button type="button" class="btn btn-primary btn-xs" data-toggle="offcanvas"><i class="glyphicon glyphicon-chevron-left"></i></button>
          </p>
          
	  <h1 class="page-header">
                    Agregar o modificar producto
          </h1>
  
          <div class="col-md-2"></div>
            <form action="productos.php" method="post" class="col-md-6 from-horizontal" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="txt_desc" class="col-sm-2 control-label">Nombre</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" required id="txt_desc" name="txt_desc" placeholder="" value="<?=isset($producto->txt_desc)?$producto->txt_desc:'';?>">
                    </div>
                </div> 
                <div class="row"></div>
                <div class="form-group">
                    <label for="tipo" class="col-sm-2 control-label">Marcas</label>
                    <div class="col-sm-10">
                        <select name="marca" id="marca" >
                            <? foreach($listaMarcas as $t){?>
                                <option value="<?=$t['id_marca']?>"
								<?
									if(isset($producto->marca) and $producto->marca == $t['id_marca']){
										echo ' selected="selected" ';
									}
								
								?>><?=$t['txt_desc']?></option>
                            <?}?>
                        </select>
                    </div>
                </div> 
				<div class="row"></div>
				<div class="form-group">
                    <label for="tipo" class="col-sm-2 control-label">Categoria</label>
                    <div class="col-sm-10">
                        <select name="categoria" id="categoria" >
                            <? foreach($listaCategorias as $t){?>
                                <option value="<?=$t['id_categoria']?>"
								<?
									if(isset($producto->categoria) and $producto->categoria == $t['id_categoria']){
										echo ' selected="selected" ';
									}
								
								?>><?=$t['txt_desc']?></option>
                            <?}?>
                        </select>
                    </div>
                </div> 
				<div class="row"></div>
                <div class="form-group">
                    <label for="alt" class="col-sm-2 control-label">Alt para imagenes</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" required id="alt" name="alt" placeholder="" value="<?=isset($producto->alt)?$producto->alt:'';?>">
                    </div>
                </div> 
                <div class="row"></div>
				<div class="form-group">
                    <label for="img" class="col-sm-2 control-label">Ruta imagen</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="img" readonly name="img" placeholder="" value="<?=isset($producto->img)?$producto->img:'';?>">
                    </div>
                </div> 
				<div class="row"></div>
				<center>
				<?php
				if(isset($producto->img)){
				?>
					<img src="<?= '../'.$producto->img ?>" alt="<?= $producto->alt ?>">
				<?php } ?>
				</center>
				<br>
				<div class="row"></div>
				<label for="img" class="col-sm-2 control-label">Cargar imagen</label>
                <div><input type="file" name="foto" /></div>
				<br>
				<p>Tamaño recomendado: 283x209</p>
				<br>
				<div class="row"></div>
				<div class="form-group">
                    <label for="descripcion" class="col-sm-2 control-label">Descripción</label>
                    <div class="col-sm-10">
						<textarea type="text" id="descripcion" name="descripcion" class="md-textarea form-control" rows="8"><?=isset($producto->descripcion)?$producto->descripcion:'';?></textarea>
				   </div>
                </div> 
                <div class="row"></div>
				<div class="form-group">
                    <label for="tipo2" class="col-sm-2 control-label">Destacado</label>
                    <div class="col-sm-10">
                        <select name="sn_destacado" id="sn_destacado" >
							<?php
								if($producto->sn_destacado == "-1"){
									echo '<option name="si" value="-1" selected="selected">Si</option>';
									echo '<option name="no" value="0">No</option>';
								}else{
									echo '<option name="si" value="-1">Si</option>';
									echo '<option name="no" value="0" selected="selected">No</option>';
								}
							?>
                        </select>
                    </div>
                </div> 
				<div class="row"></div>
				<div class="form-group">
                    <label for="tipo2" class="col-sm-2 control-label">Habilitado</label>
                    <div class="col-sm-10">
                        <select name="sn_habilitado" id="sn_habilitado" >
							<?php
								if($producto->sn_habilitado == "-1"){
									echo '<option name="si" value="-1" selected="selected">Si</option>';
									echo '<option name="no" value="0">No</option>';
								}else{
									echo '<option name="si" value="-1">Si</option>';
									echo '<option name="no" value="0" selected="selected">No</option>';
								}
							?>
                        </select>
                    </div>
                </div>
				<div class="row"></div>
				<div class="form-group">
                    <label for="precio[]" class="col-sm-2 control-label">Precio</label>
                    <div class="col-sm-10">
						<input type="number" class="form-control" required id="precio[]" name="precio[]" min="0.01" step="0.01" value="<?=isset($producto->precio)?$producto->precio:'';?>">
                    </div>
                </div> 				
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-default" name="formulario_productos" >Guardar</button>
                    </div>
                </div> 
                <input type="hidden" class="form-control" id="id_producto" name="id_producto" placeholder="" value="<?=isset($producto->id_producto)?$producto->id_producto:'';?>">

            </form>
          </div>
 
          
      </div><!--/row-->
	</div>
</div><!--/.container-->

<?include('inc/footer.php');?>