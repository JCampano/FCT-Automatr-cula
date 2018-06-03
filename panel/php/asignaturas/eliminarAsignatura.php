<?php
    include "../functions.php";
    extract($_POST);
    session_start();
   
    $delete="DELETE FROM asignaturas WHERE codigo = '".$cod."'";


    if(ejecutaConsultaAccion($delete)>0)
    {
          $_SESSION['tipoMensaje']= "success";
          $_SESSION['mensaje'] = "La asignatura se ha eliminado correctamente";
          header ("location: ../../asignaturas.php");
    }
    else
    {
        $_SESSION['tipoMensaje']= "danger";
        $_SESSION['mensaje'] = "Ha ocurrido un error al eliminar la asignatura.";
   
        header ("location: ../../asignaturas.php");
    
    }


?>
