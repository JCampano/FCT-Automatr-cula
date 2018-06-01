$(".btn-editar-alumno").on("click",cargarFormEditarAlumno);

function cargarFormEditarAlumno(){
    var boton=$(this);
    var dni = boton.attr("data-dni");
    
    $.post("php/formularios/formEditAlumno.php", {dni: dni}, function(result){
        $("#modal-alumnos").html(result);
    });
}


$(".btn-eliminar-alumno").on("click",cargarFormEliminarAlumno);

function cargarFormEliminarAlumno(){
    var boton=$(this);
    var dni = boton.attr("data-dni");
    
    $.post("php/formularios/formEliminarAlumno.php", {dni: dni}, function(result){
        $("#modal-alumnos-eliminar").html(result);
    });
}

function eliminarAlumno(){
    var boton=$(this);
    var dni = boton.attr("data-dni");
    
    $.post("js/ajax/eliminarAlumno.php", {dni: dni}, function(result){
        $("#modal-alumnos-eliminar").html(result);
    });
}








//Traducción datatable
$(document).ready(function() {



 
      var direccion = String(window.location);
      var aDireccion = direccion.split("/");

      switch (aDireccion[5]) {
        case "asignaturas.php":
            cargarAsignaturas();
            break;

        case "ensenanzas.php":
            cargarEnsenanzas();
            break;
        
    }



    

     $( ".card" ).draggable({ revert: "invalid" });
} );


//Rellenar combos  
$("#selectEnsenanzaAsignatura>option").on('click',rellenarComboCurso);

function rellenarComboCurso(){
    if($("#selectEnsenanzaAsignatura").val()!='nulo'){
        
        
        var id=$("#selectEnsenanzaAsignatura").val();
       
        $.post("php/combos.php", {tabla: "cursos", id:id, fila:"id_enseñanza" }, function(result){
            console.log(result);
            var resultado=JSON.parse(result);
            console.log(resultado.length);  
            if (resultado.length!=0){
                $('#selectCursoAsignatura').prop("disabled", false);
                rellenarComboItinerario();
                  $.each(resultado, function(index){
                    console.log(resultado[index]["nombre"]);
                    $("#selectCursoAsignatura").empty();
                    $("#selectCursoAsignatura").append('<option value="'+resultado[index]["id"]+'">'+resultado[index]["nombre"]+'</option>');
                });
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

$("#selectCursoAsignatura").on('click',rellenarComboItinerario);

function rellenarComboItinerario(){
       
         var id=$("#selectEnsenanzaAsignatura").val();
         
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
                $("#selectItinerarioAsignatura").append('<option selected>No hay itinerarios disponibles...</option>');

              }
          
          });
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
        $(".btn-editar-asignatura").on("click",cargarFormEditarAsignatura);
        function cargarFormEditarAsignatura(){
            var boton=$(this);
            var cod = boton.attr("data-cod");
            
            $.post("php/formularios/formEditAsignatura.php", {cod: cod}, function(result){
                $("#modal-asignatura").html(result);
            });
        }
        $(".btn-eliminar-ensenanza").on("click",cargarFormEliminarAsignatura);

        function cargarFormEliminarAsignatura(){
            var boton=$(this);
            var cod = boton.attr("data-cod");
            
            $.post("php/formularios/formEliminarEnsenanza.php", {cod: cod}, function(result){
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
       $(".btn-editar-ensenanza").on("click",cargarFormEditarEnsenanza);
       function cargarFormEditarEnsenanza(){
           var boton=$(this);
           var id = boton.attr("data-id");
           
           $.post("php/formularios/formEditEnsenanza.php", {id: id}, function(result){
               $("#modal-ensenanza").html(result);
           });
       }
       $(".btn-eliminar-ensenanza").on("click",cargarFormEliminarEnsenanza);

       function cargarFormEliminarEnsenanza(){
           var boton=$(this);
           var id = boton.attr("data-id");
           
           $.post("php/formularios/formEliminarEnsenanza.php", {id: id}, function(result){
               $("#modal-ensenanza-eliminar").html(result);
           });
       }

         
             $('#tabla-asignaturas').DataTable( {
                 "language": espanol              
            } 



             );
   
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