<?php
require_once("../functions.php");
session_start();
extract($_POST);



if($_SESSION["nOptativa"]!=$nombre && $_SESSION["idBloque"]==$bloque){
	$update="UPDATE optativas SET nombre = '".$nombre." WHERE id = $id";
	$cambio=true;
	//echo "cambio de nombre";

} else if($_SESSION["nOptativa"]==$nombre && $_SESSION["idBloque"]!=$bloque){
	$update="UPDATE optativas SET id_grupo_optativas = '".$bloque." WHERE id = $id";
	$cambio=true;
	//echo "cambio de bloque";
} else if ($_SESSION["nOptativa"]!=$nombre && $_SESSION["idBloque"]!=$bloque){
	$update="UPDATE optativas SET nombre = '".$nombre."', id_grupo_optativas = ".$bloque." WHERE id = $id";
	$cambio=true;
	//echo "cambio de los dos";
} else if($_SESSION["nOptativa"]==$nombre && $_SESSION["idBloque"]==$bloque) {
	$_SESSION['tipoMensaje']= "warning";
	$_SESSION['mensaje'] = "<strong>No se han modificado los datos</strong>";
	$cambio = false;
	header ("location: ../../optativas.php");
} 

if ($cambio){
	$comprobacion = ejecutaConsultaArray("SELECT nombre, id_grupo_optativas from optativas where nombre = '$nombre' and id_grupo_optativas = $bloque");

		if(count($comprobacion)==0){
			
			if(ejecutaConsultaAccion($update)>0)
			{
			    $_SESSION['tipoMensaje']= "success";
			    $_SESSION['mensaje'] = "<strong>Se han guardado los datos</strong>";
			    header ("location: ../../optativas.php");

			}
			else
			{
			    $_SESSION['tipoMensaje']= "danger";
			    $_SESSION['mensaje'] = "<strong>Ha ocurrido un error.</strong>";
			   
			    header ("location: ../../optativas.php");
			}

		} else {
			   $_SESSION['tipoMensaje']= "danger";
			   $_SESSION['mensaje'] = "Ya existe la optativa <strong>".$nombre."</strong> en el bloque seleccionado";
			   	
			    header ("location: ../../optativas.php");
		}
}

	
	


?>
