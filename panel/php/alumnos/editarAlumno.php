<?php
require_once("../functions.php");
session_start();
extract($_POST);

$campoVacio=false;

foreach ($_POST as $indice => $valor){
    if ($valor==""){
        if($indice!="contrasena" && $indice != "contrasena2"){
            echo $indice;
            $campoVacio=true;
        }
        
       
    }
}

if($campoVacio){
    $_SESSION['tipoMensaje']= "warning";
    $_SESSION['mensaje'] = "No puede dejar ningun campo en blanco";
    header ("location: ../../alumnos.php");
} else {

    if ($contrasena!=""){
        $update="UPDATE alumnos SET dni = '$dni', nombre='$nombre', apellido1 = '$apellido1', apellido2 = '$apellido2', nie='$nie', fecha_nac = '$fecha_nac', direccion = '$direccion', poblacion = '$poblacion', provincia = '$provincia', cod_postal = $cod_postal, tel_fijo = $tel_fijo, tel_movil = $tel_movil, correo = '$correo', dni_padre = '$dni_padre', nombre_padre = '$nombre_padre', apellidos_padre = '$apellidos_padre', tel_padre = $tel_padre, correo_padre = '$correo_madre', dni_madre = '$dni_madre', nombre_madre = '$nombre_madre', apellidos_madre = '$apellidos_madre', tel_madre = $tel_madre, correo_madre = '$correo_madre' where id = $id;";
        echo "hay contraseña";
        if($contrasena == $contrasena2){
           $updateC="UPDATE alumnos SET clave ='$contrasena' where id=$id";; 
       } else {
        $_SESSION['tipoMensaje']= "warning";
        $_SESSION['mensaje'] = "Las contraseñas introducidas no coinciden";
        header ("location: ../../alumnos.php");
       }
        
    } else {
        $update="UPDATE alumnos SET dni = '$dni', nombre='$nombre', apellido1 = '$apellido1', apellido2 = '$apellido2', nie='$nie', fecha_nac = '$fecha_nac', direccion = '$direccion', poblacion = '$poblacion', provincia = '$provincia', cod_postal = $cod_postal, tel_fijo = $tel_fijo, tel_movil = $tel_movil, correo = '$correo', dni_padre = '$dni_padre', nombre_padre = '$nombre_padre', apellidos_padre = '$apellidos_padre', tel_padre = $tel_padre, correo_padre = '$correo_madre', dni_madre = '$dni_madre', nombre_madre = '$nombre_madre', apellidos_madre = '$apellidos_madre', tel_madre = $tel_madre, correo_madre = '$correo_madre' where id = $id;";
    }
    


    if(ejecutaConsultaAccion($update)>0)
    {
        if (isset($updateC)){
            ejecutaConsultaAccion($updateC);
        }
        $_SESSION['tipoMensaje']= "success";
        $_SESSION['mensaje'] = "Se han guardado los datos";
        header ("location: ../../alumnos.php");
    }
    else
    {   
        if (isset($updateC)){
            ejecutaConsultaAccion($updateC);
                $_SESSION['tipoMensaje']= "success";
                $_SESSION['mensaje'] = "La contraseña se ha modificado correctamente";
                header ("location: ../../alumnos.php");
        } else {
            $_SESSION['tipoMensaje']= "warning";
            $_SESSION['mensaje'] = "No se ha modificado el alumno";
                 header ("location: ../../alumnos.php");
        }
       

    }
}



?>
