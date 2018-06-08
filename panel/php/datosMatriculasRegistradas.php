<?php
	require_once("functions.php");
	extract($_POST);
	$personas=ejecutaConsultaArray("SELECT id, nombre from personal");



	if(count($personas)!=0){
	    for($i=0;$i<count($personas);$i++){
	    	$arrayPersonas[]=$personas[$i]["nombre"];
	        $cuenta=ejecutaConsultaArray("SELECT count(id_usuario) as cuenta from matriculas_registradas where id_usuario = ".$personas[$i]["id"]);
	        $arrayDatos[]=$cuenta[0]["cuenta"];

	    }

	}

	if ($t=="p"){
		echo json_encode($arrayPersonas);
		
	}
	if ($t=="d"){
		echo json_encode($arrayDatos);
		
	}

?>