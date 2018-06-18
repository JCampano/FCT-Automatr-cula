<?php
    require_once("../functions.php");
    extract($_POST);
    session_start();
    $datos = ejecutaConsultaArray("select i.id as idItinerario, i.nombre as nItinerario, c.nombre as nCurso, c.id as idCurso, e.nombre as nEnseñanza, e.id as idEnseñanza from grupo_optativas i inner join cursos c, enseñanzas e where i.id_curso = c.id and c.id_enseñanza = e.id and i.id=$id");

 	
    $cursos = ejecutaConsultaArray("select c.id as idCurso, c.nombre as nCurso, e.nombre as nEnseñanza from cursos c inner join enseñanzas e where c.id_enseñanza = e.id and c.id<>".$datos[0]["idCurso"]." and e.id=".$datos[0]["idEnseñanza"]);

    $_SESSION["nBloque"] = $datos[0]["nItinerario"];
    $_SESSION["idCurso"] = $datos[0]["idCurso"];


  //  echo "SELECT c.id, c.nombre, e.nombre from cursos c inner join enseñanzas e on c.id_enseñanza = e.id where c.id=".$nombreCurso[0]["id"].""

   // $ensenanza = ejecutaConsultaARray("SELECT c.id, c.nombre, e.nombre from cursos c inner join enseñanzas e on c.id_enseñanza = e.id where c.id=".$nombreCurso[0]["id"]."")

    
?>
<form class="needs-valcodation" name="frmEditarAlumno" action="php/optativas/editarBloque.php" method="post" novalcodate>
					  		<div class="form-group" style="display:none;">
					    		
					    		<input type="text" class="form-control" value="<?php echo $datos[0]["idCurso"] ?>" name="id">
					    			    		
					 		</div>

					  		<div class="form-group">
					    		<label for="nombre" class="control-label">Nombre</label>
					    		<input type="text" class="form-control" value="<?php echo $datos[0]["nItinerario"] ?>" name="nombre" placeholder="Nombre" required>
					 		</div>	
					 		<div class="form-group">
					    		<label for="nombre" class="control-label">Curso</label>

					    		<select class="custom-select" id="curso" name="curso">
					    		    <?php
					    		    	echo '<option value="'.$datos[0]["idCurso"].'">'.$datos[0]["nCurso"].' de '.$datos[0]["nEnseñanza"].'</option>';
					    		    	for ($i=0;$i<count($cursos);$i++){
					    		    		echo '<option value="'.$cursos[$i]['idCurso'].'">'.$cursos[$i]['nCurso'].' de '.$datos[0]["nEnseñanza"].'</option>';	
					    		    	}
					    		    ?>
					    		</select>
					    		
					 		</div>	

					 		 <div class="form-group">
							    <button type="submit" class="btn btn-primary ">Guardar</button>
							    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
							</div>
						</form>