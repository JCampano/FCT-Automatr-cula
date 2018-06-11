<?php
include "../functions.php";
extract($_POST);

$consulta="SELECT * FROM alumnos WHERE DNI='".$_POST['dni']."'";

if(ejecutaConsulta2($consulta)==0)
{
    echo ("El alumno introducido no existe");
}
else
{
    $delete="DELETE FROM alumnos WHERE DNI = '".$_POST['dni']."'";


if(ejecutaConsultaAccion($update)>0)
{
    echo ("Alumno eliminado correctamente");
}
else
{
    echo ("No se ha podido eliminar el alumno");
}
}


?>
