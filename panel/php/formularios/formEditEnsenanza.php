<?php
    include "../functions.php";
    extract($_POST);
    $datos = ejecutaConsultaArray("SELECT * from enseñanzas where id='$id'");


    
?>
<form class="needs-validation" name="frmEditarAlumno" action="php/ensenanzas/editarEnsenanza.php" method="post" novalidate>
					  		<div class="form-group" style="display:none;">
					    		<label for="id" class="control-label">ID</label>
					    		<input type="text" class="form-control" value="<?php echo $id ?>" name="id" placeholder="id" >
					    			    		
					 		</div>

					  		<div class="form-group">
					    		<label for="nombre" class="control-label">Nombre</label>
					    		<input type="text" class="form-control" value="<?php echo $datos[0]["nombre"] ?>" name="nombre" placeholder="Nombre" required>
					 		</div>	

					 		 <div class="form-group">
							    <button type="submit" class="btn btn-primary ">Enviar</button>
							    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
							</div>
						</form>