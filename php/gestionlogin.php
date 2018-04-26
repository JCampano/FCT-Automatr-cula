<?php
ob_start();
include "functions.php";


if(!ISSET($_SESSION["login"]))
{
    header('Location: login.php');
}

ob_end_flush();
?>
