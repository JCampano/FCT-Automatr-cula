<?php

function connectDB()
{
    try
    {
       $opc=array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8");
        $dsn="mysql:host=localhost;dbname=automatricula";
        $usuario="root";
        $contrasena="";
        $base=new PDO($dsn,$usuario,$contrasena,$opc);
    }
    catch (PDOException $e)
    {
        die ("Error".$e->getMessage());
        $resultado=null;
    }
    return $base;
}

function ejecutaConsulta($sql)
{
		//recibe una cadena conteniendo una instruccion SELECT y devuelve un resultset

		$miconexion=connectDB();
		return $miconexion->query($sql);

}

function ejecutaConsulta2($sql)
{
		//recibe una cadena conteniendo una instruccion SELECT y devuelve el numero de filas de una select

		$miconexion=connectDB();
		$resultset= $miconexion->query($sql);
		return $resultset->fetchColumn();

}
function ejecutaConsultaArray($sql)
{

		//recibe una cadena conteniendo una instruccion SELECT y devuelve un array con la fila de datos
		$datos=[];
		$resultset=ejecutaConsulta($sql);
		while($fila=$resultset->fetch(PDO::FETCH_ASSOC))
		{
			$datos[]=$fila;
		}
		return $datos;


}
function ejecutaConsultaAccion($sql)
{
		/*recibe una cadena conteniendo una instruccion DML, la ejecuta y
		devuelve el nº de filas afectadas por dicha instruccion*/
		$miconexion=connectDB();
		$accion = $miconexion->prepare($sql);
		$accion->execute();
		return $accion->rowCount();
		//return "1";
}



function devuelveTablaAlumnos(){
    $resultado = ejecutaConsultaArray("SELECT dni, nombre, `apellido 1` as apellido1, `apellido 2` as apellido2 from alumnos");
    echo ' <table id="tabla-alumnos" class="table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>Nº</th>
                                            <th>DNI</th>
                                            <th>Nombre</th>
                                            <th>Apellidos</th>
                                            <th>Acción</th>
                                        </tr>
                                    </thead>
                                    <tbody>';
    for($i=0;$i<count($resultado);$i++){
        $numero=$i+1;
        echo '  <tr>
                    <td width="50">'.$numero.'</td>
                    <td>'.$resultado[$i]["dni"].'</td>
                    <td>'.$resultado[$i]["nombre"].'</td>
                    <td>'.$resultado[$i]["apellido1"].' '.$resultado[$i]["apellido2"].'</td>
                    <td width="100"><button style="margin-right:10px;" class="btn-editar-alumno btn btn-success" data-dni="'.$resultado[$i]["dni"].'" type="button" data-toggle="modal" data-target="#editarAlumno" class="btn btn-success"> <i class="fas fa-pencil-alt"></i></button><button data-dni="'.$resultado[$i]["dni"].'" type="button" data-toggle="modal" data-target="#eliminarAlumno" class="btn btn-danger btn-eliminar-alumno"><i class="far fa-trash-alt"></i></button></td>
                </tr>';
    }
    
    echo ' </tbody></table>';
    
}
/*function devuelveTablaAsignaturas(){
    $resultado = ejecutaConsultaArray("SELECT codigo,nombre, id_itinerario from asignaturas");
    echo ' <table id="tabla-asignaturas" class="table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>Nº</th>
                                            <th>Nombre Asignatura</th>
                                            <th>Curso</th>
                                            <th>Itinerario</th>
                                            <th>Acción</th>
                                        </tr>
                                    </thead>
                                    <tbody>';
    for($i=0;$i<count($resultado);$i++){
        $numero=$i+1;
        echo '  <tr>
                    <td width="50">'.$numero.'</td>
                    <td>'.$resultado[$i]["nombre"].'</td>
                    <td>'.$resultado[$i]["id_itinerario"].'</td>
                    <td>Itinerario</td>
                    <td width="100"><button style="margin-right:10px;" class="btn-editar-asignatura btn btn-success" data-cod="'.$resultado[$i]["codigo"].'" type="button" data-toggle="modal" data-target="#editarAsignatura" class="btn btn-success"> <i class="fas fa-pencil-alt"></i></button><button data-cod="'.$resultado[$i]["codigo"].'" type="button" data-toggle="modal" data-target="#eliminarAsignatura" class="btn btn-danger btn-eliminar-asignatura"><i class="far fa-trash-alt"></i></button></td>
                </tr>';
    }
    
    echo ' </tbody></table>';
}
    
*/
function comprobarDatos($tabla){

    $resultado = ejecutaConsultaArray("SELECT * from $tabla");
    if (count($resultado)==0){
        return false ; // CAMBIAR A FALSE!!!
     } else {
        return true;
    }
    
}




/*function devuelveTablaEnsenanzas(){
    $resultado = ejecutaConsultaArray("SELECT id,   nombre from enseñanzas");
    echo ' <table id="tabla-asignaturas" class="table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>Nº</th>
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
    
}*/


function devuelveUltimosAlumnos(){

    $resultado = ejecutaConsultaArray("SELECT nombre, apellido1, apellido2 from alumnos ORDER BY id DESC ");

    for ($i=0;$i<count($resultado);$i++){
       echo '<div class="list-group-item list-group-item-action">
                   <div class="media">
                     <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/45x45" alt="">
                     <div class="media-body">
                       <strong>'.$resultado[$i]["nombre"].' '.$resultado[$i]["apellido1"].' '.$resultado[$i]["apellido2"].'</strong> se ha registrado.
                       <div class="text-muted smaller">Hoy a las 5:43 PM</div>
                     </div>
                   </div>
                 </div>'; 
    }
   
}


function devuelveItinerarios(){

    $enseñanzas = ejecutaConsultaArray("SELECT id, nombre from enseñanzas");
    if (count($enseñanzas)!=0){
        for ($i=0;$i<count($enseñanzas);$i++){
            $cursos = ejecutaConsultaArray("SELECT id,nombre from cursos where id_enseñanza =".$enseñanzas[$i]["id"]);
            echo '<option selected value="nulo"><b>'.$enseñanzas[$i]["nombre"].'</b></option>';

            if(count($cursos)!=0){
                for ($k=0;$k<count($cursos);$k++){
                    $bloques = ejecutaConsultaArray("SELECT id,nombre from grupo_optativas where id_curso =".$cursos[$k]["id"]);
                    echo '<option selected value="nulo">'."&nbsp;&nbsp;".$cursos[$k]["nombre"].'</option>';

                    if(count($bloques)!=0){
                      for ($m=0;$m<count($cursos);$m++){
                          echo '        <option selected value="nulo">'."&nbsp;&nbsp;"."&nbsp;&nbsp;".$bloques[$m]["nombre"].'</option>';

                          

                      }  
                  } else {
                    echo '<option selected value="nulo">No hay Bloques disponibles...</option>';
                  }
                    
                    

                }
            } else {
                echo '<option selected value="nulo">No hay Cursos disponibles...</option>';
            }
            


        }
    }else {
        echo '<option selected value="nulo">No hay Itinerarios disponibles...</option>';
    }
   

    
}


?>