<?php
    require_once("../functions.php");
    extract($_POST);
    session_start();
    if($id!=1){
        $delete="DELETE FROM personal WHERE id = $id";


        if(ejecutaConsultaAccion($delete)>0)
        {
              $_SESSION['tipoMensaje']= "success";
              $_SESSION['mensaje'] = "El usuario ha sido eliminado correctamente";
              header ("location: ../../usuarios.php");
        }
        else
        {
            $_SESSION['tipoMensaje']= "danger";
            $_SESSION['mensaje'] = "Ha ocurrido un error.";
        
            header ("location: ../../usuarios.php");
        
        }
    } else {
        $_SESSION['tipoMensaje']= "danger";
        $_SESSION['mensaje'] = "No es posible eliminar al usuario 1";
        
        header ("location: ../../usuarios.php");
    }
    


?>
