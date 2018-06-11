<?php
session_start();
include "../functions.php";
extract($_POST);


//obtenemos el id del alumno

    $dni=$_SESSION['login'];    
    $consulta="SELECT id FROM alumnos WHERE DNI='".$dni."';";
    $resulset=ejecutaConsulta($consulta);
    $alumno=$resulset->fetch(PDO::FETCH_ASSOC); 

    $consulta="SELECT * FROM matriculas WHERE ID_ALUMNO='".$alumno['id']."';";
    $resulset=ejecutaConsulta($consulta);
    $matricula=$resulset->fetch(PDO::FETCH_ASSOC);

if($matricula['id']==1){
    $_SESSION['tipoMensaje']= "success";
    $_SESSION['mensajeRegistro'] = "<strong>Error</strong> no puedes editar una matricula ya finalizada";
    header('Location: ../../index.php');
}
else{

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

        
    $hora = date("H:i");   
    $codigo = 10000+$alumno['id'];
       
      
    //modificamos optativas
        $update1="UPDATE optativas_elegidas SET ID_OPTATIVA1='".$optativa."', ID_OPTATIVA2='".$optativa2."',ID_OPTATIVA3='".$optativa3."',ID_OPTATIVA4='".$optativa4."' WHERE COD_MATRICULA='".$codigo."';";
        //echo $update1;
        if(ejecutaConsultaAccion($update1)>0){
           
            //Modificamos la matricula
             $update="UPDATE matriculas SET COD_MATRICULA = '".$codigo."',FECHA='".date("Y-m-d ")."', HORA='".$hora."',ID_ALUMNO='".$alumno['id']."',ID_ITINERARIO='".$itinerario."' WHERE ID_ALUMNO='".$alumno['id']."';";
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
    }    
        
?>
