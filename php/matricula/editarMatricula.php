<?php
session_start();
include "../functions.php";
extract($_POST);

$enseñanza=$_POST['selectEnsenanza'];
$curso = $_POST['selectCurso'];
$itinerario=$_POST['selectItinerario'];
$optativa=$_POST['selectOptativas'];
$optativa2 ="";
$optativa3 ="";
$optativa4 ="";
if(isset($_POST['selectOptativas2'])){
    if($_POST['selectOptativas2'] != "Seleccione")
        $optativa2 =$_POST['selectOptativas2'];

    if(isset($_POST['selectOptativas3'])){
        if($_POST['selectOptativas3'] != "Seleccione")
            $optativa3 =$_POST['selectOptativas3'];

        if(isset($_POST['selectOptativas4'])){
            if($_POST['selectOptativas4'] != "Seleccione")
                $optativa4 =$_POST['selectOptativas4'];
        }
    }
}

//obtenemos el id del alumno

    $dni=$_SESSION['login'];    
    $consulta="SELECT id FROM ALUMNOS WHERE DNI='".$dni."';";
    $resulset=ejecutaConsulta($consulta);
    $alumno=$resulset->fetch(PDO::FETCH_ASSOC); 

   /* $consulta="SELECT * FROM MATRICULAS WHERE ID_ALUMNO='".$alumno['id']."';";
    $resulset=ejecutaConsulta($consulta);
    $matricula=$resulset->fetch(PDO::FETCH_ASSOC); 
    */

    //$fecha1 = date("j-n-Y");
    $hora = date("H:i");   
    $codigo = 10000+$alumno['id'];



    /*if($matricula['fecha'] != date("Y-m-d")){
    //MODIFICAMOS LA MATRICULA REGISTRADA
        $update2="UPDATE MATRICULAS_REGISTRADAS SET FECHA='".date("Y-m-d")."' WHERE ID_MATRICULA='".$matricula['id']."';";
        //echo $update2;
        if(ejecutaConsultaAccion($update2)==0){     
            $_SESSION['tipoMensaje']= "danger";
            $_SESSION['mensajeRegistro'] = "<strong>Error</strong> al modificar el registro de matricula";
            header('Location: ../../index.php');
        } 
    }*/
  
    //modificamos optativas
        $update1="UPDATE OPTATIVAS_ELEGIDAS SET ID_OPTATIVA1='".$optativa."', ID_OPTATIVA2='".$optativa2."',ID_OPTATIVA3='".$optativa3."',ID_OPTATIVA4='".$optativa4."' WHERE COD_MATRICULA='".$codigo."';";
        //echo $update1;
        if(ejecutaConsultaAccion($update1)>0){
           
            //Modificamos la matricula
             $update="UPDATE MATRICULAS SET COD_MATRICULA = '".$codigo."',FECHA='".date("Y-m-d ")."', HORA='".$hora."',ID_ALUMNO='".$alumno['id']."',ID_ITINERARIO='".$itinerario."' WHERE ID_ALUMNO='".$alumno['id']."';";
                //echo $update;
                if(ejecutaConsultaAccion($update)>0){
                    $_SESSION['tipoMensaje']= "success";
                    $_SESSION['mensajeRegistro'] = "<strong>Matricula modificada con exito</strong>";
                    header('Location: ../../index.php');                    
                }
                else{
                    $_SESSION['tipoMensaje']= "danger";
                    $_SESSION['mensajeRegistro'] = "<strong>Error</strong> al modificar la Matrícula";
                    header('Location: ../../index.php');
                }            
        }
        else{
            $_SESSION['tipoMensaje']= "danger";
            $_SESSION['mensajeRegistro'] = "<strong>Error</strong> al modificar las optativas";
            header('Location: ../../index.php');
        }       
    
?>
