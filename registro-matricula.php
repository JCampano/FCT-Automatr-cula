<?php	
    include "header.php";
    $_SESSION['ruta']= "registro-matricula.php";
    include "php/gestionlogin.php";
?>
<div class="fondo padding-arriba">
  <div class="container">
          
      
      <div class="card">
    <div class="card-header">
      <h3>Registrar Matrícula</h3>
    </div>
    <div class="card-body">
      <form>
          <div class="row">
              <div class="col-sm-6">
                      <h4>Datos Personales</h4>
                     <div class="form-group">
                          <label for="registro-campo-nombre">Nombre</label>
                         <input type="text" class="form-control" id="registro-campo-nombre" aria-describedby="nombrePersona" placeholder="Introduce tu nombre">
                  </div>
                         <div class="row">
                          <div class="col-sm-6">
                               <div class="form-group">
                                  <label for="exampleInputEmail1">Apellido 1</label>
                         <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Introduce tu primer apellido">
                              </div>
                          </div>
                             <div class="col-sm-6">
                                  <div class="form-group">
                                 <label for="exampleInputEmail1">Apellido 2</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Introduce tu segundo apellido"> 
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
                         <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Introduce tu número de Documentación">
                   
   
                       </div>
                       <div class="form-group">
                              <label for="exampleInputEmail1">Fecha de Nacimiento</label>
                             <input type="date" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Introduce tu nombre">
                      </div>

                        <div class="form-group">
                           <label for="exampleInputEmail1">Dirección</label>
                           <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Introduce tu dirección"> 
                        </div>
                         <div class="form-group">
                           <label for="exampleInputEmail1">Población</label>
                           <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Introduce tu población"> 
                        </div>
                         <div class="form-group">
                           <label for="exampleInputEmail1">Provincia</label>
                           <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Introduce tu provincia"> 
                        </div>
                         <div class="form-group">
                           <label for="exampleInputEmail1">Código Postal</label>
                           <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Introduce tu C.P."> 
                        </div>
                         <div class="form-group">
                           <label for="exampleInputEmail1">Teléfono Fijo</label>
                           <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Introduce tu teléfono fijo"> 
                        </div>
                         <div class="form-group">
                           <label for="exampleInputEmail1">Teléfono Móvil</label>
                           <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Introduce tu teléfono móvil"> 
                        </div>
                        <div class="form-group">
                           <label for="exampleInputEmail1">Correo Electrónico</label>
                           <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Introduce tu correo electrónico"> 
                        </div>

                 

              </div>
              <div class="col-sm-6">
                  <h4>Datos Familiares</h4>
                  <div class="form-group">
                           <label for="exampleInputEmail1">Nombre Padre</label>
                           <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Introduce el nombre del Padre"> 
                  </div>
                   <div class="form-group">
                           <label for="exampleInputEmail1">Apellidos Padre</label>
                           <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Introduce los apellidos del Padre"> 
                  </div>
                   <div class="form-group">
                           <label for="exampleInputEmail1">Teléfono Padre</label>
                           <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Introduce el teléfono del Padre"> 
                  </div>

                   <div class="form-group">
                           <label for="exampleInputEmail1">Correo Electrónico Padre</label>
                           <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Introduce el correo electrónico del Padre"> 
                  </div>
                  <div class="form-group">
                           <label for="exampleInputEmail1">Nombre Madre</label>
                           <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Introduce el nombre de la Madre"> 
                  </div>
                   <div class="form-group">
                           <label for="exampleInputEmail1">Apellidos Madre</label>
                           <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Introduce los apellidos de la Madre"> 
                  </div>
                   <div class="form-group">
                           <label for="exampleInputEmail1">Teléfono Madre</label>
                           <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Introduce el teléfono de la Madre"> 
                  </div>
                   <div class="form-group">
                           <label for="exampleInputEmail1">Correo Electrónico Madre</label>
                           <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Introduce el correo electrónico de la Madre"> 
                  </div>
              </div>


          </div>
           <div class="row">
                <div class="col-sm-12"> 
                  <h4>Datos académicos</h4>
                 

                 <div class="card">
                   <div class="card-body">
                     <h5 class="card-title">Elige el tipo de Enseñanza</h5>
                     <h6 class="card-subtitle mb-2 text-muted">para el que deseas matricularte</h6>
                     <div class="btn-group btn-group-toggle" data-toggle="buttons">
                       <label class="btn btn-secondary active">
                         <input type="radio" name="options" id="option1" autocomplete="off" checked> Bachillerato
                       </label>
                       <label class="btn btn-secondary">
                         <input type="radio" name="options" id="option2" autocomplete="off"> Educación Secundaria
                       </label>
                       <label class="btn btn-secondary">
                         <input type="radio" name="options" id="option3" autocomplete="off"> Ciclo Formativo
                       </label>
                     </div>
                   </div>
                 </div>

                 
                </div>
              </div>
      </form>
    </div>
  </div>
      
     

      
  </div>

</div>
<?php
    include "footer.php";
?>
