<?php
    include "../functions.php";
    extract($_POST);
    session_start();
   
    $delete="DELETE FROM optativas WHERE id = '".$id."'";


    if(ejecutaConsultaAccion($delete)>0)
    {
          $_SESSION['tipoMensaje']= "success";
          $_SESSION['mensaje'] = "<strong>La optativa se ha eliminado correctamente</strong>";
          header ("location: ../../optativas.php");
    }
    else
    {
        $_SESSION['tipoMensaje']= "danger";
        $_SESSION['mensaje'] = "Ha ocurrido un error al eliminar la optativa";
   
        header ("location: ../../optativas.php");
    
    }


?>
