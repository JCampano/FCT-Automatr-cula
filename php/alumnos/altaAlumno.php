<?php
session_start();
include "../functions.php";
extract($_POST);

$consulta="SELECT * FROM ALUMNOS WHERE DNI='".$dni."'";
$dni=trim($_POST['dni']);
$contrasena=trim($_POST['contrasena']);
$nombre=trim($_POST['nombre']);
$apellido1=trim($_POST['apellido1']);
$apellido2=trim($_POST['apellido2']);
$nie=trim($_POST['nie']);
$fecha_nac=trim($_POST['fecha_nac']);
$direccion=trim($_POST['direccion']);
$poblacion=trim($_POST['poblacion']);
$provincia=trim($_POST['provincia']);
$cod_postal=trim($_POST['cod_postal']);
$tel_fijo=trim($_POST['tel_fijo']);
$tel_movil=trim($_POST['tel_movil']);
$email=trim($_POST['email']);
$nombre_padre=trim($_POST['nombre_padre']);
$apellidos_padre=trim($_POST['apellidos_padre']);
$tel_padre=trim($_POST['tel_padre']);
$email_padre=trim($_POST['email_padre']);
$nombre_madre=trim($_POST['nombre_madre']);
$apellidos_madre=trim($_POST['apellidos_madre']);
$tel_madre=trim($_POST['tel_madre']);
$email_madre=trim($_POST['email_madre']);
$valido=true;


if(!preg_match("/\d{8}\w/", $dni))
{
    $valido=false;
}

if($contrasena=="")
{
    $valido=false;
}

if(!preg_match("/[a-zA-Z\s]{3,40}/", $nombre))
{
    $valido=false;
}

if(!preg_match("/[a-zA-Z\s]{3,40}/", $apellido1))
{
    $valido=false;
}

if(!preg_match("/[a-zA-Z\s]{3,40}/", $apellido2))
{
    $valido=false;
}

if(!preg_match("/^[XYZ]{1}[0-9]{7}[TRWAGMYFPDXBNJZSQVHLCKET]{1}$/", $nie))
{
    $valido=false;
}

if(!preg_match("/^(0?[1-9]|[12][0-9]|3[01])[\/\-](0?[1-9]|1[012])[\/\-]\d{4}$/", $fecha_nac))
{
    $valido=false;
}

if(!preg_match("/[a-zA-Z\s]{3,40}/", $direccion))
{
    $valido=false;
}

if(!preg_match("/[a-zA-Z\s]{3,40}/", $poblacion))
{
    $valido=false;
}

if(!preg_match("/[a-zA-Z\s]{3,40}/", $provincia))
{
    $valido=false;
}

if(!preg_match("/^(?:0[1-9]\d{3}|[1-4]\d{4}|5[0-2]\d{3})$/", $cod_postal))
{
    $valido=false;
}

if(!preg_match("/^\d{9}$/", $tel_fijo))
{
    $valido=false;
}

if(!preg_match("/^\d{9}$/", $tel_movil))
{
    $valido=false;
}

if(!preg_match("/^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/", $email))
{
    $valido=false;
}

if(!preg_match("/[a-zA-Z\s]{3,40}/", $nombre_padre))
{
    $valido=false;
}

if(!preg_match("/[a-zA-Z\s]{3,40}/", $apellidos_padre))
{
    $valido=false;
}

if(!preg_match("/^\d{9}$/", $tel_padre))
{
    $valido=false;
}

if(!preg_match("/^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/", $email_padre))
{
    $valido=false;
}

if(!preg_match("/[a-zA-Z\s]{3,40}/", $nombre_madre))
{
    $valido=false;
}

if(!preg_match("/[a-zA-Z\s]{3,40}/", $apellidos_madre))
{
    $valido=false;
}

if(!preg_match("/^\d{9}$/", $tel_madre))
{
    $valido=false;
}

if(!preg_match("/^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/", $email_madre))
{
    $valido=false;
}

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
    $insert="INSERT INTO ALUMNOS (DNI, CLAVE, NOMBRE, APELLIDO1, APELLIDO2, NIE, FECHA_NAC, DIRECCION, POBLACION, PROVINCIA, COD_POSTAL, TEL_FIJO, TEL_MOVIL, CORREO, NOMBRE_PADRE, APELLIDOS_PADRE, TEL_PADRE, CORREO_PADRE, NOMBRE_MADRE, APELLIDOS_MADRE, TEL_MADRE, CORREO_MADRE) VALUES ('".$dni."', '".$contrasena."', '".$nombre."', '".$apellido1."', '".$apellido2."', '".$nie."', '".$fecha_nac."', '".$direccion."', '".$poblacion."', '".$provincia."', ".$cod_postal.", ".$tel_fijo.", ".$tel_movil.", '".$email."', '".$nombre_padre."', '".$apellidos_padre."', ".$tel_padre.", '".$email_padre."', '".$nombre_madre."', '".$apellidos_madre."', ".$tel_madre.", '".$email_madre."')";

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
