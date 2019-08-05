                <h1 id="titulo">CONTACTO</h1>
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
                    
                    }else if(empty($_GET['todo']) == false){
						$asunto = $_GET['todo'];
						if($asunto != -1){
							echo '<div id="mensajeenviado">La página no existe.</div>';
						}
                        $asunto = "Ofertas!";
					
                        $mensaje = "Hola! Me gustaría recibir las ofertas disponibles, saludos!";
                    }                     
                ?>
                <form action="vistas/procesar-contacto.php" method="post" id="Formulario">
                    <h2>Formulario de contacto:</h2>
                    <div id="msj"></div>
                    <div id="camposform">
                        <input type="text" class="contacto" id="nombre" name="nombre" placeholder="Nombres" title="Nombre">
                        <input type="text" class="contacto" id="apellido" name="apellido" placeholder="Apellidos" title="Apellido">
                        <input type="email" class="contacto" id="correo" name="correo" placeholder="Correo" title="Correo">
                        <input type="number" class="contacto" id="telefono" name="telefono" placeholder="Telefono" title="Telefono">
                        <input type="text" class="contacto" id="asunto" name="asunto" placeholder="Asunto" title="Asunto" value="<?= $asunto ?>">
                        <textarea id="mensaje" name="mensaje" class="contacto" placeholder="Mensaje" title="Mensaje"><?= $mensaje ?></textarea>
                        <label title="Enviarme una copia">
                            <input type="checkbox" name="copia" value="copia" title="Enviarme una copia" checked>Enviarme una copia del mensaje
                        </label>


                        <button name="enviar" id="boton" title="Enviar">Enviar</button>
                    </div>
                </form>
                
				<div class="wrappercontacto">
                    <div class="objcontacto1">
                        <a target="_blank" href="https://www.google.com.ar/maps/place/Obelisco/@-34.6037345,-58.3837591,17z/data=!3m1!4b1!4m5!3m4!1s0x4aa9f0a6da5edb:0x11bead4e234e558b!8m2!3d-34.6037389!4d-58.3815704">
                        <img src="img/contacto/mapa.png" title="Mapa" alt="Mapa" width="450" height="327"/></a> 
					</div>

                    <div class="objcontacto2"><img id="dos" src="img/contacto/contacto.png" title="Telefonos" alt="Telefonos" width="248" height="285"/></div>
                </div>

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