<?php
include "../functions.php";
session_start();
extract($_POST);

 
        $update="UPDATE asignaturas SET nombre = '".$nombre."', id_itinerario = ".$itinerario." WHERE codigo = '".$codigo."'";

    


if(ejecutaConsultaAccion($update)>0)
{
    $_SESSION['tipoMensaje']= "success";
    $_SESSION['mensaje'] = "<strong>Se han guardado los datos</strong>";
    header ("location: ../../asignaturas.php");
}
else
{
    $_SESSION['tipoMensaje']= "warning";
    $_SESSION['mensaje'] = "<strong>No se ha modificado la asignatura</strong>";
   
    header ("location: ../../asignaturas.php");
}



?>
