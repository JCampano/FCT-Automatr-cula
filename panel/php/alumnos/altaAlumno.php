<?php
session_start();
include "../functions.php";
extract($_POST);

$consulta="SELECT * FROM ALUMNOS WHERE DNI='".$_POST['dni']."'";

if(ejecutaConsulta2($consulta)!=0)
{
    $_SESSION['tipoMensaje']= "warning";
	$_SESSION['mensajeRegistro'] = "<strong>Error</strong>, ya existe un usuario con ese DNI";
	header('Location: ../../index.php');	
}
else
{
    $insert="INSERT INTO ALUMNOS (DNI, NOMBRE, APELLIDOS, CLAVE) VALUES ('".$_POST['dni']."','".$_POST['nombre']."','".$_POST['apellidos']."','".$_POST['contrasena']."')";

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

?>
