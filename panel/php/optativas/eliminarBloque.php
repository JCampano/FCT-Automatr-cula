<?php
    include "../functions.php";
    extract($_POST);
    session_start();
   
    $delete="DELETE FROM grupo_optativas WHERE id = '".$id."'";


    if(ejecutaConsultaAccion($delete)>0)
    {
          $_SESSION['tipoMensaje']= "success";
          $_SESSION['mensaje'] = "<strong>El bloque se ha eliminado correctamente</strong>";
          header ("location: ../../bloques-optativas.php");
    }
    else
    {
        $_SESSION['tipoMensaje']= "danger";
        $_SESSION['mensaje'] = "No puede eliminar el bloque, primero debe borrar las Optativas asignadas.";
   
        header ("location: ../../bloques-optativas.php");
    
    }


?>
