<?php
header('Content-Type: text/html; charset=UTF-8');
require_once("php/permisos.php");

if(!comprobarLogin("gestor")){

  header("location: index.php?e=1");
}

include "header.php";



  ?>







        <div class="content-wrapper">
          <div class="container">
                    <div class="row">
                        <div class="col-lg-12">

                            <nav aria-label="breadcrumb" class="navegacion">
                             <ol class="breadcrumb">
                               <li class="breadcrumb-item"><a href="index.php">Inicio</a></li>
                               <li class="breadcrumb-item active" aria-current="page">Importar datos</li>
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
                    <div id="mensajes"></div>
                    <div class="card">
                      
                                <div class="card-header text-white bg-secondary">
                                    Importa datos de Alumnos seleccionando un archivo CSV
                                </div>
                                <!-- /.panel-heading -->
                                <div class="card-body">
                                <div class="table-responsive">
                                        <div id="importar">
                                                               <form name="importarArchivos" action="php/carga-archivos.php" method="post" enctype="multipart/form-data">
                                                                  <input required type="file" name="archivo" accept=".csv">
                                                                  <button class="btn btn-info btn-md" type="submit">Aceptar</button>
                                                               </form>
                                                           </div>
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
