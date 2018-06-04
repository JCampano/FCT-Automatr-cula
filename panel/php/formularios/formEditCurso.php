<?php
    include "../functions.php";
    extract($_POST);
    $datos = ejecutaConsultaArray("SELECT c.id as idCurso, c.nombre as nCurso, e.id as idEnseñanza, e.nombre as nEnseñanza from cursos c inner join enseñanzas e where c.id=$id and c.id_enseñanza=e.id");

 	
    $enseñanzas = ejecutaConsultaArray("SELECT * FROM enseñanzas WHERE id<>".$datos[0]["idEnseñanza"]);

  //  echo "SELECT c.id, c.nombre, e.nombre from cursos c inner join enseñanzas e on c.id_enseñanza = e.id where c.id=".$nombreCurso[0]["id"].""

   // $ensenanza = ejecutaConsultaARray("SELECT c.id, c.nombre, e.nombre from cursos c inner join enseñanzas e on c.id_enseñanza = e.id where c.id=".$nombreCurso[0]["id"]."")

    
?>
<form class="needs-valcodation" name="frmEditarAlumno" action="php/cursos/editarCurso.php" method="post" novalcodate>
					  		<div class="form-group" style="display:none;">
					    		
					    		<input type="text" class="form-control" value="<?php echo $datos[0]["idCurso"] ?>" name="id">
					    			    		
					 		</div>

					  		<div class="form-group">
					    		<label for="nombre" class="control-label">Nombre</label>
					    		<input type="text" class="form-control" value="<?php echo $datos[0]["nCurso"] ?>" name="nombre" placeholder="Nombre" required>
					 		</div>	
					 		<div class="form-group">
					    		<label for="nombre" class="control-label">Enseñanza</label>

					    		<select class="custom-select" id="enseñanza" name="enseñanza">
					    		    <?php
					    		    	echo '<option value="'.$datos[0]["idEnseñanza"].'">'.$datos[0]["nEnseñanza"].'</option>';
					    		    	for ($i=0;$i<count($enseñanzas);$i++){
					    		    		echo '<option value="'.$enseñanzas[$i]['id'].'">'.$enseñanzas[$i]['nombre'].'</option>';
					    		    	}
					    		    ?>
					    		</select>
					    		
					 		</div>	

					 		 <div class="form-group">
							    <button type="submit" class="btn btn-primary ">Guardar</button>
							    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
							</div>
						</form>