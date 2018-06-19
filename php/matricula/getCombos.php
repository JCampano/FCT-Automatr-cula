<?php 
	//no chachee la llamada
	//header('Cache-Control: no-cache, must-revalidate');
	//header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
	$servidor  = "localhost";
	$basedatos = "automatricula";
	$usuario   = "root";
	$password  = "";


$conexion = mysqli_connect($servidor, $usuario, $password, $basedatos);//el parametro bd se añade si es msqli
 if($conexion->connect_error){
        die("Conexión fallida: ".$conexion->connect_error);
    }
$conexion ->set_charset("utf8");//asi es el caracter utf8 si es msqli

include "../functions.php";
session_start();

//obtenemos el id del alumno para sacar su matricula
    $dni=$_SESSION['login'];    
    $consulta="SELECT * FROM alumnos WHERE dni='".$dni."';";
    $resulset=ejecutaConsulta($consulta);
    $alumno=$resulset->fetch(PDO::FETCH_ASSOC);

//con la matricula ya podemos obtener su codigo de matricula y asi obtenemos sus optativas y su itinerario
    $consulta="SELECT * FROM matriculas WHERE id_alumno='".$alumno['id']."';";
    $resulset=ejecutaConsulta($consulta);
    $matricula=$resulset->fetch(PDO::FETCH_ASSOC);

//sacamos sus optativas
    $consulta="SELECT * FROM optativas_elegidas WHERE cod_matricula='".$matricula['cod_matricula']."';";
    $resulset=ejecutaConsulta($consulta);
    $opt=$resulset->fetch(PDO::FETCH_ASSOC);

//sacamos el itinerario
    $consulta="SELECT * FROM itinerarios WHERE ID='".$matricula['id_itinerario']."';";
    $resulset=ejecutaConsulta($consulta);
    $itinerario=$resulset->fetch(PDO::FETCH_ASSOC);


//con el itinerario obtenemos el curso

    $consulta="SELECT * FROM cursos WHERE ID='".$itinerario['id_curso']."';";
    $resulset=ejecutaConsulta($consulta);
    $curso=$resulset->fetch(PDO::FETCH_ASSOC);


//con el curso obtenemos la enseñanza 



//consulta para obtener todos las  enseñanzas con la enseñanza seleccionada
	$sql='SELECT id,nombre FROM enseñanzas ';	
	$res = $conexion->query($sql);
	//montamos el codigo html del combo de cursos

	$respuesta='<div class="col-md-12 mb-3" id="enseñanzas"> <label>Enseñanza</label><select class="custom-select" name="selectEnsenanza" id="selectEnsenanza" onchange="getCursos();"><option value="Seleccione">Seleccione</option>';
	
	    while($fila=mysqli_fetch_assoc($res)){
	    	if($fila['id'] == $curso['id_enseñanza'])
	        	$respuesta.='<option value="'.$fila['id'].'" selected>';
	        else
	        	$respuesta.='<option value="'.$fila['id'].'">';
	        $respuesta.=$fila['nombre'];        
	        $respuesta.="</option>";        
	    }    
	$respuesta.="</select></div>";




//obtenemos todos los cursos con el curso seleccionado
	$sql="SELECT * FROM cursos WHERE id_enseñanza='".$curso['id_enseñanza']."';";	
	$res = $conexion->query($sql);
	//montamos el codigo html del combo de cursos
	//recorremos los cursos para crear el desplegable

	$respuesta.='<div class="col-md-12 mb-3" id="cursos">  <label>Curso</label><select class="custom-select" name="selectCurso" id="selectCurso" onchange="getItinerario();"><option value="Seleccione">Seleccione</option>';
	 
	   while($fila=mysqli_fetch_assoc($res)){
	   		if($fila['id'] == $curso['id'])
	        	$respuesta.='<option value="'.$fila['id'].'" selected>';
	        else
	        	$respuesta.='<option value="'.$fila['id'].'">';
	        $respuesta.=$fila['nombre'];        
	        $respuesta.="</option>";        
	    }    
	$respuesta.="</select></div>";



//obtenemos los itinerarios con el itinerario seleccionado
	$sql="SELECT * FROM itinerarios WHERE id_curso='".$curso['id']."';";	
	$res = $conexion->query($sql);
	//montamos el codigo html del combo de cursos
	//recorremos los cursos para crear el desplegable

	$respuesta.='<div class="col-md-12 mb-3" id="itinerarios"><label>Itinerario</label><select class="custom-select" name="selectItinerario" id="selectItinerario"><option value="Seleccione">Seleccione</option>';
	 
	    while($fila=mysqli_fetch_assoc($res)){
	    	if($fila['id'] == $itinerario['id'])
	        	$respuesta.='<option value="'.$fila['id'].'" selected>';
	        else
	        	$respuesta.='<option value="'.$fila['id'].'">';
	        $respuesta.=$fila['nombre'];        
	        $respuesta.="</option>";        
	    }    
	$respuesta.="</select></div>";





//obtenemos las asignaturas de los itinerarios	

	$sql="SELECT nombre FROM asignaturas WHERE id_itinerario='".$matricula['id_itinerario']."';";	
	$res = $conexion->query($sql);
	//montamos el codigo html del combo de cursos
	//recorremos los cursos para crear el desplegable


	$respuesta.='<div class="form-row"><div class="col-md-12 mb-3" id="asigItinerarios"><div class="col-xs-12"><h5>Asignaturas pertenecientes al Itinerario elegido:</h5></div></div>';
	 
	    while($fila=mysqli_fetch_assoc($res)){
	        $respuesta.='<div class="col-md-3 col-xs-6 mb-3">';
	        $respuesta.= '<input type="text" class="form-control"  disabled value='.$fila['nombre'].' >';        
	        $respuesta.='</div>';        
	    }    
	$respuesta.='</div>';











//sacamos los grupos de optativas del curso	
	$sql=" SELECT * FROM grupo_optativas WHERE id_curso='".$curso['id']."'";	
	$gruposOptativas = ejecutaConsultaArray($sql);
	
	$respuesta.='<div class="col-md-12 mb-3"><div class="row">';	
	foreach($gruposOptativas as $indice => $row){
		$sql=" SELECT * FROM optativas WHERE id_grupo_optativas='".$row['id']."'";
		$optativas = ejecutaConsultaArray($sql);

		$respuesta.='<div class="col-md-3 mb-3"><label>Optativas grupo '.$row['nombre'].'</label><select required class="custom-select"  name="optativa'.$indice.'"><option value="">Seleccione</option>';	                                    
	                                
		foreach($optativas as $row1){
			if($row1['id'] == $opt['id_optativa1'] || $row1['id'] == $opt['id_optativa2'] || $row1['id'] == $opt['id_optativa3'] || $row1['id']== $opt['id_optativa4']){
				$respuesta.='<option value="'.$row1['id'].'"selected>'.$row1['nombre'].'</option>';
			}
			else{
				$respuesta.='<option value="'.$row1['id'].'">'.$row1['nombre'].'</option>';
			}
		}

		$respuesta.='</select><span class="invalid-feedback">Debe seleccionar una Optativa</span></div>';
	}
			
	$respuesta.='</div></div>';


	//$respuesta.= "---".$opt['id_optativa1'].$opt['id_optativa2'].$opt['id_optativa3'].$opt['id_optativa4'];






















	//devolvemos el html 
	echo $respuesta;
mysqli_close($conexion);

?>