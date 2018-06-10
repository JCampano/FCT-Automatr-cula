 <?php
    require_once("php/permisos.php");
    include "header.php";
 ?>
            <div class="content-wrapper">
              <div class="container-fluid" style="margin-top:20px;">
                  <?php

                    if (isset($_GET["e"]) && $_GET["e"]==1){
                        $_SESSION['tipoMensaje']= "danger";
                        $_SESSION['mensaje'] = "No tiene permiso para acceder a esta página";
                    }


                    if (isset($_SESSION['mensaje']) && isset($_SESSION['tipoMensaje']))  {
                    echo '<div class="alert alert-'.$_SESSION['tipoMensaje'].' alert-dismissable">
                      <button type="button" class="close" data-dismiss="alert">&times;</button>'.$_SESSION["mensaje"].'</div>';
                    unset($_SESSION['mensaje']);
                    unset($_SESSION['tipoMensaje']);
               }

                ?>
                <div class="row">

                <div class="col-lg-12">

                    <h1 class="page-header">Inicio</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>

            

            <div class="row inicio">

                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            Matrículas registradas por usuarios
                        </div>
                        <!-- /.panel-heading -->
                        <div class="card-body">
                            <canvas id="myChart"></canvas>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-6 -->
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            <i class="fa fa-bell-o"></i> Últimos alumnos registrados
                        </div>
                        <!-- /.panel-heading -->
                        <div class="list-group list-group-flush small">
                        
                                <?php
                                    devuelveUltimosAlumnos();
                                ?>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-6 -->
            </div>
              </div>
          </div>

   <?php

    include "footer.php";

    ?>