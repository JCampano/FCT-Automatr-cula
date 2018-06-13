<?php
    require_once("../functions.php");
    $resultado = ejecutaConsultaArray("select i.id as idOptativa, i.nombre as nOptativa, c.nombre as nCurso, e.nombre as nEnseñanza, b.nombre as nBloque from optativas i inner join grupo_optativas b, cursos c, enseñanzas e where i.id_grupo_optativas = b.id and b.id_curso = c.id and c.id_enseñanza = e.id");
    echo ' <table id="tabla-optativas" class="table table-striped table-hover">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th>ID</th>
                                            <th>Nombre</th>
                                            <th>Bloque</th>
                                            <th>Curso</th>

                                            <th>Acción</th>
                                        </tr>
                                    </thead>
                                    <tbody>';
    for($i=0;$i<count($resultado);$i++){

        echo '  <tr>
                    <td width="50">'.$resultado[$i]["idOptativa"].'</td>
                    <td>'.$resultado[$i]["nOptativa"].'</td>
                    <td>'.$resultado[$i]["nBloque"].'</td>
                    <td>'.$resultado[$i]["nCurso"].' '.$resultado[$i]["nEnseñanza"].'</td>
                    <td width="100"><button style="margin-right:10px;" class="btn-editar" id="btn-editar" data-id="'.$resultado[$i]["idOptativa"].'" type="button" data-toggle="modal" data-target="#editarOptativa" data-tipo="tooltip" data-placement="down" title="Editar">
                            <i class="fas fa-pencil-alt"></i>
                            </button>
                            <button data-id="'.$resultado[$i]["idOptativa"].'" type="button" id="btn-eliminar" data-toggle="modal" data-target="#eliminarOptativa" class="btn-eliminar" data-tipo="tooltip" data-placement="down" title="Eliminar">
                            <i class="far fa-trash-alt"></i>
                            </button></td>
                </tr>';
    }
    
    echo ' </tbody></table>';

?>