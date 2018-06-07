<?php
    include "../functions.php";
    $resultado = ejecutaConsultaArray("select c.id as idCurso, c.nombre as nCurso, e.nombre as nEnseñanza from cursos c inner join enseñanzas e where c.id_enseñanza = e.id");
    echo ' <table id="tabla-cursos" class="table table-striped table-hover">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th>ID</th>
                                            <th>Curso</th>
                                            <th>Enseñanza</th>
                                            <th>Acción</th>
                                        </tr>
                                    </thead>
                                    <tbody>';
    for($i=0;$i<count($resultado);$i++){

        echo '  <tr>
                    <td width="50">'.$resultado[$i]["idCurso"].'</td>
                    <td>'.$resultado[$i]["nCurso"].'</td>
                    <td>'.$resultado[$i]["nEnseñanza"].'</td>
                    <td width="100"><button style="margin-right:10px;" class="btn-editar" id="btn-editar" data-id="'.$resultado[$i]["idCurso"].'" type="button" data-toggle="modal" data-target="#editarCurso" data-tipo="tooltip" data-placement="down" title="Editar">
                            <i class="fas fa-pencil-alt"></i>
                            </button>
                            <button data-id="'.$resultado[$i]["idCurso"].'" type="button" id="btn-eliminar" data-toggle="modal" data-target="#eliminarCurso" class="btn-eliminar" data-tipo="tooltip" data-placement="down" title="Eliminar">
                            <i class="far fa-trash-alt"></i>
                            </button></td>
                </tr>';
    }
    
    echo ' </tbody></table>';

?>