<?php
session_start();
include "../functions.php";
	$id=$_SESSION["idUsuario"];
	
	$nombre = $_POST['nombre'];
	$apellidos  = $_POST['apellidos'];	

	$update="UPDATE PERSONAL SET NOMBRE = '".$nombre."',APELLIDOS='".$apellidos."' WHERE ID='".$id."';";
                //echo $update;
                if(ejecutaConsultaAccion($update)>0){
                    $_SESSION['tipoMensaje']= "success";
                    $_SESSION['mensaje'] = "<strong>Datos modificados con exito</strong>";
		    $_SESSION["nombre"]=$nombre;
                    header('Location: ../../mi-perfil.php');                    
                }
                else{
                    $_SESSION['tipoMensaje']= "danger";
                    $_SESSION['mensaje'] = "<strong>Error</strong> al modificar los Datos";
                    header('Location: ../../mi-perfil.php');
                }            
?>
