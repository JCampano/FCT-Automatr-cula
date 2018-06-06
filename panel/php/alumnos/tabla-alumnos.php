<?php
    include "../functions.php";
    $resultado = ejecutaConsultaArray("SELECT id, dni, nie, nombre, apellido1, apellido2 from alumnos order by id");
    echo ' <table id="tabla-alumnos" class="table table-striped table-hover">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th>ID</th>
                                            <th>DNI</th>
                                            <th>NIE</th>
                                            <th>Nombre</th>
                                            <th>Apellidos</th>
                                            <th>Acción</th>
                                        </tr>
                                    </thead>
                                    <tbody>';
    for($i=0;$i<count($resultado);$i++){
  
        echo '  <tr>
                    <td width="50">'.$resultado[$i]["id"].'</td>
                    <td width="50">'.$resultado[$i]["dni"].'</td>
                    <td width="50">'.$resultado[$i]["nie"].'</td>
                    <td>'.$resultado[$i]["nombre"].'</td>
                    <td>'.$resultado[$i]["apellido1"].' '.$resultado[$i]["apellido2"].'</td>
                    <td width="100"><button style="margin-right:10px;" class="btn-editar" data-id="'.$resultado[$i]["id"].'" type="button" data-toggle="modal" data-target="#editarAlumno"  data-tipo="tooltip" data-placement="down" title="Editar">
                            <i class="fas fa-pencil-alt"></i>
                            </button>
                            <button data-id="'.$resultado[$i]["id"].'" type="button" data-toggle="modal" data-target="#eliminarAlumno" class="btn-eliminar" data-tipo="tooltip" data-placement="down" title="Eliminar">
                            <i class="far fa-trash-alt"></i>
                            </button></td>
                </tr>';
    }
    
    echo ' </tbody></table>';

?>