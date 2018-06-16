<?php
header('Content-Type: text/html; charset=utf-8');
$id_alumno = $_GET['id_alumno'];
$id_matricula = $_GET['id_matricula'];
session_start();
include "../functions.php";


//con la matricula ya podemos obtener su codigo de matricula y asi obtenemos su itinerario
    $consulta="SELECT * FROM matriculas WHERE id_alumno='".$id_alumno."';";
    $resulset=ejecutaConsulta($consulta);
    $matricula=$resulset->fetch(PDO::FETCH_ASSOC);

// obtenemos el itinerario
    $consulta="SELECT * FROM itinerarios WHERE id='".$matricula['id_itinerario']."';";
    $resulset=ejecutaConsulta($consulta);
    $itinerario=$resulset->fetch(PDO::FETCH_ASSOC);

//con el itinerario obtenemos el curso
    $consulta="SELECT * FROM cursos WHERE id='".$itinerario['id_curso']."';";
    $resulset=ejecutaConsulta($consulta);
    $curso=$resulset->fetch(PDO::FETCH_ASSOC);

//con el curso obtenemos la enseñanza
    $consulta="SELECT * FROM enseñanzas WHERE id='".$curso['id_enseñanza']."';";
    $resulset=ejecutaConsulta($consulta);
    $enseñanza=$resulset->fetch(PDO::FETCH_ASSOC);
$rutaInicial = "../../imgAlumnos/".$id_alumno.".jpg";

$rutaFinalImg = "../../imgAlumnos/".date('Y')."/";//colocamos el año a la ruta final de la img del alumno
$rutaFinalImg .= scan_nombre($enseñanza['nombre'])."/";//colocamos la enseñanza a la ruta final de la img del alumno
$rutaFinalImg .= scan_nombre($curso['nombre']);//colocamos el curso a la ruta final de la img del alumno

//$rutaFinalImg .= "/".$id_alumno.".jpg";
//echo $rutaFinalImg;
$rutaImgBD="";

//comprobamos si la matricula se encuentra finalizada
if($matricula['finalizada'] == 1){
	$_SESSION['tipoMensaje']= "warning";
	$_SESSION['mensajeRegistro'] = "<strong>Error</strong> la matricula ya se encuentra finalizada";
	header('Location: ../../index.php');
}
else{
	//comprobamos si el alumno tiene una foto subida antes de finalizar la matricula 
	$sql= "SELECT * FROM imagenes WHERE id_usuario='".$id_alumno."'";
	$contador = ejecutaConsulta2($sql);
	//echo count(ejecutaConsultaAccion($sql));
	
	if( $contador < 1){
		$_SESSION['tipoMensaje']= "warning";
		$_SESSION['mensajeRegistro'] = "<strong>Error</strong> Debe subir una foto antes de finalizar la matricula <a href='/perfil-alumno.php'>Subir foto</a>";
		header('Location: ../../index.php');
	}else{	
			//movemos la foto antes de finalizar la matricula

			$nombre_fichero = '';

			if (file_exists($rutaFinalImg)) {
			    //echo " existe";
			     //si existe movemos el archivo aqui
				copy($rutaInicial, $rutaFinalImg."/".$id_alumno.".jpg");

			} else {
			    //echo " no existe";
			    //creamos las carpetas y movemos el archivo
			    mkdir($rutaFinalImg, 0777, true);
			    copy($rutaInicial, $rutaFinalImg."/".$id_alumno.".jpg");
			}

			//eliminamos el fichero de su ruta inicial
			unlink($rutaInicial);

			//cambiamos la direccion de la ruta de la bd
			$rutaImgBD .= "imgAlumnos/".date('Y')."/".scan_nombre($enseñanza['nombre'])."/".scan_nombre($curso['nombre'])."/".$id_alumno.".jpg";
						
			$update1="UPDATE imagenes SET imagen = '".$rutaImgBD."' WHERE id_usuario='".$id_alumno."';";
			if(ejecutaConsultaAccion($update1)>0){
				//si  cambiamos la direcion de la img correctamente

				//finalizamos la matricula
				$update1="UPDATE matriculas SET finalizada = '1' WHERE id='".$id_matricula."';";
			        
			    if(ejecutaConsultaAccion($update1)>0){ 
			        $_SESSION['tipoMensaje']= "success";
			        $_SESSION['mensajeRegistro'] = "<strong>Bien </strong> Matricula finalizada correctamente";
			        header('Location: ../../index.php');    
			    }
			    else{		
						$_SESSION['tipoMensaje']= "warning";
						$_SESSION['mensajeRegistro'] = "<strong>Error</strong> ";
						header('Location: ../../index.php');	
				}
			}
			else{
				$_SESSION['tipoMensaje']= "danger";
				$_SESSION['mensajeRegistro'] ="<strong>Error</strong> Al finalizar la matricula"; //$update1;//
				header('Location: ../../index.php');	
			}
	}
}	







function scan_nombre($string)
    {
        $string = trim($string);
 
        $string = str_replace(array('á', 'à', 'ä', 'â', 'ª', 'Á', 'À', 'Â', 'Ä'),array('a', 'a', 'a', 'a', 'a', 'A', 'A', 'A', 'A'),$string);
        $string = str_replace(array('é', 'è', 'ë', 'ê', 'É', 'È', 'Ê', 'Ë'),array('e', 'e', 'e', 'e', 'E', 'E', 'E', 'E'),$string);
        $string = str_replace(array('í', 'ì', 'ï', 'î', 'Í', 'Ì', 'Ï', 'Î'),array('i', 'i', 'i', 'i', 'I', 'I', 'I', 'I'),$string);
        $string = str_replace(array('ó', 'ò', 'ö', 'ô', 'Ó', 'Ò', 'Ö', 'Ô'),array('o', 'o', 'o', 'o', 'O', 'O', 'O', 'O'),$string);
        $string = str_replace(array('ú', 'ù', 'ü', 'û', 'Ú', 'Ù', 'Û', 'Ü'),array('u', 'u', 'u', 'u', 'U', 'U', 'U', 'U'),$string);
        $string = str_replace(array('ñ', 'Ñ', 'ç', 'Ç'),array('n', 'N', 'c', 'C',),$string);
 
        $string = str_replace(
            array("\\", "¨", "º", "~",
                "#", "@", "|", "!", "\"",
                "·", "$", "%", "&", "/",
                "(", ")", "?", "'", "¡",
                "¿", "[", "^", "`", "]",
                "+", "}", "{", "¨", "´",
                ">", "< ", ";", ",", ":",
                " "),
            '',$string);
        return $string;
    }


?>