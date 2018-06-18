<?php
    include "header.php";       
?>

<div class="container-fluid margen-arriba">   
    <div class="jumbotron fondo-azul-jumbotron">
      <div class="container">        
        <p class="lead">Bienvenido a la sección de ayuda / documentacion del IES Hnos. Machado. Desde aquí, podrás obtener la ayuda que necesites y consultar toda la documentación referente al centro</p>
      </div>
    </div>
    <div class="container">
          <h1>Preguntas Frecuentes</h1>
            <div id="accordion">
              <div class="card">
                <div class="card-header" id="headingOne">
                  <h5 class="mb-0">
                    <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                      ¿Cómo me matriculo mediante la aplicación?
                    </button>
                  </h5>
                </div>

                <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                  <div class="card-body">
                   
                                         <p><strong>En esta sección te explicaremos como hacer tu matrícula mediante esta aplicación</strong></p>
                                         <p>
                                           <strong>Paso 1º :</strong> Seleccionamos la opcion de <a href="registro-matricula.php" target="blank">Generar matricula</a>.
                                           Esta operación puede generarte 2 resultados:
                                           <ol>
                                             <li>Llevarte al formulario para registrar la matricula</li>
                                             <li>Generar un un error que visualizaras en color amarillo, este mensaje te advierte de que ya tienes una matricula generada y a consecuencia solo podrás editar la matricula o eliminarla</li>
                                               <div class="row">
                                                 <div class="col-xs-12">
                                                   <br><img src="img/ayuda_documentacion/error_usuario_ya_tiene_matricula.PNG" width="100%"><br>
                                                 </div>
                                               </div>
                                             <!--<li>Generar un error que visualizaras en color rojo,este mensaje te advierte que ya generaste y finalizaste una matrícula,de querer seguir haciendo una gestion en torno a la matrícula deberá acudir al centro</li>-->
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
                                               <div class="row">
                                                 <div class="col-xs-12">
                                                   <img src="img/ayuda_documentacion/seleccion_enseñanza.PNG" width="100%">
                                                 </div>
                                               </div><br>
                                               <p>
                                                 Cuando el usuario seleccione una enseñanza, aparecerá otro desplegable con los cursos disponibles para esa enseñanza, una vez seleccionado el curso aparecera un desplegable con las ramas de ese curso y otro con las optativas que el usuario puede elegir en ese curso.
                                               </p>
                                               <div class="row">
                                                 <div class="col-xs-12">
                                                   <img src="img/ayuda_documentacion/seleccion_curso.PNG" width="100%">
                                                 </div>
                                               </div><br>
                                               <p>
                                                 Las optativas se elegiran por orden de preferencia y el usuario podrá selecionar hasta 4 optativas ( mínimo 1)
                                               </p>
                                               <div class="row">
                                                 <div class="col-xs-12">
                                                   <img src="img/ayuda_documentacion/seleccion_itinerario_optativas.PNG" width="100%">
                                                 </div>
                                               </div><br>
                                             </div>
                                           </div>
                                         </p>            

                                         <p><strong>Paso 2º :</strong> Subimos la foto de la matricula.<p>
                                         <p>
                                           Accedemos a los datos del perfil de usuario, ( se accede seleccionando la opción de <a href="perfil-alumno.php" target="blank">Mis datos</a> ) situada en la esquina superior derecha , en el desplegable del usuario.
                                         </p>
                                         <div class="row">
                                           <div class="col-xs-12">
                                             <img src="img/ayuda_documentacion/menu_usuario.PNG" width="100%">
                                           </div>
                                         </div><br>
                                         <p>
                                           Dentro de los datos de perfil de usuario seleccionamos la opcion de <strong>Cambiar Foto Personal</strong> y seleccionamos la foto deseada para la matrícula.
                                         </p>
                                         <div class="row">
                                           <div class="col-xs-12">
                                             <img src="img/ayuda_documentacion/btn_cambiar_foto.PNG" width="100%">
                                           </div>
                                         </div><br>
                                         <p>
                                           Si el usuario ya hubiera finalizado la matrícula, te mostrara un mensaje de error en amarillo, el cual te advierte de que no puedes subir una foto dado que tu matrícula se encuentra finalizada.
                                         </p>
                                         <div class="row">
                                           <div class="col-xs-12">
                                             <img src="img/ayuda_documentacion/error_cambiar_foto.PNG" width="100%">
                                           </div>
                                         </div><br>
                                         <p><strong>Paso 3º :</strong> Finalizamos la Matrícula</p>
                                         <p>
                                           En la opcion de <a href="gestion-matriculas.php" target="blank">Gestionar Matrícula</a> vemos un desplegable con las opciones de la matrícula, en el seleccionamos la opción de finalizar matrícula.Pueden darse varias opciones:
                                           <div class="row">
                                           <div class="col-xs-12">
                                             <img src="img/ayuda_documentacion/desplegable_opciones_matricula.PNG" width="100%">
                                           </div>
                                           </div><br>
                                           <ol>
                                             <li>Se finalice la matrícula.</li>
                                             <li>De un error pidiendo al usuario subir una foto antes de finalizar la matrícula.</li>
                                           </ol>
                                           <div class="row">
                                           <div class="col-xs-12">
                                             <br><img src="img/ayuda_documentacion/error_subir_foto_antes_de_finalizar.PNG" width="100%">
                                           </div>
                                         </div><br>
                                         </p>

                                         <p><strong>Paso 4º :</strong> Imprimimos la Matrícula</p>
                                         <p>
                                           En la opcion de <a href="gestion-matriculas.php" target="blank">Gestionar Matrícula</a> vemos un desplegable con las opciones de la matrícula, en el seleccionamos la opción de imprimir matrícula.<strong> La matrícula impresa se debe presentar en el centro. </strong>
                                         </p>
                                    
                  </div>
                </div>
              </div>
              <div class="card">
                <div class="card-header" id="headingTwo">
                  <h5 class="mb-0">
                    <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                      ¿Cómo edito la matricula?
                    </button>
                  </h5>
                </div>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                  <div class="card-body">
                    <div class="card card-body">
                                           <p>
                                             Desde la página de inicio seleccionamos la opción de <a href="gestion-matriculas.php" target="blank">Gestionar Matrícula </a> 
                                           </p>
                                           <p>
                                             En la página de gestion de matrículas selecionamos la opción de editar. Pueden darse los siguientes casos:
                                             <div class="row">
                                             <div class="col-xs-12">
                                               <img src="img/ayuda_documentacion/desplegable_opciones_matricula.PNG" width="100%">
                                             </div>
                                             </div><br>
                                             <ol>
                                               <li>
                                                 Esta opción nos llevará a un formulario con nuestra matrícula ya rellena donde podremos cambiar los datos referentes a la enseñanza, curso , itinerario y optativas elegidas.
                                               </li>
                                               <li>
                                                 Nos mandará a la página de inicio mostrandonos un mensaje de error en color rojo que nos comunica que no podemos editar una matrícula finalizada.
                                               </li><br> 
                                               <div class="row">
                                             <div class="col-xs-12">
                                               <img src="img/ayuda_documentacion/error_finalizar_matricula.PNG" width="100%">
                                             </div>
                                             </div><br>                           
                                           </p>

                                         
                  </div>
                </div>
              </div>
              <div class="card">
                <div class="card-header" id="headingThree">
                  <h5 class="mb-0">
                    <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                      ¿Cómo subo una foto para la matrícula?
                    </button>
                  </h5>
                </div>
                <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                 <div class="card-body">
                   <p>
                     Selecionamos la opción de <a href="perfil-alumno.php" target="blank">Mis datos</a> situada en el desplegable del alumno en la parte superior derecha de la página ( excepto en los formularios matrícula ).
                   </p>
                   <div class="row">
                     <div class="col-xs-12">
                       <img src="img/ayuda_documentacion/menu_usuario.PNG" width="100%">
                     </div>
                   </div><br>
                   <p>
                     Pulsamos el boton de Cambiar Foto Personal y subimos la foto que se enviara con la matrícula.
                   <p>
                     <div class="row">
                     <div class="col-xs-12">
                       <img src="img/ayuda_documentacion/btn_cambiar_foto.PNG" width="100%">
                     </div>
                   </div><br>
                   <p>
                     Si la matrícula estuviera finalizada , nos mostraria un error en amarillo diciendo no se puede cambiar la foto una vez finalizada la matrícula.
                   </p>
                   <div class="row">
                     <div class="col-xs-12">
                       <img src="img/ayuda_documentacion/error_subir_foto_matricula_finalizada.PNG" width="100%">
                     </div>
                   </div><br>                        
                 </div>
                </div>
              </div>

              <div class="card">
                <div class="card-header" id="headingFour">
                  <h5 class="mb-0">
                    <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                      ¿Cómo elimino la matrícula?
                    </button>
                  </h5>
                </div>
                <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordion">
                 <div class="card card-body">
                                          <p>
                                          Desde la página de inicio seleccionamos la opción de <a href="gestion-matriculas.php" target="blank">Gestionar Matrícula </a> 
                                        </p>
                                        <p>
                                          En la página de gestion de matrículas selecionamos la opción de eliminar. Pueden darse los siguientes casos:</p>
                                          <div class="row">
                                          <div class="col-xs-12">
                                            <img src="img/ayuda_documentacion/desplegable_opciones_matricula.PNG" width="100%">
                                          </div>
                                          </div><br>
                                          <ol>
                                            <li>
                                             Eliminará la matricula.
                                            </li>
                                            <li>
                                              Nos mandará a la página de inicio mostrandonos un mensaje de error en color rojo que nos comunica que no podemos eliminar una matrícula finalizada.
                                            </li><br>   
                                            <div class="col-xs-12">
                                            <img src="img/ayuda_documentacion/error_eliminar_matricula_finalizada.PNG" width="100%">
                                          </div>
                         </div>
                </div>
              </div>
            
           </div>
           <h1 style="margin-top:30px;">Documentación</h1>
           <div class="list-group">
             <a href="#" class="list-group-item list-group-item-action">
               <i class="fas fa-book"></i> Normas de convivencia
             </a>
             <a href="#" class="list-group-item list-group-item-action"><i class="fas fa-book"></i> Información sobre el centro</a>
             <a href="#" class="list-group-item list-group-item-action"><i class="fas fa-book"></i> AMPA</a>
             <a href="#" class="list-group-item list-group-item-action"><i class="fas fa-book"></i> Consejo de Estudiantes</a>
             <a href="#" class="list-group-item list-group-item-action disabled"><i class="fas fa-book"></i> Contacto</a>
           </div>
        </div>
      





 <?php
    include "footer.php";
?>
