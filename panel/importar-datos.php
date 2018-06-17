<?php
require_once("php/permisos.php");

if(!comprobarLogin("gestor")){

  header("location: index.php?e=1");
}

include "header.php";



  ?>

<?php


include "footer.php";
?>
