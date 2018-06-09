<?php
session_start();
include "../functions.php";
extract($_POST);

$enseñanza=$_POST['selectEnsenanza'];
$curso = $_POST['selectCurso'];
$itinerario=$_POST['selectItinerario'];
$optativa=$_POST['selectOptativas'];
$optativa2 ="";
$optativa3 ="";
$optativa4 ="";
if(isset($_POST['selectOptativas2'])){
	if($_POST['selectOptativas2'] != "Seleccione")
		$optativa2 =$_POST['selectOptativas2'];

	if(isset($_POST['selectOptativas3'])){
		if($_POST['selectOptativas3'] != "Seleccione")
			$optativa3 =$_POST['selectOptativas3'];

		if(isset($_POST['selectOptativas4'])){
			if($_POST['selectOptativas4'] != "Seleccione")
				$optativa4 =$_POST['selectOptativas4'];
		}
	}
}


//obtenemos el id del alumno

    $dni=$_SESSION['login'];    
    $consulta="SELECT id FROM ALUMNOS WHERE DNI='".$dni."';";
    $resulset=ejecutaConsulta($consulta);
    $alumno=$resulset->fetch(PDO::FETCH_ASSOC); 


$hora = date("H:i");   
//echo $itinerario."-".$optativa;

//generamos el codigo
    $codigo = $enseñanza."/".$curso."/".$itinerario."/".$alumno['id'];

$insert="INSERT INTO MATRICULAS (COD_MATRICULA,FECHA,HORA,ID_ALUMNO,ID_ITINERARIO,CAMBIO_DATOS) VALUES ('".$codigo."', '".date("Y-m-d ")."', '".$hora."', '".$alumno['id']."', '".$itinerario."','CAMBIO_DATOS')";


if(ejecutaConsultaAccion($insert)>0){
	$insert="INSERT INTO OPTATIVAS_ELEGIDAS (COD_MATRICULA,ID_OPTATIVA1,ID_OPTATIVA2,ID_OPTATIVA3,ID_OPTATIVA4) VALUES ('".$codigo."', '".$optativa."', '".$optativa2."', '".$optativa3."', '".$optativa4."')";
	if(ejecutaConsultaAccion($insert)>0){
		$consulta="SELECT * FROM MATRICULAS WHERE ID_ALUMNO='".$alumno['id']."';";
	    $resulset=ejecutaConsulta($consulta);
	    $matricula=$resulset->fetch(PDO::FETCH_ASSOC); 

		$insert="INSERT INTO MATRICULAS_REGISTRADAS (ID_MATRICULA,ID_USUARIO,FECHA) VALUES ('".$matricula['id']."', '".$alumno['id']."', '".date("Y-m-d ")."')";

		if(ejecutaConsultaAccion($insert)>0){
		    $_SESSION['tipoMensaje']= "success";
			$_SESSION['mensajeRegistro'] = "<strong>Matricula registrado con exito</strong>";
			header('Location: ../../index.php');
		}else{
			$_SESSION['tipoMensaje']= "danger";
			$_SESSION['mensajeRegistro'] = "<strong>Error</strong> al guardar las optativas, por favor edite la matricula";
			header('Location: ../../index.php');	
		}
	}
}
else{	
	$_SESSION['tipoMensaje']= "danger";
	$_SESSION['mensajeRegistro'] = "<strong>Error</strong> al realizar el registro";
	header('Location: ../../index.php');	
}


?>
