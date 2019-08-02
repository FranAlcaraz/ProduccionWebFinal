<?
require('inc/header.php'); 
?> 

<div class="container-fluid">
      
    <?$categorysMenu = 'Categorias';
	  
		$categorias = new Categoria($con);
		include('inc/side_bar.php');


		if(isset($_POST['formulario_categorias'])){ 
			if($_POST['id_categoria'] > 0){
				$categorias->edit($_POST); 
			   
			}else{
				$categorias->save($_POST); 
			}

			header('Location: categorias.php');
		}	

		if(isset($_GET['del'])){
			$resp = $categorias->del($_GET['del']) 	;
			if($resp == 1){
				header('Location: categorias.php');	
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
            Categorias
          </h1>

		  
			<h2 class="sub-header">Listado 
			<?if(in_array('category.add',$_SESSION['usuario']['permisos'])){?>
				<a href="categorias_ae.php"><button type="button" class="btn btn-success" title="Agregar">A</button></a>
			<?}?>
			</h2>			
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Nombre</th> 
				  <th>Icono</th>
				  <th>Padre</th>
				  <th>Habilitada</th>
                </tr>
              </thead>
			  <tbody>
				<? 	 
					foreach($categorias->getList() as $categoria){?>
              
						<tr>
						  <td><?=$categoria['id_categoria'];?></td>
						  <td><?=$categoria['txt_desc'];?></td> 
						  <td><?=$categoria['txt_icon'];?></td> 
						  <td><?=$categoria['txt_padre'];?></td> 
						  <td><?=$categoria['txt_habilitada'];?></td> 
						  <td>
							<?if(in_array('category.edit',$_SESSION['usuario']['permisos'])){?>
								<a href="categorias_ae.php?edit=<?=$categoria['id_categoria']?>"><button type="button" class="btn btn-info" title="Modificar">M</button></a>
							<?}?>
							<?if(in_array('category.del',$_SESSION['usuario']['permisos'])){?>
								<a href="categorias.php?del=<?=$categoria['id_categoria']?>"><button type="button" class="btn btn-danger" title="Borrar">X</button></a>
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