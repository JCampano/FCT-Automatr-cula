<?php
	
	include "../functions.php"

	//select m.id ,a.nombre, mr.fecha, p.nombre, p.apellidos from matriculas_registradas mr inner join matriculas m, personal p, alumnos a where m.id = mr.id_matricula and mr.id_usuario = p.id and m.id_alumno = a.id order by mr.fecha LIMIT 10

?>