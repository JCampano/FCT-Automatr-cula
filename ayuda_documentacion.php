<?php
//variable de sesion para controlar si hay error o no en el registro
    include "header.php";       
    if(isset($_SESSION['sinLogin'])){
        echo '    
            <script>            
                $(document).ready(function()
         {
            $("#login").modal("show");
            var newDiv = document.createElement("div");
                    newDiv.setAttribute("class","alert alert-danger alert-dismissable"); 
                    var newContent = document.createTextNode("'.$_SESSION["mensajeRegistro"].'"); 
                    newDiv.appendChild(newContent);
                    document.getElementById("beforeFrm").appendChild(newDiv);   
         });   
                                   
                             
            </script>';        
        unset($_SESSION['sinLogin']);
        unset($_SESSION['mensajeRegistro']);
        unset($_SESSION['tipoMensaje']);     
   }
   else{ 
       if(isset($_SESSION['ruta'])){
            unset($_SESSION['ruta']);                     
        }
       
    }

?>

<div class="container-fluid margen-arriba">
    <?php
         if (isset($_SESSION['mensajeRegistro']) && isset($_SESSION['tipoMensaje']))  {
             echo '<div class="alert alert-'.$_SESSION['tipoMensaje'].' alert-dismissable ">
               <button type="button" class="close" data-dismiss="alert">&times;</button>'.$_SESSION["mensajeRegistro"].'</div>';
             unset($_SESSION['mensajeRegistro']);
             unset($_SESSION['tipoMensaje']);
        }
    ?>
    <div class="jumbotron fondo-azul-jumbotron">
      <div class="container">        
        <p class="lead">Bienvenido a la sección de ayuda / documentacion del IES Hnos. Machado. Desde aquí, podrás obtener la ayuda que necesites y consultar toda la documentación referente al centro</p>
      </div>
    </div>
    <div class="container" id="ayudaDocumentacion">
    <div class="row">
       <div class="col-sm-2"></div>           
        <div class="col-sm-4">
            <a class="s-menu" href="#">
            <div class="card">
                <div class="imagenes-inicio imagen-ayuda "></div>
                <div class="card-body">
                  <h5 class="card-title">Ayuda</h5>
                  
                  
                </div>
            </div>    
            </a>
        </div>
        <div class="col-sm-4">
            <a href="#">
            <div class="card">
                <div class="imagenes-inicio imagen-gestion"></div>
                <div class="card-body">
                  <h5 class="card-title">Documentación</h5>
                  
                  
                </div>
            </div>    
            </a>
        </div>
    </div>
</div>

<div class="container" id="ayuda">
  En esta sección te explicaremos como hacer tu matricula mediante esta aplicaíón

</div>
<div class="container" id="documentacion"></div>
</div>




 <?php
    include "footer.php";
?>