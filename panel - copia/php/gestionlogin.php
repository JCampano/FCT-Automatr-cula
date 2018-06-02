<?php
ob_start();


$_SESSION["login"]="prueba";
if(!ISSET($_SESSION["login"]))
{
    $_SESSION['tipoMensaje']= "danger";
	$_SESSION['mensaje'] = "Error debe loguearse para acceder a esta parte de la pagina";
	$_SESSION['sinLogin']="logueate";
    header('Location: index.php');
}

ob_end_flush();
?>
