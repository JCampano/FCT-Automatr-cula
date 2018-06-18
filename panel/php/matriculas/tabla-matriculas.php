<?php
    require_once("../functions.php");

    extract($_POST);

    if($r=="s"){
        $resultado = ejecutaConsultaArray("select m.id as idMatricula, m.cod_matricula as codMatricula, m.fecha as fechaMatricula, a.nombre as nAlumno, a.apellido1 as a1Alumno, a.apellido2 as a2Alumno, a.dni as dniAlumno from matriculas_registradas mr inner join alumnos a, matriculas m where a.id = m.id_alumno and mr.id_matricula = m.id");
        echo ' <table id="tabla-matriculas" class="table table-hover">
                                        <thead class="thead-dark">
                                            <tr>
                                                <th>ID</th>
                                                <th>COD</th>
                                                <th>Fecha</th>
                                                <th>Nombre</th>
                                                <th>Apellidos</th>
                                                <th>DNI</th>
                                                <th>Acción</th>
                                            </tr>
                                        </thead>
                                        <tbody>';
        for($i=0;$i<count($resultado);$i++){
          
            echo '  <tr>
                        <td width="50">'.$resultado[$i]["idMatricula"].'</td>
                        <td>#'.$resultado[$i]["codMatricula"].'</td>
                        <td>'.$resultado[$i]["fechaMatricula"].'</td>
                        <td>'.$resultado[$i]["nAlumno"].'</td>
                        <td>'.$resultado[$i]["a1Alumno"].' '.$resultado[$i]["a2Alumno"].'</td>
                        <td>'.$resultado[$i]["dniAlumno"].'</td>
                        <td width="150"><button style="margin-right:10px;" class="btn-ver" data-id="'.$resultado[$i]["idMatricula"].'" type="button" data-toggle="modal" data-target="#verMatricula"  data-tipo="tooltip" data-placement="down" title="Ver información">
                                <i class="fas fa-file-alt"></i>
                                </button>
                                 <button data-id="'.$resultado[$i]["idMatricula"].'" type="button" data-toggle="modal" data-target="#desvincularMatricula" class="btn-desvincular" data-tipo="tooltip" data-placement="down" title="Anular Registro">
                                <i class="fas fa-times"></i>
                                </button>
                                <button data-id="'.$resultado[$i]["idMatricula"].'" type="button" data-toggle="modal" data-target="#eliminarMatricula" class="btn-eliminar" data-tipo="tooltip" data-placement="down" title="Eliminar">
                                <i class="far fa-trash-alt"></i>
                                </button>
                               </td>
                    </tr>';
        }
        
        echo ' </tbody></table>';
    } else {
        $resultado = ejecutaConsultaArray("select m.id as idMatricula, m.cod_matricula as codMatricula, m.fecha as fechaMatricula, a.nombre as nAlumno, a.apellido1 as a1Alumno, a.apellido2 as a2Alumno, a.dni as dniAlumno from matriculas m inner join alumnos a where a.id = m.id_alumno and Not m.id In (select id_matricula from matriculas_registradas) and finalizada=1");
        echo ' <table id="tabla-matriculas" class="table table-hover">
                                        <thead class="thead-dark">
                                            <tr>
                                                <th>ID</th>
                                                <th>COD</th>
                                                <th>Fecha</th>
                                                <th>Nombre</th>
                                                <th>Apellidos</th>
                                                <th>DNI</th>
                                                <th>Acción</th>
                                            </tr>
                                        </thead>
                                        <tbody>';
        for($i=0;$i<count($resultado);$i++){
          
            echo '  <tr>
                        <td width="50">'.$resultado[$i]["idMatricula"].'</td>
                        <td>#'.$resultado[$i]["codMatricula"].'</td>
                        <td>'.$resultado[$i]["fechaMatricula"].'</td>
                        <td>'.$resultado[$i]["nAlumno"].'</td>
                        <td>'.$resultado[$i]["a1Alumno"].' '.$resultado[$i]["a2Alumno"].'</td>
                        <td>'.$resultado[$i]["dniAlumno"].'</td>
                        <td width="100"><button style="margin-right:10px;" class="btn-editar" data-id="'.$resultado[$i]["idMatricula"].'" type="button" data-toggle="modal" data-target="#editarMatricula"  data-tipo="tooltip" data-placement="down" title="Editar">
                                <i class="fas fa-pencil-alt"></i>
                                </button>
                                <button data-id="'.$resultado[$i]["idMatricula"].'" type="button" data-toggle="modal" data-target="#eliminarMatricula" class="btn-eliminar" data-tipo="tooltip" data-placement="down" title="Eliminar">
                                <i class="far fa-trash-alt"></i>
                                </button></td>
                    </tr>';
        }
        
        echo ' </tbody></table>';
    }

    

?>