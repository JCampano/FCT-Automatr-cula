<?php
include "../functions.php";
extract($_POST);

$consulta="SELECT * FROM ALUMNOS WHERE DNI='".$_SESSION['alumno']."'";

if(ejecutaConsulta2($consulta)==0)
{
    echo ("El alumno no existe");
}
else
{
    $delete="DELETE FROM ALUMNOS WHERE DNI = '".$_SESSION['alumno']."'";


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