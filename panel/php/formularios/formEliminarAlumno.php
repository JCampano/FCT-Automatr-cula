<?php
    include "../functions.php";
    extract($_POST);
    $datos = ejecutaConsultaArray("SELECT nombre, apellido1, apellido2 from alumnos where id='$id'");

?>
<div class="row">
    <div class="col-sm-9">
         <h4> <?php echo $datos[0]["nombre"]." ".$datos[0]["apellido1"]." ".$datos[0]["apellido2"];?></h4>
    </div>
   <div class="col-sm-3">
        <form name="frmEliminarAlumno" action="php/alumnos/eliminarAlumno.php" method="post" novalidate>
                                <div class="form-group" style="display:none;">
                                
                                    <input type="text" class="form-control" value="<?php echo $id ?>" name="id">

                                </div>



                                    <button type="submit" class="btn btn-primary ">Si</button>
                                    <button type="button" class="btn btn-primary" data-dismiss="modal">No</button>

       </form>
    </div>
    
</div>