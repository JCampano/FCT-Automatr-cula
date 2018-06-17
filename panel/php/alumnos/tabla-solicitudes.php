<?php
    include "../functions.php";
    $resultado = ejecutaConsultaArray("SELECT id, dni, nombre, apellido1, apellido2 from alumnos where cambio_datos is not null order by id");
    echo ' <table id="tabla-alumnos" class="table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>DNI</th>
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

                    <td>'.$resultado[$i]["nombre"].'</td>
                    <td>'.$resultado[$i]["apellido1"].' '.$resultado[$i]["apellido2"].'</td>
                    <td width="100"><button style="margin-right:10px;" class="boton-ver btn btn-info" data-id="'.$resultado[$i]["id"].'" type="button" data-toggle="modal" data-target="#editarAlumno"  data-tipo="tooltip" data-placement="down" title="Pulsa para mostrar todos los cambios solicitados">
                            <i class="fas fa-pencil-alt"></i> Mostrar Cambios
                            </button>
                         </td>
                </tr>';
    }
    
    echo ' </tbody></table>';

?>