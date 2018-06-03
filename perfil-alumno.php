<?php	
    include "header.php";    
    $_SESSION['ruta']= "registro-matricula.php";//esto aqui yo creo que sobra
    include "php/gestionlogin.php";

    $dni=$_SESSION['login'];	
	$consulta="SELECT * FROM ALUMNOS WHERE DNI='".$dni."';";
	$resulset=ejecutaConsulta($consulta);
    $alumno=$resulset->fetch(PDO::FETCH_ASSOC);    
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
                            <form name="datosAlumno" action="php/alumnos/subirImg.php" method="post" enctype="multipart/form-data">
                                <img class="imagen-alumno" src="img/default-user.png">
                                <input type="hidden" name="idAlumno" value="idAlumno">
                                <input type="file" accept="image/png, .jpeg, .jpg, image/gif" class="btn btn-info btn-block form-control-file" name="imagen">                                
                                <a href="#" class="btn btn-info btn-block"> Cambiar Foto Personal</a>
                                <a href="#" class="btn btn-info btn-block" data-toggle="modal" data-target="#cambioDatos">Solitar cambio de datos</a>
                                <button class="btn btn-info btn-block" type="submit">Aceptar</button>
                            <form>
                        </div>
                                               
                        <div class="col-sm-9">
                            <div class="alert alert-warning" role="alert">
                              Ateción, no has seleccionado el curso en el que deseas matricularte.
                              <select class="custom-select">
                                <option selected>Selecciona el curso en el que deseas matricularte</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                              </select>
                            </div>
                            
                            <div class="row borde-finito">
                                <div class="col-sm-6">
                                    <h3>Datos Personales</h3>
                                    <p class="font-weight-bold titulo-dato-perfil">Nombre</p>
                                    <p class="font-weight-light"><?php echo $alumno['nombre'];?></p>
                                    <p class="font-weight-bold titulo-dato-perfil">Apellidos</p>
                                    <p class="font-weight-light"><?php echo $alumno['apellido1'];?><?php echo $alumno['apellido2'];?></p>
                                    <p class="font-weight-bold titulo-dato-perfil">Fecha de Nacimiento</p>
                                    <p class="font-weight-light"><?php echo $alumno['fecha_nac'];?></p>
                                    <p class="font-weight-bold titulo-dato-perfil">DNI/NIE</p>
                                    <p class="font-weight-light"><?php if($alumno['dni']!=""){echo $alumno['dni'];}else{echo $alumno['nie'];};?></p>
                                </div>
                                <div class="col-sm-6">
                                    <h3>Datos de Familia</h3>
                                    <p class="font-weight-bold titulo-dato-perfil">Nombre</p>
                                    <p class="font-weight-light"><?php echo $alumno['nombre_padre'];?></p>
                                    <p class="font-weight-bold titulo-dato-perfil">Apellidos</p>
                                    <p class="font-weight-light"><?php echo $alumno['apellidos_padre'];?></p>
                                    <p class="font-weight-bold titulo-dato-perfil">Nombre</p>
                                    <p class="font-weight-light"><?php echo $alumno['nombre_madre'];?></p>
                                    <p class="font-weight-bold titulo-dato-perfil">Apellidos</p>
                                    <p class="font-weight-light"><?php echo $alumno['apellidos_madre'];?></p>
                                </div>
                            </div>
                            
                            
                        </div>
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
