<?php
session_start();
include "functions.php";
extract($_POST);

$valido=true;

$dni=$_POST['dni'];
$contrasena=$_POST['contrasena'];

validar_dni($dni);
validar_contrasena($contrasena);

function validar_dni($dni)
{
	$letra = substr($dni, -1);
	$numeros = substr($dni, 0, -1);
	if (substr("TRWAGMYFPDXBNJZSQVHLCKE", $numeros%23, 1) != $letra && strlen($letra) != 1 && strlen ($numeros) != 8 ){
		$valido=false;
	}
}

function validar_contrasena($contrasena)
{
    if (trim($contrasena)=='') {

        $valido=false;
}
}


if($valido==true)
{
$consulta="SELECT * FROM ALUMNOS WHERE DNI='".$dni."' AND CLAVE='".$contrasena."'";
$resulset=ejecutaConsulta($consulta);

    if($fila=$resulset->fetch(PDO::FETCH_ASSOC))
    {
        $_SESSION["login"]=$dni;
        $_SESSION["usuario"]=$fila['nombre'];
        if(isset($_SESSION['ruta'])){
            header('Location:../'.$_SESSION['ruta']);
        }else{
            header('Location: ../index.php');
        }
    }
    else
    {
        $_SESSION['tipoMensaje']= "danger";
        $_SESSION['mensajeRegistro'] = "Datos incorrectos";
        $_SESSION['sinLogin']="logueate";
        header('Location: ../index.php');
    }
}
else
{
    $_SESSION['tipoMensaje']= "danger";
    $_SESSION['mensajeRegistro'] = "Validación incorrecta";
    $_SESSION['sinLogin']="logueate";
    header('Location: ../index.php');
}
?>
