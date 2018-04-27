$(".btn-editar").on("click",cargarFormEditar);

function cargarFormEditar(){
    var boton=$(this);
    var dni = boton.attr("data-dni");
    
    $.post("php/formedit.php", {dni: dni}, function(result){
        $("#modal-alumnos").html(result);
    });
}