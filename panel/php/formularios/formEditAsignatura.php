<?php
    include "../functions.php";
    extract($_POST);
    $datos = ejecutaConsultaArray("SELECT * from asignaturas where codigo='$cod'");
    $idItinerario=$datos[0]['id_itinerario'];
    $idCursoItinerario = ejecutaConsultaArray("SELECT * from itinerarios where id=$idItinerario");

 	
    $itinerarios = ejecutaConsultaArray("SELECT * FROM itinerarios WHERE id_curso=".$idCursoItinerario[0]["id_curso"]." and id<>$idItinerario");

  //  echo "SELECT c.id, c.nombre, e.nombre from cursos c inner join enseñanzas e on c.id_enseñanza = e.id where c.id=".$nombreCurso[0]["id"].""

   // $ensenanza = ejecutaConsultaARray("SELECT c.id, c.nombre, e.nombre from cursos c inner join enseñanzas e on c.id_enseñanza = e.id where c.id=".$nombreCurso[0]["id"]."")

    
?>
<form class="needs-valcodation" name="frmEditarAlumno" action="php/asignaturas/editarAsignatura.php" method="post" novalcodate>
					  		<div class="form-group" style="display:none;">
					    		
					    		<input type="text" class="form-control" value="<?php echo $cod ?>" name="codigo" placeholder="cod" >
					    			    		
					 		</div>

					  		<div class="form-group">
					    		<label for="nombre" class="control-label">Nombre</label>
					    		<input type="text" class="form-control" value="<?php echo $datos[0]["nombre"] ?>" name="nombre" placeholder="Nombre" required>
					 		</div>	
					 		<div class="form-group">
					    		<label for="nombre" class="control-label">Itinerario</label>

					    		<select class="custom-select" id="itinerario" name="itinerario">
					    		    <?php
					    		    	echo '<option value="'.$idItinerario.'">'.$idCursoItinerario[0]["nombre"].'</option>';
					    		    	for ($i=0;$i<count($itinerarios);$i++){
					    		    		echo '<option value="'.$itinerarios[$i]['id'].'">'.$itinerarios[$i]['nombre'].'</option>';
					    		    	}
					    		    ?>
					    		</select>
					    		
					 		</div>	

					 		 <div class="form-group">
							    <button type="submit" class="btn btn-primary ">Enviar</button>
							    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
							</div>
						</form>