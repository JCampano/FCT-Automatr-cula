<?php
	
	require_once("../functions.php");

	$mRegistradas=ejecutaConsultaArray("select m.id ,a.nombre as nAlumno,a.apellido1 as aAlumno1,a.apellido2 as aAlumno2, mr.fecha as fechaRegistroMatricula, p.nombre as nUsuarioNombre, p.apellidos as aUsuarioApellidos, m.cod_matricula as codMatricula from matriculas_registradas mr inner join matriculas m, personal p, alumnos a where m.id = mr.id_matricula and mr.id_usuario = p.id and m.id_alumno = a.id order by mr.fecha LIMIT 10");
	//select m.id ,a.nombre, mr.fecha, p.nombre, p.apellidos from matriculas_registradas mr inner join matriculas m, personal p, alumnos a where m.id = mr.id_matricula and mr.id_usuario = p.id and m.id_alumno = a.id order by mr.fecha LIMIT 10
	if (ISSET($mRegistradas[0])){
			echo '<div class="list-group">';
			for($i = count($mRegistradas);$i>0;$i--){
				$n=$i-1;
				echo '<a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
		                      <div class="d-flex w-100 justify-content-between">
		                        <h5 class="mb-1">'.$mRegistradas[$n]["nAlumno"].' '.$mRegistradas[$n]["aAlumno1"].' '.$mRegistradas[$n]["aAlumno2"].'</h5>
		                        <small>'.$mRegistradas[$n]["fechaRegistroMatricula"].'</small>
		                      </div>
		                      <p class="mb-1">COD #'.$mRegistradas[$n]["codMatricula"].'</p>
		                      <small>Registrado por '.$mRegistradas[$n]["nUsuarioNombre"].' '.$mRegistradas[$n]["aUsuarioApellidos"].'</small>
		                      
		                    </a>';
			}

			echo '</div>';
		} else {
			echo "<small>No hay matrículas registradas</small>";
		}

	
?>