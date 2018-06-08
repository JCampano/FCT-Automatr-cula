<?php
    include "../functions.php";
    extract($_POST);
    session_start();
    $compruebaMatricula=ejecutaConsultaArray("SELECT id from matriculas where id_alumno=".$id);
    $compruebaMatriculaRegistrada=ejecutaConsultaArray("SELECT id_usuario from matriculas_registradas where id_usuario=".$id);


    if(count($compruebaMatriculaRegistrada)!=0){
    //  ejecutaConsultaAccion("DELETE FROM matriculas_registradas where id_alumno=".$id);
       echo "DELETE FROM matriculas_registradas where id_alumno=".$id;
    }
    if(count($compruebaMatricula)!=0){
       //ejecutaConsultaAccion("DELETE FROM matriculas where id_alumno=".$id);
       echo "DELETE FROM matriculas where id_alumno=".$id;
    }


    $delete="DELETE FROM ALUMNOS WHERE id = ".$id;

    echo $delete;
    /*if(ejecutaConsultaAccion($delete)>0)
    {
          $_SESSION['tipoMensaje']= "success";
          $_SESSION['mensaje'] = "<strong>El alumno se ha eliminado correctamente</strong>";
       //   header ("location: ../../alumnos.php");
    }
    else
    {
        $_SESSION['tipoMensaje']= "danger";
        $_SESSION['mensaje'] = "<strong>Ha ocurrido un error.</strong>"."DELETE FROM ALUMNOS WHERE id = ".$id;
   
    //    header ("location: ../../alumnos.php");
    
    }

*/
?>
