<?php
session_start();
include "../functions.php";
extract($_POST);

$itinerario=$_POST['selectItinerario'];
$optativa=$_POST['selectOptativa1'];

//obtenemos el id del alumno

    $dni=$_SESSION['login'];    
    $consulta="SELECT id FROM ALUMNOS WHERE DNI='".$dni."';";
    $resulset=ejecutaConsulta($consulta);
    $alumno=$resulset->fetch(PDO::FETCH_ASSOC); 

$fecha1 = date("j-n-Y");
$hora = date("H:i");   

//echo $itinerario."-".$optativa;

$consulta="SELECT * FROM matriculas WHERE id_alumno='".$alumno['id']."'";

if(ejecutaConsulta2($consulta)!=0)
{
    $_SESSION['tipoMensaje']= "warning";
    $_SESSION['mensajeRegistro'] = "<strong>Error</strong> ,ya existe un usuario con ese DNI";
    header('Location: ../../index.php');    
}
else{
    $insert="INSERT INTO MATRICULAS (COD_MATRICULA,FECHA,HORA,ID_ALUMNO,ID_ITINERARIO,ID_OPTATIVA) VALUES ('CODIGO', '".$fecha."', '".$hora."', '".$alumno['id']."', '".$itinerario."', '".$optativa."')";
}

if(ejecutaConsultaAccion($insert)>0){
    $_SESSION['tipoMensaje']= "warning";
	$_SESSION['mensajeRegistro'] = "<strong>Matricula registrado con exito</strong>";
	header('Location: ../../index.php');
}
else{	
	$_SESSION['tipoMensaje']= "danger";
	$_SESSION['mensajeRegistro'] = "<strong>Error</strong> al realizar el registro";
	header('Location: ../../index.php');	
}


?>
