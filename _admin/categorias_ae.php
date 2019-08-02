<?
require('inc/header.php');
 
?> 

<div class="container-fluid">
      
    <?$categorysMenu = 'Categorias';
		include('inc/side_bar.php');
		
		$categoria = new Categoria($con); 
		
		$query = 'SELECT id_categoria, txt_desc FROM categorias union all select 0, "Ninguna"';
		$listaCategorias = $con->query($query);
		
		if(isset($_GET['edit'])){
				$categorias = $categoria->get($_GET['edit']); 
		} 

	?>
	  
	  
        
        <div class="col-sm-9 col-md-10 main">
          
          <!--toggle sidebar button-->
          <p class="visible-xs">
            <button type="button" class="btn btn-primary btn-xs" data-toggle="offcanvas"><i class="glyphicon glyphicon-chevron-left"></i></button>
          </p>
          
	  <h1 class="page-header">
                    Agregar o modificar categoria
          </h1>
  
          <div class="col-md-2"></div>
		  
            <form action="categorias.php" method="post" class="col-md-6 from-horizontal">
                <div class="form-group">
                    <label for="txt_desc" class="col-sm-2 control-label">Nombre</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" required id="txt_desc" name="txt_desc" placeholder="" value="<?=(isset($categorias->txt_desc)?$categorias->txt_desc:'');?>">
                    </div>
                </div> 
				<div class="row"></div>
				<div class="form-group">
                    <label for="txt_icon" class="col-sm-2 control-label">Icono</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="txt_icon" name="txt_icon" placeholder="" value="<?=(isset($categorias->txt_icon)?$categorias->txt_icon:'');?>">
                    </div>
                </div> 
                <div class="row"></div>
                <div class="form-group">
                    <label for="tipo" class="col-sm-2 control-label">Padre</label>
                    <div class="col-sm-10">
                        <select name="id_padre" id="id_padre" >
                            <? foreach($listaCategorias as $t){?>
                                <option value="<?=$t['id_categoria']?>"
								<?
									if(isset($categorias->id_padre) and $categorias->id_padre == $t['id_categoria']){
										echo ' selected="selected" ';
									}
								
								?>><?=$t['txt_desc']?></option>
                            <?}?>
                        </select>
                    </div>
                </div> 
				<div class="row"></div>
				<div class="form-group">
                    <label for="tipo2" class="col-sm-2 control-label">Habilitada</label>
                    <div class="col-sm-10">
                        <select name="sn_habilitada" id="sn_habilitada" >
							<?php
								if($categorias->sn_habilitada == "-1"){
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
                 
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-default" name="formulario_categorias" >Guardar</button>
                    </div>
                </div> 
                <input type="hidden" class="form-control" id="id_categoria" name="id_categoria" placeholder="" value="<?=(isset($categorias->id_categoria)?$categorias->id_categoria:'');?>">

            </form>
          </div>
 
          
      </div><!--/row-->
	</div>
</div><!--/.container-->

<?include('inc/footer.php');?>