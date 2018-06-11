<?php
	include "../functions.php";
	session_start();
	extract($_POST);


	$comprobacion = ejecutaConsultaArray("SELECT dni from personal where dni = '$dni'");

	if(count($comprobacion)!=0){
		if($comprobacion[0]["dni"]==$dni){
			echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert">&times;</button>Ya existe un usuario con DNI <strong>'.$dni.'</strong></div>';
		} else {
			ejecutaConsultaAccion("INSERT INTO personal VALUES (null,'$dni', '$clave', '$nombre', '$apellidos', $telefono, '$tipo')");
	
			echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert">&times;</button>El usuario ha sido dado de alta correctamente</div>';
		}
	} else {
		ejecutaConsultaAccion("INSERT INTO personal VALUES (null,'$dni', '$clave', '$nombre', '$apellidos', $telefono, '$tipo')");
		echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert">&times;</button>El usuario ha sido dado de alta correctamente</div>';
	}
  

?>