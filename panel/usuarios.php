<?php
require_once("php/permisos.php");

if(!comprobarLogin("administrador")){

  header("location: index.php?e=1");
}

include "header.php";



  ?>


 <div class="modal fade" id="editarEnsenanza" tabindex="-1" role="dialog" aria-labelledby="editarEnsenanza" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title">Editar Usuario</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body" id="modal-ensenanza">
                <img src="img/cargando.gif" style="width:100%">
              </div>
              
            </div>
          </div>
        </div>

 <div class="modal fade" id="eliminarEnsenanza" tabindex="-1" role="dialog" aria-labelledby="eliminarEnsenanza" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <p class="modal-title">¿Estás seguro que desea eliminar la siguiente usuario?</p>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body" id="modal-ensenanza-eliminar">
                <img src="img/cargando.gif" style="width:100%">
              </div>
              
            </div>
          </div>
        </div>



        
        <div class="content-wrapper">
          <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                           
                            <nav aria-label="breadcrumb" class="navegacion">
                             <ol class="breadcrumb">
                               <li class="breadcrumb-item"><a href="index.php">Inicio</a></li>
                               <li class="breadcrumb-item active" aria-current="page">Usuarios</li>
                             </ol>
                           </nav>
                            <div class="text-right  d-print-inline-flex">
                              <button class="btn btn-info" type="button" data-toggle="collapse" data-target="#anadirAsignatura" aria-expanded="false" aria-controls="collapseExample">
                              Añadir Usuario
                            </button>
                          </div>
                          </p>
                          <div class="collapse" id="anadirAsignatura">
                           <div class="card text-white bg-info mb-3">
                             <div class="card-header">Añadir Usuario</div>
                             <div class="card-body">
                               <div id="mensajes"></div>
                                <div class="row">
                                  
                                     <div class="col-xl-4">
                                      <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                          <span class="input-group-text" style="width:100px;" >Nombre</span>
                                        </div>
                                        <input id="nombre-usuario" type="text" class="form-control" placeholder="Introduce el nombre">
                                       
                                      </div>
                                    </div>
                                    <div class="col-xl-8">
                                      <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                          <span class="input-group-text" style="width:100px;" >Apellidos</span>
                                        </div>
                                        <input id="apellidos-usuario" type="text" class="form-control" placeholder="Introduce los apellidos">
                                       
                                      </div>
                                    </div>
                                     <div class="col-xl-6">
                                      <div class="row">
                                        <div class="col-xl-6">
                                          <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                              <span class="input-group-text" style="width:100px;" >DNI</span>
                                            </div>
                                            <input id="dni-usuario" type="text" class="form-control" placeholder="Introduce el DNI">
                                       
                                          </div>
                                        </div>
                                        <div class="col-xl-6">
                                        <div class="input-group mb-3">
                                          <div class="input-group-prepend">
                                            <span class="input-group-text" style="width:100px;" >Teléfono</span>
                                          </div>
                                          <input id="telefono-usuario" type="text" class="form-control" placeholder="Introduce el teléfono">
                                        
                                      </div>
                                     
                                      </div>
                                      </div>
                                      <div class="input-group mb-3">
                                      
                                        <div class="input-group-prepend">
                                          <span class="input-group-text" style="width:100px;" >Contraseña</span>
                                        </div>
                                        
                                        <input id="clave1-usuario" type="password" class="form-control" placeholder="Introduce la contraseña">
                                        
                                       
                                      </div>
                                      
                                      <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                          <span class="input-group-text" style="width:100px;" >Contraseña</span>
                                        </div>
                                        <input id="clave2-usuario" type="password" class="form-control" placeholder="Vuelve a introducir la contraseña">
                                       
                                      </div>
                                      
                                    </div>
                                    <div class="col-xl-6">
                                      <div id="tipo-usuario" class="btn-group btn-group-toggle" style="width:100%;" data-toggle="buttons">
                                        <label class="btn user-administrativo btn-block btn-secondary active">
                                          <input type="radio" name="options" value="1" id="option1" autocomplete="off" checked> <h1><i class="fas fa-file-alt"></i></br></h1>ADMINISTRATIVO
                                        </label>
                                        <label class="btn user-gestor btn-block btn-secondary">
                                          <input type="radio" name="options" value="2" id="option2" autocomplete="off"> <h1><i class="fas fa-graduation-cap"></i></br></h1>GESTOR
                                        </label>
                                        <label class="btn user-administrador btn-block btn-secondary">
                                          <input type="radio" name="options" value="3" id="option3" autocomplete="off"> <h1><i class="fa fa-fw fa-cogs"></i></br></h1>ADMINISTRADOR
                                        </label>
                                      </div>
                                    </div>
                                  
                                </div>
                                <div class="text-right">
                                  <button class="btn" id="btn-alta-usuario">Guardar</button>
                                </div>
                          
                             </div>
                           </div>
                          </div>
                            
                            
                             <?php
                
                if (isset($_SESSION['mensaje']) && isset($_SESSION['tipoMensaje']))  {
                    echo '<div class="alert alert-'.$_SESSION['tipoMensaje'].' alert-dismissable">
                      <button type="button" class="close" data-dismiss="alert">&times;</button>'.$_SESSION["mensaje"].'</div>';
                    unset($_SESSION['mensaje']);
                    unset($_SESSION['tipoMensaje']);
               }
            ?>
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>
                    <!-- /.row -->
                    
                    <div class="card">

                                <div class="card-header text-white bg-secondary">
                                    Lista de Usuarios
                                </div>
                                <!-- /.panel-heading -->
                                <div class="card-body">
                                <div class="table-responsive" id="zona-tabla-usuarios">
                                        <div class="text-center"><img src="img/cargando.gif" style="height:64px;"></div> 
                                    </div>
                                    <!-- /.table-responsive -->
                                </div>
                                <!-- /.panel-body -->
                            </div>

          </div>
        </div>

    
   

<?php


include "footer.php";
?>