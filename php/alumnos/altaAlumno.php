<?php
session_start();
include "../functions.php";
extract($_POST);

$consulta="SELECT * FROM ALUMNOS WHERE DNI='".$dni."'";
$dni=$_POST['dni'];
$nombre=$_POST['nombre'];
$apellidos=$_POST['apellidos'];
$contrasena=$_POST['contrasena'];
$valido=true;

if(!preg_match("/[0-9]{7,8}[A-Z]/", $dni))
{
    $valido=false;
}

if(!preg_match("[a-zA-Z\s]{3,40}", $nombre))
{
    $valido=false;
}
/*
if(!preg_match("[a-zA-Z\s]{3,40}", $apellidos))
{
    $valido=false;
}

if($contrasena=="")
{
    $valido=false;
}
*/
if($valido==true)
{
if(ejecutaConsulta2($consulta)!=0)
{
    $_SESSION['tipoMensaje']= "warning";
	$_SESSION['mensajeRegistro'] = "<strong>Error</strong> ,ya existe un usuario con ese DNI";
	header('Location: ../../index.php');	
}
else
{
    $insert="INSERT INTO ALUMNOS (DNI, NOMBRE, APELLIDOS, CLAVE) VALUES ('".$dni."','".$nombre."','".$apellidos."','".$contrasena."')";

	if(ejecutaConsultaAccion($insert)>0)
	{
	    $_SESSION['tipoMensaje']= "warning";
		$_SESSION['mensajeRegistro'] = "<strong>Usuario registrado con exito</strong>";
		header('Location: ../../index.php');
	}
	else
	{	
		$_SESSION['tipoMensaje']= "danger";
		$_SESSION['mensajeRegistro'] = "<strong>Error</strong> al realizar el registro";
		header('Location: ../../index.php');	
	}
}
}
else
{
    $_SESSION['tipoMensaje']= "danger";
    $_SESSION['mensajeRegistro'] = "<strong>Error</strong> al realizar la validación";
    header('Location: ../../index.php');
}
?>
