<?php
require_once("../functions.php");
session_start();
extract($_POST);


    if($id==1 && $tipo!=3){
        $_SESSION['tipoMensaje']= "warning";
        $_SESSION['mensaje'] = "No es posible quitar el tipo Administrador del usuario 1";
        
        header ("location: ../../usuarios.php");
    } else {
        if($tipo==1){
            $nTipo="administrativo";
        } else if ($tipo==2){
            $nTipo="gestor";
        } else if ($tipo==3){
            $nTipo="administrador";

        }

        if($pass==""){
            $parteClave="";
        } else {
            $parteClave=" clave='$pass',";
        }

        $update = "UPDATE personal set dni='$dni',".$parteClave." nombre='$nombre', apellidos = '$apellidos',telefono=$telefono, tipo = '$nTipo' where id=$id";
          
            if(ejecutaConsultaAccion($update)>0)
            {
                $_SESSION['tipoMensaje']= "success";
                $_SESSION['mensaje'] = "Se han guardado los cambios";
                header ("location: ../../usuarios.php");

            }
            else
            {
                $_SESSION['tipoMensaje']= "warning";
                $_SESSION['mensaje'] = "No se ha realizado ningún cambio";
               
                header ("location: ../../usuarios.php");
            }
    }





?>
