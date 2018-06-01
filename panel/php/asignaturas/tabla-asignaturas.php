<?php
    include "../functions.php";
    $resultado = ejecutaConsultaArray("SELECT a.codigo,a.nombre as nAsignatura, i.nombre as nItinerario, c.nombre as nCurso, e.nombre as nEnseñanza from asignaturas a inner join cursos c, itinerarios i, enseñanzas e where c.id = i.id_curso and a.id_itinerario = i.id and e.id = c.id_enseñanza");
    echo ' <table id="tabla-asignaturas" class="table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>COD</th>
                                            <th>Nombre Asignatura</th>
                                            <th>Curso</th>
                                            <th>Itinerario</th>
                                            <th>Acción</th>
                                        </tr>
                                    </thead>
                                    <tbody>';
    for($i=0;$i<count($resultado);$i++){
      
        echo '  <tr>
                    <td width="50">'.$resultado[$i]["codigo"].'</td>
                    <td>'.$resultado[$i]["nAsignatura"].'</td>
                    <td>'.$resultado[$i]["nCurso"].' ('.$resultado[$i]["nEnseñanza"].')'.'</td>
                    <td>'.$resultado[$i]["nItinerario"].'</td>
                    <td width="120"><button style="margin-right:10px;" class="btn-editar-asignatura btn btn-success" data-cod="'.$resultado[$i]["codigo"].'" type="button" data-toggle="modal" data-target="#editarAsignatura" class="btn btn-success"> <i class="fas fa-pencil-alt"></i></button><button data-cod="'.$resultado[$i]["codigo"].'" type="button" data-toggle="modal" data-target="#eliminarAsignatura" class="btn btn-danger btn-eliminar-asignatura"><i class="far fa-trash-alt"></i></button></td>
                </tr>';
    }
    
    echo ' </tbody></table>';

?>