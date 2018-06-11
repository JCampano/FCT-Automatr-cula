<?php
    include "../functions.php";
    extract($_POST);
    $datos = ejecutaConsultaArray("SELECT * from asignaturas where codigo='$cod'");
   
?>
<div class="row">
    <div class="col-sm-9">
         <h4> <?php echo $datos[0]["nombre"];?></h4>
    </div>
   <div class="col-sm-3">
        <form name="frmEliminarEnsenanza" action="php/asignaturas/eliminarAsignatura.php" method="post" novalidate>
                                <div class="form-group" style="display:none;">
                                    
                                    <input type="text" class="form-control" value="<?php echo $cod ?>" name="cod" placeholder="cod" >

                                </div>



                                    <button type="submit" class="btn btn-primary ">Si</button>
                                    <button type="button" class="btn btn-primary" data-dismiss="modal">No</button>

       </form>
    </div>
    
</div>