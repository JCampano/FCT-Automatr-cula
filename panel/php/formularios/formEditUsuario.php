<?php
    require_once("../functions.php");
    extract($_POST);
    $datos = ejecutaConsultaArray("SELECT * from personal where id='$id'");
    $tipo = $datos[0]["tipo"];

    
?>
<form class="needs-validation" name="frmEditarUsuario" action="php/usuarios/editarUsuario.php" method="post" novalidate>
					  		<div class="form-group" style="display:none;">
					    		<label for="id" class="control-label">ID</label>
					    		<input type="text" class="form-control" value="<?php echo $id ?>" name="id" placeholder="id" >
					    			    		
					 		</div>

					 		<div class="row">
					 			<div class="col-sm-4">
					 				 <div class="form-group">
					 				   	<label for="nombre" class="control-label">Nombre</label>
					 				   	<input type="text" class="form-control" value="<?php echo $datos[0]["nombre"] ?>" name="nombre" placeholder="Nombre" required>
					 				</div>
					 			</div>
					 			<div class="col-sm-8">
					 				<div class="form-group">
					 				   	<label for="nombre" class="control-label">Apellidos</label>
					 				   	<input type="text" class="form-control" value="<?php echo $datos[0]["apellidos"] ?>" name="apellidos" placeholder="Apellidos" required>
					 				</div>
					 			</div>
					 			<div class="col-sm-6">
					 				<div class="form-group">
					 				   	<label for="nombre" class="control-label">DNI</label>
					 				   	<input type="text" class="form-control" value="<?php echo $datos[0]["dni"] ?>" name="dni" placeholder="DNI" required>
					 				</div>
					 			</div>
					 			<div class="col-sm-6">
					 				<div class="form-group">
					 				   	<label for="nombre" class="control-label">Teléfono</label>
					 				   	<input type="text" class="form-control" value="<?php echo $datos[0]["telefono"] ?>" name="telefono" placeholder="DNI" required>
					 				</div>
					 			</div>
					 			<div class="col-sm-6">
					 				<div class="form-group">
					 				   	<label for="nombre" class="control-label">Contraseña</label>
					 				   	<input type="text" class="form-control" name="pass" placeholder="Introduce una contraseña para cambiarla">
					 				</div>
					 			</div>
					 			<div class="col-sm-6">
					 				<div class="form-group">
					 				   	<label for="nombre" class="control-label">Tipo</label>
					 				   	<select class="custom-select" id="Tipo" name="tipo">
					 				   	    <?php

					 				   	    	if($tipo=="administrativo"){
					 				   	    		
					 				   	    		echo '<option value="1">'.$tipo.'</option>';
					 				   	    		echo '<option value="2">gestor</option>';
					 				   	    		echo '<option value="3">administrador</option>';

					 				   	    	} else if ($tipo=="gestor"){
					 				   	    		
					 				   	    		echo '<option value="2">'.$tipo.'</option>';
					 				   	    		echo '<option value="1">administrativo</option>';
					 				   	    		echo '<option value="3">administrador</option>';
					 				   	    	} else if($tipo=="administrador"){
					 				   	    		echo '<option value="3">'.$tipo.'</option>';
					 				   	    		echo '<option value="1">adminsitrativo</option>';
					 				   	    		echo '<option value="2">administrador</option>';
					 				   	    	} else{
					 				   	    		echo '<option value="nulo">Tipo inválido</option>';
					 				   	    		echo '<option value="1">adminsitrativo</option>';
					 				   	    		echo '<option value="2">gestor</option>';
					 				   	    		echo '<option value="3">administrador</option>';
					 				   	    	}
					 				   	    	
					 				   	    	
					 				   	    ?>
					 				   	</select>
					 				</div>
					 			</div>

					 		</div>

					  			

					 		 <div class="form-group">
							    <button type="submit" class="btn btn-primary ">Enviar</button>
							    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
							</div>
						</form>