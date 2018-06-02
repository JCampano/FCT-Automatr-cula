<?php
    include "functions.php";
    extract($_POST);
    $datos = ejecutaConsultaArray("SELECT * from alumnos where dni='$dni'");
    
?>
<form class="needs-validation" name="frmEditarAlumno" action="php/alumnos/editarAlumno.php" method="post" novalidate>
					  		<div class="form-group" style="display:none;">
					    		<label for="dni" class="control-label">DNI</label>
					    		<input type="text" class="form-control" value="<?php echo $dni ?>" name="dni" placeholder="DNI" >
					    			    		
					 		</div>

					  		<div class="form-group">
					    		<label for="nombre" class="control-label">Nombre</label>
					    		<input type="text" class="form-control" value="<?php echo $datos[0]["nombre"] ?>" name="nombre" placeholder="Nombre" required>
					 		</div>	

					 		<div class="form-group">
					    		<label for="apellidos" class="control-label">Apellidos</label>
					    		<input type="text" class="form-control" value="<?php echo $datos[0]["apellidos"] ?>"  name="apellidos" placeholder="Apellidos" required>
					 		</div>	

						    <div class="form-group">
						    	<label for="contrasena" class="control-label">Password</label>
								<input type="password" class="form-control" id="contrasena" name="contrasena" placeholder="Contrase&ntilde;a" required>
						    </div>

						    <div class="form-group">
							    <button type="submit" class="btn btn-primary ">Enviar</button>
							    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
							</div>
						</form>