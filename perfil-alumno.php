<?php	
    include "header.php";    
    $_SESSION['ruta']= "registro-matricula.php";//esto aqui yo creo que sobra
    include "php/gestionlogin.php";

    $dni=$_SESSION['login'];	
	$consulta="SELECT * FROM ALUMNOS WHERE DNI='".$dni."';";
	$resulset=ejecutaConsulta($consulta);
    $alumno=$resulset->fetch(PDO::FETCH_ASSOC);   

    //obtener la imagen para el alum
    $consulta="SELECT * FROM imagenes WHERE ID_USUARIO='".$alumno['id']."';";
    $resulset=ejecutaConsulta($consulta);
    $imagen=$resulset->fetch(PDO::FETCH_ASSOC);
    
?>
    <div class="fondo padding-arriba">
        <div class="container">
            <div class="card">
                <div class="card-header text-white bg-info">
                    <h3><i class="fas fa-users-cog"></i> Perfil del Alumno</h3>
                </div>
                <div class="card-body">
                    <div class="row">                        
                        <div class="col-sm-3">                            
                                <img class="imagen-alumno" src="<?php if($imagen['imagen'] == 'imgAlumnos/'.$alumno['id'].'.jpg'){ echo $imagen['imagen'];} else echo 'img/default-user.png'; ?>">  
                                <a href="#" class="btn btn-info btn-block" data-toggle="modal" data-target="#cambioFoto"> Cambiar Foto Personal</a>
                                <a href="#" class="btn btn-info btn-block" data-toggle="modal" data-target="#cambioDatos">Solitar cambio de datos</a>                               
                        </div>
                                               
                        <div class="col-sm-9">  
                        	<ul class="nav nav-tabs" id="myTab" role="tablist">
							  <li class="nav-item">
							    <a class="nav-link active" id="alumno-tab" data-toggle="tab" href="#alumno" role="tab" aria-controls="alumno" aria-selected="true"> Datos Personales</a>
							  </li>
							  <li class="nav-item">
							    <a class="nav-link" id="padre-tab" data-toggle="tab" href="#padre" role="tab" aria-controls="padre" aria-selected="false">Datos Padre / Tutor</a>
							  </li>
							  <li class="nav-item">
							    <a class="nav-link" id="madre-tab" data-toggle="tab" href="#madre" role="tab" aria-controls="madre" aria-selected="false">Madre / Tutor</a>
							  </li>
							</ul>

                        	<div class="tab-content">
								<div class="tab-pane fade show active" id="alumno" role="tabpanel" aria-labelledby="alumno-tab">
									<div class="row borde-finito">

										<div class="col-sm-12"><h3>Datos Personales</h3></div>
		                                <div class="col-sm-6">		                                    
		                                    <p class="font-weight-bold titulo-dato-perfil">Nombre</p>
		                                    <p class="font-weight-light"><?php echo $alumno['nombre'];?></p>
		                                    <p class="font-weight-bold titulo-dato-perfil">Apellidos</p>
		                                    <p class="font-weight-light"><?php echo $alumno['apellido1'];?> <?php echo $alumno['apellido2'];?></p>
		                                    <p class="font-weight-bold titulo-dato-perfil">Provincia</p>
		                                    <p class="font-weight-light"><?php echo $alumno['provincia'];?></p>
		                                    <p class="font-weight-bold titulo-dato-perfil">Dirección</p>
		                                    <p class="font-weight-light"><?php echo $alumno['direccion'];?></p>
		                                    <p class="font-weight-bold titulo-dato-perfil">Teléfono</p>
		                                    <p class="font-weight-light"><?php echo $alumno['tel_fijo'];?></p>
		                                    <p class="font-weight-bold titulo-dato-perfil">Correo</p>
		                                    <p class="font-weight-light"><?php echo $alumno['correo'];?></p>
		                                </div>

		                                <div class="col-sm-6">                             
		                                    <p class="font-weight-bold titulo-dato-perfil">DNI/NIE</p>
		                                    <p class="font-weight-light"><?php if($alumno['dni']!=""){echo $alumno['dni'];}else{echo $alumno['nie'];};?></p>
		                                    <p class="font-weight-bold titulo-dato-perfil">Fecha de Nacimiento</p>
		                                    <p class="font-weight-light"><?php echo $alumno['fecha_nac'];?></p>
		                                    <p class="font-weight-bold titulo-dato-perfil">Población</p>
		                                    <p class="font-weight-light"><?php echo $alumno['poblacion'];?></p>
		                                    <p class="font-weight-bold titulo-dato-perfil">Código Postal</p>
		                                    <p class="font-weight-light"><?php echo $alumno['cod_postal'];?></p>
		                                    <p class="font-weight-bold titulo-dato-perfil">Móvil</p>
		                                    <p class="font-weight-light"><?php echo $alumno['tel_movil'];?></p>
		                                </div>
		                            </div>
								</div>


								<div class="tab-pane fade" id="padre" role="tabpanel" aria-labelledby="padre-tab">
									<div class="row borde-finito">
										<div class="col-sm-12"><h3>Datos de Padre/Tutor</h3></div>
		                                <div class="col-sm-6">		                                    
		                                    <p class="font-weight-bold titulo-dato-perfil">Nombre</p>
		                                    <p class="font-weight-light"><?php echo $alumno['nombre_padre'];?></p>
		                                    <p class="font-weight-bold titulo-dato-perfil">Apellidos</p>
		                                    <p class="font-weight-light"><?php echo $alumno['apellidos_padre'];?> <?php echo $alumno['apellido2'];?></p>  
		                                    <p class="font-weight-bold titulo-dato-perfil">Correo</p>
		                                    <p class="font-weight-light"><?php echo $alumno['correo_padre'];?></p>
		                                </div>

		                                <div class="col-sm-6">                             
		                                    <p class="font-weight-bold titulo-dato-perfil">DNI</p>
		                                    <p class="font-weight-light"><?php echo $alumno['dni_padre'];?></p>
		                                    <p class="font-weight-bold titulo-dato-perfil">Teléfono</p>
		                                    <p class="font-weight-light"><?php echo $alumno['tel_padre'];?></p>	
		                                </div>
		                            </div>
						        </div>

						        <div class="tab-pane fade" id="madre" role="tabpanel" aria-labelledby="madre-tab">
						 			<div class="row borde-finito">
						 				<div class="col-sm-12"><h3>Datos Madre/Tutor</h3></div>		                               
		                                <div class="col-sm-6">		                                    
		                                    <p class="font-weight-bold titulo-dato-perfil">Nombre</p>
		                                    <p class="font-weight-light"><?php echo $alumno['nombre_madre'];?></p>
		                                    <p class="font-weight-bold titulo-dato-perfil">Apellidos</p>
		                                    <p class="font-weight-light"><?php echo $alumno['apellidos_madre'];?> <?php echo $alumno['apellido2'];?></p>  
		                                    <p class="font-weight-bold titulo-dato-perfil">Correo</p>
		                                    <p class="font-weight-light"><?php echo $alumno['correo_madre'];?></p>
		                                </div>

		                                <div class="col-sm-6">                             
		                                    <p class="font-weight-bold titulo-dato-perfil">DNI</p>
		                                    <p class="font-weight-light"><?php echo $alumno['dni_madre'];?></p>
		                                    <p class="font-weight-bold titulo-dato-perfil">Teléfono</p>
		                                    <p class="font-weight-light"><?php echo $alumno['tel_madre'];?></p>	
		                                </div>
		                            </div>
		                            </div>
			                	</div>
			                </div>   
                        </div>
                    </div>
                </div>                                
            </div>
        </div>
    </div>
    <!--MODAL FOTO-->
    <div class="modal fade" id="cambioFoto" tabindex="-1" role="dialog" aria-labelledby="modal-cambioFoto" aria-hidden="true">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Sube una foto</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
               
                   <form name="datosAlumno" action="php/alumnos/subirImg.php" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="idAlumno" value="<?php echo $alumno['id']; ?>">
                        <input type="file" accept="image/png, .jpeg, .jpg, image/gif" class="form-control-file" name="imagen"> <br>
                        <button class="btn btn-info btn-md" type="submit">Aceptar</button>
                    </form>                  
                </div>              
            </div>
        </div>
    </div>

    <!--MODAL CAMBIO DE DATOS-->
    <div class="modal fade" id="cambioDatos" tabindex="-1" role="dialog" aria-labelledby="modal-cambioDatos" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Cambio de Datos</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
               
                   <?php include "php/solicitudCambioDatos.php";?>
                 
                </div>              
            </div>
        </div>
    </div>

    <?php
    include "footer.php";
?>
