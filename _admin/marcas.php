<?
require('inc/header.php'); 
?> 

<div class="container-fluid">
      
      <?$marcaMenu = 'Marcas';
	  
	 $marcas = new Marca($con);
	include('inc/side_bar.php');
	 
	 
	if(isset($_POST['formulario_marcas'])){ 
	    if($_POST['id_marca'] > 0){
                $marcas->edit($_POST); 
               
	    }else{
                $marcas->save($_POST); 
        }
		
		header('Location: marcas.php');
	}	
	 
	if(isset($_GET['del'])){
			$resp = $marcas->del($_GET['del']) 	;
            if($resp == 1){
				header('Location: marcas.php');	
			}
			echo '<script>alert("'.$resp.'");</script>';

	}
	

        ?>
	  
	  
        
        <div class="col-sm-9 col-md-10 main">
          
          <!--toggle sidebar button-->
          <p class="visible-xs">
            <button type="button" class="btn btn-primary btn-xs" data-toggle="offcanvas"><i class="glyphicon glyphicon-chevron-left"></i></button>
          </p>
          
		  <h1 class="page-header">
            Marcas
          </h1>

		  
			<h2 class="sub-header">Listado 
			<?if(in_array('marca.add',$_SESSION['usuario']['permisos'])){?>
				<a href="marcas_ae.php"><button type="button" class="btn btn-success" title="Agregar">A</button></a>
			<?}?>
			</h2>			
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Nombre</th> 
                </tr>
              </thead>
			  <tbody>
				<? 	 
					foreach($marcas->getList() as $marca){?>
              
						<tr>
						  <td><?=$marca['id_marca'];?></td>
						  <td><?=$marca['txt_desc'];?></td> 
						  <td>
							<?if(in_array('marca.edit',$_SESSION['usuario']['permisos'])){?>
								<a href="marcas_ae.php?edit=<?=$marca['id_marca']?>"><button type="button" class="btn btn-info" title="Modificar">M</button></a>
							<?}?>
							<?if(in_array('marca.del',$_SESSION['usuario']['permisos'])){?>
								<a href="marcas.php?del=<?=$marca['id_marca']?>"><button type="button" class="btn btn-danger" title="Borrar">X</button></a>
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