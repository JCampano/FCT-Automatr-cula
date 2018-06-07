<?php
    include "../functions.php";
    extract($_POST);
    $datos = ejecutaConsultaArray("select m.id as idMatricula, m.cod_matricula as codMatricula, m.fecha as fechaMatricula, a.nombre as nAlumno, a.apellido1 as a1Alumno, a.apellido2 as a2Alumno, a.dni as dniAlumno from matriculas_registradas mr inner join alumnos a, matriculas m where a.id = m.id_alumno and mr.id_matricula = m.id and m.id=$id");
   
?>
 <form name="frmEliminarEnsenanza" action="php/ensenanzas/eliminarEnsenanza.php" method="post" novalidate>
    <h4> #<?php echo $datos[0]["codMatricula"];?></h4>
    <div class="form-group" style="display:none;">
    
        <input type="text" class="form-control" value="<?php echo $datos[0]["idMatricula"] ?>" name="id" placeholder="id" >

    </div>
<div class="form-group">
        <label for="nombre" class="control-label">Nombre</label>
        <input type="text" class="form-control" value="<?php echo $datos[0]["nAlumno"] ?>" name="nombre" placeholder="Nombre" disabled>
</div>  
<div class="row">
    <div class="col-sm-6">
        <div class="form-group">
                <label for="nombre" class="control-label">Apellido 1</label>
                <input type="text" class="form-control" value="<?php echo $datos[0]["a1Alumno"] ?>" name="nombre" placeholder="Nombre" disabled>
        </div>
    </div>
    <div class="col-sm-6">
        <div class="form-group">
                <label for="nombre" class="control-label">Apellido 2</label>
                <input type="text" class="form-control" value="<?php echo $datos[0]["a2Alumno"] ?>" name="nombre" placeholder="Nombre" disabled>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-sm-9">
         

    </div>
   <div class="col-sm-3">
       
                                
                                



                                    <button type="submit" class="btn btn-primary ">Si</button>
                                    <button type="button" class="btn btn-primary" data-dismiss="modal">No</button>

       </form>
    </div>
    
</div>