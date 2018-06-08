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
	
	//obtenemos el value del combo 
	$curso = $_GET['curso'];

	$sql="SELECT * FROM CURSOS WHERE ID_ENSEÑANZA='".$curso."';";	
	$res = $conexion->query($sql);
	//montamos el codigo html del combo de cursos
	//recorremos los cursos para crear el desplegable

	$respuesta='<label>Itinerario</label><select class="custom-select" name="selectItinerario" id="selectItinerario" onchange="getOptativa();"><option value="Seleccione">Seleccione</option>';
	 
	  /*  while($fila=mysqli_fetch_assoc($res)){
	        $respuesta.='<option value="'.$fila['id'].'">';
	        $respuesta.=$fila['nombre'];        
	        $respuesta.="</option>";        
	    }*/

    if($respuesta=='<label>Itinerario</label><select class="custom-select" name="selectItinerario" id="selectItinerario" onchange="getOptativa();"><option value="Seleccione">Seleccione</option>'){
    	$respuesta.='<option value="No hay resultados">No hay resultados</option>';
    }
	$respuesta.="</select>";
	


	//devolvemos el html 
	echo $respuesta;
mysqli_close($conexion);
?>