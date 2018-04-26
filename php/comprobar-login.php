<?php

include "functions.php";
extract($_POST);

$consulta="SELECT * FROM ALUMNOS WHERE DNI='".$_POST['dni']."' AND CLAVE='".$_POST['contrasena']."'";

if(ejecutaConsulta2($consulta)!=0)
{
    session_start();
    $_SESSION["login"]=$_POST["dni"];
    $_SESSION["usuario"]="Consulta con el nombre pendiente";
    
    header('Location: ../index.php');
}
else
{
    header('Location: ../login.php');
}

?>
