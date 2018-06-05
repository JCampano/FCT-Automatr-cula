<?php
	require_once("functions.php");
	$matriculasSinRegistrar=ejecutaConsultaArray("SELECT * FROM matriculas where id NOT IN (select id_matricula from matriculas_registradas);");

	$sinNotificaciones=true;
	$nNotificaciones = count($matriculasSinRegistrar);
	if($nNotificaciones!=0){
		if($nNotificaciones>1){
			$plural="s";
		} else {
			$plural="";
		}
		echo '<a class="dropdown-item" href="#">
              <span>
               
                  <i class="fa fa-file-alt"></i> Hay '.$nNotificaciones.' matrícula'.$plural.' sin registrar
              </span>
             
            </a>';
        $sinNotificaciones=false;
	}


	if($sinNotificaciones){
		echo '<small class="dropdown-item">No hay notificaciones</small>';
	}
/*
	echo ' 
            <a class="dropdown-item" href="#">
              <span class="text-success">
                <strong>
                  <i class="fa fa-long-arrow-up fa-fw"></i>Status Update</strong>
              </span>
              <span class="small float-right text-muted">11:21 AM</span>
              <div class="dropdown-message small">This is an automated server response message. All systems are online.</div>
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">
              <span class="text-danger">
                <strong>
                  <i class="fa fa-long-arrow-down fa-fw"></i>Status Update</strong>
              </span>
              <span class="small float-right text-muted">11:21 AM</span>
              <div class="dropdown-message small">This is an automated server response message. All systems are online.</div>
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">
              <span class="text-success">
                <strong>
                  <i class="fa fa-long-arrow-up fa-fw"></i>Status Update</strong>
              </span>
              <span class="small float-right text-muted">11:21 AM</span>
              <div class="dropdown-message small">This is an automated server response message. All systems are online.</div>
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item small" href="#">View all alerts</a>';
            */
?>