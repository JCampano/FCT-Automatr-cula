<?php
include "functions.php";


//Incluyo la clase
include 'simplexlsx.class.php';


    if(isset($_FILES["archivo"]) || $_FILES["archivo"]["error"] = 0){//comprobamos si llego la imagen correctamente
    	connectDB();      											//nos conectamos a la DB
        $nombreArchivo=$_FILES["archivo"]["name"];
    	$ruta = "../../xls/".$nombreArchivo;
        $limite_kb = 102400;

        if ($_FILES['archivo']['size'] <= $limite_kb)
        {
    		// Recibo los datos del archivo
    		$tipo = $_FILES['archivo']['type'];
    		$tamano = $_FILES['archivo']['size'];

          //Muevo la imagen desde el directorio temporal a nuestra ruta indicada anteriormente
            move_uploaded_file($_FILES['archivo']['tmp_name'],$ruta);
            require_once('Classes/PHPExcel.php');
            require_once('Classes/PHPExcel/Reader/Excel2007.php');

            /*
            echo "<pre>";
            echo print_r($xlsx);
            echo "</pre>";
            */

    	}

        else
        {
            echo "Formato de archivo no permitido o excede el tamaño límite de $limite_kb Kbytes.";
        }
    }
?>
