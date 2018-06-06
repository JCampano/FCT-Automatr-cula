<?php
    include "../functions.php";
    $resultado = ejecutaConsultaArray("select i.id as idItinerario, i.nombre as nItinerario, c.nombre as nCurso, e.nombre as nEnseñanza from itinerarios i inner join cursos c, enseñanzas e where i.id_curso = c.id and c.id_enseñanza = e.id");
    echo ' <table id="tabla-itinerarios" class="table table-striped table-hover">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th>ID</th>
                                            <th>Nombre</th>
                                            <th>Curso</th>
                                            <th>Enseñanza</th>
                                            <th>Acción</th>
                                        </tr>
                                    </thead>
                                    <tbody>';
    for($i=0;$i<count($resultado);$i++){

        echo '  <tr>
                    <td width="50">'.$resultado[$i]["idItinerario"].'</td>
                    <td>'.$resultado[$i]["nItinerario"].'</td>
                    <td>'.$resultado[$i]["nCurso"].'</td>
                    <td>'.$resultado[$i]["nEnseñanza"].'</td>
                    <td width="100"><button style="margin-right:10px;" class="btn-editar" id="btn-editar" data-id="'.$resultado[$i]["idItinerario"].'" type="button" data-toggle="modal" data-target="#editarItinerario" data-tipo="tooltip" data-placement="down" title="Editar">
                            <i class="fas fa-pencil-alt"></i>
                            </button>
                            <button data-id="'.$resultado[$i]["idItinerario"].'" type="button" id="btn-eliminar" data-toggle="modal" data-target="#eliminarItinerario" class="btn-eliminar" data-tipo="tooltip" data-placement="down" title="Eliminar">
                            <i class="far fa-trash-alt"></i>
                            </button></td>
                </tr>';
    }
    
    echo ' </tbody></table>';

?>