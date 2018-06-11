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
	$itinerario = $_GET['itinerario'];

	$sql="SELECT nombre FROM asignaturas WHERE id_itinerario='".$itinerario."';";	
	$res = $conexion->query($sql);
	//montamos el codigo html del combo de cursos
	//recorremos los cursos para crear el desplegable


	$respuesta='<div class="form-row">';
	 
	    while($fila=mysqli_fetch_assoc($res)){
	        $respuesta.='<div class="col-md-3 col-xs-6 mb-3">';
	        $respuesta.= "<input type='text' class='form-control'  disabled value=".$fila['nombre']." >";        
	        $respuesta.="</div>";        
	    }    
	$respuesta.="</div>";
	


	//devolvemos el html 
	echo $respuesta;
mysqli_close($conexion);
?>