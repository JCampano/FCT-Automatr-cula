<?php
session_start();
include "../functions.php";
extract($_POST);

$enseñanza=$_POST['selectEnseñanza'];
$curso = $_POST['selectCurso'];
$itinerario=$_POST['selectItinerario'];
$optativa=$_POST['selectOptativas'];

//obtenemos el id del alumno

    $dni=$_SESSION['login'];    
    $consulta="SELECT id FROM ALUMNOS WHERE DNI='".$dni."';";
    $resulset=ejecutaConsulta($consulta);
    $alumno=$resulset->fetch(PDO::FETCH_ASSOC); 

$fecha = date("d-m-Y");
$hora = date("H:i");   
//echo $fecha;
//echo $itinerario."-".$optativa;


$insert="INSERT INTO MATRICULAS (COD_MATRICULA,FECHA,HORA,ID_ALUMNO,ID_ITINERARIO,CAMBIO_DATOS) VALUES ('CODIGO', '".$fecha."', '".$hora."', '".$alumno['id']."', '".$itinerario."','CAMBIO_DATOS')";


if(ejecutaConsultaAccion($insert)>0){
    $_SESSION['tipoMensaje']= "success";
	$_SESSION['mensajeRegistro'] = "<strong>Matricula registrado con exito</strong>";
	header('Location: ../../index.php');
}
else{	
	$_SESSION['tipoMensaje']= "danger";
	$_SESSION['mensajeRegistro'] = "<strong>Error</strong> al realizar el registro";
	header('Location: ../../index.php');	
}


?>
