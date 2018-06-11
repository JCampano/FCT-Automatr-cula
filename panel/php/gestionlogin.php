<?php
ob_start();


if(!ISSET($_SESSION["login"]))
{
  
    header('Location: login.php?error=2');
}

ob_end_flush();
?>
