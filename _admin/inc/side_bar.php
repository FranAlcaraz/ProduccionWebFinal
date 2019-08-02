<div class="row row-offcanvas row-offcanvas-left">
        
         <div class="col-sm-3 col-md-2 sidebar-offcanvas" id="sidebar" role="navigation">
           
            <ul class="nav nav-sidebar">
              <li><a href="index.php">Home</a></li>
			  <?if( in_array('category.add',$_SESSION['usuario']['permisos']) ||
					in_array('category.del',$_SESSION['usuario']['permisos'])||		
					in_array('category.edit',$_SESSION['usuario']['permisos'])||
					in_array('category.see',$_SESSION['usuario']['permisos'])){?>
					<li class="<?=isset($categorysMenu)?'active':''?>"><a href="categorias.php">Categorias</a></li>
			  <?}?>
			  
			  <?//if( in_array('region.add',$_SESSION['usuario']['permisos']) ||
				//	in_array('region.del',$_SESSION['usuario']['permisos'])||		
				//	in_array('region.edit',$_SESSION['usuario']['permisos'])||
				//	in_array('region.see',$_SESSION['usuario']['permisos'])){?>
<!--					<li class="<?=isset($regionsMenu)?'active':''?>"><a href="regiones.php">Regiones</a></li>-->
			  <?//}?>
            
			    <?if( in_array('marca.add',$_SESSION['usuario']['permisos']) ||
					in_array('marca.del',$_SESSION['usuario']['permisos'])||		
					in_array('marca.edit',$_SESSION['usuario']['permisos'])||
					in_array('marca.see',$_SESSION['usuario']['permisos'])){?>
					<li class="<?=isset($marcaMenu)?'active':''?>"><a href="marcas.php">Marcas</a></li>
			  <?}?>
			  
			  <?if( in_array('product.add',$_SESSION['usuario']['permisos']) ||
					in_array('product.del',$_SESSION['usuario']['permisos'])||		
					in_array('product.edit',$_SESSION['usuario']['permisos'])||
					in_array('product.see',$_SESSION['usuario']['permisos'])){?>
					<li class="<?=isset($productsMenu)?'active':''?>"><a href="productos.php">Productos</a></li>
			  <?}?>
              
			  <?if( in_array('user.add',$_SESSION['usuario']['permisos']) ||
					in_array('user.del',$_SESSION['usuario']['permisos'])||		
					in_array('user.edit',$_SESSION['usuario']['permisos'])||
					in_array('user.see',$_SESSION['usuario']['permisos'])){?>
					<li class="<?=isset($userMenu)?'active':''?>"><a href="usuarios.php">Usuarios</a></li>
			  <?}?>
			  
			  <?if( in_array('profile.add',$_SESSION['usuario']['permisos']) ||
					in_array('profile.del',$_SESSION['usuario']['permisos'])||		
					in_array('profile.edit',$_SESSION['usuario']['permisos'])||
					in_array('profile.see',$_SESSION['usuario']['permisos'])){?>
					<li class="<?=isset($perfilMenu)?'active':''?>"><a href="perfiles.php">Perfiles</a></li>
			  <?}?>
			  
			  <?if( in_array('comment.see',$_SESSION['usuario']['permisos']) ||
					in_array('comment.app',$_SESSION['usuario']['permisos'])||		
					in_array('comment.dis',$_SESSION['usuario']['permisos'])){?>
					<li class="<?=isset($commentsMenu)?'active':''?>"><a href="comentarios.php">Comentarios</a></li>
			  <?}?>
			 
              <li><a href="?logout">Salir</a></li>
            </ul>
           
          
        </div><!--/span-->