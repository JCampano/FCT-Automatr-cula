<?php
session_start();
function comprobarLogin($tipo){
	
	

    if($tipo=="gestor"){
        if($_SESSION["role"]=="gestor" || $_SESSION["role"]=="administrador"){

        
            return true;

        } else {
            return false;
        }
    }

    if($tipo=="administrador"){
        if($_SESSION["role"]=="administrador"){
          
            return true;
        } else {
            return false;
        }
    }

}

?>