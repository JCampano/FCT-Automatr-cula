<?php
    include "../functions.php";
    extract($_POST);
    $datos = ejecutaConsultaArray("SELECT * from asignaturas where codigo='$cod'");
    $idCurso=$datos[0]['id_curso'];
    $nombreCurso = ejecutaConsultaArray("SELECT id, nombre from cursos where id=$idCurso");
    $cursos = ejecutaConsultaArray("SELECT id, nombre from cursos where id<>$idCurso");

    
?>
<form class="needs-valcodation" name="frmEditarAlumno" action="php/ensenanzas/editarEnsenanza.php" method="post" novalcodate>
					  		<div class="form-group" style="display:none;">
					    		
					    		<input type="text" class="form-control" value="<?php echo $cod ?>" name="cod" placeholder="cod" >
					    			    		
					 		</div>

					  		<div class="form-group">
					    		<label for="nombre" class="control-label">Nombre</label>
					    		<input type="text" class="form-control" value="<?php echo $datos[0]["nombre"] ?>" name="nombre" placeholder="Nombre" required>
					 		</div>	
					 		<div class="form-group">
					    		<label for="nombre" class="control-label">Curso</label>

					    		<select class="form-control" id="exampleFormControlSelect1">
					    		    <?php
					    		    	echo '<option value="'.$nombreCurso[0]['id'].'">'.$nombreCurso[0]['nombre'].'</option>';
					    		    	for ($i=0;$i<count($cursos);$i++){
					    		    		echo '<option value="'.$cursos[$i]['id'].'">'.$cursos[$i]['nombre'].'</option>';
					    		    	}
					    		    ?>
					    		</select>
					    		
					 		</div>	

					 		 <div class="form-group">
							    <button type="submit" class="btn btn-primary ">Enviar</button>
							    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
							</div>
						</form>