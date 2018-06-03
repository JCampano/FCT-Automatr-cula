<?php
	include "../functions.php";
	session_start();
	extract($_POST);


	$comprobacion = ejecutaConsultaArray("SELECT nombre, id_enseñanza from cursos where nombre = '$nombre'");

	if(count($comprobacion)!=0){
		if($comprobacion[0]["id_enseñanza"]==$ensenanza){
			echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert">&times;</button>Ya existe un curso con el mismo nombre en la misma enseñanza</div>';
		} else {
			ejecutaConsultaAccion("INSERT INTO cursos(nombre, id_enseñanza) VALUES ('$nombre', $ensenanza)");
	
			echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert">&times;</button>Se ha añadido el curso <strong>'.$nombre.'</strong></div>';
		}
	} else {
		ejecutaConsultaAccion("INSERT INTO cursos(nombre, id_enseñanza) VALUES ('$nombre', $ensenanza)");
			echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert">&times;</button>Se ha añadido el curso <strong>'.$nombre.'</strong></div>';
	}
	
  

?>