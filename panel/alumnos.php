<?php
include "header.php";
?>

 <div class="modal fade" id="editarAlumno" tabindex="-1" role="dialog" aria-labelledby="editarAlumno" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title">Editar Alumno</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body" id="modal-alumnos">
               
              </div>
              
            </div>
          </div>
        </div>

 <div class="modal fade" id="eliminarAlumno" tabindex="-1" role="dialog" aria-labelledby="eliminarAlumno" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title">¿Estás seguro que desea eliminar al siguiente alumno?</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body" id="modal-alumnos-eliminar">
               
              </div>
              
            </div>
          </div>
        </div>


        <div class="content-wrapper">
          <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                           
                            <h1 class="display-4">Alumnos</h1>
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
                                    Lista de Alumnos
                                </div>
                                <!-- /.panel-heading -->
                                <div class="card-body">
                                <div class="table-responsive">
                                       <?php devuelveTablaAlumnos();?>
                                    </div>
                                    <!-- /.table-responsive -->
                                </div>
                                <!-- /.panel-body -->
                            </div>
          </div>
        </div>
    

          
           

    
    <!-- /#wrapper -->
    
   

<?php

include "footer.php";
?>