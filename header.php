<?php
session_start();
if(ISSET($_SESSION["role"])){
      session_destroy();
      header("Location: login.php");
    }
?>
<!doctype html>
<html lang="es">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- ICONOS -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <script  src="https://code.jquery.com/jquery-3.3.1.min.js"  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="crossorigin="anonymous"></script>
      
      <!-- CSS Personalizado -->
       <link rel="stylesheet" href="css/style.css">
      <link rel="icon" type="image/png" href="img/favicon.png" /> 
    <title>MatriculaT!</title>
  </head>
  <body>
    <?php
         # Modal
        if(!isset($_SESSION['login'])){
        echo '<div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="modal-login" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Iniciar sesión</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" aria-hidden="true">&times;
                </button>
              </div>
              <div class="modal-body">';
                
                    include "php/form-login.php";                
             echo ' </div>
              
            </div>
          </div>
        </div>

        <div class="modal fade" id="registro" tabindex="-1" role="dialog" aria-labelledby="modal-registro" aria-hidden="true">
          <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="modalFrmRegistro">Registro</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
               ';
                    include "php/form-registro.php";
                 
             echo ' </div>
              
            </div>
          </div>
        </div>';}
        ?>
      <nav class="navbar fixed-top navbar-light bg-light">
       <a class="navbar-brand" href="index.php"><img src="img/logo.png"</a>
        <?php 
          
            if(isset($_SESSION['login'])){
                ?>
          
          <div class="text-right"><span class="navbar-text">

            <div class="dropdown">
              <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-user"></i> <?php echo $_SESSION['usuario']; ?>
              </a>

              <div class="dropdown-menu" style="left:-70px;"aria-labelledby="dropdownMenuLink">
                <a class="dropdown-item" href="perfil-alumno.php"><i class="fa fa-cog"></i> Mis datos</a>
             
                <a class="dropdown-item" href="php/logout.php" id ="logout" name="logout"><i class="fa fa-sign-out-alt"></i> Cerrar Sesión</a>
              </div>
            </div>

          <?php
          echo '';
            }
          else {
                ?>
             
              <div class="text-right"><span class="navbar-text">
                <?php
                echo '<a href="#" data-toggle="modal" id ="btnRegistro" data-target="#registro">Registro</a> | <a href="#" data-toggle="modal" id ="btnLogin" data-target="#login">Iniciar Sesión</a>';
            }
                
           
                    
                    
        ?>
        </span></div>
        </nav>
      
