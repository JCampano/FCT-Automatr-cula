<?php
include "functions.php";

extract($_POST);

$resultado = ejecutaConsultaArray("SELECT * from $tabla");

echo json_encode($resultado);


?>