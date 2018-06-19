<?php
session_start();
include "../functions.php";
	$id=$_SESSION["idUsuario"];
	
	$actual = $_POST['actual'];
	$pass1  = $_POST['pass1'];
    $pass2  = $_POST['pass2'];	
    

   if($pass1 == $pass2){ 
       $consulta=ejecutaConsultaArray("SELECT * from personal where id='$id' && clave='$actual'");
       //echo $consulta;
        if(count($consulta)!=0){
            $update="UPDATE PERSONAL SET clave = '".$pass1."' WHERE ID='".$id."';";
                
                if(ejecutaConsultaAccion($update)>0){
                    $_SESSION['tipoMensaje']= "success";
                    $_SESSION['mensaje'] = "La contraseña se ha modificado correctamente";
                    header('Location: ../../mi-perfil.php');                    
                }
                else{
                    $_SESSION['tipoMensaje']= "danger";
                    $_SESSION['mensaje'] = "Debe introducir una contraseña distinta a la actual";
                    header('Location: ../../mi-perfil.php');
                } 
           
        } 
         else {
            $_SESSION['tipoMensaje']= "danger";
            $_SESSION['mensaje'] = "La contraseña actual no es correcta";
            header('Location: ../../mi-perfil.php');
        } 
    }
    else{
        $_SESSION['tipoMensaje']= "danger";
        $_SESSION['mensaje'] = "Las contraseñas no coinciden";
        header('Location: ../../mi-perfil.php');
    }















/*


	$update="UPDATE PERSONAL SET NOMBRE = '".$nombre."',APELLIDOS='".$apellidos."' WHERE ID='".$id."';";
                //echo $update;
                if(ejecutaConsultaAccion($update)>0){
                    $_SESSION['tipoMensaje']= "success";
                    $_SESSION['mensaje'] = "<strong>Datos modificados con exito</strong>";
                    header('Location: ../../mi-perfil.php');                    
                }
                else{
                    $_SESSION['tipoMensaje']= "danger";
                    $_SESSION['mensaje'] = "<strong>Error</strong> al modificar los Datos";
                    header('Location: ../../mi-perfil.php');
                }   */         
?>