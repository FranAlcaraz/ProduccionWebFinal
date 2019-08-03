<?
require('inc/header.php');
 
?> 

<div class="container-fluid">
      
      <?$marcaMenu = 'Marcas';
	include('inc/side_bar.php');
	
	$marca = new Marca($con); 
	
	if(isset($_GET['edit'])){
            $marcas = $marca->get($_GET['edit']); 
	} 

	?>
	  
	  
        
        <div class="col-sm-9 col-md-10 main">
          
          <!--toggle sidebar button-->
          <p class="visible-xs">
            <button type="button" class="btn btn-primary btn-xs" data-toggle="offcanvas"><i class="glyphicon glyphicon-chevron-left"></i></button>
          </p>
          
	  <h1 class="page-header">
                    Agregar o modificar marca
          </h1>
  
          <div class="col-md-2"></div>
		  
            <form action="marcas.php" method="post" class="col-md-6 from-horizontal">
                <div class="form-group">
                    <label for="txt_desc" class="col-sm-2 control-label">Nombre</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" required id="txt_desc" name="txt_desc" placeholder="" value="<?=(isset($marcas->txt_desc)?$marcas->txt_desc:'');?>">
                    </div>
                </div> 
				<div class="row"></div>
                 
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-default" name="formulario_marcas" >Guardar</button>
                    </div>
                </div> 
                <input type="hidden" class="form-control" id="id_marca" name="id_marca" placeholder="" value="<?=(isset($marcas->id_marca)?$marcas->id_marca:'');?>">

            </form>
          </div>
 
          
      </div><!--/row-->
	</div>
</div><!--/.container-->

<?include('inc/footer.php');?>