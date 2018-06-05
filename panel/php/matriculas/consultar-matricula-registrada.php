<?php
	require_once("../functions.php");
	extract($_POST);
	$resultado = ejecutaConsultaArray("SELECT m.cod_matricula from matriculas m inner join matriculas_registradas mr where m.cod_matricula='$id' and mr.id_matricula = m.id");
	if(count($resultado)==0){
		echo "true";
	} else {
		echo "false";
	}


?>