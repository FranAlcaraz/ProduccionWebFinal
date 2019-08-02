<?
require('inc/header.php'); 
?> 

<div class="container-fluid">
      
    <?$commentsMenu = 'Comentarios';
	  
		$comentarios = new Comentario($con);
		include('inc/side_bar.php');

		if(isset($_GET['app'])){
			$resp = $comentarios->app($_GET['app']) 	;
			if($resp == 1){
				header('Location: comentarios.php');	
			}
			echo '<script>alert("'.$resp.'");</script>';
		}
		
		if(isset($_GET['dis'])){
			$resp = $comentarios->dis($_GET['dis']) 	;
			if($resp == 1){
				header('Location: comentarios.php');	
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
            Comentarios
          </h1>

		  
			<h2 class="sub-header">Listado</h2>			
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Producto</th> 
				  <th>IP</th>
				  <th>Fecha</th>
				  <th>Nombre</th>
				  <th>Email</th>
				  <th>Comentario</th>
				  <th>Estrellas</th>
				  <th>Aprobado</th>
                </tr>
              </thead>
			  <tbody>
				<? 	 
					foreach($comentarios->getList() as $comentario){?>
              
						<tr>
						  <td><?=$comentario['id_comentario'];?></td>
						  <td><?=$comentario['txt_desc'];?></td> 
						  <td><?=$comentario['ip_origen'];?></td> 
						  <td><?=$comentario['fecha'];?></td> 
						  <td><?=$comentario['txt_nombre'];?></td> 
						  <td><?=$comentario['txt_email'];?></td> 
						  <td><?=$comentario['txt_comentario'];?></td> 
						  <td><?=$comentario['cant_estrellas'];?></td> 
						  <td><?=$comentario['sn_aprobado'];?></td> 
						  <td>
							<?if(in_array('comment.app',$_SESSION['usuario']['permisos'])){?>
								<a href="comentarios.php?app=<?=$comentario['id_comentario']?>"><button type="button" class="btn btn-success" title="Aprobar">A</button></a>
							<?}?>
							<?if(in_array('comment.dis',$_SESSION['usuario']['permisos'])){?>
								<a href="comentarios.php?dis=<?=$comentario['id_comentario']?>"><button type="button" class="btn btn-danger" title="Desaprobar">D</button></a>
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