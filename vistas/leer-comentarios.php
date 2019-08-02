        <?php
            $html = "";  
            $vacia=true;
			$sql = "SELECT C.txt_nombre, C.txt_comentario, P.txt_desc, C.cant_estrellas, P.img
						FROM comentarios C
						JOIN productos P ON P.ID_PRODUCTO = C.ID_PRODUCTO
						WHERE C.SN_APROBADO = -1";
			$comentarios = $con->query($sql);
            foreach($comentarios as $index => $comentario){
					$vacia=false;
					$html = $html.'<div class="testimonios-item">';
					$nombre = $comentario["txt_nombre"];
					$mensaje = $comentario["txt_comentario"];
					$producto = $comentario["txt_desc"];
					$estrellas = $comentario["cant_estrellas"];
					$imagen = $comentario["img"];
					$html = $html.'<div class="testimonios-client">';
						$html = $html.'<div class="crop"><img src="'.$imagen.'" alt=""></div>';
						$html = $html.'<p class="client-name">'.$nombre.'</p>';
					$html = $html.'</div>';
					$html = $html.'<p class="servicio">Producto: '.$producto.'</p>';
					$html = $html.'<p class="servicio">Valoración: '.$estrellas.' estrellas</p>';
					$html = $html.'<div class="testimonios-text">';
						$html = $html.'<p>'.$mensaje.'</p>';
					$html = $html.'</div>';
					$html = $html.'</div>';  
            }
            if($vacia==true):
                $html = $html.'<div class="testimonios-item">';
                $nombre = "";
                $comentario = "No hay comentarios para mostrar";
                $producto = "";
                $html = $html.'<div class="testimonios-client">';
                    $html = $html.'<p class="client-name">'.$nombre.'</p>';
                $html = $html.'</div>';
                $html = $html.'<div class="testimonios-text">';
                    $html = $html.'<p>'.$comentario.'</p>';
                $html = $html.'</div>';
                $html = $html.'</div>';
            endif;   
            echo ($html);
        ?> 
