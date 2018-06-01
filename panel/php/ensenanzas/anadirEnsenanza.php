<?php
	include "../functions.php";
	session_start();
	extract($_POST);


	
	
   if (ejecutaConsultaAccion("INSERT INTO enseñanzas(nombre) VALUES ('$nombre')")!=0){
   	echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert">&times;</button>Se ha añadido la asignatura <strong>'.$nombre.'</strong></div>';

   } else {
   	echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert">&times;</button>Ya existe una asignatura con el código <strong>'.$codigo.'</strong></div>';

   }

?>