<?php
include "header.php";


  ?>


 <div class="modal fade" id="editarEnsenanza" tabindex="-1" role="dialog" aria-labelledby="editarEnsenanza" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title">Editar Enseñanza</h4>
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
                <p class="modal-title">¿Estás seguro que desea eliminar la siguiente enseñanza?</p>
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
                           
                            <h1 class="display-4">Enseñanzas</h1>
                              <div class="text-right  d-print-inline-flex">
                                <button class="btn btn-info" type="button" data-toggle="collapse" data-target="#anadirAsignatura" aria-expanded="false" aria-controls="collapseExample">
                                Añadir Enseñanza
                              </button>
                            </div>
                            </p>
                            <div class="collapse" id="anadirAsignatura">
                             <div class="card text-white bg-info mb-3">
                               <div class="card-header">Añadir Asignatura</div>
                               <div class="card-body">
                                 <form method="post" action="php/ensenanzas/anadirEnsenanza.php">
                                  <div class="row">
                                    <div class="col-sm-10">
                                      <div class="input-group">
                                        <div class="input-group-prepend">
                                          <span class="input-group-text" id="">Nombre</span>
                                        </div>
                                        <input type="text" name="nombre" class="form-control">
                                       
                                      </div>
                                    </div>
                                    <div class="col-sm-2">
                                      <button class="btn btn-block" type="submit">Guardar</button>
                                    </div>
                                    
                                  </div>
                                  
                                 </form>
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

                                <div class="card-header">
                                    Lista de Asignaturas
                                </div>
                                <!-- /.panel-heading -->
                                <div class="card-body">
                                <div class="table-responsive">
                                       <?php devuelveTablaEnsenanzas();?>
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