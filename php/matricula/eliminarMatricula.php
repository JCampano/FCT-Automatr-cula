<?php
$id = $_GET['id'];
$cod = $_GET['codMat'];

session_start();

include "../functions.php";
//echo $cod;

//	ELIMINAMOS LAS OPTATIVAS
$delete = "DELETE FROM OPTATIVAS_ELEGIDAS WHERE COD_MATRICULA='".$cod."'";
if(ejecutaConsultaAccion($delete)>0){

	//ELIMIONAMOS LA MATRICULA REGISTRADA
	//$delete1 = "DELETE FROM MATRICULAS_REGISTRADAS WHERE ID_MATRICULA='". $id."'";
	//if(ejecutaConsultaAccion($delete1)>0){

	//ELIMIONAMOS LA MATRICULA 
	$delete2 = "DELETE FROM MATRICULAS WHERE ID='". $id."'";
	if(ejecutaConsultaAccion($delete2)>0){
		//MOSTRAMOS 
	    $_SESSION['tipoMensaje']= "success";
		$_SESSION['mensajeRegistro'] = "<strong>Matricula eliminada con exito</strong>";
		header('Location: ../../index.php');
		
	}
}
else
{	
	$_SESSION['tipoMensaje']= "danger";
	$_SESSION['mensajeRegistro'] = "<strong>Error</strong> al Eliminar la Matricula";
	header('Location: ../../index.php');	
}
?>