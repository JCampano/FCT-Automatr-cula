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
    eliminarOptativas();
    eliminarBtn();
    
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

    //eliminarItinerarios();
    //eliminarOptativas();
    eliminarBtn();    

    if(value != "Seleccione"){
    	getOptativa();
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



function getOptativa() {
    //else hacemos el getCursos
    //Instanciar objeto Ajax
    var oAjax = instanciarXHR();
    var value = document.getElementById("selectCurso").value;

    eliminarOptativas();
    eliminarBtn();

    if(value != "Seleccione"){
        //1. Preparar parametros
        var sDatos = "curso="+value;
        //alert(sDatosEnvio);
        //2. Configurar la llamada --> Asincrono por defecto
        oAjax.open("GET", "php/matricula/getOptativa.php?" + sDatos);

        //3. Asociar manejador de evento de la respuesta
        oAjax.addEventListener("readystatechange", procesoRespuestaOptativa, false);

        //4. Hacer la llamada
        oAjax.send();
    }
}
        

function procesoRespuestaOptativa() {

    var oAjax = this;

    // 5. Proceso la respuesta cuando llega
    if (oAjax.readyState == 4 && oAjax.status == 200) {

        document.getElementById("optativas").innerHTML = oAjax.responseText;


    }
}


function cargarBtn(){
    if(document.getElementById("selectOptativas").value != "Seleccione"){
        document.getElementById("btnSubmit").innerHTML = '<button class="btn btn-primary" type="submit">Submit </button>';
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

function eliminarOptativas(){
    $("#optativas").empty();
}
