<?php
include "../functions.php";

if(isset($_FILES["imagen"]) || $_FILES["imagen"]["error"] = 0){//comprobamos si llego la imagen correctamente
	connectDB();      											//nos conectamos a la DB
    //echo 'Archivo recibido correctamente';


	$idAlumno = $_POST['idAlumno'];
	$ruta = "../../imgAlumnos/".$idAlumno.".jpg";
    $nombre = "'/'imgAlumnos/".$idAlumno.".jpg";
    $permitidos = array("image/jpg", "image/jpeg", "image/gif", "image/png");
    $limite_kb = 16384;
    
    echo $idAlumno;

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
          	$sql = "UPDATE imagenes SET imagen = ".$idAlumno.".jpg";
        }		
		ejecutaConsulta($sql);
		header('Location: ../../perfil-alumno.php');        
	}	 		
    
    else
    {
        echo "Formato de archivo no permitido o excede el tamaño límite de $limite_kb Kbytes.";
    }
}
?>