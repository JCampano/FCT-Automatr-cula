inicio();
function inicio(){getEnseñanzas();}
function instanciarXHR() {
            var xhttp = null;
            if (window.XMLHttpRequest) {
                xhttp = new XMLHttpRequest();
            } else // code for IE5 and IE6
            {
                xhttp = new ActiveXObject("Microsoft.XMLHTTP");
            }
            return xhttp;}

function getEnseñanzas(){
    //Instanciar objeto Ajax
    var oAjax = instanciarXHR();

    //1. Preparar parametros
    var sDatos = "";    
    //2. Configurar la llamada --> Asincrono por defecto
    oAjax.open("GET", "php/matricula/getEnsenanza.php?" + sDatos);

    //3. Asociar manejador de evento de la respuesta
    oAjax.addEventListener("readystatechange", procesoRespuestaGetEnseñanzas, false);

    //4. Hacer la llamada
    oAjax.send();
}

function procesoRespuestaGetEnseñanzas(){
    var oAjax = this;
    // 5. Proceso la respuesta cuando llega
    if (oAjax.readyState == 4 && oAjax.status == 200) {
        document.getElementById("enseñanzas").innerHTML = oAjax.responseText;
    }
}


function getCursos() {

    //si Enseñanza es Selecione una enseñanza elimino todos los combos menos enseñanza
    //else hacemos el getCursos
    //Instanciar objeto Ajax
    var oAjax = instanciarXHR();
    var value = document.getElementById("selectEnsenanza").value;
    
    eliminarCursos();
    eliminarItinerarios();    
    eliminarBtn();
    eliminarAsgItinerarios();
    
    
    if(value != "Seleccione"){
        //1. Preparar parametros
        var sDatos = "ensenanza="+value;
        //alert(sDatosEnvio);
        //2. Configurar la llamada --> Asincrono por defecto
        oAjax.open("GET", "php/matricula/getCurso.php?" + sDatos);

        //3. Asociar manejador de evento de la respuesta
        oAjax.addEventListener("readystatechange", procesoRespuestaCursos, false);

        //4. Hacer la llamada
        oAjax.send();
    }
}
     
function procesoRespuestaCursos() {

    var oAjax = this;

    // 5. Proceso la respuesta cuando llega
    if (oAjax.readyState == 4 && oAjax.status == 200) {

        document.getElementById("cursos").innerHTML = oAjax.responseText;


    }
}


function getItinerario() {
    //si Curso es Selecione un curso elimino todos los combos menos enseñanza y curso
    //else hacemos el getCursos
    //Instanciar objeto Ajax
    var oAjax = instanciarXHR();
    var value = document.getElementById("selectCurso").value;

    eliminarItinerarios();    
    eliminarBtn();
    eliminarAsgItinerarios();
    getCombosOptativas(); 
    cargarBtn();   
      

    if(value != "Seleccione"){
    	//getOptativa();        
        //1. Preparar parametros
        var sDatos = "curso="+value;
        //alert(sDatosEnvio);
        //2. Configurar la llamada --> Asincrono por defecto
        oAjax.open("GET", "php/matricula/getItinerario.php?" + sDatos);

        //3. Asociar manejador de evento de la respuesta
        oAjax.addEventListener("readystatechange", procesoRespuestaItinerario, false);

        //4. Hacer la llamada
        oAjax.send();
    }
}       

function procesoRespuestaItinerario() {

    var oAjax = this;

    // 5. Proceso la respuesta cuando llega
    if (oAjax.readyState == 4 && oAjax.status == 200) {

        document.getElementById("itinerarios").innerHTML = oAjax.responseText;


    }
}


function getAsignaturasItinerario() {
    //si Curso es Selecione un curso elimino todos los combos menos enseñanza y curso
    //else hacemos el getCursos
    //Instanciar objeto Ajax
    var oAjax = instanciarXHR();
    var value = document.getElementById("selectItinerario").value;

    eliminarAsgItinerarios();    

        if(value != ""){

        //1. Preparar parametros
        var sDatos = "itinerario="+value;
        //alert(sDatosEnvio);
        //2. Configurar la llamada --> Asincrono por defecto
        oAjax.open("GET", "php/matricula/getAsignaturasItinerario.php?" + sDatos);

        //3. Asociar manejador de evento de la respuesta
        oAjax.addEventListener("readystatechange", procesoRespuestaAsigItinerario, false);

        //4. Hacer la llamada
        oAjax.send();
    }
    
}       

function procesoRespuestaAsigItinerario() {

    var oAjax = this;

    // 5. Proceso la respuesta cuando llega
    if (oAjax.readyState == 4 && oAjax.status == 200) {

        document.getElementById("asigItinerarios").innerHTML = 
        '<div class="col-xs-12"><h5>Asignaturas pertenecientes al Itinerario elegido:</h5></div>'+oAjax.responseText;


    }
}

function getCombosOptativas() {
    //si Curso es Selecione un curso elimino todos los combos menos enseñanza y curso
    //else hacemos el getCursos
    //Instanciar objeto Ajax
    var oAjax = instanciarXHR();
    var value = document.getElementById("selectCurso").value;       
      

    if(value != "Seleccione"){
    	        
        //1. Preparar parametros
        var sDatos = "curso="+value;
        //alert(sDatosEnvio);
        //2. Configurar la llamada --> Asincrono por defecto
        oAjax.open("GET", "php/matricula/getCombosOptativas.php?" + sDatos);

        //3. Asociar manejador de evento de la respuesta
        oAjax.addEventListener("readystatechange", procesoRespuestaCombosOptativas, false);

        //4. Hacer la llamada
        oAjax.send();
    }
}       

function procesoRespuestaCombosOptativas() {

    var oAjax = this;

    // 5. Proceso la respuesta cuando llega
    if (oAjax.readyState == 4 && oAjax.status == 200) {

        document.getElementById("combosOptativas").innerHTML = oAjax.responseText;


    }
}

















function cargarBtn(){
    if(document.getElementById("selectCurso").value != "Seleccione"){
        document.getElementById("btnSubmit").innerHTML = '<button class="btn btn-primary" type="submit">Aceptar </button>';
    }
    else{
        eliminarBtn();
    }

}


function eliminarBtn(){
    $("#btnSubmit").empty();
}

function eliminarCursos(){
    $("#cursos").empty();
}

function eliminarItinerarios(){
    $("#itinerarios").empty();
}

function eliminarAsgItinerarios(){   
    $("#asigItinerarios").empty();
}