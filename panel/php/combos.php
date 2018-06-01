<?php
	extract($_POST);
	include "functions.php";
	$datos=ejecutaConsultaArray("SELECT * from $tabla where $fila=$id");
	//echo "SELECT * from $tabla where $fila=$id";

	echo json_encode($datos);
?>	