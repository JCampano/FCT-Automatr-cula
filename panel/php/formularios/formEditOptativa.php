<?php
    require_once("../functions.php");
    extract($_POST);
    session_start();
    $datos = ejecutaConsultaArray("select o.id as oId, o.nombre as oNombre, gro.nombre as groNombre, gro.id as groId, gro.id_curso as groIdCurso from optativas o inner join grupo_optativas gro where o.id_grupo_optativas = gro.id and o.id = $id");

    $_SESSION["nOptativa"] = $datos[0]["oNombre"];
    $_SESSION["idBloque"] = $datos[0]["groId"];
    $idCursoBloque = $datos[0]["groIdCurso"];

    $bloques = ejecutaConsultaArray("SELECT * FROM grupo_optativas WHERE id_curso=".$datos[0]["groId"]." and id<>$idCursoBloque");

  //  echo "SELECT c.id, c.nombre, e.nombre from cursos c inner join enseñanzas e on c.id_enseñanza = e.id where c.id=".$nombreCurso[0]["id"].""

   // $ensenanza = ejecutaConsultaARray("SELECT c.id, c.nombre, e.nombre from cursos c inner join enseñanzas e on c.id_enseñanza = e.id where c.id=".$nombreCurso[0]["id"]."")

    
?>
<form class="needs-valcodation" name="frmEditarAlumno" action="php/optativas/editarOptativa.php" method="post" novalcodate>
					  		<div class="form-group" style="display:none;">
					    		
					    		<input type="text" class="form-control" value="<?php echo $datos[0]["oId"] ?>" name="id" >
					    			    		
					 		</div>

					  		<div class="form-group">
					    	
					    		<input type="text" class="form-control" value="<?php echo $datos[0]["oNombre"] ?>" name="nombre" placeholder="Nombre">
					 		</div>	
					 		<div class="form-group">
					    		<label for="nombre" class="control-label">Bloque</label>

					    		<select class="custom-select" id="bloque" name="bloque">
					    		    <?php
					    		    	echo '<option value="'.$datos[0]["groId"].'">'.$datos[0]["groNombre"].'</option>';
					    		    	for ($i=0;$i<count($bloques);$i++){
					    		    		echo '<option value="'.$bloques[$i]['id'].'">'.$bloques[$i]['nombre'].'</option>';
					    		    	}
					    		    ?>
					    		</select>
					    		
					 		</div>	

					 		 <div class="form-group">
							    <button type="submit" class="btn btn-primary ">Enviar</button>
							    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
							</div>
						</form>