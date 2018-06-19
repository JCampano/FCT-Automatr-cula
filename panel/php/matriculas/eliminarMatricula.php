<?php
    require_once("../functions.php");
    extract($_POST);
    session_start();
   
    $codigo=ejecutaConsultaArray("SELECT cod_matricula from matriculas where id=$id");
    $delete="DELETE FROM matriculas where id=$id";
    $delete2="DELETE from optativas_elegidas where cod_matricula=".$codigo[0]["cod_matricula"];
    
    if(ejecutaConsultaAccion($delete2)>0){
        echo "DELETE from optativas_elegidas where cod_matricula".$codigo[0]["cod_matricula"];
        if(ejecutaConsultaAccion($delete)>0)
        {
              $_SESSION['tipoMensaje']= "success";
              $_SESSION['mensaje'] = "La matricula <strong>#".$id."</strong> ha sido eliminada.";
              header ("location: ../../matriculas.php?v=n");
        }
        else
        {
            $_SESSION['tipoMensaje']= "danger";
            $_SESSION['mensaje'] = "Ha ocurrido un error.";
       
            header ("location: ../../matriculas.php?v=n");
        
        }
    }


?>
º