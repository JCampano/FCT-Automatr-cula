<?php
	require_once("../functions.php");
	session_start();
	extract($_POST);


	$comprobacion = ejecutaConsultaArray("SELECT nombre, id_grupo_optativas from optativas where nombre = '$nombre'");

	if(count($comprobacion)!=0){
		if($comprobacion[0]["id_curso_optativas"]==$id_bloque){
			echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert">&times;</button>Ya existe una optativa con el mismo nombre en el mismo bloque</div>';
		} else {
			ejecutaConsultaAccion("INSERT INTO optativas(nombre, id_grupo_optativas) VALUES ('$nombre', $id_bloque)");
	
			echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert">&times;</button>Se ha añadido la optativa <strong>'.$nombre.'</strong></div>';
		}
	} else {
		ejecutaConsultaAccion("INSERT INTO optativas(nombre, id_grupo_optativas) VALUES ('$nombre', $id_bloque)");
			echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert">&times;</button>Se ha añadido la optativa <strong>'.$nombre.'</strong></div>';
	}
	
  

?>