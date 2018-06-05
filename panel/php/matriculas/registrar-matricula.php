<?php
	require_once("../functions.php");
	session_start();
	extract($_POST);

	$resultado = ejecutaConsultaArray("select id from matriculas where cod_matricula='$id'");
	if(count($resultado)==0){
		echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert">&times;</button>La matrícula <strong>#'.$id.'</strong> no existe</div>';
	} else {
			$idMatricula = $resultado[0]['id'];

		   if (ejecutaConsultaAccion("INSERT INTO matriculas_registradas VALUES ('$idMatricula',$idUsuario,CURRENT_DATE)")!=0){
		   	echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert">&times;</button>La matrícula <strong>#'.$id.'</strong> se ha registrado correctamente.</div>';

		   } else {
		   	echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert">&times;</button>Ha ocurrido un error al registrar la matrícula</div>';

		   }
	}


?>