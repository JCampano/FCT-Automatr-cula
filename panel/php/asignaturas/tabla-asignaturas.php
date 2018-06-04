<?php
    include "../functions.php";
    $resultado = ejecutaConsultaArray("SELECT a.codigo,a.nombre as nAsignatura, i.nombre as nItinerario, c.nombre as nCurso, e.nombre as nEnseñanza from asignaturas a inner join cursos c, itinerarios i, enseñanzas e where c.id = i.id_curso and a.id_itinerario = i.id and e.id = c.id_enseñanza");
    echo ' <table id="tabla-asignaturas" class="table table-striped table-hover">
                                    <thead class="thead-dark">
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
                    <td width="120"><button style="margin-right:10px;" class="btn-editar" data-cod="'.$resultado[$i]["codigo"].'" type="button" data-toggle="modal" data-target="#editarAsignatura" data-target="#editarCurso" data-tipo="tooltip" data-placement="down" title="Editar"> <i class="fas fa-pencil-alt"></i></button><button data-cod="'.$resultado[$i]["codigo"].'" type="button" data-toggle="modal" data-target="#eliminarAsignatura" class=" btn-eliminar" data-target="#editarCurso" data-tipo="tooltip" data-placement="down" title="Eliminar"><i class="far fa-trash-alt"></i></button></td>
                </tr>';
    }
    
    echo ' </tbody></table>';

?>