<?php
session_start();

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
                           
                            <nav aria-label="breadcrumb" class="navegacion">
                             <ol class="breadcrumb">
                               <li class="breadcrumb-item"><a href="index.php">Inicio</a></li>
                               <li class="breadcrumb-item active" aria-current="page">Matrículas</li>
                                <li class="breadcrumb-item active" aria-current="page">Registrar Matrícula</li>
                             </ol>
                           </nav>
                              
                 
                            
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
                    <div class="row">
                      <div class="col-lg-1 col-md-1">
                      </div>
                      <div class="col-lg-10 col-md-10">
                        <div class="card text-white bg-secondary mb-3">
                          <div class="card-header">Registrar Matrícula</div>
                          <div class="card-body">
                            <h5 class="card-title">Introduce el código de Matrícula</h5>
                            <div id="mensajes"></div>
                             <div class="row">
                               <div class="col-sm-10">
                                 <div class="input-group">
                                   <div class="input-group-prepend">
                                     <span class="input-group-text"><i class="fas fa-file-alt"></i></span>
                                   </div>
                                   <input type="text" name="cod-matricula" id="codigo-registrar-asignatura" class="form-control">

                                     

                                        
                                        <input type="text" class="form-control" value="<?php echo $_SESSION["idUsuario"]; ?>" name="codigo" id="idUsuario" style="display:none;">
                                    

                                 </div>
                               </div>
                               <div class="col-sm-2">
                                 <button class="btn btn-block" id="btn-registrar-matricula">Registrar</button>
                               </div>
                               
                             </div>
                          </div>
                        </div>
                      </div>
                   
                  </div>
                  <h5 style="margin-top:30px;">ÚLTIMAS MATRÍCULAS REGISTRADAS</h5>
                  <div id="zonaMatriculasRegistradas">
                    <div class="text-center"><img src="img/cargando.gif">
                    </div>
                  </div>

          </div>
        </div>

    
   

<?php


include "footer.php";
?>