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
    $resultado = ejecutaConsultaArray("SELECT dni, nombre, apellidos from alumnos");
    echo ' <table class="table table-striped table-hover">
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
                    <td>'.$numero.'</td>
                    <td>'.$resultado[$i]["dni"].'</td>
                    <td>'.$resultado[$i]["nombre"].'</td>
                    <td>'.$resultado[$i]["apellidos"].'</td>
                    <td><button class="btn-editar btn btn-success" data-dni="'.$resultado[$i]["dni"].'" type="button" data-toggle="modal" data-target="#editarAlumno" class="btn btn-success">editar</button><button type="button" class="btn btn-danger">x</button></td>
                </tr>';
    }
    
    echo ' </tbody></table>';
    
}
?>
