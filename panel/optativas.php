<?php
require_once("php/permisos.php");

if(!comprobarLogin("gestor")){

  header("location: index.php?e=1");
}

include "header.php";


if (!comprobarDatos("cursos")){
  ?>
   <div id="content-wrapper" class="fondo-gris">
  <div class="container sin-datos text-center">
    <div class="alert alert-warning" role="alert">
 Para gestionar las Asignaturas Optativas debe añadir algún Curso primero.
</div>
 
    
<h4>NO HAY DATOS DISPONIBLES</h4>
<img src="img/alerta.png">

    
  </div>
</div>
<?php

} else {


$enseñanzas=ejecutaConsultaArray("SELECT * from optativas");
?>

 <div class="modal fade" id="editarOptativa" tabindex="-1" role="dialog" aria-labelledby="editarOptativa" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title">Editar Optativa</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body" id="modal-optativa">
               <img src="img/cargando.gif" style="height:64px;">
              </div>
              
            </div>
          </div>
        </div>

 <div class="modal fade" id="eliminarOptativa" tabindex="-1" role="dialog" aria-labelledby="eliminarOptativa" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <p class="modal-title">¿Estás seguro que desea eliminar la siguiente optativa?</p>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body" id="modal-optativa-eliminar">
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
                               <li class="breadcrumb-item active" aria-current="page">Optativas</li>
                             </ol>
                           </nav>
                            
                              <div class="text-right  d-print-inline-flex">
                                <a href="bloques-optativas.php" class="btn btn-info">
                                Gestionar Bloques
                              </a>
                                <button class="btn btn-info" type="button" data-toggle="collapse" data-target="#anadirItinerario" aria-expanded="false" aria-controls="collapseExample">
                                Añadir Optativa
                              </button>

                            </div>
                            <p></p>
                            <div class="collapse" id="anadirItinerario">
                             <div class="card text-white bg-info mb-3">
                               <div class="card-header">Añadir Optativa</div>
                               <div class="card-body">
                                 <div id="mensajes"></div>
                                  <div class="row">
                                   
                                      <div class="col-sm-6">
                                        <p> </p>
                                      <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                          <span class="input-group-text" style="width:100px;" >Nombre</span>
                                        </div>
                                        <input required id="nombre-asignatura" type="text" class="form-control">
                                       
                                      </div>
                                    </div>
                                    
                                    
                                    <div class="col-sm-6">
                                       <p><small class="muted">Para añadir bloques pulsa en "Gestionar Bloques"</small></p>
                                      <div class="input-group mb-3">

                                        <div class="input-group-prepend">
                                          <label class="input-group-text" style="width:100px;" for="inputGroupSelect01">Bloque</label>

                                        </div>
                                        <select required class="custom-select" id="selectBloqueOptativas">
                                          <?php
                                            devuelveItinerarios();
                                          ?> 
                                          
                                        </select>
                                       
                                      </div>
                                    </div>
                                    
                                    
                                    
                                  
                                    
                                  </div>

                                  <div class="text-right">
                                  <button class="btn" id="btn-enviar-itinerario">Guardar</button>
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
                                    Lista de Optativas
                                </div>
                                <!-- /.panel-heading -->
                                <div class="card-body">
                                <div class="table-responsive" id="zona-tabla-optativas">
                                  <div class="text-center"><img src="img/cargando.gif" style="height:64px;"></div> 
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