<?php
//variable de sesion para controlar si hay error o no en el registro
    include "header.php";       
    if(isset($_SESSION['sinLogin'])){
        echo '

            <script>
                function mostrarModal(){
                    document.getElementById("login").style.display = "block";
                    document.getElementById("login").style.background = "#2125297d";
                    document.getElementById("login").setAttribute("class","modal fade show");
                    var newDiv = document.createElement("div");
                    newDiv.setAttribute("class","alert alert-danger alert-dismissable"); 
                    var newContent = document.createTextNode("'.$_SESSION["mensajeRegistro"].'"); 
                    newDiv.appendChild(newContent);
                    document.getElementById("beforeFrm").appendChild(newDiv);                  
                }
                mostrarModal();                
            </script>';        
        unset($_SESSION['sinLogin']);
        unset($_SESSION['mensajeRegistro']);
        unset($_SESSION['tipoMensaje']);     
   }
   else{       
        if (isset($_SESSION['mensajeRegistro']) && isset($_SESSION['tipoMensaje']))  {
            echo '<div class="alert alert-'.$_SESSION['tipoMensaje'].' alert-dismissable">
              <button type="button" class="close" data-dismiss="alert">&times;</button>'.$_SESSION["mensajeRegistro"].'</div>';
            unset($_SESSION['mensajeRegistro']);
            unset($_SESSION['tipoMensaje']);
       }
    }

?>

<div class="container-fluid">
    
    <div class="jumbotron margen-arriba">
      <div class="container">
        <h1 class="display-4">MatriculaT</h1>
        <p class="lead">Bienvenido al gestor de matrículas del IES Hnos. Machado. Desde aquí, podrás gestionar las matrículas que posteriormente debes entregar en el centro.</p>
      </div>
    </div>
    <div class="row">
        <div class="col-sm-4">
            <a href="registro-matricula.php">
            <div class="card">
                <img class="card-img-top" width="100" height="150" src="img/gris.png" alt="Card image cap">
                <div class="card-body">
                  <h5 class="card-title">Registrar matrícula</h5>
                  
                  
                </div>
            </div>
            </a>
        </div>
        <div class="col-sm-4">
            <a href="#">
            <div class="card">
                <img class="card-img-top" width="100" height="150" src="img/gris.png" alt="Card image cap">
                <div class="card-body">
                  <h5 class="card-title">Gestionar mis matrícula</h5>
                  
                  
                </div>
            </div>    
            </a>
        </div>
        <div class="col-sm-4">
            <a href="#">
            <div class="card">
                <img class="card-img-top" width="100" height="150" src="img/gris.png" alt="Card image cap">
                <div class="card-body">
                  <h5 class="card-title">Ayuda y Documentación</h5>
                  
                  
                </div>
            </div>    
            </a>
        </div>
    </div>
</div>




 <?php
    include "footer.php";
?>
