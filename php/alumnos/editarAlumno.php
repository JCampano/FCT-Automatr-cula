<?php
include "../functions.php";
extract($_POST);

$consulta="SELECT * FROM alumnos WHERE dni='".$_POST['dni']."'";

if(ejecutaConsulta2($consulta)==0)
{
    echo ("El DNI introducido no existe");
}
else
{
    $update="UPDATE alumnos SET nombre = '".$_POST['nombre']."', apellidos = '".$_POST['apellidos']."', clave = '".$_POST['contrasena']."', id_centro =  0 WHERE dni = '".$_POST['dni']."'";


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
