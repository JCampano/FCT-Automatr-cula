<?php	
    include "header.php";
    $_SESSION['ruta']= "registro-matricula.php";
    include "php/gestionlogin.php";
?>

<div class="container">
        
    
    <div class="card">
  <div class="card-header">
    <h3>Registrar Matrícula</h3>
  </div>
  <div class="card-body">
    <form>
        <div class="row">
            <div class="col-sm-6">
                   <div class="form-group">
                        <label for="exampleInputEmail1">Nombre</label>
                       <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Introduce tu nombre">
                </div>
                       <div class="row">
                        <div class="col-sm-6">
                             <div class="form-group">
                                <label for="exampleInputEmail1">Apellido 1</label>
                       <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Introduce tu nombre">
                            </div>
                        </div>
                           <div class="col-sm-6">
                                <div class="form-group">
                               <label for="exampleInputEmail1">Apellido 2</label>
                       <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Introduce tu nombre"> 
                               </div>
                        </div>
                       </div>
                       
                       <div class="form-group">
                        <label for="exampleFormControlSelect1">Tipo de Documentación</label>
                        <select class="form-control" id="exampleFormControlSelect1">
                          <option>Elige el tipo</option>
                          <option>DNI</option>
                          <option>NIE</option>

                        </select>
                      </div>
                <div class="form-group">
                        <label for="exampleInputEmail1">Nº de Documento</label>
                       <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Introduce tu nombre">
                    <small id="emailHelp" class="form-text text-muted">Especificar formato</small>
 
                </div>
                 <div class="form-group">
                        <label for="exampleInputEmail1">Fecha de Nacimiento</label>
                       <input type="date" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Introduce tu nombre">
                </div>
                    </div>
            </div>
            <div class="col-sm-6">
                
            </div>
        </div>
    </form>
  </div>
</div>
    
   

    
</div>


<?php
    include "footer.php";
?>
