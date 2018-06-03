<?php
include "../functions.php";
session_start();
extract($_POST);

$consultaModificado = ejecutaConsultaArray("SELECT nombre, id_enseñanza from cursos where id = $id");

if ($consultaModificado[0]["nombre"]==$nombre && $consultaModificado[0]["id_enseñanza"]==$enseñanza){
	$_SESSION['tipoMensaje']= "warning";
	$_SESSION['mensaje'] = "<strong>No se han modificado los datos</strong>";
	
	header ("location: ../../cursos.php");
} else {

	$comprobacion = ejecutaConsultaArray("SELECT nombre, id_enseñanza from cursos where nombre = '$nombre' and id_enseñanza = $enseñanza");

		if(count($comprobacion)==0){
			$update="UPDATE cursos SET nombre = '".$nombre."', id_enseñanza = ".$enseñanza." WHERE id = $id";
			if(ejecutaConsultaAccion($update)>0)
			{
			    $_SESSION['tipoMensaje']= "success";
			    $_SESSION['mensaje'] = "<strong>Se han guardado los datos</strong>";
			    header ("location: ../../cursos.php");
			}
			else
			{
			    $_SESSION['tipoMensaje']= "warning";
			    $_SESSION['mensaje'] = "<strong>No se ha modificado la enseñanza</strong>";
			   
			    header ("location: ../../cursos.php");
			}

		} else {
			    $_SESSION['tipoMensaje']= "danger";
			    $_SESSION['mensaje'] = "Ya existe el curso <strong>".$nombre."</strong> en la enseñanza seleccionada";
			   
			    header ("location: ../../cursos.php");
		}

}


?>
