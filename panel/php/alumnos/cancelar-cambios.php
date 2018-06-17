<?php
	require_once("../functions.php");
	session_start();
	extract($_POST);


	if(ejecutaConsultaAccion("UPDATE alumnos SET cambio_datos=null where id=$id")>0)
	{
		echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert">&times;</button>Se ha denegado la solicitud</div>';
	    
	}
	else
	{
	    echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert">&times;</button>Ha ocurrido un error</div>';
	   
	 
	}


	
  

?>