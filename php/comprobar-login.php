<?php
session_start();
include "functions.php";
extract($_POST);

$consulta="SELECT * FROM ALUMNOS WHERE DNI='".$_POST['dni']."' AND CLAVE='".$_POST['contrasena']."'";
$resulset=ejecutaConsulta($consulta);


if($fila=$resulset->fetch(PDO::FETCH_ASSOC))
{
    $_SESSION["login"]=$_POST["dni"];
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

?>
