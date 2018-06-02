<?php
	include "../functions.php";
	session_start();
	extract($_POST);

	ejecutaConsultaAccion("INSERT INTO enseñanzas(nombre) VALUES ('$nombre')");
	
	$_SESSION['tipoMensaje']= "success";
    $_SESSION['mensaje'] = "<strong>La enseñanza se ha añadido correctamente.</strong>";


	header("Location: ../../ensenanzas.php");

?>