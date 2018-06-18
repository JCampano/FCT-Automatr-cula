<?php 
	include "../functions.php"; 
	$curso = $_GET['curso'];

//sacamos los grupos de optativas del curso
	$sql=" SELECT * FROM grupo_optativas WHERE id_curso='".$curso."'";	
	$gruposOptativas = ejecutaConsultaArray($sql);
	
	$cadenaDevolver='<div class="row">';
	$respuesta="";
	foreach($gruposOptativas as $indice => $row){           
		//$respuesta.=$row['id'];
		$sql=" SELECT * FROM optativas WHERE id_grupo_optativas='".$row['id']."'";
		$optativas = ejecutaConsultaArray($sql);

		$cadenaDevolver.='<div class="col-md-3 mb-3"><label>Optativas grupo '.$row['nombre'].'</label><select required class="custom-select"  name="optativa'.$indice.'"><option value="">Seleccione</option>';	                                    
	                                
		foreach($optativas as $row1){ 
			$cadenaDevolver.='<option value="'.$row1['id'].'">'.$row1['nombre'].'</option>';
		}

		$cadenaDevolver.='</select><span class="invalid-feedback">Debe seleccionar una Optativa</span></div>';
	}
			
	$cadenaDevolver.='</div>';
	

	
	


	//devolvemos el html 
	echo $cadenaDevolver;

?>