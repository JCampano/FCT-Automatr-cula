<?php

session_start();
include "header.php";



  ?>


 <div class="modal fade" id="editarMatricula" tabindex="-1" role="dialog" aria-labelledby="editarMatricula" aria-hidden="true">
          <div class="modal-dialog" role="document" style="max-width:1200px;">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title">Editar Matricula</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body" id="modal-matricula">
                <div class="text-center"><img src="img/cargando.gif" style="height:64px;"></div>
              </div>
              
            </div>
          </div>
        </div>

 <div class="modal fade" id="eliminarMatricula" tabindex="-1" role="dialog" aria-labelledby="eliminarMatricula" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <p class="modal-title">
                    ¿Estás seguro que desea eliminar la siguiente matricula?
                   


                </p>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body" id="modal-matricula-eliminar">
                <div class="text-center"><img src="img/cargando.gif" style="height:64px;"></div>
              </div>
              
            </div>
          </div>
        </div>

        <div class="modal fade" id="desvincularMatricula" tabindex="-1" role="dialog" aria-labelledby="eliminarMatricula" aria-hidden="true">
                 <div class="modal-dialog" role="document">
                   <div class="modal-content">
                     <div class="modal-header">
                       <p class="modal-title">
                        
                             ¿Estás seguro que desea anular el registro de la siguiente matrícula?
    
                       </p>
                       <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                         <span aria-hidden="true">&times;</span>
                       </button>
                     </div>
                     <div class="modal-body" id="modal-matricula-quitar">
                       <div class="text-center"><img src="img/cargando.gif" style="height:64px;"></div>
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
                               <li class="breadcrumb-item active" aria-current="page">Matriculas</li>
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
                    
                    <div class="card">

                                <div class="card-header text-white bg-secondary">
                                    Lista de Matriculas
                                </div>
                                <!-- /.panel-heading -->
                                <div class="card-body">
                                <div class="table-responsive" id="zona-tabla-matriculas">
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