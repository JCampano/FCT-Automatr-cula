<?php
    include "../functions.php";
    extract($_POST);
    $datos = ejecutaConsultaArray("SELECT * from asignaturas where codigo='$cod'");
    $idCurso=$datos[0]['id_curso'];
    $nombreCurso = ejecutaConsultaArray("SELECT c.id, c.nombre as nombreCurso, e.nombre as nombreEnse from cursos c inner join enseñanzas e on c.id_enseñanza = e.id where c.id=$idCurso");

 
    $cursos = ejecutaConsultaArray("SELECT c.id, c.nombre as nombreCurso, e.nombre as nombreEnse from cursos c inner join enseñanzas e on c.id_enseñanza = e.id where c.id<>$idCurso");
  //  echo "SELECT c.id, c.nombre, e.nombre from cursos c inner join enseñanzas e on c.id_enseñanza = e.id where c.id=".$nombreCurso[0]["id"].""

   // $ensenanza = ejecutaConsultaARray("SELECT c.id, c.nombre, e.nombre from cursos c inner join enseñanzas e on c.id_enseñanza = e.id where c.id=".$nombreCurso[0]["id"]."")

    
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

					    		<select class="custom-select" id="inputGroupSelect01">
					    		    <?php
					    		    	echo '<option value="'.$nombreCurso[0]['id'].'">'.$nombreCurso[0]['nombreCurso'].' de '.$nombreCurso[0]['nombreEnse'].'</option>';
					    		    	for ($i=0;$i<count($cursos);$i++){
					    		    		echo '<option value="'.$cursos[$i]['id'].'">'.$cursos[$i]['nombreCurso'].' de '.$cursos[$i]["nombreEnse"].'</option>';
					    		    	}
					    		    ?>
					    		</select>
					    		
					 		</div>	

					 		 <div class="form-group">
							    <button type="submit" class="btn btn-primary ">Enviar</button>
							    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
							</div>
						</form>