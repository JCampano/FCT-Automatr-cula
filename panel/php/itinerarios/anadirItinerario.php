<?php
	include "../functions.php";
	session_start();
	extract($_POST);


	$comprobacion = ejecutaConsultaArray("SELECT nombre, id_curso from itinerarios where nombre = '$nombre'");

	if(count($comprobacion)!=0){
		if($comprobacion[0]["id_curso"]==$id_curso){
			echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert">&times;</button>Ya existe un itinerario con el mismo nombre en el mismo curso</div>';
		} else {
			ejecutaConsultaAccion("INSERT INTO itinerarios(nombre, id_curso) VALUES ('$nombre', $id_curso)");
	
			echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert">&times;</button>Se ha añadido el itinerario <strong>'.$nombre.'</strong></div>';
		}
	} else {
		ejecutaConsultaAccion("INSERT INTO itinerarios(nombre, id_curso) VALUES ('$nombre', $id_curso)");
			echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert">&times;</button>Se ha añadido el itinerario <strong>'.$nombre.'</strong></div>';
	}
	
  

?>