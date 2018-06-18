$( "#selectBloqueOptativas" ).selectmenu();



//NOTIFICACIONES


$("#botonNotificaciones").on("click", cargarNotificaciones);

function cargarNotificaciones(){
  $.post("php/notificaciones.php",  function(result){
      $("#zonaNotificaciones").empty().append(result);
      if(result!='<small class="dropdown-item">No hay notificaciones</small>'){
        $("#circuloNotificaciones").show(500);
      } else {
        $("#circuloNotificaciones").hide();
      }
  });
}


$(".btn-editar-alumno").on("click",cargarFormEditarUsuario);

function cargarFormEditarUsuario(){
    var boton=$(this);
    var dni = boton.attr("data-dni");
    
    $.post("php/formularios/formEditUsuario.php", {dni: dni}, function(result){
        $("#modal-alumnos").html(result);
    });
}


$(".btn-eliminar-alumno").on("click",cargarFormEliminarUsuario);

function cargarFormEliminarUsuario(){
    var boton=$(this);
    var dni = boton.attr("data-dni");
    
    $.post("php/formularios/formEliminarUsuario.php", {dni: dni}, function(result){
        $("#modal-alumnos-eliminar").html(result);
    });
}

function eliminarUsuario(){
    var boton=$(this);
    var dni = boton.attr("data-dni");
    
    $.post("js/ajax/eliminarUsuario.php", {dni: dni}, function(result){
        $("#modal-alumnos-eliminar").html(result);
    });
}









$(document).ready(function() {



  cargarNotificaciones();
      var direccion = String(window.location);
      var aDireccion = direccion.split("/");
    
      switch (aDireccion[5]) {
        case "asignaturas.php":
            cargarAsignaturas();
            $("#btnAsignaturas").addClass("seleccionado");
            $("#btnAsignaturaLista").addClass("saturacion");
            $("#btnAsignaturas").addClass("saturacion");
            break;

        case "optativas.php":
            cargarOptativas();

            $("#btnOptativas").addClass("seleccionado");
            $("#btnOptativasLista").addClass("saturacion");
            $("#btnOptativas").addClass("saturacion");
            break;

        case "bloques-optativas.php":
            cargarBloquesOptativas();
        
            $("#btnOptativas").addClass("seleccionado");
            $("#btnOptativasLista").addClass("saturacion");
            $("#btnOptativas").addClass("saturacion");
            break;

        case "ensenanzas.php":
            cargarEnsenanzas();
            $("#btnEnsenanzas").addClass("seleccionado");
            $("#btnEnsenanzasLista").addClass("saturacion");
            break;

        case "cursos.php":
            cargarCursos();
            $("#btnCursos").addClass("seleccionado");
            break;

        case "itinerarios.php":
            cargarItinerarios();
            $("#btnItinerarios").addClass("seleccionado");
            break;

        case "registrar-matricula.php":
            cargarUltimasMatriculasRegistradas();
            $("#menuMatriculas").collapse();
            $("#btnRegistrarMatricula").addClass("seleccionado");
            $("#btnRegistrarMatriculaLista").addClass("saturacion");
            $("#btnMatriculas").addClass("saturacion");
            break;

        case "alumnos.php":
            cargarAlumnos();
            $("#menuUsuarios").collapse();
            $("#btnGestionUsuarios").addClass("seleccionado");
            break;

        case "solicitudes.php":
            cargarSolicitudes();
            $("#menuUsuarios").collapse();
            $("#btnSolicitudes").addClass("seleccionado");
            $("#btnSolicitudesLista").addClass("saturacion");
            $("#btnSolicitudes").addClass("saturacion");
            break;

        case "usuarios.php":
            cargarUsuarios();
            $("#btnUsuarios").addClass("seleccionado");
            $("#btnUsuariosListas").addClass("saturacion");
        break;
        case "matriculas.php":
            cargarMatriculas();
            $("#menuMatriculas").collapse();
            $("#btnVerMatriculas").addClass("seleccionado");
            $("#btnMatriculasLista").addClass("saturacion");

        break;

        case "matriculas.php?v=n":
            cargarMatriculasNoRegistradas();
            $("#menuMatriculas").collapse();
            $("#btnVerMatriculasNoRegistradas").addClass("seleccionado");
            $("#btnMatriculasNoRegistradasLista").addClass("saturacion");
        break;

        case "index.php":
            cargarInicio();
            
            $("#btnInicio").addClass("seleccionado");
            $("#btnInicioLista").addClass("saturacion");
        break;
        
    }



    

     $( ".inicio>div>.card" ).draggable({ revert: "invalid" });
} );


//Rellenar combos  
$("#selectEnsenanzaAsignatura").change(rellenarComboCursoAsignatura);

function rellenarComboCursoAsignatura(){
    if($("#selectEnsenanzaAsignatura").val()!='nulo'){
        
        
        var id=$("#selectEnsenanzaAsignatura").val();
       
        $.post("php/combos.php", {tabla: "cursos", id:id, fila:"id_enseñanza" }, function(result){
           
            var resultado=JSON.parse(result);
            
            if (resultado.length!=0){
                $('#selectCursoAsignatura').prop("disabled", false);
                
                $("#selectCursoAsignatura").empty();
                  $.each(resultado, function(index){
                    console.log(resultado[index]["nombre"]);
                    
                    $("#selectCursoAsignatura").append('<option value="'+resultado[index]["id"]+'">'+resultado[index]["nombre"]+'</option>');
                });
                  rellenarComboItinerarioAsignatura();
            } else {
                $('#selectCursoAsignatura').prop("disabled", true);
                $("#selectCursoAsignatura").empty();
                $("#selectCursoAsignatura").append('<option selected>No hay cursos disponibles...</option>');
                $('#selectItinerarioAsignatura').prop("disabled", true);
                $("#selectItinerarioAsignatura").empty();
                $("#selectItinerarioAsignatura").append('<option selected value="nulo">No hay itinerarios disponibles...</option>');

            }
            
         
        
   
    });
    } else {
        $('#selectCursoAsignatura').prop("disabled", true);
        $("#selectCursoAsignatura").empty();
        $("#selectCursoAsignatura").append('<option selected>No hay cursos disponibles...</option>');
        $('#selectItinerarioAsignatura').prop("disabled", true);
        $("#selectItinerarioAsignatura").empty();
        $("#selectItinerarioAsignatura").append('<option selected value="nulo">No hay itinerarios disponibles...</option>');

    }
}

$("#selectCursoAsignatura").change(rellenarComboItinerarioAsignatura);

function rellenarComboItinerarioAsignatura(){
       
         var id=$("#selectCursoAsignatura").val();
         console.log("ID CURSO:"+id);
         if (id!=""){
            $.post("php/combos.php", {tabla: "itinerarios", id:id, fila:"id_curso" }, function(result){
               
                var resultado=JSON.parse(result);
                $("#selectItinerarioAsignatura").empty();
                if(resultado.length!=0){
                    $('#selectItinerarioAsignatura').prop("disabled", false);
                      $.each(resultado, function(index){
                        $("#selectItinerarioAsignatura").append('<option value="'+resultado[index]["id"]+'">'+resultado[index]["nombre"]+'</option>');
                    });

                  } else {
                    $('#selectItinerarioAsignatura').prop("disabled", true);
                    $("#selectItinerarioAsignatura").empty();
                    $("#selectItinerarioAsignatura").append('<option selected value="nulo">No hay itinerarios disponibles...</option>');

                  }
              
              });
         } else {
            $('#selectItinerarioAsignatura').prop("disabled", true);
            $("#selectItinerarioAsignatura").empty();
            $("#selectItinerarioAsignatura").append('<option selected value="nulo">No hay itinerarios disponibles...</option>');

         }

        
}




$("#selectEnsenanzaItinerario").change(rellenarComboCursoItinerario);

function rellenarComboCursoItinerario(){
    if($("#selectEnsenanzaItinerario").val()!='nulo'){
        
        
        var id=$("#selectEnsenanzaItinerario").val();
       
        $.post("php/combos.php", {tabla: "cursos", id:id, fila:"id_enseñanza" }, function(result){

            var resultado=JSON.parse(result);

            if (resultado.length!=0){
                $('#selectCursoItinerario').prop("disabled", false);
                
                $("#selectCursoItinerario").empty();
                  $.each(resultado, function(index){

                    
                    $("#selectCursoItinerario").append('<option value="'+resultado[index]["id"]+'">'+resultado[index]["nombre"]+'</option>');
                });
                 
            } else {
                $('#selectCursoItinerario').prop("disabled", true);
                $("#selectCursoItinerario").empty();
                $("#selectCursoItinerario").append('<option value="nulo" selected>No hay Cursos disponibles...</option>');


            }
            
         
        
   
    });
    } else {
        $('#selectCursoItinerario').prop("disabled", true);
        $("#selectCursoItinerario").empty();
        $("#selectCursoItinerario").append('<option value="nulo" selected>No hay Cursos disponibles...</option>');


    }
}




   //MOSTRAR TABLAS

   var espanol={
                     "lengthMenu": "Mostrar _MENU_ registros por página",
                     "zeroRecords": "No se han encontrado datos",
                     "info": "Mostrando página _PAGE_ de _PAGES_",
                     "infoEmpty": "No se han encontrado registros.",
                     "infoFiltered": "(filtered from _MAX_ total records)",
                     "paginate": {
                            "first":      "Primero",
                            "last":       "Último",
                            "next":       ">",
                            "previous":   "<"
                        },
                     "search":         "Buscar:",
                };

    //ASIGNATURAS


function cargarAsignaturas(){
    $.post("php/asignaturas/tabla-asignaturas.php", function(result){
           
        $("#zona-tabla-asignaturas").empty().append(result);

        //Asignaturas
        $(".btn-editar").on("click",cargarFormEditarAsignatura);
        function cargarFormEditarAsignatura(){
            var boton=$(this);
            var cod = boton.attr("data-cod");
            
            $.post("php/formularios/formEditAsignatura.php", {cod: cod}, function(result){
                $("#modal-asignatura-2").html(result);

            });
        }
        $(".btn-eliminar").on("click",cargarFormEliminarAsignatura);

        function cargarFormEliminarAsignatura(){
            var boton=$(this);
            var cod = boton.attr("data-cod");
            
            $.post("php/formularios/formEliminarAsignatura.php", {cod: cod}, function(result){
                $("#modal-asignatura-eliminar").html(result);
            });
        }

         
             $('#tabla-asignaturas').DataTable( {
                 "language": espanol
            } 



             );
   
    });
}



function cargarEnsenanzas(){
    $.post("php/ensenanzas/tabla-ensenanzas.php", function(result){
           
        $("#zona-tabla-ensenanzas").empty().append(result);

       //Enseñanzas
       $(".btn-editar").on("click",cargarFormEditarEnsenanza);
       function cargarFormEditarEnsenanza(){
           var boton=$(this);
           var id = boton.attr("data-id");
           
           $.post("php/formularios/formEditEnsenanza.php", {id: id}, function(result){
               $("#modal-ensenanza").html(result);
           });
       }
       $(".btn-eliminar").on("click",cargarFormEliminarEnsenanza);

       function cargarFormEliminarEnsenanza(){
           var boton=$(this);
           var id = boton.attr("data-id");
           
           $.post("php/formularios/formEliminarEnsenanza.php", {id: id}, function(result){
               $("#modal-ensenanza-eliminar").html(result);
           });
       }

         
             $('#tabla-ensenanzas').DataTable( {
                 "language": espanol              
            } 



             );

             $('[data-tipo="tooltip"]').tooltip();
   
    });
}

function cargarCursos(){
    $.post("php/cursos/tabla-cursos.php", function(result){
           
        $("#zona-tabla-cursos").empty().append(result);

       //Enseñanzas
       $(".btn-editar").on("click",cargarFormEditarCurso);

       function cargarFormEditarCurso(){
       
           var boton=$(this);
           var id = boton.attr("data-id");
           
           $.post("php/formularios/formEditCurso.php", {id: id}, function(result){
               $("#modal-curso").html(result);
           });
       }
       $(".btn-eliminar").on("click",cargarFormEliminarCurso);

       function cargarFormEliminarCurso(){
           var boton=$(this);
           var id = boton.attr("data-id");
           
           $.post("php/formularios/formEliminarCurso.php", {id: id}, function(result){
               $("#modal-curso-eliminar").html(result);
           });
       }

         
             $('#tabla-cursos').DataTable( {
                 "language": espanol              
            } 

             );
   
        $('[data-tipo="tooltip"]').tooltip();


    });
}

function cargarItinerarios(){
    $.post("php/itinerarios/tabla-itinerarios.php", function(result){
           
        $("#zona-tabla-itinerarios").empty().append(result);

       //Enseñanzas
       $(".btn-editar").on("click",cargarFormEditarItinerario);

       function cargarFormEditarItinerario(){
       
           var boton=$(this);
           var id = boton.attr("data-id");
           
           $.post("php/formularios/formEditItinerario.php", {id: id}, function(result){
               $("#modal-itinerario").html(result);
           });
       }
       $(".btn-eliminar").on("click",cargarFormEliminarItinerario);

       function cargarFormEliminarItinerario(){
           var boton=$(this);
           var id = boton.attr("data-id");
           
           $.post("php/formularios/formEliminarItinerario.php", {id: id}, function(result){
               $("#modal-itinerario-eliminar").html(result);
           });
       }

         
             $('#tabla-itinerarios').DataTable( {
                 "language": espanol              
            } 

             );
   
        $('[data-tipo="tooltip"]').tooltip();


    });
}


//Ultimas Matriculas Registradas
function cargarUltimasMatriculasRegistradas(){
  $.post("php/matriculas/ultimas-matriculas-registradas.php", function(result){
               
            $("#zonaMatriculasRegistradas").empty().append(result);
       

          
        
        });
}


function cargarAlumnos(){
    $.post("php/alumnos/tabla-alumnos.php", function(result){
           
        $("#zona-tabla-alumnos").empty().append(result);

       //Enseñanzas
       $(".btn-editar").on("click",cargarFormEditarUsuario);
       function cargarFormEditarUsuario(){
           var boton=$(this);
           var id = boton.attr("data-id");
           
           $.post("php/formularios/formEditAlumno.php", {id: id}, function(result){
               $("#modal-alumno").html(result);
           });
       }
       $(".btn-eliminar").on("click",cargarFormEliminarUsuario);

       function cargarFormEliminarUsuario(){
           var boton=$(this);
           var id = boton.attr("data-id");
           
           $.post("php/formularios/formEliminarAlumno.php", {id: id}, function(result){
               $("#modal-alumno-eliminar").html(result);
           });
       }
     



         
             $('#tabla-alumnos').DataTable( {
                 "language": espanol              
            } 



             );

             $('[data-tipo="tooltip"]').tooltip();
   
    });
}

function cargarSolicitudes(){
    $.post("php/alumnos/tabla-solicitudes.php", function(result){
           
        $("#zona-tabla-solicitudes").empty().append(result);

       //Enseñanzas
       $(".boton-ver").on("click",cargarMostrarCambios);
       function cargarMostrarCambios(){
           var boton=$(this);
           var id = boton.attr("data-id");
           
           $.post("php/alumnos/mostrar-cambios.php", {id: id}, function(result){
               $("#modal-solicitudes").html(result);
           });
       }

     



         
             $('#tabla-solicitudes').DataTable( {
                 "language": espanol              
            } 



             );

             $('[data-tipo="tooltip"]').tooltip();
   
    });
}

function cancelarCambios(){

  var boton=$(this);
  var id = boton.attr("data-id");
  
  $.post("php/alumnos/cancelar-cambios.php", {id: id}, function(result){
    $("#mensajes").empty().append(result);
    $("#mensajes").show(500);
    cargarSolicitudes();


  });
}

function cargarUsuarios(){
    $.post("php/usuarios/tabla-usuarios.php", function(result){
           
        $("#zona-tabla-usuarios").empty().append(result);

       //Enseñanzas
       $(".btn-editar").on("click",cargarFormEditarUsuario);
       function cargarFormEditarUsuario(){
           var boton=$(this);
           var id = boton.attr("data-id");
           
           $.post("php/formularios/formEditUsuario.php", {id: id}, function(result){
               $("#modal-usuario").html(result);
           });
       }
       $(".btn-eliminar").on("click",cargarFormEliminarUsuario);

       function cargarFormEliminarUsuario(){
           var boton=$(this);
           var id = boton.attr("data-id");
           
           $.post("php/formularios/formEliminarUsuario.php", {id: id}, function(result){
               $("#modal-usuario-eliminar").html(result);
           });
       }

         
             $('#tabla-usuarios').DataTable( {
                 "language": espanol              
            } 



             );

             $('[data-tipo="tooltip"]').tooltip();
   
    });
}

function cargarMatriculas(){
    $.post("php/matriculas/tabla-matriculas.php", {r: "s"}, function(result){
           
        $("#zona-tabla-matriculas").empty().append(result);

       //Enseñanzas
       $(".btn-editar").on("click",cargarFormEditarMatricula);
       function cargarFormEditarMatricula(){
           var boton=$(this);
           var id = boton.attr("data-id");
           
           $.post("php/formularios/formEditMatricula.php", {id: id}, function(result){
               $("#modal-matricula").html(result);
           });
       }
       $(".btn-eliminar").on("click",cargarFormEliminarMatricula);

       function cargarFormEliminarMatricula(){
           var boton=$(this);
           var id = boton.attr("data-id");
           
           $.post("php/formularios/formEliminarMatriculaRegistrada.php", {id: id}, function(result){
               $("#modal-matricula-eliminar").html(result);
           });
       }
       $(".btn-desvincular").on("click",cargarFormQuitarRegistro);

       function cargarFormQuitarRegistro(){
           var boton=$(this);
           var id = boton.attr("data-id");
           
           $.post("php/formularios/formQuitarMRegistradas.php", {id: id}, function(result){
               $("#modal-matricula-quitar").html(result);
           });
       }

         $(".btn-ver").on("click",cargarMatricula);
       function cargarMatricula(){

           var boton=$(this);
           var id = boton.attr("data-id");
           
           $.post("php/matriculas/ver-matricula.php", {id: id}, function(result){
               $("#modal-matricula").html(result);
           });
       }

         
             $('#tabla-matriculas').DataTable( {
                 "language": espanol              
            } 



             );

             $('[data-tipo="tooltip"]').tooltip();
   
    });
}

function cargarMatriculasNoRegistradas(){
    $.post("php/matriculas/tabla-matriculas.php", {r: "n"}, function(result){
           
        $("#zona-tabla-matriculas").empty().append(result);

       //Enseñanzas
       $(".btn-editar").on("click",cargarFormEditarMatriculaR);
       function cargarFormEditarMatriculaR(){
           var boton=$(this);
           var id = boton.attr("data-id");
           
           $.post("php/formularios/formEditMatricula.php", {id: id}, function(result){
               $("#modal-matricula").html(result);
           });
       }
       $(".btn-eliminar").on("click",cargarFormEliminarMatriculaR);

       function cargarFormEliminarMatriculaR(){
           var boton=$(this);
           var id = boton.attr("data-id");
           
           $.post("php/formularios/formEliminarMatricula.php", {id: id}, function(result){
               $("#modal-matricula-eliminar").html(result);
           });
       }

         
             $('#tabla-matriculas').DataTable( {
                 "language": espanol              
            } 



             );

             $('[data-tipo="tooltip"]').tooltip();
   
    });
}

function cargarInicio(){
  var personas;
  var datos;
  $.post("php/datosMatriculasRegistradas.php", {t: "p"}, function(result1){
      
      personas = JSON.parse(result1);
      $.post("php/datosMatriculasRegistradas.php", {t: "d"}, function(result2){
        
          datos = JSON.parse(result2);

          console.log(personas);
            console.log(datos);
            var ctx = document.getElementById("myChart").getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: personas,
                    datasets: [{
                        label: 'Nº de matrículas registradas',
                        data: datos,
                        backgroundColor: [
                            
                        ],
                        borderColor: [
                            

                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero:true
                            }
                        }]
                    }
                }
            });
          
      });
      
  });



}

function cargarOptativas(){
    $.post("php/optativas/tabla-optativas.php", function(result){
           
        $("#zona-tabla-optativas").empty().append(result);

       //Enseñanzas
       $(".btn-editar").on("click",cargarFormEditarOptativa);

       function cargarFormEditarOptativa(){
       
           var boton=$(this);
           var id = boton.attr("data-id");
           
           $.post("php/formularios/formEditOptativa.php", {id: id}, function(result){
               $("#modal-optativa").html(result);
           });
       }
       $(".btn-eliminar").on("click",cargarFormEliminarOptativa);

       function cargarFormEliminarOptativa(){
           var boton=$(this);
           var id = boton.attr("data-id");
           
           $.post("php/formularios/formEliminarOptativa.php", {id: id}, function(result){
               $("#modal-optativa-eliminar").html(result);
           });
       }

         
             $('#tabla-optativas').DataTable( {
                 "language": espanol              
            } 

             );
   
        $('[data-tipo="tooltip"]').tooltip();


    });
}


function cargarBloquesOptativas(){
    $.post("php/optativas/tabla-bloques.php", function(result){
           
        $("#zona-tabla-bloques").empty().append(result);

       //Enseñanzas
       $(".btn-editar").on("click",cargarFormEditarBloque);

       function cargarFormEditarBloque(){
       
           var boton=$(this);
           var id = boton.attr("data-id");
           
           $.post("php/formularios/formEditBloque.php", {id: id}, function(result){
               $("#modal-bloque").html(result);
           });
       }
       $(".btn-eliminar").on("click",cargarFormEliminarBloque);

       function cargarFormEliminarBloque(){
           var boton=$(this);
           var id = boton.attr("data-id");
           
           $.post("php/formularios/formEliminarBloque.php", {id: id}, function(result){
               $("#modal-bloque-eliminar").html(result);
           });
       }

         
             $('#tabla-bloques').DataTable( {
                 "language": espanol              
            } 

             );
   
        $('[data-tipo="tooltip"]').tooltip();


    });
}



//Añadir datos

//asignatura
$("#btn-enviar-asignatura").on("click", añadirAsignatura);


function añadirAsignatura(){
    var codigo=$("#codigo-asignatura").val();
    var nombre = $("#nombre-asignatura").val();
    var itinerario = $("#selectItinerarioAsignatura").val();

    if (nombre!="" && codigo!="" && itinerario!="nulo"){

        $.post("php/asignaturas/anadirAsignatura.php",{ codigo:codigo, nombre:nombre, id_itinerario:itinerario}, function(result){
               
            $("#mensajes").empty().append(result);
            $("#mensajes").show(500);

            $("#codigo-asignatura").val("");
            $("#nombre-asignatura").val("");
                cargarAsignaturas();
        
        });
    } else {
        $("#mensajes").empty().append('<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert">&times;</button>Debe completar todos los campos</div>');
        $("#mensajes").show(500);
    }
    
}

//Enseñanza
$("#btn-enviar-ensenanza").on("click", anadirEnsenanza);


function anadirEnsenanza(){

    var nombre = $("#nombre-ensenanza").val();


    if (nombre!=""){

        $.post("php/ensenanzas/anadirEnsenanza.php",{ nombre:nombre}, function(result){
               
            $("#mensajes").empty().append(result);
            $("#mensajes").show(500);
                cargarEnsenanzas();

            $("#nombre-ensenanza").val("");
        
        });
    } else {
        $("#mensajes").empty().append('<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert">&times;</button>Debe completar todos los campos</div>');
        $("#mensajes").show(500);
    }
    
}

//Curso
$("#btn-enviar-curso").on("click", anadirCurso);


function anadirCurso(){
    var nombre=$("#nombre-curso").val();
    var ensenanza = $("#selectEnsenanzaCurso").val();


    if (nombre!="" && ensenanza!="nulo"){

        $.post("php/cursos/anadirCurso.php",{ nombre:nombre, ensenanza:ensenanza}, function(result){
               
            $("#mensajes").empty().append(result);
            $("#mensajes").show(500);

            $("#nombre-curso").val("");
            $("#selectEnsenanzaCurso").val("nulo");
                cargarCursos();
        
        });
    } else {
        $("#mensajes").empty().append('<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert">&times;</button>Debe completar todos los campos</div>');
        $("#mensajes").show(500);
    }
    
}


//Itinerario
$("#btn-enviar-itinerario").on("click", añadirItinerario);


function añadirItinerario(){

    var nombre = $("#nombre-itinerario").val();
    var curso = $("#selectCursoItinerario").val();

    if (nombre!="" && curso!="nulo"){

        $.post("php/itinerarios/anadirItinerario.php",{nombre:nombre, id_curso:curso}, function(result){
               
            $("#mensajes").empty().append(result);
            $("#mensajes").show(500);

     
            $("#nombre-itinerario").val("");
                cargarItinerarios();
        
        });
    } else {
        $("#mensajes").empty().append('<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert">&times;</button>Debe completar todos los campos</div>');
        $("#mensajes").show(500);
    }
    
}

//Optativas
$("#btn-enviar-optativa").on("click", anadirOptativa);


function anadirOptativa(){

    var nombre = $("#nombre-optativa").val();
    var bloque = $("#selectBloqueOptativas").val();

    if (nombre!="" && bloque!=null ){
        alert("hola");
        $.post("php/optativas/anadirOptativa.php",{ nombre:nombre, id_bloque:bloque}, function(result){
               
            $("#mensajes").empty().append(result);
            $("#mensajes").show(500);
                cargarOptativas();

            $("#nombre-optativa").val("");
        
        });
    } else {
        $("#mensajes").empty().append('<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert">&times;</button>Debe completar todos los campos</div>');
        $("#mensajes").show(500);
    }
    
}

//Bloques
$("#btn-enviar-bloque").on("click", añadirBloque);


function añadirBloque(){

    var nombre = $("#nombre-bloque").val();
    var curso = $("#selectCursoItinerario").val();

    if (nombre!="" && curso!="nulo"){

        $.post("php/optativas/anadirBloque.php",{nombre:nombre, id_curso:curso}, function(result){
               
            $("#mensajes").empty().append(result);
            $("#mensajes").show(500);

          
            $("#nombre-bloque").val("");
       

                cargarBloquesOptativas();
        
        });
    } else {
        $("#mensajes").empty().append('<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert">&times;</button>Debe completar todos los campos</div>');
        $("#mensajes").show(500);
    }
    
}


//Ultimas matrículas registradas
$("#btn-registrar-matricula").on("click", registrarMatricula);

function registrarMatricula(){
  $("#mensajes").empty().hide();
  var codigo = $("#codigo-registrar-asignatura").val();
  var idUsuario = $("#idUsuario").val();
  if(codigo!=0){
    $.post("php/matriculas/consultar-matricula-registrada.php",{id:codigo}, function(result){
    
      if(result=="true"){
        $.post("php/matriculas/registrar-matricula.php",{id:codigo, idUsuario:idUsuario}, function(result){
               
            $("#mensajes").empty().append(result);
            $("#mensajes").fadeIn(500);

            $("#codigo-registrar-asignatura").val("");
                cargarUltimasMatriculasRegistradas();
        
        });
      } else {
        $("#mensajes").append('<div class="alert alert-warning alert-dismissable"><button type="button" class="close" data-dismiss="alert">&times;</button>La matrícula #'+codigo+' ya ha sido registrada</div>');
        $("#mensajes").fadeIn(500);
      }
    
    });
  } else {
    $("#mensajes").append('<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert">&times;</button>No ha introducido ningun código</div>');
    $("#mensajes").fadeIn(500);
  }
}


//Alta Usuarios

$("#btn-alta-usuario").on("click",darAltaUsuario);

function darAltaUsuario(){
    if(validarUsuario()){
        $("#mensajes").empty();
        var nombre = $("#nombre-usuario").val();
        var apellidos = $("#apellidos-usuario").val();
        var dni = $("#dni-usuario").val();
        var telefono = $("#telefono-usuario").val();
        var clave1 = $("#clave1-usuario").val();
        var clave2 = $("#clave2-usuario").val();
        var tipoUsuario = $('#tipo-usuario input:radio:checked').val()

        var rolUsuario;

        if(tipoUsuario==1){
            rolUsuario="administrativo";
        }
        if(tipoUsuario==2){
            rolUsuario="gestor";
        }
        if(tipoUsuario==3){
            rolUsuario="administrador";
        }

        $.post("php/usuarios/altaUsuario.php",{nombre:nombre, apellidos:apellidos, dni:dni, clave:clave1,telefono:telefono, tipo:rolUsuario}, function(result){
            
            $("#mensajes").empty().append(result);
            $("#mensajes").fadeIn(500);
            $("#nombre-usuario").val("");
            $("#apellidos-usuario").val("");
            $("#dni-usuario").val("");
            $("#telefono-usuario").val("");
            $("#clave1-usuario").val("");
            $("#clave2-usuario").val("");
            cargarUsuarios();
        });
    }


}

function validarUsuario(){
    var validado = true;
    var mensaje="";
    var nombre = $("#nombre-usuario").val();
    var apellidos = $("#apellidos-usuario").val();
    var dni = $("#dni-usuario").val();
    var telefono = $("#telefono-usuario").val();
    var clave1 = $("#clave1-usuario").val();
    var clave2 = $("#clave2-usuario").val();


    if( nombre == null || nombre.length == 0 || /^\s+$/.test(nombre) || !/^([A-ZÁÉÍÓÚ]{1}[a-zñáéíóú]+[\s]*)+$/.test(nombre)){
        mensaje = "El nombre no puede contener espacios y debe comenzar por una letra mayúscula.</br>";
        validado =  false;
    }
    
    if(apellidos == null || !/^([a-zA-ZñÑáéíóúÁÉÍÓÚ\s]{3,40})+$/.test(apellidos)){
        mensaje += "Los apellidos deben contener mínimo 3 caracteres y estar formado por letras.</br>";
        validado =  false;
    }

    if(dni == null || !/^[0-9]{8}[TRWAGMYFPDXBNJZSQVHLCKE]$/i.test(dni)){
        mensaje += "El DNI introducido no es válido.</br>";
        validado =  false;
    }
    if(telefono == null || !/^\d{9}$/.test(telefono)){
        mensaje += "El teléfono introducido no es válido.</br>";
        validado =  false;
    }

    if(clave1 == null || clave1.length<6){
        mensaje += "La contraseña debe tener mínimo 6 caracteres.</br>";
        validado =  false;
    }

    if(clave1 != clave2){
        mensaje += "Las contraseñas no coinciden.</br>";
        validado =  false; 
    }

    if(!validado){
        
        $("#mensajes").empty().append('<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert">&times;</button>'+mensaje+'</div>');
        $("#mensajes").fadeIn(500);
    }


    return validado;
}