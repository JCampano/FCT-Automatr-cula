<?php
    include "header.php";       
?>

<div class="container-fluid margen-arriba">   
    <div class="jumbotron fondo-azul-jumbotron">
      <div class="container">        
        <p class="lead">Bienvenido a la sección de ayuda / documentacion del IES Hnos. Machado. Desde aquí, podrás obtener la ayuda que necesites y consultar toda la documentación referente al centro</p>
      </div>
    </div>
    <div class="container-fluid">
    <div class="row" id="ayudaYdocumentacion">             
        <div class="col-sm-3">
            <a class="s-menu" href="#" id="btnAyuda">
            <div class="card">
                <div class="imagenes-inicio imagen-ayuda "></div>
                <div class="card-body">
                  <h5 class="card-title">Ayuda</h5>
                  
                  
                </div>
            </div>    
            </a>
            <br>
        
            <a href="#" id="btnDocumentacion">
            <div class="card">
                <div class="imagenes-inicio imagen-gestion"></div>
                <div class="card-body">
                  <h5 class="card-title">Documentación</h5>
                  
                  
                </div>
            </div>    
            </a>
            <br>
            
            <a class="s-menu" href="index.php">
            <div class="card">
                <div class="imagenes-inicio imagen-ayuda "></div>
                <div class="card-body">
                  <h5 class="card-title">Inicio</h5>
                  
                  
                </div>
            </div>    
            </a>
        </div>

        <div class="col-sm-9">
            <div class="container" id="ayuda">
              <ul>
                <li>
                  <a data-toggle="collapse" href="#matricularnos" role="button" aria-expanded="false" aria-controls="matricularnos">Como matricularnos mediante la aplicación</a>
                </li>     
                     <div class="collapse" id="matricularnos" style="padding-bottom: 30px">
                      <div class="card card-body">
                        <p><strong>En esta sección te explicaremos como hacer tu matrícula mediante esta aplicación</strong></p>
                        <p>
                          <strong>Paso 1º :</strong> Seleccionamos la opcion de <a href="registro-matricula.php" target="blank">Generar matricula</a>.
                          Esta operación puede generarte 2 resultados:
                          <ol>
                            <li>Llevarte al formulario para registrar la matricula</li>
                            <li>Generar un un error que visualizaras en color amarillo, este mensaje te advierte de que ya tienes una matricula generada y a consecuencia solo podrás editar la matricula o eliminarla</li>
                            <li>Generar un error que visualizaras en color rojo,este mensaje te advierte que ya generaste y finalizaste una matrícula,de querer seguir haciendo una gestion en torno a la matrícula deberá acudir al centro</li>
                          </ol>
                        </p>
                        <p>
                           <a data-toggle="collapse" href="#ayudaGenerarMatricula" role="button" aria-expanded="false" aria-controls="ayudaGenerarMatricula">Ayuda de como generar la Matricula</a>
                           <div class="collapse" id="ayudaGenerarMatricula">
                            <div class="card card-body">
                              <p>
                                Al hacer click en la opción de <a href="registro-matricula.php" target="blank">Generar matricula</a> nos encontraremos ante un formulario  con todos los campos de datos del usuario y familiares rellenos, si el usuario viera algun error en dichos campos puede solucionarlo desde la opción de cambio de datos que se encuentra dentro del <a href="perfil-alumno.php" target="blank">Perfil de Usuario</a> o bien contactando con el centro para que cambien los datos erroneos.
                              </p>
                              <p>
                                Dentro del formulario de registro de la matrícula, al comprobar que todos los datos son correctos , el usuario debe bajar hasta el final de formulario donde se encontrará con un desplegable que le pedirá que seleccione una enseñanza.
                              </p>
                              <p>
                                Cuando el usuario seleccione una enseñanza, aparecerá otro desplegable con los cursos disponibles para esa enseñanza, una vez seleccionado el curso aparecera un desplegable con las ramas de ese curso y otro con las optativas que el usuario puede elegir en ese curso.
                              </p>
                              <p>
                                Las optativas se elegiran por orden de preferencia y el usuario podrá selecionar hasta 4 optativas ( mínimo 1)
                              </p>
                            </div>
                          </div>
                        </p>            

                        <p><strong>Paso 2º :</strong> Subimos la foto de la matricula.<p>
                        <p>
                          Accedemos a los datos del perfil de usuario, ( se accede seleccionando la opción de <a href="perfil-alumno.php" target="blank">Mis datos</a> ) situada en la esquina superior derecha , en el desplegable del usuario.
                        </p>
                        <p>
                          Dentro de los datos de perfil de usuario seleccionamos la opcion de <strong>Cambiar Foto Personal</strong> y seleccionamos la foto deseada para la matrícula.
                        </p>
                        <p>
                          Si el usuario ya hubiera finalizado la matrícula, te mostrara un mensaje de error en amarillo, el cual te advierte de que no puedes subir una foto dado que tu matrícula se encuentra finalizada.
                        </p>

                        <p><strong>Paso 3º :</strong> Finalizamos la Matrícula</p>
                        <p>
                          En la opcion de <a href="gestion-matriculas.php" target="blank">Gestionar Matrícula</a> vemos un desplegable con las opciones de la matrícula, en el seleccionamos la opción de finalizar matrícula.
                        </p>

                        <p><strong>Paso 4º :</strong> Imprimimos la Matrícula</p>
                        <p>
                          En la opcion de <a href="gestion-matriculas.php" target="blank">Gestionar Matrícula</a> vemos un desplegable con las opciones de la matrícula, en el seleccionamos la opción de imprimir matrícula.<strong> La matrícula impresa se debe presentar en el centro. </strong>
                        </p>
                      </div>
                    </div>
                <li>
                  <a data-toggle="collapse" href="#editarMatricula" role="button" aria-expanded="false" aria-controls="editarMatricula">Como editar nuestra matricula</a>
                </li>
                    <div class="collapse" id="editarMatricula" style="padding-bottom: 30px">
                      <div class="card card-body">
                        <p>
                          Desde la página de inicio seleccionamos la opción de <a href="gestion-matriculas.php" target="blank">Gestionar Matrícula </a> 
                        </p>
                        <p>
                          En la página de gestion de matrículas selecionamos la opción de editar. Pueden darse los siguientes casos:
                          <ol>
                            <li>
                              Esta opción nos llevará a un formulario con nuestra matrícula ya rellena donde podremos cambiar los datos referentes a la enseñanza, curso , itinerario y optativas elegidas.
                            </li>
                            <li>
                              Nos mandará a la página de inicio mostrandonos un mensaje de error en color rojo que nos comunica que no podemos editar una matrícula finalizada.
                            </li>                            
                        </p>

                      </div>
                    </div>
                <li>
                  <a data-toggle="collapse" href="#fotoMatricula" role="button" aria-expanded="false" aria-controls="fotoMatricula">Como subir una foto para la matricula</a>
                </li>
                    <div class="collapse" id="fotoMatricula" style="padding-bottom: 30px">
                      <div class="card card-body">
                        <p>
                          Selecionamos la opción de <a href="perfil-alumno.php" target="blank">Mis datos</a> situada en el desplegable del alumno en la parte superior derecha de la página ( excepto en los formularios matrícula ).
                        </p>
                        <p>
                          Pulsamos el boton de Cambiar Foto Personal y subimos la foto que se enviara con la matrícula.
                        <p>
                      </div>
                    </div>

                <li>
                  <a data-toggle="collapse" href="#eliminarMatricula" role="button" aria-expanded="false" aria-controls="eliminarMatricula">Como eliminar la matricula</a>
                </li>
                    <div class="collapse" id="eliminarMatricula" style="padding-bottom: 30px">
                      <div class="card card-body">
                          <p>
                          Desde la página de inicio seleccionamos la opción de <a href="gestion-matriculas.php" target="blank">Gestionar Matrícula </a> 
                        </p>
                        <p>
                          En la página de gestion de matrículas selecionamos la opción de eliminar. Pueden darse los siguientes casos:
                          <ol>
                            <li>
                             Eliminará la matricula.
                            </li>
                            <li>
                              Nos mandará a la página de inicio mostrandonos un mensaje de error en color rojo que nos comunica que no podemos eliminar una matrícula finalizada.
                            </li>                            
                        </p>
                      </div>
                    </div>             
            </div>
            <div class="container" id="documentacion" style="display:none">
              Documentación
             
            </div>
        </div>

    </div>
</div>  
</div>



<script type="text/javascript">
    var ayuda = document.getElementById('ayuda');
    var documentacion = document.getElementById('documentacion');

    document.getElementById('btnAyuda').addEventListener("click",mostrarAyuda,false);
    document.getElementById('btnDocumentacion').addEventListener("click",mostrarDocumentacion,false);



    function ocultarTodo(){      
      ayuda.style.display = "none"; 
      documentacion.style.display = "none";   
    }     

    function mostrarAyuda(){
      ocultarTodo();
      ayuda.style.display ="block";
    }

    function mostrarDocumentacion(){
      ocultarTodo();
      documentacion.style.display ="block";
    }

</script>
 <?php
    include "footer.php";
?>
