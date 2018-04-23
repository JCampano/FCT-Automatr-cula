<?php
session_start();

$_SESSION["login"]="Hola";
if(!ISSET($_SESSION["login"])){
    header('Location: ./login.php');
}


?>