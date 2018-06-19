<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>
		Mátricula
	</title>

	<style type="text/css">		
		.caja0, .caja6{
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

        .caja6{
			text-align: center;
		}


		.caja1, .caja2, .caja3, .caja4, .caja5, .caja6 {
					
			padding:5px 10px;
			color:#343e48;
			border-radius:5px;
		}
		.caja0{
			border-bottom: solid 1px white;	
		}
		.contenedor{
			background-color:#e9ecef;
			border-radius:5px;
			margin-bottom:30px;
		}
	


	</style>
</head>
<body>
	

	<?php
		include "functions.php"; 
		session_start();
		$dni=$_SESSION['login'];	
		$consulta="SELECT * FROM alumnos WHERE DNI='".$dni."';";
        $consulta2="SELECT E.NOMBRE, C.NOMBRE, I.NOMBRE, I.id FROM alumnos A, matriculas M, itinerarios I, cursos C, enseñanzas E WHERE A.DNI='".$dni."' AND A.ID=M.ID_ALUMNO AND M.ID_ITINERARIO=I.ID AND I.ID_CURSO=C.ID AND C.ID_enseñanza=E.ID";
        $consulta3="SELECT O.NOMBRE FROM matriculas M, optativas O, optativas_elegidas OE WHERE M.COD_MATRICULA=OE.COD_MATRICULA  AND O.ID=OE.ID_OPTATIVA1";
        $consulta4="SELECT O.NOMBRE FROM matriculas M, optativas O, optativas_elegidas OE WHERE M.COD_MATRICULA=OE.COD_MATRICULA  AND O.ID=OE.ID_OPTATIVA2";
        $consulta5="SELECT O.NOMBRE FROM matriculas M, optativas O, optativas_elegidas OE WHERE M.COD_MATRICULA=OE.COD_MATRICULA  AND O.ID=OE.ID_OPTATIVA3";
        $consulta6="SELECT O.NOMBRE FROM matriculas M, optativas O, optativas_elegidas OE WHERE M.COD_MATRICULA=OE.COD_MATRICULA  AND O.ID=OE.ID_OPTATIVA4";
       

		$resulset=ejecutaConsulta($consulta);
        $alumno=$resulset->fetch(PDO::FETCH_ASSOC);
        $resulset2=ejecutaConsulta($consulta2);
		$matricula=$resulset2->fetch(PDO::FETCH_NUM);
        $resulset3=ejecutaConsulta($consulta3);
		$optativa1=$resulset3->fetch(PDO::FETCH_NUM);
        $resulset4=ejecutaConsulta($consulta4);
		$optativa2=$resulset4->fetch(PDO::FETCH_NUM);
        $resulset5=ejecutaConsulta($consulta5);
		$optativa3=$resulset5->fetch(PDO::FETCH_NUM);
        $resulset6=ejecutaConsulta($consulta6);
		$optativa4=$resulset6->fetch(PDO::FETCH_NUM);
		$consulta7 = ejecutaConsultaArray("SELECT m.cod_matricula from alumnos a inner join matriculas m where a.id = m.id_alumno and a.dni='$dni'");

		$cod_matricula = $consulta7[0]["cod_matricula"];

		//asignaturas pertenecientes al itinerario escogido
		$sql= "SELECT nombre FROM asignaturas where id_itinerario = '".$matricula['3']."';";
		$asignaturas=ejecutaConsultaArray($sql);
		$tablaAsig='<table class="caja0"><tr><th class="caja6">Asignaturas</th></tr></table>';
		$tablaAsig.='<table class="caja0"><tr>';
		foreach($asignaturas as $indice=>$asig){
			if($indice%4!=0)
				$tablaAsig.='<td class="caja5">'.$asig['nombre'].'</td>';
			else{
				$tablaAsig.='</tr></table><table><tr><td class="caja5">'.$asig['nombre'].'</td>';
			}

		}
		$tablaAsig.='</tr></table>';

		if($optativa1[0] != ""){
		$nombreGrupoOptativa1 = "SELECT grupo_optativas.nombre FROM grupo_optativas ,optativas,optativas_elegidas WHERE grupo_optativas.id = optativas.id_grupo_optativas AND optativas.id = optativas_elegidas.id_optativa1 AND optativas_elegidas.cod_matricula=".$cod_matricula.";";
			$grupo1 = ejecutaConsultaArray($nombreGrupoOptativa1);
			$grupo1= "Grupo optativas :".$grupo1[0]['nombre'];
		}else{
			$grupo1="";
		}

		if($optativa2[0] != ""){
        $nombreGrupoOptativa2 ="SELECT grupo_optativas.nombre FROM grupo_optativas ,optativas,optativas_elegidas WHERE grupo_optativas.id = optativas.id_grupo_optativas AND optativas.id = optativas_elegidas.id_optativa2 AND optativas_elegidas.cod_matricula=".$cod_matricula.";";
	        $grupo2 = ejecutaConsultaArray($nombreGrupoOptativa2);
	        $grupo2 = "Grupo optativas :".$grupo2[0]['nombre'];
        }else{
			$grupo2="";
		}

        if($optativa3[0] != ""){
        $nombreGrupoOptativa3 ="SELECT grupo_optativas.nombre FROM grupo_optativas ,optativas,optativas_elegidas WHERE grupo_optativas.id = optativas.id_grupo_optativas AND optativas.id = optativas_elegidas.id_optativa3 AND optativas_elegidas.cod_matricula=".$cod_matricula.";";
       		 $grupo3 = ejecutaConsultaArray($nombreGrupoOptativa3);
       		 $grupo3 ="Grupo optativas :".$grupo3[0]['nombre'];
        }else{
			$grupo3="";
		}

        if($optativa4[0] != ""){
        $nombreGrupoOptativa4 = "SELECT grupo_optativas.nombre FROM grupo_optativas ,optativas,optativas_elegidas WHERE grupo_optativas.id = optativas.id_grupo_optativas AND optativas.id = optativas_elegidas.id_optativa4 AND optativas_elegidas.cod_matricula=".$cod_matricula.";";
	        $grupo4 = ejecutaConsultaArray($nombreGrupoOptativa4);
	        $grupo4 = "Grupo optativas:".$grupo4[0]['nombre'];
        }else{
			$grupo4="";
		}
	
       


	?>
	<div style="text-align:right"><barcode dimension="1D" type="EAN13" value="<?php echo $cod_matricula;?>" label="label" style="float:right;width:30mm; height:6mm; color: #000; font-size: 3mm"></barcode></div>
	<h3 style="font-weight:lighter;">HOJA DE MATRICULACIÓN - IES HNOS. MACHADO</h3>
	<h4>Datos del Alumno/a:</h4>
	<div class="contenedor">
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
	</div>
	 
 	<h4>Datos del Padre/Tutor:</h4>
 	<div class="contenedor">
 	<table class="caja0">
	 	<tr><th class="caja5">Nombre</th><th class="caja2">Apellidos</th></tr>
	 	<tr><td class="caja5"><?php echo $alumno['nombre_padre'];?></td><td class="caja2"><?php echo $alumno['apellidos_padre'];?></td></tr>
	</table> 		

	<table class="caja0">    
	    <tr><th class="caja4">DNI</th><th class="caja4">Teléfono</th><th class="caja4">Email</th></tr>
	    <tr><td class="caja4"><?php echo $alumno['dni_padre'];?></td><td class="caja4"><?php echo $alumno['tel_padre'];?></td><td class="caja4"><?php echo $alumno['correo_padre'];?></td></tr>		
	</table>	

	</div>


	<h4>Datos de la Madre/Tutora:</h4>	
	<div class="contenedor">
	<table class="caja0">
	 	<tr><th class="caja5">Nombre</th><th class="caja2">Apellidos</th></tr>
	 	<tr><td class="caja5"><?php echo $alumno['nombre_madre'];?></td><td class="caja2"><?php echo $alumno['apellidos_madre'];?></td></tr>
	</table> 		

	<table class="caja0">    
	    <tr><th class="caja4">DNI</th><th class="caja4">Teléfono</th><th class="caja4">Email</th></tr>
	    <tr><td class="caja4"><?php echo $alumno['dni_madre'];?></td><td class="caja4"><?php echo $alumno['tel_madre'];?></td><td class="caja4"><?php echo $alumno['correo_madre'];?></td></tr>		
	</table>	
</div>

	<h4>Curso</h4>
	<div class="contenedor">
	<table class="caja0">		    
	    <tr><th class="caja4">Enseñanza</th><th class="caja4">Curso</th><th class="caja4">Itinerario</th></tr>
	    <tr><td class="caja4"><?php echo $matricula[0];?></td><td class="caja4"><?php echo $matricula[1];?></td><td class="caja4"><?php echo $matricula[2];?></td></tr>
    </table>
    <?php
    echo $tablaAsig;
    ?>
    <table class="caja0">
	    <tr><th class="caja5"><?php echo $grupo1;?></th><th class="caja5"><?php echo $grupo2;?></th><th class="caja5"><?php echo $grupo3;?></th><th class="caja5"><?php echo $grupo4;?></th></tr>
	    <tr><td class="caja5"><?php echo $optativa1[0];?></td><td class="caja5"><?php echo $optativa2[0];?></td><td class="caja5"><?php echo $optativa3[0];?></td><td class="caja5"><?php echo $optativa4[0];?></td></tr>
	</table>
</div>
</body>
</html>
