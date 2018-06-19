<?php
$id = $_GET['id'];
$cod = $_GET['codMat'];

session_start();

include "../functions.php";
//echo $cod;

	$consulta="SELECT * FROM matriculas WHERE id_alumno='".$id."'AND finalizada=1;";  


   
	//echo ejecutaConsultaAccion($consulta);
    if(ejecutaConsultaAccion($consulta)>0)
    {
        $_SESSION['tipoMensaje']= "danger";
        $_SESSION['mensajeRegistro'] = "<strong>Error</strong> No puedes Eliminar una matricula ya finalizada";
        header('Location: ../../index.php');    
    }
    else{
		//	ELIMINAMOS LAS OPTATIVAS
		$delete = "DELETE FROM optativas_registradas WHERE cod_matricula='".$cod."'";
		if(ejecutaConsultaAccion($delete)>0){

			//ELIMIONAMOS LA MATRICULA REGISTRADA
			//$delete1 = "DELETE FROM MATRICULAS_REGISTRADAS WHERE ID_MATRICULA='". $id."'";
			//if(ejecutaConsultaAccion($delete1)>0){

			//ELIMIONAMOS LA MATRICULA 
			$delete2 = "DELETE FROM matriculas WHERE ID='". $id."'";
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
	}
?>