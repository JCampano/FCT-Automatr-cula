<?php
include "../functions.php";
session_start();
extract($_POST);


if($_SESSION["nItinerario"]!=$nombre && $_SESSION["idCurso"]==$curso){
	$update="UPDATE itinerarios SET nombre = '".$nombre." WHERE id = $id";
	//echo "cambio de nombre";

} else if($_SESSION["nItinerario"]==$nombre && $_SESSION["idCurso"]!=$curso){
	$update="UPDATE itinerarios SET id_curso = '".$curso." WHERE id = $id";
	//echo "cambio de curso";
} else if ($_SESSION["nItinerario"]!=$nombre && $_SESSION["idCurso"]!=$curso){
	$update="UPDATE itinerarios SET nombre = '".$nombre."', id_curso = ".$curso." WHERE id = $id";
	//echo "cambio de los dos";
} else {
	$_SESSION['tipoMensaje']= "warning";
	$_SESSION['mensaje'] = "<strong>No se han modificado los datos</strong>";
	
	header ("location: ../../itinerarios.php");
}


	$comprobacion = ejecutaConsultaArray("SELECT nombre, id_curso from itinerarios where nombre = '$nombre' and id_curso = $curso");

		if(count($comprobacion)==0){
			
			if(ejecutaConsultaAccion($update)>0)
			{
			    $_SESSION['tipoMensaje']= "success";
			    $_SESSION['mensaje'] = "<strong>Se han guardado los datos</strong>";
			    header ("location: ../../itinerarios.php");
			}
			else
			{
			    $_SESSION['tipoMensaje']= "danger";
			    $_SESSION['mensaje'] = "<strong>Ha ocurrido un error.</strong>";
			   
			    header ("location: ../../itinerarios.php");
			}

		} else {
			    $_SESSION['tipoMensaje']= "danger";
			    $_SESSION['mensaje'] = "Ya existe el itinerario <strong>".$nombre."</strong> en el curso seleccionado";
			   
			    header ("location: ../../itinerarios.php");
		}


?>
