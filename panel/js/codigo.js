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


//Traducción datatable
   
$(document).ready(function() {
    $('#tabla-alumnos,#tabla-asignaturas').DataTable( {
        "language": {
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
        }
    } );
} );