<?php
	include "../functions.php";

	extract($_POST);

	ejecutaConsultaAccion("INSERT INTO enseñanzas(nombre) VALUES ('$nombre')");
	
	header("Location: ../../ensenanzas.php");

?>