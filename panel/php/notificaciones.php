<?php
	require_once("functions.php");
	$matriculasSinRegistrar=ejecutaConsultaArray("SELECT * FROM matriculas where id NOT IN (select id_matricula from matriculas_registradas);");

  $solicitudCambios=ejecutaConsultaArray("SELECT * from matriculas where cambio_datos is not null");

	$sinNotificaciones=true;
	$nNotificacionesM = count($matriculasSinRegistrar);
  $nNotificacionesC = count($solicitudCambios);
	if($nNotificacionesM!=0){
		if($nNotificacionesM>1){
			$plural="s";
		} else {
			$plural="";
		}
		echo '<a class="dropdown-item" href="matriculas.php?v=n">
              <span>
               
                  <i class="fa fa-fw fa-file-alt"></i> Hay '.$nNotificacionesM.' matrícula'.$plural.' sin registrar

              </span></br>
              <div class="text-muted smaller">Pulsa aquí para ver</div>
             
            </a>';
        $sinNotificaciones=false;
	}

  if($nNotificacionesC!=0){
    if($nNotificacionesC>1){
      $plural="es";
    } else {
      $plural="";
    }
    echo '<a class="dropdown-item" href="solicitudes.php">
              <span>
               
                  <i class="fas fa-fw fa-user-edit"></i> Hay '.$nNotificacionesC.' solicitud'.$plural.' para cambiar datos.

              </span></br>
             <div class="text-muted smaller">Pulsa aquí para ver</div>
             
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