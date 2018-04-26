<?php
session_start();
?>
<!doctype html>
<html lang="es">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
      
      <!-- CSS Personalizado -->
       <link rel="stylesheet" href="css/style.css">

    <title>Automatrícula</title>
  </head>
  <body>
              <!-- Modal -->
        <div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Iniciar sesión</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <?php 
                    include "php/form-login.php";
                  ?>
              </div>
              
            </div>
          </div>
        </div>

        <div class="modal fade" id="registro" tabindex="-1" role="dialog" aria-labelledby="modalFrmRegistro" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="modalFrmRegistro">Registro</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <?php 
                    include "php/form-registro.php";
                  ?>
              </div>
              
            </div>
          </div>
        </div>
      <nav class="navbar navbar-light bg-light">
        <?php 
          
            if(isset($_SESSION['login'])){
                ?>
          ¡Bienvenido! <?php echo $_SESSION['usuario']; ?>
          <div class="text-right"><span class="navbar-text">
          <?php
          echo '<a href="php/logout.php" id ="logout" name="logout">Cerrar Sesión</a>';
            }
          else {
                ?>
              Regístrese o acceda como usuario
              <div class="text-right"><span class="navbar-text">
                <?php
                echo '<a href="#" data-toggle="modal" id ="btnRegistro" data-target="#registro">Registro</a> | <a href="#" data-toggle="modal" id ="btnLogin" data-target="#login">Iniciar Sesión</a>';
            }
                
           
                    
                    
        ?>
        </span></div>
        </nav>
      
