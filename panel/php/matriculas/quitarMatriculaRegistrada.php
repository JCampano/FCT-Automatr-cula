<?php
    include "../functions.php";
    extract($_POST);
    session_start();
   
    $delete="DELETE FROM matriculas_registradas WHERE id_matricula = '".$id."'";


    if(ejecutaConsultaAccion($delete)>0)
    {
          $_SESSION['tipoMensaje']= "success";
          $_SESSION['mensaje'] = "La matricula<strong>#".$id."</strong> ha sido anulada.";
          header ("location: ../../matriculas.php");
    }
    else
    {
        $_SESSION['tipoMensaje']= "danger";
        $_SESSION['mensaje'] = "Ha ocurrido un error.";
   
        header ("location: ../../matriculas.php");
    
    }


?>
º