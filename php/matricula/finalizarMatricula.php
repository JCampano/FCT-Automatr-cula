<?php
$id = $_GET['id'];

session_start();

include "../functions.php";

	$update1="UPDATE matriculas SET finalizada = '1' WHERE id='".$id."';";
        //echo $update1;
        if(ejecutaConsultaAccion($update1)>0){   
	
	        $_SESSION['tipoMensaje']= "success";
	        $_SESSION['mensajeRegistro'] = "<strong>Bien </strong> Matricula finalizada correctamente";
	        header('Location: ../../index.php');    
    }
    else{		
			$_SESSION['tipoMensaje']= "warning";
			$_SESSION['mensajeRegistro'] = "<strong>Error</strong> la Mátricula ya se encuentra finalizada";
			header('Location: ../../index.php');	
	}
	
?>