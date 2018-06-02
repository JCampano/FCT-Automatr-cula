<?php
    include "../functions.php";
    extract($_POST);
    session_start();
   
    $delete="DELETE FROM cursos WHERE id = '".$id."'";


    if(ejecutaConsultaAccion($delete)>0)
    {
          $_SESSION['tipoMensaje']= "success";
          $_SESSION['mensaje'] = "<strong>La enseñanza se ha eliminado correctamente</strong>";
          header ("location: ../../cursos.php");
    }
    else
    {
        $_SESSION['tipoMensaje']= "danger";
        $_SESSION['mensaje'] = "No puede eliminar la enseñanza, primero debe borrar los Itinerarios y las Asignaturas asignadas.";
   
        header ("location: ../../cursos.php");
    
    }


?>
