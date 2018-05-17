<?php	
    include "header.php";
    $_SESSION['ruta']= "registro-matricula.php";
    include "php/gestionlogin.php";
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
                            <img class="imagen-alumno" src="img/default-user.png">
                            <a href="#" class="btn btn-info btn-block"> Cambiar Foto Personal</a>
                            <a href="#" class="btn btn-info btn-block"> Solitar cambio de datos</a>
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
                                    <p class="font-weight-light">Paco</p>
                                    <p class="font-weight-bold titulo-dato-perfil">Apellidos</p>
                                    <p class="font-weight-light">Pérez García</p>
                                    <p class="font-weight-bold titulo-dato-perfil">Fecha de Nacimiento</p>
                                    <p class="font-weight-light">10/06/1995</p>
                                    <p class="font-weight-bold titulo-dato-perfil">DNI/NIE</p>
                                    <p class="font-weight-light">10015212K</p>
                                </div>
                                <div class="col-sm-6">
                                    <h3>Datos de Familia</h3>
                                </div>
                            </div>
                            
                            
                        </div>
                    </div>
                                
            </div>
        </div>
    </div>
    <?php
    include "footer.php";
?>
