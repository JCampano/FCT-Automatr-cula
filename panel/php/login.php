<?php
ob_start();

include "functions.php";
extract($_POST);

echo $dni;

$buscarUsuario=ejecutaConsultaArray("SELECT * from personal where dni='$dni'");

if(count($buscarUsuario)==0 || $buscarUsuario[0]["password"]!=$pass){

	   
		
	    header('Location: ../login.php?error=1');
	
} else {
		session_start();
		$_SESSION["login"]=$dni;
		$_SESSION["nombre"]=$buscarUsuario[0]["nombre"];
		$_SESSION["role"]=$buscarUsuario[0]["tipo"];

		header("Location: ../index.php");
}


ob_end_flush();
?>
