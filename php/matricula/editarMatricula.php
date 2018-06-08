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

$fecha1 = date("j-n-Y");
$hora = date("H:i");   

//echo $itinerario."-".$optativa;
/*
$consulta="SELECT * FROM matriculas WHERE id_alumno='".$alumno['id']."'";

if(ejecutaConsulta2($consulta)==0)
{
    $_SESSION['tipoMensaje']= "warning";
    $_SESSION['mensajeRegistro'] = "<strong>Error</strong> ,No tienes ninguna matricula dada de alta, vaya a generar matricula";
    header('Location: ../../index.php');    
}
else{*/
    $insert="UPDATE MATRICULAS SET 
            COD_MATRICULA = COD_MATRICULA, 
            FECHA='".$fecha."', 
            HORA=$hora, 
            ID_ALUMNO='".$alumno['id']."',
            ID_ITINERARIO=$itinerario,
            ID_OPTATIVA=$optativa";
//}

if(ejecutaConsultaAccion($insert)>0){
    $_SESSION['tipoMensaje']= "warning";
	$_SESSION['mensajeRegistro'] = "<strong>Matricula registrado con exito</strong>";
	header('Location: ../../index.php');
}
else{	
	$_SESSION['tipoMensaje']= "danger";
	$_SESSION['mensajeRegistro'] = "<strong>Error</strong> al modificar la matricula";
	header('Location: ../../index.php');	
}


?>
