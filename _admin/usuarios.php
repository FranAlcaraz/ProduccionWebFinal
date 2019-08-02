<?
require('inc/header.php');
//include('clases/usuarios.php');
?> 

<div class="container-fluid">
      
      <?$userMenu = 'Usuarios';
	include('inc/side_bar.php');
	 
	if(isset($_POST['submit'])){ 
	    if($_POST['id_usuario'] > 0){
                $user->edit($_POST); 
               
	    }else{
                $user->save($_POST); 
        }
		
		header('Location: usuarios.php');
	}	
	

	if(isset($_GET['del'])){
            $user->del($_GET['del']);
            header('Location: usuarios.php');

	}
	
	   if(  !in_array('user.add',$_SESSION['usuario']['permisos']) &&
			!in_array('user.del',$_SESSION['usuario']['permisos']) &&		
			!in_array('user.edit',$_SESSION['usuario']['permisos']) &&
			!in_array('user.see',$_SESSION['usuario']['permisos'])){ 
				header('Location: index.php');
			}

        ?>
	  
	  
        
        <div class="col-sm-9 col-md-10 main">
          
          <!--toggle sidebar button-->
          <p class="visible-xs">
            <button type="button" class="btn btn-primary btn-xs" data-toggle="offcanvas"><i class="glyphicon glyphicon-chevron-left"></i></button>
          </p>
          
		  <h1 class="page-header">
            Usuarios
          </h1>
 

          <h2 class="sub-header">Listado 
		  <?if(in_array('user.add',$_SESSION['usuario']['permisos'])){?>
				<a href="usuarios_ae.php"><button type="button" class="btn btn-success" title="Modificar">A</button></a>
		  <?}?>	
		  </h2>
		   <?if(in_array('user.see',$_SESSION['usuario']['permisos'])){?>
			  <div class="table-responsive">
				<table class="table table-striped">
				  <thead>
					<tr>
					  <th>#</th>
					  <th>Nombre</th>
					  <th>Apellido</th>
					  <th>Usuario</th>
					  <th>eMail</th>
					  <th>Perfil</th>
					  <th>Activo</th>
					  <th>Acciones</th>
					</tr>
				  </thead>
				  <tbody>
					<? 	 
						foreach($user->getList() as $usuario){?>
				  
							<tr>
							  <td><?=$usuario['id_usuario'];?></td>
							  <td><?=$usuario['nombre'];?></td>
							  <td><?=$usuario['apellido'];?></td>
							  <td><?=$usuario['usuario'];?></td>
							  <td><?=$usuario['email'];?></td>
							  <td><?=isset($usuario['perfiles'])?implode(', ',$usuario['perfiles']):'No tiene perfiles asignados';?></td>
							  <td><?=($usuario['activo'])?'si':'no';?></td>
							  <td>
								  <?if(in_array('user.edit',$_SESSION['usuario']['permisos'])){?>
										<a href="usuarios_ae.php?edit=<?=$usuario['id_usuario']?>"><button type="button" class="btn btn-info" title="Modificar">M</button></a>
								  <?}?>
								   <?if(in_array('user.del',$_SESSION['usuario']['permisos'])){?>
										<a href="usuarios.php?del=<?=$usuario['id_usuario']?>"><button type="button" class="btn btn-danger" title="Borrar">X</button></a>
								<?}?>
							  </td>
							</tr>
						<?}?>                
				  </tbody>
				</table>
			  </div>
 <?}?> 
          
      </div><!--/row-->
	</div>
</div><!--/.container-->

<?include('inc/footer.php');?>