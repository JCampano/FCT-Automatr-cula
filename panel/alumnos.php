<?php
include "header.php";
?>

<div id="editarAlumno" class="modal fade" role="dialog">
	<div class="modal-dialog modal-lg">
	    <!-- Modal content-->
	    <div class="modal-content">
	      <div class="modal-header">
	      	<h4 class="modal-title">Editar Alumno</h4>
	        <button type="button" class="close" data-dismiss="modal">&times;</button>        
	      </div>
	      
		    <div class="container-fluid">
				<div class = "row">
					<div class ="col-lg-12" id="modal-alumnos">
						
					</div>
				</div>
			</div>     
	    </div>
	</div>
</div>
    

          <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                   
                    <h1 class="page-header">Alumnos</h1>
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