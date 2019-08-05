                <h1 id="titulo">COMENTARIOS</h1>
                <?php
                    $asunto = "";
                    $mensaje = "";

                    //Si tenemos un parametro de error, vemos cual es y mostramos el mensaje correspondiente:
                    if(empty($_GET['respuesta']) == false){
                        $resp = $_GET['respuesta'];
                        if($resp == 'obligatorio'){
                            echo '<div id="mensajeenviado">¡Todos los campos son obligatorios!</div>';
                        }else{
                            echo '<div id="mensajeenviado">La página no existe.</div>';
                        }
                    }else if(empty($_GET['producto']) == false){
                        $producto = $_GET['producto'];
						$idproducto = $_GET['idproducto'];
                    }else{ 
						echo '<div id="mensajeenviado">La página no existe.</div>';
						die();
                    }                     
                ?>
                <form action="vistas/procesar-comentario.php" method="post" id="Formulario">
                    <h2>Contanos tu experiencia:</h2>
                    <div id="msj"></div>
                    <div id="camposform">
						<input type="text" class="contacto" id="producto" name="producto" disabled="disabled" title="Producto" value="<?= $producto ?>">
						<input type="hidden" id="idproducto" name="idproducto" value="<?= $idproducto ?>">
                        <input type="text" class="contacto" id="nombre" name="nombre" placeholder="Nombres" title="Nombre">
                        <input type="email" class="contacto" id="correo" name="correo" placeholder="Correo" title="Correo">
						<label for="estrellas">Cantidad de estrellas: </label>
                            <select name="estrellas" id="estrellas">
								<option value="1">1 estrellas</option>
								<option value="2">2 estrellas</option>
								<option value="3">3 estrellas</option>
								<option value="4">4 estrellas</option>
								<option value="5" selected>5 estrellas</option>
                            </select>
                        <textarea id="mensaje" name="mensaje" class="contacto" placeholder="Mensaje" title="Mensaje"><?= $mensaje ?></textarea>
                        <button name="enviar" id="boton" title="Enviar">Enviar</button>
                    </div>
                </form>
                
                <script src="js/jquery-3.3.1.min.js"></script>
                <script>
                    
                    $.fn.formToJson = function() {
                        var objJson = {};
                        var serializeArray = this.serializeArray();
                        $.each(serializeArray, function() {
                            if (objJson[this.name]) {
                                if (!objJson[this.name].push) {
                                    objJson[this.name] = [objJson[this.name]];
                                }
                                objJson[this.name].push(this.value || '');
                            } else {
                                objJson[this.name] = this.value || '';
                            }
                        });
                        return objJson;
                    };

                    var msj = $("#msj");
                    $(document).ready(function(){
                        console.log("el documento está listo");         
                    });  

                    $("#Formulario").submit(function(e){
                        e.preventDefault();
                        var url = $(this).attr('action'); //Obtenemos la url del formulario
                        data = $(this).formToJson(); //Convertimos el formulario en un objeto json
                        console.log(data);
                        var peticion = $.ajax({         
                            type : 'POST',
                            url :  url,
                            dataType: 'json',
                            data: data,
                        })
                        .done(function(respuesta){
                            console.log("Respuesta: " + respuesta);
                            if(respuesta == "obligatorio"){
                                $(msj).html("Todos los campos son obligatorios.").hide().fadeIn();
                                msj.css({color: "#ff0000", fontSize:"16px"});
							}else if(respuesta == "yacomento"){
								$(msj).html("Solo puedes enviar un comentario por día.").hide().fadeIn();
                                msj.css({color: "#ff0000", fontSize:"16px"});
							}else{
                                $(msj).html(respuesta).hide().fadeIn();
                                msj.css({color: "#01DF01", fontSize:"16px"});
                                $("#camposform").hide();
                            }
                        })
                        .fail(function(xhr, textStatus, error){
                            console.log("Hubo un error:");
                            console.log(xhr.responseText);
                            console.log(xhr.statusText);
                            console.log(textStatus);
                            console.log(error);
                        })
                        .always(function(){
                            console.log("Se completó la petición.");
                        });
                    });
                </script>