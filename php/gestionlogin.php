<?php
ob_start();
include "functions.php";


if(!ISSET($_SESSION["login"]))
{
    $_SESSION['tipoMensaje']= "danger";
	$_SESSION['mensajeRegistro'] = "Error debe loguearse para acceder a esta parte de la pagina";
	$_SESSION['sinLogin']="logueate";
    header('Location: index.php');
}

ob_end_flush();
?>
