<?php
    include "../functions.php";
    extract($_POST);
    session_start();
   
    $delete="DELETE FROM ALUMNOS WHERE DNI = '".$dni."'";


    if(ejecutaConsultaAccion($delete)>0)
    {
          $_SESSION['tipoMensaje']= "success";
          $_SESSION['mensaje'] = "<strong>El alumno se ha eliminado correctamente</strong>";
          header ("location: ../../alumnos.php");
    }
    else
    {
        $_SESSION['tipoMensaje']= "danger";
        $_SESSION['mensaje'] = "<strong>Ha ocurrido un error.</strong>";
   
        header ("location: ../../alumnos.php");
    
    }


?>
