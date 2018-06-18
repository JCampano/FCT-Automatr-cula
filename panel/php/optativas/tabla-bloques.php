<?php
    include "../functions.php";
    $resultado = ejecutaConsultaArray("select i.id as idBloque, i.nombre as nBloque, c.nombre as nCurso, e.nombre as nEnseñanza from grupo_optativas i inner join cursos c, enseñanzas e where i.id_curso = c.id and c.id_enseñanza = e.id");
    echo ' <table id="tabla-bloques" class="table table-striped table-hover">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th>ID</th>
                                            <th>Nombre</th>
                                            <th width="100px">Curso</th>
                                            <th width="100px">Enseñanza</th>
                                            <th>Acción</th>
                                        </tr>
                                    </thead>
                                    <tbody>';
    for($i=0;$i<count($resultado);$i++){

        echo '  <tr>
                    <td width="50">'.$resultado[$i]["idBloque"].'</td>
                    <td>'.$resultado[$i]["nBloque"].'</td>
                    <td>'.$resultado[$i]["nCurso"].'</td>
                    <td>'.$resultado[$i]["nEnseñanza"].'</td>
                    <td width="100"><button style="margin-right:10px;" class="btn-editar" id="btn-editar" data-id="'.$resultado[$i]["idBloque"].'" type="button" data-toggle="modal" data-target="#editarItinerario" data-tipo="tooltip" data-placement="down" title="Editar">
                            <i class="fas fa-pencil-alt"></i>
                            </button>
                            <button data-id="'.$resultado[$i]["idBloque"].'" type="button" id="btn-eliminar" data-toggle="modal" data-target="#eliminarItinerario" class="btn-eliminar" data-tipo="tooltip" data-placement="down" title="Eliminar">
                            <i class="far fa-trash-alt"></i>
                            </button></td>
                </tr>';
    }
    
    echo ' </tbody></table>';

?>