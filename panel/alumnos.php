<?php
include "header.php";
?>


    

          <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Alumnos</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="panel panel-default">
                        <div class="panel-heading">
                            Lista de Alumnos
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                        <div class="table-responsive">
                               <?php devuelveTablaAlumnos();?>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>

    </div>
    <!-- /#wrapper -->
    
   

<?php

include "footer.php";
?>