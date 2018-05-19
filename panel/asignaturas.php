<?php
include "header.php";

if (!comprobarAsignaturas()){
  ?>
   <div id="page-wrapper" class="fondo-gris">
  <div class="container sin-datos text-center">
    <div class="alert alert-warning" role="alert">
  Por favor, para gestionar las asignaturas, primero debe dar de alta algún Curso.
</div>
 
    
<h1>No hay datos disponibles</h1>

    
  </div>
</div>
<?php

} else {


?>

 <div class="modal fade" id="editarAlumno" tabindex="-1" role="dialog" aria-labelledby="editarAlumno" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title">Editar Asignatura</h4>
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
                           
                            <h1 class="display-4">Asignaturas</h1>
                              <div class="text-right  d-print-inline-flex">
                                <button class="btn btn-info" type="button" data-toggle="collapse" data-target="#anadirAsignatura" aria-expanded="false" aria-controls="collapseExample">
                                Añadir Asignatura
                              </button>
                            </div>
                            </p>
                            <div class="collapse" id="anadirAsignatura">
                             <div class="card text-white bg-info mb-3">
                               <div class="card-header">Añadir Asignatura</div>
                               <div class="card-body">
                                 <form>
                                  <div class="row">
                                    <div class="col-sm-6">
                                      <div class="input-group">
                                        <div class="input-group-prepend">
                                          <span class="input-group-text" id="">Nombre</span>
                                        </div>
                                        <input type="text" class="form-control">
                                       
                                      </div>
                                    </div>
                                    <div class="col-sm-6">
                                      <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                          <label class="input-group-text" for="inputGroupSelect01">Curso</label>
                                        </div>
                                        <select class="custom-select" id="inputGroupSelect01">
                                          <option selected>Selecciona un curso</option>
                                          <option value="1">One</option>
                                          <option value="2">Two</option>
                                          <option value="3">Three</option>
                                        </select>
                                      </div>
                                    </div>
                                    
                                  </div>
                                  <div class="text-right">
                                  <button class="btn" type="submit">Enviar</button>
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
                                       <?php devuelveTablaAsignaturas();?>
                                    </div>
                                    <!-- /.table-responsive -->
                                </div>
                                <!-- /.panel-body -->
                            </div>

          </div>
        </div>

    
   

<?php
}


include "footer.php";
?>