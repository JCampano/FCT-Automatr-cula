<?php
session_start();
include "../functions.php";
extract($_POST);

$enseñanza=$_POST['selectEnsenanza'];
$curso = $_POST['selectCurso'];
$itinerario= $_POST['selectItinerario'];

$optativa  = 0;
$optativa1 = 0;
$optativa2 = 0;
$optativa3 = 0;


if(isset($_POST['optativa0']))
	$optativa  = $_POST['optativa0'];

if(isset($_POST['optativa1']))
$optativa1 = $_POST['optativa1'];

if(isset($_POST['optativa2']))
$optativa2 = $_POST['optativa2'];

if(isset($_POST['optativa3']))
$optativa3 = $_POST['optativa3'];



//obtenemos el id del alumno

    $dni=$_SESSION['login'];    
    $consulta="SELECT id FROM alumnos WHERE dni='".$dni."';";
    $resulset=ejecutaConsulta($consulta);
    $alumno=$resulset->fetch(PDO::FETCH_ASSOC); 


$hora = date("H:i");   
//echo $itinerario."-".$optativa;

//generamos el codigo
    $codigo = 10000+$alumno['id'];

$insert="INSERT INTO matriculas (cod_matricula,fecha,hora,id_alumno,id_itinerario) VALUES ('".$codigo."', '".date("Y-m-d ")."', '".$hora."', '".$alumno['id']."', '".$itinerario."')";


if(ejecutaConsultaAccion($insert)>0){
	$insert="INSERT INTO optativas_elegidas (cod_matricula,id_optativa1,id_optativa2,id_optativa3,id_optativa4) VALUES ('".$codigo."', '".$optativa."', '".$optativa1."', '".$optativa2."', '".$optativa3."')";
	if(ejecutaConsultaAccion($insert)>0){
		$consulta="SELECT * FROM matriculas WHERE id_alumno='".$alumno['id']."';";
	    /*$resulset=ejecutaConsulta($consulta);
	    $matricula=$resulset->fetch(PDO::FETCH_ASSOC); 

		$insert="INSERT INTO MATRICULAS_REGISTRADAS (ID_MATRICULA,ID_USUARIO,FECHA) VALUES ('".$matricula['id']."', '".$alumno['id']."', '".date("Y-m-d ")."')";

		if(ejecutaConsultaAccion($insert)>0){*/
		    $_SESSION['tipoMensaje']= "success";
			$_SESSION['mensajeRegistro'] = "<strong>Matricula registrado con exito</strong>";
			header('Location: ../../index.php');
	}else{
		$_SESSION['tipoMensaje']= "danger";
		$_SESSION['mensajeRegistro'] = "<strong>Error</strong> al guardar las optativas, por favor edite la matricula";
		header('Location: ../../index.php');	
	}	
}
else{	
	$_SESSION['tipoMensaje']= "danger";
	$_SESSION['mensajeRegistro'] = "<strong>Error</strong> al realizar el registro";
	header('Location: ../../index.php');	
}


?>
