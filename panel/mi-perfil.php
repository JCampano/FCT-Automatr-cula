<?php
session_start();
include "header.php";



$id = $_SESSION["idUsuario"];
$datosConsulta=ejecutaConsultaArray("SELECT * from personal where id=$id");
$datos=$datosConsulta[0];
  ?>

        <div class="content-wrapper">
          <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                           
                            <nav aria-label="breadcrumb" class="navegacion">
                             <ol class="breadcrumb">
                               <li class="breadcrumb-item"><a href="index.php">Inicio</a></li>
                               <li class="breadcrumb-item active" aria-current="page">Mi Perfil</li>
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
                                    <div class="col-sm-4">

                                    </div>
                                    <div class="col-sm-4">
                                           <div class="card" style="margin-bottom:30px;">

                                          <div class="card-header text-white bg-secondary">
                                                Datos Personales
                                            </div>
                                            <!-- /.panel-heading -->
                                              <div class="card-body">
                                                <form action="php/datosPersonales/cambiarDatosPersonales.php" method="post">
                                                  <div class="form-group row">
                                                    <label for="DNI" class="col-sm-3 col-form-label">DNI</label>
                                                    <div class="col-sm-9">
                                                      <input type="text" class="form-control" disabled value="<?php echo $datos["dni"] ?>">
                                                    </div>
                                                  </div>
                                                  <div class="form-group row">
                                                    <label for="Nombre" class="col-sm-3 col-form-label">Nombre</label>
                                                    <div class="col-sm-9">
                                                      <input type="text" class="form-control" required id="nombre" name="nombre" placeholder="Introduce tu nombre" value="<?php echo $datos["nombre"] ?>">
                                                    </div>
                                                  </div>
                                                  <div class="form-group row">
                                                    <label for="Apellidos" class="col-sm-3 col-form-label">Apellidos</label>
                                                    <div class="col-sm-9">
                                                      <input type="text" class="form-control" required id="apellidos" name="apellidos" placeholder="Introduce tus apellidos" value="<?php echo $datos["apellidos"] ?>">
                                                    </div>
                                                  </div>
                                                   <div class="form-group row">
                                                    <div class="col-sm-9">
                                                      <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                                                    </div>
                                                  </div>
                                                  </form>
                                              </div>

                                             </div>


                                             <div class="card">

                                          <div class="card-header text-white bg-secondary">
                                                Contraseña
                                            </div>
                                            <!-- /.panel-heading -->
                                              <div class="card-body">
                                                  <form action="php/datosPersonales/modificarContrasena.php" method="post">
                                                   <div class="form-group row">
                                                     <label for="Actual" class="col-sm-3 col-form-label">Actual</label>
                                                     <div class="col-sm-9">
                                                       <input type="text" class="form-control" required id="actual" name="actual" placeholder="Introduce tu contraseña actual">
                                                     </div>
                                                   </div>
                                                   <div class="form-group row">
                                                     <label for="Nueva" class="col-sm-3 col-form-label">Nueva</label>
                                                     <div class="col-sm-9">
                                                       <input type="text" class="form-control" required id="pass1" name="pass1" placeholder="Introduce tu nueva contraseña">
                                                     </div>
                                                   </div>
                                                   <div class="form-group row">
                                                     <label for="Nueva" class="col-sm-3 col-form-label">Nueva</label>
                                                     <div class="col-sm-9">
                                                       <input type="text" class="form-control" required id="pass2" name="pass2" placeholder="Repite tu nueva contraseña">
                                                     </div>
                                                   </div>
                                                   <div class="form-group row">
                                                    <div class="col-sm-10">
                                                      <button type="submit" class="btn btn-primary">Actualizar Contraseña</button>
                                                    </div>
                                                  </div>
                                                </form>

                                              </div>

                                             </div>

                                              
                                         

                                        
                                        
                                          

                                    </div>
                                  </div>


               
</div>
    
   

<?php


include "footer.php";
?>