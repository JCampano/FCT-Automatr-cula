<?php
header("Expires: Tue, 03 Jul 2001 06:00:00 GMT");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header("Cache-Control: no-store, no-cache, must-revalidate");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
include "../functions.php";
session_start();
$idAlumno = $_POST['idAlumno'];

$consulta="SELECT * FROM matriculas WHERE id_alumno='".$idAlumno."';";
    $resulset=ejecutaConsulta($consulta);
    $matricula=$resulset->fetch(PDO::FETCH_ASSOC);
//comprobamos si la matricula se encuentra finalizada

if($matricula['finalizada'] == 1){
    $_SESSION['tipoMensaje']= "warning";
    $_SESSION['mensajeRegistro'] = "<strong>Error</strong> No puedes cambiar la imagen una vez finalizada la matricula";
    header('Location: ../../index.php');
}
else{

    if(isset($_FILES["imagen"]) || $_FILES["imagen"]["error"] = 0){//comprobamos si llego la imagen correctamente
    	connectDB();      											//nos conectamos a la DB
        //echo 'Archivo recibido correctamente';    	
    	$ruta = "../../imgAlumnos/".$idAlumno.".jpg";
        $nombre = "imgAlumnos/".$idAlumno.".jpg";
        $permitidos = array("image/jpg", "image/jpeg", "image/gif", "image/png");
        $limite_kb = 16384;
        
        //echo $idAlumno;

        if (in_array($_FILES['imagen']['type'], $permitidos) && $_FILES['imagen']['size'] <= $limite_kb * 1024)
        {
    		// Recibo los datos de la imagen
    		//$imagen = $_FILES['imagen']['name'];
    		$tipo = $_FILES['imagen']['type'];
    		$tamano = $_FILES['imagen']['size'];  

          //Muevo la imagen desde el directorio temporal a nuestra ruta indicada anteriormente
            move_uploaded_file($_FILES['imagen']['tmp_name'],$ruta);

            //Comprobamos si existe o no, si existe hacemos update, sino hacemos insert
            $existe = "select * from imagenes where id_usuario ='". $idAlumno ."'";
            if(ejecutaConsulta2($existe)==0){            
            	$sql = "INSERT INTO imagenes (id_usuario, imagen) VALUES ('$idAlumno','$nombre')";
            }else{
              	$sql = "UPDATE imagenes SET imagen = '".$nombre."' WHERE id_usuario='".$idAlumno."';";
            }		
    		ejecutaConsulta($sql);
            //echo $sql;
    		header('Location: ../../perfil-alumno.php');        
    	}	 		
        
        else
        {
            $_SESSION['tipoMensaje']= "danger";
            $_SESSION['mensajeRegistro'] = "<strong>Error</strong> Formato de archivo no permitido o excede el tamaño límite archivo";
            header('Location: ../../index.php');
        }
    }
}
?>
