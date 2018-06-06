<?php
include "../functions.php";
session_start();
extract($_POST);

    if ($contrasena!=""){
        $update="UPDATE ALUMNOS SET NOMBRE = '".$nombre."', APELLIDOS = '".$apellidos."', CLAVE = '".$contrasena."' WHERE DNI = '".$dni."'";
    } else {
        $update="UPDATE ALUMNOS SET NOMBRE = '".$nombre."', APELLIDOS = '".$apellidos."' WHERE DNI = '".$dni."'";
    }
    


if(ejecutaConsultaAccion($update)>0)
{
    $_SESSION['tipoMensaje']= "success";
    $_SESSION['mensaje'] = "<strong>Se han guardado los datos</strong>";
    header ("location: ../../alumnos.php");
}
else
{
    $_SESSION['tipoMensaje']= "warning";
    $_SESSION['mensaje'] = "<strong>No se ha modificado el alumno</strong>";
   
    header ("location: ../../alumnos.php");
}



?>
