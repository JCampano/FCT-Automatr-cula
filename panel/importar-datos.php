<?php
require_once("php/permisos.php");

if(!comprobarLogin("gestor")){

  header("location: index.php?e=1");
}

include "header.php";



  ?>


<div class="modal fade" id="importarDatos" tabindex="-1" role="dialog" aria-labelledby="importarDatos" aria-hidden="true">
          <div class="modal-dialog" role="document" style="max-width:1200px;">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title">Importar datos</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body" id="modal-importar-datos">
                 <div class="text-center"><img src="img/cargando.gif" style="height:64px;"></div>
              </div>

            </div>
          </div>
        </div>





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

                    <div id="importar">
                        <form name="importarArchivos" action="php/carga-archivos.php" method="post" enctype="multipart/form-data">
                           <input type="file" name="archivo" accept=".xls, .xls">
                           <button class="btn btn-info btn-md" type="submit">Aceptar</button>
                        </form>
                    </div>


          </div>
        </div>
<?php


include "footer.php";
?>
