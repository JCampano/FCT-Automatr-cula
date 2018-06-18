<?php
require_once("../functions.php");
session_start();
extract($_POST);



if($_SESSION["nBloque"]!=$nombre && $_SESSION["idCurso"]==$curso){
	$update="UPDATE grupo_optativas SET nombre = '".$nombre."' WHERE id = $id";
	$cambio=true;
	//echo "cambio de nombre";

} else if($_SESSION["nBloque"]==$nombre && $_SESSION["idCurso"]!=$curso){
	$update="UPDATE grupo_optativas SET id_curso = ".$curso." WHERE id = $id";
	$cambio=true;
	//echo "cambio de bloque";
} else if ($_SESSION["nBloque"]!=$nombre && $_SESSION["idCurso"]!=$curso){
	$update="UPDATE grupo_optativas SET nombre = '".$nombre."', id_curso = ".$curso." WHERE id = $id";
	$cambio=true;
	//echo "cambio de los dos";
} else if($_SESSION["nBloque"]==$nombre && $_SESSION["idCurso"]==$curso) {
	$_SESSION['tipoMensaje']= "warning";
	$_SESSION['mensaje'] = "<strong>No se han modificado los datos</strong>";
	$cambio = false;
	header ("location: ../../bloques-optativas.php");
} 

if ($cambio){
	$comprobacion = ejecutaConsultaArray("SELECT nombre, id_curso from grupo_optativas where nombre = '$nombre' and id_curso = $curso");

		if(count($comprobacion)==0){
			echo $update;
			/*
			if(ejecutaConsultaAccion($update)>0)
			{
			    $_SESSION['tipoMensaje']= "success";
			    $_SESSION['mensaje'] = "<strong>Se han guardado los datos</strong>";
			    header ("location: ../../bloques-optativas.php");

			}
			else
			{
			    $_SESSION['tipoMensaje']= "danger";
			    $_SESSION['mensaje'] = "<strong>Ha ocurrido un error.</strong>";
			   
			    header ("location: ../../bloques-optativas.php");
			}
*/
		} else {
			   $_SESSION['tipoMensaje']= "danger";
			   $_SESSION['mensaje'] = "Ya existe el bloque <strong>".$nombre."</strong> en el curso seleccionado";
			   	
			    header ("location: ../../bloques-optativas.php");
		}
}

	
	


?>
