<?php
include "../functions.php";
session_start();
extract($_POST);

 
        $update="UPDATE enseñanzas SET nombre = '".$nombre."' WHERE id = '".$id."'";
   
    


if(ejecutaConsultaAccion($update)>0)
{
    $_SESSION['tipoMensaje']= "success";
    $_SESSION['mensaje'] = "<strong>Se han guardado los datos</strong>";
    header ("location: ../../ensenanzas.php");
}
else
{
    $_SESSION['tipoMensaje']= "warning";
    $_SESSION['mensaje'] = "<strong>No se ha modificado la enseñanza</strong>";
   
    header ("location: ../../ensenanzas.php");
}



?>
