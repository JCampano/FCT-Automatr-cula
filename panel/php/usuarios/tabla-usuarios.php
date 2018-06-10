<?php
    include "../functions.php";
    $resultado = ejecutaConsultaArray("SELECT id, dni, nombre, apellidos, telefono, tipo from personal order by id");
    echo ' <table id="tabla-usuarios" class="table table-hover">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th>ID</th>
                                            <th>DNI</th>
                                            <th>Nombre</th>
                                     
                                            <th>Teléfono</th>
                                            <th>Tipo</th>
                                            <th>Acción</th>
                                        </tr>
                                    </thead>
                                    <tbody>';
    for($i=0;$i<count($resultado);$i++){
        if($resultado[$i]["tipo"]=="administrador"){
            $rol='<span class="badge badge-primary"><i class="fa fa-fw fa-cogs"></i>Administrador</span>';
        }
        if($resultado[$i]["tipo"]=="gestor"){
            $rol='<span class="badge badge-success"><i class="fa fa-fw fa-cogs"></i>Gestor</span>';
        }
        if($resultado[$i]["tipo"]=="administrativo"){
            $rol='<span class="badge badge-danger"><i class="fa fa-fw fa-cogs"></i>Administrativo</span>';
        }

        echo '  <tr>
                    <td width="50">'.$resultado[$i]["id"].'</td>
                    <td>'.$resultado[$i]["dni"].'</td>
                    <td>'.$resultado[$i]["nombre"].' '.$resultado[$i]["apellidos"].'</td>
                    
                    <td>'.$resultado[$i]["telefono"].'</td>
                    <td>'.$rol.'</td>
                    <td width="100"><button style="margin-right:10px;" class="btn-editar" data-id="'.$resultado[$i]["id"].'" type="button" data-toggle="modal" data-target="#editarUsuario"  data-tipo="tooltip" data-placement="down" title="Editar">
                            <i class="fas fa-pencil-alt"></i>
                            </button>
                            <button data-id="'.$resultado[$i]["id"].'" type="button" data-toggle="modal" data-target="#eliminarUsuario" class="btn-eliminar" data-tipo="tooltip" data-placement="down" title="Eliminar">
                            <i class="far fa-trash-alt"></i>
                            </button></td>
                </tr>';
    }
    
    echo ' </tbody></table>';

?>