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



//Traducción datatable
   


//Rellenar combos  
$("#selectEnsenanzaAsignatura>option").on('click',rellenarComboCurso);

function rellenarComboCurso(){
    if($("#selectEnsenanzaAsignatura").val()!='nulo'){
        $('#selectCursoAsignatura').prop("disabled", false);
        $('#selectItinerarioAsignatura').prop("disabled", false);
        var id=$("#selectEnsenanzaAsignatura").val();
        $.post("php/combos.php", {tabla: "cursos", id:id, fila:"id_enseñanza" }, function(result){
            var resultado=JSON.parse(result);
            $("#selectCursoAsignatura").empty();
          $.each(resultado, function(index){
            $("#selectCursoAsignatura").append('<option value="'+resultado[index]["id"]+'">'+resultado[index]["nombre"]+'</option>');
        });
        rellenarComboItinerario();
   
    });
    } else {
        $('#selectCursoAsignatura').prop("disabled", true);
        $("#selectCursoAsignatura").empty();
        $("#selectCursoAsignatura").append('<option selected>No hay enseñanzas disponibles...</option>');
        $('#selectItinerarioAsignatura').prop("disabled", true);
        $("#selectItinerarioAsignatura").empty();
        $("#selectItinerarioAsignatura").append('<option selected>No hay itinerarios disponibles...</option>');

    }
}

$("#selectCursoAsignatura").on('click',rellenarComboItinerario);

function rellenarComboItinerario(){
       
         var id=$("#selectCursoAsignatura").val();
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