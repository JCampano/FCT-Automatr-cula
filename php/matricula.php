<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>
		Mátricula
	</title>
	<style type="text/css">		
		.caja0{			
			width:100%;									
		}
		.caja1{
			width:100%;	
		}

		.caja2{
			width: 75%;
		}

		.caja3{
			width: 50%;
		}

		.caja4{
			width: 33.3%;
		}

		.caja5{
			width: 25%;
		}

		.caja1, .caja2, .caja3, .caja4, .caja5 {
			border: solid 1px;			
			padding-top: 10px;
			padding-bottom: 10px;
		}


	</style>
</head>
<body>
	<?php
		include "functions.php"; 
		session_start();
		$sql = "SELECT * FROM ALUMNOS WHERE DNI =".$_SESSION['login'];
		$consulta = ejecutaConsulta($sql);
		$alumno=$consulta->fetch(PDO::FETCH_ASSOC);
		
	?>
	<h4>Datos del ALumno/a:</h4>
	<table class="caja0">
		<tr><th class="caja4">Nombre</th><th class="caja4">Primer Apellido</th><th class="caja4">Segundo Apellido</th></tr>
		<tr><td class="caja4"><?php echo $alumno['nombre'];?></td><td class="caja4"><?php echo $alumno['apellido1'];?></td><td class="caja4"><?php echo $alumno['apellido2'];?></td></tr>
	
	</table>
	 
	<table class="caja0">	
		<tr><th class="caja3">NIE</th><th class="caja3">DNI</th></tr>
		<tr><td class="caja3"><?php echo $alumno['nie'];?></td><td class="caja3"><?php echo $alumno['dni'];?></td></tr>	    
	</table>

	<table class="caja0">
	 	<tr><th class="caja1">Dirección</th></tr>
	 	<tr><td class="caja1"><?php echo $alumno['direccion'];?></td></tr>
	</table>

	<table class="caja0">
	 	<tr><th class="caja4">Población</th><th class="caja4">Provincia</th><th class="caja4">Código Postal</th></tr>
	 	<tr><td class="caja4"><?php echo $alumno['poblacion'];?></td><td class="caja4"><?php echo $alumno['provincia'];?></td><td class="caja4"><?php echo $alumno['cod_postal'];?> Postal</td></tr>
	</table>

	<table class="caja0">
	 	<tr><th class="caja4">Teléfono</th><th class="caja4">Móvil</th><th class="caja4">Email</th></tr>
	 	<tr><td class="caja4"><?php echo $alumno['tel_fijo'];?></td><td class="caja4"><?php echo $alumno['tel_movil'];?></td><td class="caja4"><?php echo $alumno['correo'];?></td></tr>
	</table>
	 
 	<h4>Datos del Padre/Tutor:</h4>
 	<table class="caja0">
	 	<tr><th class="caja5">Nombre</th><th class="caja2">Apellidos</th></tr>
	 	<tr><td class="caja5"><?php echo $alumno['nombre_padre'];?></td><td class="caja2"><?php echo $alumno['apellidos_padre'];?></td></tr>
	</table> 		

	<table class="caja0">    
	    <tr><th class="caja4">DNI</th><th class="caja4">Teléfono</th><th class="caja4">Email</th></tr>
	    <tr><td class="caja4"><?php echo $alumno['dni_padre'];?></td><td class="caja4"><?php echo $alumno['tel_padre'];?></td><td class="caja4"><?php echo $alumno['correo_padre'];?></td></tr>		
	</table>	




	<h4>Datos de la Madre/Tutora:</h4>	
	<table class="caja0">
	 	<tr><th class="caja5">Nombre</th><th class="caja2">Apellidos</th></tr>
	 	<tr><td class="caja5"><?php echo $alumno['nombre_madre'];?></td><td class="caja2"><?php echo $alumno['apellidos_madre'];?></td></tr>
	</table> 		

	<table class="caja0">    
	    <tr><th class="caja4">DNI</th><th class="caja4">Teléfono</th><th class="caja4">Email</th></tr>
	    <tr><td class="caja4"><?php echo $alumno['dni_madre'];?></td><td class="caja4"><?php echo $alumno['tel_madre'];?></td><td class="caja4"><?php echo $alumno['correo_madre'];?></td></tr>		
	</table>	


	<h4>Curso</h4>
	<table class="caja0">		    
	    <tr><th class="caja4">Enseñanza</th><th class="caja4">Curso</th><th class="caja4">Itinerario</th></tr>
	    <tr><td class="caja4">Enseñanza</td><td class="caja4">Curso</td><td class="caja4">Itinerario</td></tr>

	    <tr><th class="caja4">Optativa</th><th class="caja4">Optativa</th><th class="caja4">Optativa</th></tr>
	    <tr><td class="caja4">Optativa</td><td class="caja4">Optativa</td><td class="caja4">Optativa</td></tr>
	</table>

</body>
</html>
