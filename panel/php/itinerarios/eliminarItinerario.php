<?php
    include "../functions.php";
    extract($_POST);
    session_start();
   
    $delete="DELETE FROM itinerarios WHERE id = '".$id."'";


    if(ejecutaConsultaAccion($delete)>0)
    {
          $_SESSION['tipoMensaje']= "success";
          $_SESSION['mensaje'] = "<strong>El itinerario se ha eliminado correctamente</strong>";
          header ("location: ../../itinerarios.php");
    }
    else
    {
        $_SESSION['tipoMensaje']= "danger";
        $_SESSION['mensaje'] = "No puede eliminar el itinerario, primero debe borrar las Asignaturas asignadas.";
   
        header ("location: ../../itinerarios.php");
    
    }


?>
