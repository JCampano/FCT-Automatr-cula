<?php
session_start();

if(!ISSET($_SESSION["login"])){
    header('Location: ./login.php');
}


?>