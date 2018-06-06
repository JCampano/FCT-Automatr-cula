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
                                  <div class="col-sm-12">
                                    <div class="input-group">
                                      <div class="input-group-prepend">
                                        <span class="input-group-text" id="">Nombre</span>
                                      </div>
                                      <input type="text" name="nombre-usuario" id="nombre-usuario" class="form-control">

                                     
                                    </div>
                                  </div>
                                  <div class="col-sm-12">
                                    <div class="input-group">
                                      <div class="input-group-prepend">
                                        <span class="input-group-text" id="">Contraseña</span>
                                      </div>
                                      <input type="text" name="pass-usuario" id="pass-usuario" class="form-control">

                                     
                                    </div>
                                  </div>
                                  <div class="col-sm-2">
                                    <button class="btn btn-block" id="btn-enviar-ensenanza">Guardar</button>
                                  </div>
                                  
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