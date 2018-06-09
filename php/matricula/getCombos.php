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
    $consulta="SELECT * FROM ALUMNOS WHERE DNI='".$dni."';";
    $resulset=ejecutaConsulta($consulta);
    $alumno=$resulset->fetch(PDO::FETCH_ASSOC);

//con la matricula ya podemos obtener su codigo de matricula y asi obtenemos sus optativas y su itinerario
    $consulta="SELECT * FROM matriculas WHERE id_alumno='".$alumno['id']."';";
    $resulset=ejecutaConsulta($consulta);
    $matricula=$resulset->fetch(PDO::FETCH_ASSOC);

//sacamos sus optativas
    $consulta="SELECT * FROM OPTATIVAS_ELEGIDAS WHERE COD_MATRICULA='".$matricula['cod_matricula']."';";
    $resulset=ejecutaConsulta($consulta);
    $optativas=$resulset->fetch(PDO::FETCH_ASSOC);

//sacamos el itinerario
    $consulta="SELECT * FROM ITINERARIOS WHERE ID='".$matricula['id_itinerario']."';";
    $resulset=ejecutaConsulta($consulta);
    $itinerario=$resulset->fetch(PDO::FETCH_ASSOC);


//con el itinerario obtenemos el curso

    $consulta="SELECT * FROM CURSOS WHERE ID='".$itinerario['id_curso']."';";
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
	$sql="SELECT * FROM CURSOS WHERE ID_ENSEÑANZA='".$curso['id_enseñanza']."';";	
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
	$sql="SELECT * FROM itinerarios WHERE ID_CURSO='".$curso['id']."';";	
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



//obtenemos el combo de optativa1 con la optativa sellecionada

	$sql="SELECT * FROM OPTATIVAS WHERE ID_CURSO='".$curso['id']."';";	
	$res = $conexion->query($sql);
	//montamos el codigo html del combo de cursos
	//recorremos los cursos para crear el desplegable

	$respuesta.='<div class="col-md-3 mb-3" id="optativas"><label>Optativa 1</label><select class="custom-select" name="selectOptativas" id="selectOptativas" onchange="getOptativa2();"><option value="Seleccione">Seleccione</option>';
	 
	    while($fila=mysqli_fetch_assoc($res)){
	    	if($fila['id'] == $optativas['id_optativa1'])
	        	$respuesta.='<option value="'.$fila['id'].'" selected>';
	        else
	        	$respuesta.='<option value="'.$fila['id'].'">';
	        $respuesta.=$fila['nombre'];        
	        $respuesta.="</option>";        
	    }
	$respuesta.="</select></div>";



//obtenemos el combo de optativa2 con la optativa sellecionada

	$sql="SELECT * FROM OPTATIVAS WHERE ID_CURSO='".$curso['id']."';";	
	$res = $conexion->query($sql);
	//montamos el codigo html del combo de cursos
	//recorremos los cursos para crear el desplegable

	$respuesta.='<div class="col-md-3 mb-3" id="optativas2"><label>Optativa 2</label><select class="custom-select" name="selectOptativas2" id="selectOptativas2" onchange="getOptativa3();"><option value="Seleccione">Seleccione</option>';
	 
	    while($fila=mysqli_fetch_assoc($res)){
	    	if($fila['id'] == $optativas['id_optativa2'])
	        	$respuesta.='<option value="'.$fila['id'].'" selected>';
	        else
	        	$respuesta.='<option value="'.$fila['id'].'">';
	        $respuesta.=$fila['nombre'];        
	        $respuesta.="</option>";        
	    }
	$respuesta.="</select></div>";



//obtenemos el combo de optativa3 con la optativa sellecionada

	$sql="SELECT * FROM OPTATIVAS WHERE ID_CURSO='".$curso['id']."';";	
	$res = $conexion->query($sql);
	//montamos el codigo html del combo de cursos
	//recorremos los cursos para crear el desplegable

	$respuesta.='<div class="col-md-3 mb-3" id="optativas3"><label>Optativa 3</label><select class="custom-select" name="selectOptativas3" id="selectOptativas3" onchange="getOptativa4();"><option value="Seleccione">Seleccione</option>';
	 
	    while($fila=mysqli_fetch_assoc($res)){
	    	if($fila['id'] == $optativas['id_optativa3'])
	        	$respuesta.='<option value="'.$fila['id'].'" selected>';
	        else
	        	$respuesta.='<option value="'.$fila['id'].'">';
	        $respuesta.=$fila['nombre'];        
	        $respuesta.="</option>";        
	    }
	$respuesta.="</select></div>";





//obtenemos el combo de optativa4 con la optativa sellecionada

	$sql="SELECT * FROM OPTATIVAS WHERE ID_CURSO='".$curso['id']."';";	
	$res = $conexion->query($sql);
	//montamos el codigo html del combo de cursos
	//recorremos los cursos para crear el desplegable

	$respuesta.='<div class="col-md-3 mb-3" id="optativas4"><label>Optativa 4</label><select class="custom-select" name="selectOptativas4" id="selectOptativas4"><option value="Seleccione">Seleccione</option>';
	 
	    while($fila=mysqli_fetch_assoc($res)){
	    	if($fila['id'] == $optativas['id_optativa4'])
	        	$respuesta.='<option value="'.$fila['id'].'" selected>';
	        else
	        	$respuesta.='<option value="'.$fila['id'].'">';
	        $respuesta.=$fila['nombre'];        
	        $respuesta.="</option>";        
	    }
	$respuesta.="</select></div>";


	//devolvemos el html 
	echo $respuesta;
mysqli_close($conexion);

?>