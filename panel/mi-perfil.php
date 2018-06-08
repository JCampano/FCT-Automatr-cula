





















   
    
        
               
                
                    
                           
                            
                            
                                        
                                        
                                         
                                          
                                              
                                                       <input type="text" class="form-control" required id="apellidos" name="apellidos" placeholder="Introduce tu contraseña actual">
                                                       <input type="text" class="form-control" required id="apellidos" name="apellidos" placeholder="Introduce tu nueva contraseña">
                                                       <input type="text" class="form-control" required id="apellidos" name="apellidos" placeholder="Repite tu nueva contraseña">
                                                      <button type="submit" class="btn btn-primary">Actualizar Contraseña</button>
                                                      <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                                                      <input type="text" class="form-control" disabled value="<?php echo $datos["dni"] ?>">
                                                      <input type="text" class="form-control" required id="apellidos" name="apellidos" placeholder="Introduce tus apellidos" value="<?php echo $datos["apellidos"] ?>">
                                                      <input type="text" class="form-control" required id="nombre" name="nombre" placeholder="Introduce tu nombre" value="<?php echo $datos["nombre"] ?>">
                                                      <input type="text" class="form-control" required id="telefono" name="telefono" placeholder="Introduce tus apellidos" value="<?php echo $datos["telefono"] ?>">
                                                     </div>
                                                     </div>
                                                     </div>
                                                     <div class="col-sm-10">
                                                     <div class="col-sm-10">
                                                     <div class="col-sm-10">
                                                     <label for="inputPassword3" class="col-sm-2 col-form-label">Actual</label>
                                                     <label for="inputPassword3" class="col-sm-2 col-form-label">Nueva</label>
                                                     <label for="inputPassword3" class="col-sm-2 col-form-label">Nueva</label>
                                                    </div>
                                                    </div>
                                                    </div>
                                                    </div>
                                                    </div>
                                                    </div>
                                                    <div class="col-sm-10">
                                                    <div class="col-sm-10">
                                                    <div class="col-sm-10">
                                                    <div class="col-sm-10">
                                                    <div class="col-sm-10">
                                                    <div class="col-sm-10">
                                                    <label for="inputEmail3" class="col-sm-2 col-form-label">DNI</label>
                                                    <label for="inputPassword3" class="col-sm-2 col-form-label">Apellidos</label>
                                                    <label for="inputPassword3" class="col-sm-2 col-form-label">Nombre</label>
                                                    <label for="inputPassword3" class="col-sm-2 col-form-label">Teléfono</label>
                                                   </div>
                                                   </div>
                                                   </div>
                                                   <div class="form-group row">
                                                   <div class="form-group row">
                                                   <div class="form-group row">
                                                   <div class="form-group row">
                                                   <div class="form-group row">
                                                  </div>
                                                  </div>
                                                  </div>
                                                  </div>
                                                  </div>
                                                  </div>
                                                  </form>
                                                  <div class="form-group row">
                                                  <div class="form-group row">
                                                  <div class="form-group row">
                                                  <div class="form-group row">
                                                  <form>
                                                </form>
                                                <form>
                                                Contraseña
                                                Datos Personales
                                              </div>
                                              </div>
                                              <div class="card-body">
                                              <div class="card-body">
                                             </div>
                                             </div>
                                             <div class="card">
                                            <!-- /.panel-heading -->
                                            <!-- /.panel-heading -->
                                            </div>
                                            </div>
                                           <div class="card" style="margin-bottom:30px;">
                                          <div class="card-header text-white bg-secondary">
                                          <div class="card-header text-white bg-secondary">
                                    </div>
                                    </div>
                                    <div class="col-sm-4">
                                    <div class="col-sm-4">
                                  </div>
                               <li class="breadcrumb-item active" aria-current="page">Mi Perfil</li>
                               <li class="breadcrumb-item"><a href="index.php">Inicio</a></li>
                             </ol>
                             <?php
                             <ol class="breadcrumb">
                            <nav aria-label="breadcrumb" class="navegacion">
                           </nav>
                        <!-- /.col-lg-12 -->
                        </div>
                        <div class="col-lg-12">
                      <button type="button" class="close" data-dismiss="alert">&times;</button>'.$_SESSION["mensaje"].'</div>';
                    <!-- /.row -->
                    </div>
                    <div class="row">
                    <div class="row">
                    echo '<div class="alert alert-'.$_SESSION['tipoMensaje'].' alert-dismissable">
                    unset($_SESSION['mensaje']);
                    unset($_SESSION['tipoMensaje']);
                if (isset($_SESSION['mensaje']) && isset($_SESSION['tipoMensaje']))  {
               }
            ?>
          <div class="container-fluid">
        <div class="content-wrapper">
  ?>
$datos=$datosConsulta[0];
$datosConsulta=ejecutaConsultaArray("SELECT * from personal where id=$id");
$id = $_SESSION["idUsuario"];
</div>
<?php
<?php
?>
include "footer.php";
include "header.php";
session_start();