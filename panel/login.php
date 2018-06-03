<?php
  session_start();
  if(isset($_SESSION["login"])){
    header("location: index.php");
  }

?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
     <link rel="stylesheet" href="css/csslogin.css">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>MatriculaT! | Acceso - IES Hnos. Machado</title>
  </head>
  <body>
    <div class="text-center" style="margin-top:30px;"><img class="mb-4" src="img/logo.png" alt=""></div>
  
    <form class="form-signin text-center" method="post" action="php/login.php">
          <?php
            extract($_GET);


            if(isset($error)){

              if($error==1){
                echo '<div class="alert alert-danger alert-dismissable">
                 Los datos introducidos no son válidos</div>';

              } 
              if($error==2) {
                echo '<div class="alert alert-danger alert-dismissable">
                  Debe estar logueado para acceder </div>';
              }

            }

            
          ?>
          <h1 class="h3 mb-3 font-weight-normal">Iniciar sesión</h1>
          <label for="dni" class="sr-only">DNI</label>
          <input id="dni" name="dni" class="form-control" placeholder="DNI" required autofocus="">
          <label for="pass" class="sr-only">Contraseña</label>
          <input id="pass" name="pass" class="form-control" placeholder="Contraseña" required="" type="password">
          <div style="margin-top:30px;" class="checkbox mb-3">
            <label>
              <input value="remember-me" type="checkbox"> Recuérdame
            </label>
          </div>
          <button class="btn btn-lg btn-primary btn-block" type="submit">Acceder</button>
         
        </form>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>

