<?php
    include "../functions.php";
    extract($_POST);
    session_start();
   
    $delete="DELETE FROM enseñanzas WHERE id = '".$id."'";


    if(ejecutaConsultaAccion($delete)>0)
    {
          $_SESSION['tipoMensaje']= "success";
          $_SESSION['mensaje'] = "<strong>La enseñanza se ha eliminado correctamente</strong>";
          header ("location: ../../ensenanzas.php");
    }
    else
    {
        $_SESSION['tipoMensaje']= "danger";
        $_SESSION['mensaje'] = "No puede eliminar la enseñanza, primero debe borrar los Itinerarios y las Asignaturas asignadas.";
   
        header ("location: ../../ensenanzas.php");
    
    }


?>
