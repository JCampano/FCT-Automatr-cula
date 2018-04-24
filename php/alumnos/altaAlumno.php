<?php
include "../functions.php";
extract($_POST);

$consulta="SELECT * FROM ALUMNOS WHERE DNI='".$_POST['dni']."'";

if(ejecutaConsulta2($consulta)!=0)
{
    echo ("Alumno ya registrado");
}
else
{
    $insert="INSERT INTO ALUMNOS (DNI, NOMBRE, APELLIDOS, CLAVE, ID_CENTRO) VALUES ('".$_POST['dni']."','".$_POST['nombre']."','".$_POST['apellidos']."','".$_POST['contrasena']."', 0)";


if(ejecutaConsultaAccion($insert)>0)
{
    echo ("Alta de alumno realizada");
}
else
{
    echo ("No se ha podido insertar");
}
}

?>
