<?php
include "functions.php";
header('Content-Type: text/html; charset=UTF-8');

    if(isset($_FILES["archivo"]) || $_FILES["archivo"]["error"] = 0){
        $nombreArchivo=$_FILES["archivo"]["name"];
        $ruta_temporal = $_FILES['archivo']['tmp_name'];
        $ruta_final = "../../csv/".$nombreArchivo;
        $tipo = $_FILES['archivo']['type'];
        $tamano = $_FILES['archivo']['size'];
        $limite_kb = 102400;
        $contador=0;

        if ($tamano <= $limite_kb)
        {
            move_uploaded_file($ruta_temporal, $ruta_final);

            $handle = fopen($ruta_final, "r");


            while(($data=fgetcsv($handle, 1000, ";") )!== FALSE)
            {
              if($contador!=0)
              {
                  $select="SELECT * FROM alumnos WHERE dni='".$data[0]."'";
                  $resulset=ejecutaConsulta2($select);

                  if($resulset==0)
                  {
              $insert = "INSERT INTO alumnos (dni, clave, nombre, apellido1, apellido2, nie, fecha_nac, direccion, poblacion, provincia, cod_postal, tel_fijo, tel_movil, correo, dni_padre, nombre_padre, apellidos_padre, tel_padre, correo_padre, dni_madre, nombre_madre, apellidos_madre, tel_madre, correo_madre) VALUES ('$data[0]', '$data[1]', '$data[2]', '$data[3]', '$data[4]', '$data[5]', '$data[6]', '$data[7]', '$data[8]', '$data[9]', '$data[10]', '$data[11]', '$data[12]', '$data[13]', '$data[14]', '$data[15]', '$data[16]', '$data[17]', '$data[18]', '$data[19]', '$data[20]', '$data[21]', '$data[22]', '$data[23]')";
             /*
            echo "<pre>";
            echo print_r($data);
            echo "</pre>";
             */
            ejecutaConsultaAccion($insert);
                 }
              }
            $contador++;
            }
            header('Location: ../importar-datos.php');
    	}
        else
        {
            echo "Formato de archivo no permitido o excede el tamaño límite de $limite_kb Kbytes.";
        }
    }
?>
