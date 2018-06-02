<?php
    include "../functions.php";
    $resultado = ejecutaConsultaArray("SELECT id,   nombre from enseñanzas order by id");
    echo ' <table id="tabla-asignaturas" class="table table-striped table-hover">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th>ID</th>
                                            <th>Nombre Ensenanza</th>
                                            <th>Acción</th>
                                        </tr>
                                    </thead>
                                    <tbody>';
    for($i=0;$i<count($resultado);$i++){
        $numero=$i+1;
        echo '  <tr>
                    <td width="50">'.$numero.'</td>
                    <td>'.$resultado[$i]["nombre"].'</td>
                    <td width="100"><button style="margin-right:10px;" class="btn-editar-ensenanza btn btn-success" data-id="'.$resultado[$i]["id"].'" type="button" data-toggle="modal" data-target="#editarEnsenanza" class="btn btn-success">
                            <i class="fas fa-pencil-alt"></i>
                            </button>
                            <button data-id="'.$resultado[$i]["id"].'" type="button" data-toggle="modal" data-target="#eliminarEnsenanza" class="btn btn-danger btn-eliminar-ensenanza">
                            <i class="far fa-trash-alt"></i>
                            </button></td>
                </tr>';
    }
    
    echo ' </tbody></table>';

?>