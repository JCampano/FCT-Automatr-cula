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



    $enseñanza=$_POST['selectEnsenanza'];
    $curso = $_POST['selectCurso'];
    $itinerario=$_POST['selectItinerario'];
   

    $optativa  = 0;
    $optativa1 = 0;
    $optativa2 = 0;
    $optativa3 = 0;


    if(isset($_POST['optativa0']))
        $optativa  = $_POST['optativa0'];

    if(isset($_POST['optativa1']))
    $optativa1 = $_POST['optativa1'];

    if(isset($_POST['optativa2']))
    $optativa2 = $_POST['optativa2'];

    if(isset($_POST['optativa3']))
    $optativa3 = $_POST['optativa3'];    

        
    $hora = date("H:i");   
    $codigo = 10000+$alumno['id'];
       
      
    //modificamos optativas
        $update1="UPDATE optativas_elegidas SET ID_OPTATIVA1='".$optativa."', ID_OPTATIVA2='".$optativa1."',ID_OPTATIVA3='".$optativa2."',ID_OPTATIVA4='".$optativa3."' WHERE COD_MATRICULA='".$codigo."';";
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
                    $_SESSION['mensajeRegistro'] = "<strong>Error</strong> no se modifico ningun dato";
                    header('Location: ../../index.php');
                }            
        }
        else{
            $_SESSION['tipoMensaje']= "danger";
            $_SESSION['mensajeRegistro'] = "<strong>Error</strong> al modificar las optativas";
            header('Location: ../../index.php');
        }   
       
        
?>
