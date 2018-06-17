<?php
    require_once("../functions.php");

    extract($_POST);
    $consulta="";
    foreach($_POST as $indice=>$valor){



    	if ($valor === end($_POST)) {
    	         $consulta.=$indice.'="'.$valor.'",cambio_datos=null where id='.$id;
    	} else {
    	    $consulta.=$indice.'="'.$valor.'", ';
    	}

    }
   // echo "UPDATE alumnos SET ".$consulta;

    
    if(ejecutaConsultaAccion("UPDATE alumnos SET ".$consulta)>0)
    {
        $_SESSION['tipoMensaje']= "success";
        $_SESSION['mensaje'] = "<strong>Se han guardado los cambios correctamente</strong>";
        header ("location: ../../solicitudes.php");
    }
    else
    {
        $_SESSION['tipoMensaje']= "warning";
        $_SESSION['mensaje'] = "<strong>Ha ocurrido un error al actualizar los cambios</strong>";
       
        header ("location: ../../solicitudes.php");
    }




 ?>