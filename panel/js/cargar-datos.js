   $(document).ready(function() {

} );



  var direccion = String(window.location);
  var aDireccion = direccion.split("/");

  switch (aDireccion[5]) {
    case "asignaturas.php":
        cargarAsignaturas();
        break;
    
}




function cargarAsignaturas(){

  var tabla = $("#tabla-asignaturas>tbody");
 tabla.empty();

                                  
   $.post("php/carga-datos.php", {tabla: "asignaturas"}, function(result){
            var resultado=JSON.parse(result);
          cargarTablaAsignaturas(resultado);
        console.log(result);
         /* $.each(resultado, function(index){
            var numero = index+1;
            tabla.append('<tr>');
            tabla.append('<td width="50">'+numero+'</td>');
            tabla.append('<td>'+resultado[index]["nombre"]+'</td>');
            tabla.append('<td>'+resultado[index]["id_itinerario"]+'</td>');
            tabla.append('<td>Itinerario</td>');
            tabla.append('<td width="100"><button style="margin-right:10px;" class="btn-editar-asignatura btn btn-success" data-cod="'+resultado[index]["codigo"]+'" type="button" data-toggle="modal" data-target="#editarAsignatura" class="btn btn-success"> <i class="fas fa-pencil-alt"></i></button><button data-cod="'+resultado[index]["codigo"]+'" type="button" data-toggle="modal" data-target="#eliminarAsignatura" class="btn btn-danger btn-eliminar-asignatura"><i class="far fa-trash-alt"></i></button></td>');
            tabla.append('</tr>');
          });
*/
  

});



     $( ".card" ).draggable({ revert: "invalid" });



 }

 function cargarTablaAsignaturas(result){
  $('#tabla-alumnos,#tabla-asignaturas').DataTable( {
     
      "data": result,
      "columns":[
          {"data":"codigo"},
          {"data":"nombre"},
          {"data":""},
          {"data":"id_itinerario"},
          {"deaultContent":'<button style="margin-right:10px;" class="btn-editar-asignatura btn btn-success" data-cod="'+resultado[index]["codigo"]+'" type="button" data-toggle="modal" data-target="#editarAsignatura" class="btn btn-success"> <i class="fas fa-pencil-alt"></i></button><button data-cod="'+resultado[index]["codigo"]+'" type="button" data-toggle="modal" data-target="#eliminarAsignatura" class="btn btn-danger btn-eliminar-asignatura"><i class="far fa-trash-alt"></i></button>'}

      ],
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
  } 



  );

 }