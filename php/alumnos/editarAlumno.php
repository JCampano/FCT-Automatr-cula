<?php
include "../functions.php";
extract($_POST);

$consulta="SELECT * FROM alumnos WHERE DNI='".$_POST['dni']."'";

if(ejecutaConsulta2($consulta)==0)
{
    echo ("El DNI introducido no existe");
}
else
{
    $update="UPDATE alumnos SET NOMBRE = '".$_POST['nombre']."', APELLIDOS = '".$_POST['apellidos']."', CLAVE = '".$_POST['contrasena']."', ID_CENTRO =  0 WHERE DNI = '".$_POST['dni']."'";


if(ejecutaConsultaAccion($update)>0)
{
    echo ("Alumno modificado correctamente");
}
else
{
    echo ("No se ha podido modificar el alumno");
}
}


?>
