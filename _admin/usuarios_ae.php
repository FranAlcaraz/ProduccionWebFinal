<?
require('inc/header.php');

//include('clases/usuarios.php');
?> 

<div class="container-fluid">
      
      <?$userMenu = 'Usuarios';
	include('inc/side_bar.php');
	
	$perfil = new Perfil($con); 
	
	if(isset($_GET['edit'])){
            $usuario = $user->get($_GET['edit']); 
	} 
	?>
	  
	  
        
        <div class="col-sm-9 col-md-10 main">
          
          <!--toggle sidebar button-->
          <p class="visible-xs">
            <button type="button" class="btn btn-primary btn-xs" data-toggle="offcanvas"><i class="glyphicon glyphicon-chevron-left"></i></button>
          </p>
          
	  <h1 class="page-header">
                    Agregar o modificar usuario
          </h1>
  
          <div class="col-md-2"></div>
            <form action="usuarios.php" method="post" class="col-md-6 from-horizontal">
                <div class="form-group">
                    <label for="nombre" class="col-sm-2 control-label">Nombre</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="nombre" name="nombre" placeholder="" value="<?=isset($usuario->nombre)?$usuario->nombre:'';?>">
                    </div>
                </div> 
                 <div class="form-group">
                    <label for="apellido" class="col-sm-2 control-label">Apellido</label>
                     <div class="col-sm-10">
                        <input type="text" class="form-control" id="apellido" name="apellido" placeholder="" value="<?=isset($usuario->apellido)?$usuario->apellido:'';?>">
                    </div>
                </div> 
                 <div class="form-group">
                    <label for="usuario" class="col-sm-2 control-label">Usuario</label>
                     <div class="col-sm-10">
                        <input type="text" class="form-control" id="usuario" name="usuario" placeholder="" value="<?=isset($usuario->usuario)?$usuario->usuario:'';?>">
                    </div>
                </div> 
                 <div class="form-group">
                    <label for="calve" class="col-sm-2 control-label">Clave</label>
                     <div class="col-sm-10">
                        <input type="password" class="form-control" id="clave" name="clave" placeholder="">
                    </div>
                </div> 
                 <div class="form-group">
                    <label for="email" class="col-sm-2 control-label">e-Mail</label>
                     <div class="col-sm-10">
                        <input type="email" class="form-control" id="email" name="email" placeholder="" value="<?=isset($usuario->email)?$usuario->email:'';?>">
                    </div>
                </div> 
                <div class="form-group">
                    <label for="tipo" class="col-sm-2 control-label">Perfil</label>
                    <div class="col-sm-10">
                        <select name="perfil[]" id="perfil" multiple='multiple' >
                            <? foreach($perfil->getList() as $t){?>
                                <option value="<?=$t['id']?>" 
								<?
									if(isset($usuario->perfiles)){
										if(in_array($t['id'],$usuario->perfiles)){
											echo ' selected="selected" ';
										}
									}
								
								?>><?=$t['nombre']?></option>
                            <?}?>
                        </select>
                    </div>
                </div> 
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                    <div class="checkbox">
                        <label>
                        <input type="checkbox" name="activo" value="1" <?=(isset($usuario->activo)?(($usuario->activo == 1) ?'checked':''):'');?>> Activo
                        </label>
                    </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-default" name="submit" >Guardar</button>
                    </div>
                </div> 
                <input type="hidden" class="form-control" id="id_usuario" name="id_usuario" placeholder="" value="<?=isset($usuario->id_usuario)?$usuario->id_usuario:'';?>">

            </form>
          </div>
 
          
      </div><!--/row-->
	</div>
</div><!--/.container-->

<?include('inc/footer.php');?>