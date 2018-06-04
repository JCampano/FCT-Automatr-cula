<?php
include "php/permisos.php";

if(!comprobarLogin("gestor")){

  header("location: index.php?e=1");
}

include "header.php";
comprobarLogin("gestor");

if (!comprobarDatos("cursos")){
  ?>
   <div id="content-wrapper" class="fondo-gris">
  <div class="container sin-datos text-center">
    <div class="alert alert-warning" role="alert">
 Para gestionar los itinerarios debe añadir algún itinerario primero.
</div>
 
    
<h4>NO HAY DATOS DISPONIBLES</h4>
<img src="img/alerta.png">

    
  </div>
</div>
<?php

} else {
$enseñanzas=ejecutaConsultaArray("SELECT * from enseñanzas");

?>

 <div class="modal fade" id="editarItinerario" tabindex="-1" role="dialog" aria-labelledby="editarItinerario" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title">Editar Itinerario</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body" id="modal-itinerario">
               <div class="text-center"><img src="img/cargando.gif" style="height:64px;"></div>
              </div>
              
            </div>
          </div>
        </div>

 <div class="modal fade" id="eliminarItinerario" tabindex="-1" role="dialog" aria-labelledby="eliminarItinerario" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <p class="modal-title">¿Estás seguro que desea eliminar el siguiente itinerario?</p>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body" id="modal-itinerario-eliminar">
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
                               <li class="breadcrumb-item active" aria-current="page">Itinerarios</li>
                             </ol>
                           </nav>
                            
                              <div class="text-right  d-print-inline-flex">
                                <button class="btn btn-info" type="button" data-toggle="collapse" data-target="#anadirItinerario" aria-expanded="false" aria-controls="collapseExample">
                                Añadir Itinerario
                              </button>
                            </div>
                            </p>
                            <div class="collapse" id="anadirItinerario">
                             <div class="card text-white bg-info mb-3">
                               <div class="card-header">Añadir Itinerario</div>
                               <div class="card-body">
                                 <div id="mensajes"></div>
                                  <div class="row">
                                    
                                      <div class="col-sm-4">
                                      <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                          <span class="input-group-text" style="width:100px;" >Nombre</span>
                                        </div>
                                        <input id="nombre-itinerario" type="text" class="form-control">
                                       
                                      </div>
                                    </div>
                                    <div class="col-sm-4">
                                      <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                          <label class="input-group-text" style="width:100px;"  for="inputGroupSelect01">Enseñanza</label>
                                        </div>
                                        <?php
                                        
                                          
                                          if (count($enseñanzas)==0){

                                            echo '
                                            <select disabled class="custom-select" id="selectEnsenanzaItinerario">
                                            <option selected value="nulo">No hay enseñanzas disponibles...</option>';
                                          }
                                         

                                            else {
                                              echo '<select class="custom-select" id="selectEnsenanzaItinerario">
                                              <option selected value="nulo">Selecciona una Enseñanza...</option>';
                                              for($i=0;$i<count($enseñanzas);$i++){
                                                echo '<option value="'.$enseñanzas[$i]["id"].'">'.$enseñanzas[$i]["nombre"].'</option>';
                                              }
                                            }
                                          
                                          
                                          ?>


                                        </select>
                                      </div>
                                    </div>
                                    
                                   <div class="col-sm-4">
                                      <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                          <label class="input-group-text" style="width:100px;" for="inputGroupSelect01">Curso</label>
                                        </div>
                                        <select class="custom-select" disabled id="selectCursoItinerario">
                                          <option value="nulo" selected>No hay Cursos disponibles...</option>
                                          
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
                                    Lista de Itinerarios
                                </div>
                                <!-- /.panel-heading -->
                                <div class="card-body">
                                <div class="table-responsive" id="zona-tabla-itinerarios">
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