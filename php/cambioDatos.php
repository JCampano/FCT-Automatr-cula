<?php
header('Content-Type: text/html; charset=UTF-8');
session_start();
include "functions.php";
extract($_POST);
$dni_autentificado=$_SESSION["login"];
$consulta="SELECT * FROM ALUMNOS WHERE DNI='".$dni_autentificado."'";
$dni=trim($_POST['dni']);
$contrasena=trim($_POST['contrasena']);
$nombre=trim($_POST['nombre']);
$apellido1=trim($_POST['apellido1']);
$apellido2=trim($_POST['apellido2']);
$nie=trim($_POST['nie']);
$fecha_nac=trim($_POST['fecha_nac']);
$direccion=trim($_POST['direccion']);
$poblacion=trim($_POST['poblacion']);
$provincia=trim($_POST['provincia']);
$cod_postal=trim($_POST['cod_postal']);
$tel_fijo=trim($_POST['tel_fijo']);
$tel_movil=trim($_POST['tel_movil']);
$email=trim($_POST['email']);
$dni_padre=trim($_POST['dni_padre']);
$nombre_padre=trim($_POST['nombre_padre']);
$apellidos_padre=trim($_POST['apellidos_padre']);
$tel_padre=trim($_POST['tel_padre']);
$email_padre=trim($_POST['email_padre']);
$dni_madre=trim($_POST['dni_madre']);
$nombre_madre=trim($_POST['nombre_madre']);
$apellidos_madre=trim($_POST['apellidos_madre']);
$tel_madre=trim($_POST['tel_madre']);
$email_madre=trim($_POST['email_madre']);
$arraySolicitud= array();
$resulset=ejecutaConsulta($consulta);

 if($fila=$resulset->fetch(PDO::FETCH_ASSOC))
 {
     if($fila['dni']!=$dni)
     {
         $arraySolicitud['dni']=$dni;
     }

     if($fila['clave']!=$contrasena)
     {
         $arraySolicitud['clave']=$contrasena;
     }
     if($fila['nombre']!=$nombre)
     {
         $arraySolicitud['nombre']=$nombre;
     }
     if($fila['apellido1']!=$apellido1)
     {
         $arraySolicitud['apellido1']=$apellido1;
     }
     if($fila['apellido2']!=$apellido2)
     {
         $arraySolicitud['apellido2']=$apellido2;
     }
     if($fila['nie']!=$nie)
     {
         $arraySolicitud['nie']=$nie;
     }
     if($fila['fecha_nac']!=$fecha_nac)
     {
         $arraySolicitud['fecha_nac']=$fecha_nac;
     }
     if($fila['direccion']!=$direccion)
     {
         $arraySolicitud['direccion']=$direccion;
     }
     if($fila['poblacion']!=$poblacion)
     {
         $arraySolicitud['poblacion']=$poblacion;
     }
     if($fila['provincia']!=$provincia)
     {
         $arraySolicitud['provincia']=$provincia;
     }
     if($fila['cod_postal']!=$cod_postal)
     {
         $arraySolicitud['cod_postal']=$cod_postal;
     }
     if($fila['tel_fijo']!=$tel_fijo)
     {
         $arraySolicitud['tel_fijo']=$tel_fijo;
     }
     if($fila['tel_movil']!=$tel_movil)
     {
         $arraySolicitud['tel_movil']=$tel_movil;
     }
     if($fila['correo']!=$email)
     {
         $arraySolicitud['correo']=$email;
     }
     if($fila['dni_padre']!=$dni_padre)
     {
         $arraySolicitud['dni_padre']=$dni_padre;
     }
     if($fila['nombre_padre']!=$nombre_padre)
     {
         $arraySolicitud['nombre_padre']=$nombre_padre;
     }
     if($fila['apellidos_padre']!=$apellidos_padre)
     {
         $arraySolicitud['apellidos_padre']=$apellidos_padre;
     }
     if($fila['tel_padre']!=$tel_padre)
     {
         $arraySolicitud['tel_padre']=$tel_padre;
     }
     if($fila['correo_padre']!=$email_padre)
     {
         $arraySolicitud['correo_padre']=$email_padre;
     }
     if($fila['dni_madre']!=$dni_madre)
     {
         $arraySolicitud['dni_madre']=$dni_madre;
     }
     if($fila['nombre_madre']!=$nombre_madre)
     {
         $arraySolicitud['nombre_madre']=$nombre_madre;
     }
     if($fila['apellidos_madre']!=$apellidos_madre)
     {
         $arraySolicitud['apellidos_madre']=$apellidos_madre;
     }
     if($fila['tel_madre']!=$tel_madre)
     {
         $arraySolicitud['tel_madre']=$tel_madre;
     }
     if($fila['correo_madre']!=$email_madre)
     {
         $arraySolicitud['correo_madre']=$email_madre;
     }

     if(!empty($arraySolicitud))
     {
         $json = json_encode($arraySolicitud,JSON_UNESCAPED_UNICODE); //echo $json;
         
         $update="UPDATE MATRICULAS SET CAMBIO_DATOS='".$json."' WHERE ID_ALUMNO='".$fila['id']."'";

         if(ejecutaConsultaAccion($update)>0)
	       {
	    $_SESSION['tipoMensaje']= "warning";
		$_SESSION['mensajeRegistro'] = "<strong>Solicitud de cambio de datos realizada con exito</strong>";
		header('Location: ../index.php');
	       
        }
    }
 }
?>
