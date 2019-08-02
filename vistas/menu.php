		<?php require('config.php'); ?>
		<?php require('conexion.php'); ?>
        <?php require('arrays.php'); ?>
        <?php require('funciones.php'); ?>
        
        <button onclick="goTop(document)" id="btnUp" title="Ir arriba">Subir</button>
        
		<script>
			jQuery(function($){
				$('.slider-testimonios').sss({
					slideShow : true,
					speed : 3500
				});
			});

			$(document).ready(function(){
				iniciarDoc();
				$('ul.dropdown-menu [data-toggle=dropdown]').on('click', function(event) {
					event.preventDefault(); 
					event.stopPropagation(); 
					$(this).parent().siblings().removeClass('open');
					$(this).parent().toggleClass('open');
				});

			});
		</script>
		
		<div id="myModal" class="modal fade" role="dialog">
		  <div class="modal-dialog">

			<!-- Modal content-->
			<div class="modal-content" style="text-align: center;">
			  <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Producto</h4>
			  </div>
			  <div class="modal-body" id="modalbody"></div>
			  <div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
			  </div>
			</div>

		  </div>
		</div>
        
        <!-- HEADER:-->
        <header id="header">
            <div id="logo"> 
                <div class="wrapperregistro">
                    <div id="oneregistro">
                        <a href="index.php" id="LogoLink"><img src="img/general/logo.png" title="Logo" alt="Logo" width="170" height="61"/></a>
                    </div>
                    <div id="tworegistro" class="registrocompra">
                        <a href="index.php?url=construccion" id="Compra"><i class="icon icon-compra"></i>Mi Compra</a>
                    </div>
                    <div id="threeregistro" class="registrocompra">
                        <a href="index.php?url=construccion" id="Registro"><i class="icon icon-registro"></i>¡Registrate!     </a>
                    </div>
                </div>
            </div>
                  
            <!-- MENU:-->
            <nav class="nav">

                <ul id="nav" class="menu">
					<li><a href="index.php" id="principal"><i class="icon icon-principal"></i>PRINCIPAL</a></li>					
					 <li class="dropdown">
					 <a href="#" class="dropdown-toggle" data-toggle="dropdown" id="productos"><i class="icon icon-user"></i>PRODUCTOS<b class="caret"></b></a>
						<ul class="dropdown-menu">
							<?php obtenerCategorias($con, 0); ?>
						</ul>
					</li>
					<li><a href="index.php?url=about" id="about"><i class="icon icon-contacto"></i>QUIENES SOMOS</a></li>
					<li><a href="index.php?url=contacto" id="contacto"><i class="icon icon-contacto"></i>CONTACTO</a></li>
                </ul>
            </nav>
        </header>