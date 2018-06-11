<?php
    include "header.php";
    include "php/gestionlogin.php";
?>

<div class="container">
        
    <div class="jumbotron">
      
      <p class="lead">Aquí puedes gestionar las matrículas que has creado, además de guardarla e imprimirla en formato PDF.</p>
      
    </div>
    <div class="card">
      <div class="card-header">
        Lista de matrículas registradas
      </div>
      <div class="card-body">
        <table class="table table-striped table-hover">
      <thead>
        <tr>
          <th scope="col">Nº</th>
          <th scope="col">Código</th>
          <th scope="col">Nombre</th>
          <th scope="col">Fecha</th>
          <th scope="col">Acción</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <th scope="row">1</th>
          
          <td>MAT61195</td>
          <td>Paco Pérez García</td>
          <td>10/09/2018</td>
          <td>
            
            <div class="btn-group">
              <button type="button" class="btn btn-secondary">Editar</button>
              <button type="button" class="btn btn-secondary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="sr-only">Editar</span>
              </button>
              <div class="dropdown-menu">
                <a class="dropdown-item" href="#">Imprimir</a> 
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">Eliminar</a>
              </div>
            </div>
         </td>
        </tr>
        
      </tbody>
    </table>
      </div>
    </div>

    
</div>


<?php
    include "footer.php";
?>