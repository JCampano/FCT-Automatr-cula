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
    eliminarOptativas2();
    eliminarOptativas3();
    eliminarOptativas4();
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
    eliminarOptativas();
    eliminarOptativas4();
    eliminarOptativas3();
    eliminarOptativas2();
    eliminarBtn();
    eliminarAsgItinerarios();    

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








function getOptativa() {
    //else hacemos el getCursos
    //Instanciar objeto Ajax
    var oAjax = instanciarXHR();
    var value = document.getElementById("selectCurso").value;

    //eliminarOptativas();
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
        document.getElementById("txtOptativas").innerHTML = '<div class="col-lg-12"><h6>Seleccione hasta 4 optativas por orden de preferencia</h6></div>';
        document.getElementById("optativas").innerHTML = oAjax.responseText;


    }
}

function getOptativa2() {
    //else hacemos el getCursos
    //Instanciar objeto Ajax
    var oAjax = instanciarXHR();
    var value = document.getElementById("selectCurso").value;
    var optativa1 = document.getElementById("selectOptativas").value;

    eliminarBtn();
    eliminarOptativas2();
    eliminarOptativas3();
    eliminarOptativas4();
    

    if(optativa1 != "Seleccione"){
        cargarBtn();        
        //1. Preparar parametros
        var sDatos = "curso="+value;
        var sDatos2 ="opt1="+optativa1;
        //alert(sDatosEnvio);
        //2. Configurar la llamada --> Asincrono por defecto
        oAjax.open("GET", "php/matricula/getOptativa2.php?" + sDatos+ "&" +sDatos2);

        //3. Asociar manejador de evento de la respuesta
        oAjax.addEventListener("readystatechange", procesoRespuestaOptativa2, false);

        //4. Hacer la llamada
        oAjax.send();
    }
}
        

function procesoRespuestaOptativa2() {

    var oAjax = this;

    // 5. Proceso la respuesta cuando llega
    if (oAjax.readyState == 4 && oAjax.status == 200) {

        document.getElementById("optativas2").innerHTML = oAjax.responseText;


    }
}

function getOptativa3() {
    //else hacemos el getCursos
    //Instanciar objeto Ajax
    var oAjax = instanciarXHR();
    var value = document.getElementById("selectCurso").value;
    var optativa1 = document.getElementById("selectOptativas").value;
    var optativa2 = document.getElementById("selectOptativas2").value;
    

    eliminarOptativas3();
    eliminarOptativas4();
    

    if(optativa2 != "Seleccione"){                
        //1. Preparar parametros
        var sDatos = "curso="+value;
        var sDatos2 ="opt1="+optativa1;
        var sDatos3 ="opt2="+optativa2;
        //alert(sDatosEnvio);
        //2. Configurar la llamada --> Asincrono por defecto
        oAjax.open("GET", "php/matricula/getOptativa3.php?" + sDatos+ "&" +sDatos2+ "&" +sDatos3);

        //3. Asociar manejador de evento de la respuesta
        oAjax.addEventListener("readystatechange", procesoRespuestaOptativa3, false);

        //4. Hacer la llamada
        oAjax.send();
    }
}
        

function procesoRespuestaOptativa3() {

    var oAjax = this;

    // 5. Proceso la respuesta cuando llega
    if (oAjax.readyState == 4 && oAjax.status == 200) {

        document.getElementById("optativas3").innerHTML = oAjax.responseText;


    }
}


function getOptativa4() {
    //else hacemos el getCursos
    //Instanciar objeto Ajax
    var oAjax = instanciarXHR();
    var value = document.getElementById("selectCurso").value;
    var optativa1 = document.getElementById("selectOptativas").value;
    var optativa2 = document.getElementById("selectOptativas2").value;
    var optativa3 = document.getElementById("selectOptativas3").value;

    eliminarOptativas4();
    

    if(optativa2 != "Seleccione"){                
        //1. Preparar parametros
        var sDatos = "curso="+value;
        var sDatos2 ="opt1="+optativa1;
        var sDatos3 ="opt2="+optativa2;
        var sDatos4 ="opt3="+optativa3;
        //alert(sDatosEnvio);
        //2. Configurar la llamada --> Asincrono por defecto
        oAjax.open("GET", "php/matricula/getOptativa4.php?" + sDatos+ "&" +sDatos2+ "&" +sDatos3+ "&" +sDatos4);

        //3. Asociar manejador de evento de la respuesta
        oAjax.addEventListener("readystatechange", procesoRespuestaOptativa4, false);

        //4. Hacer la llamada
        oAjax.send();
    }
}
        

function procesoRespuestaOptativa4() {

    var oAjax = this;

    // 5. Proceso la respuesta cuando llega
    if (oAjax.readyState == 4 && oAjax.status == 200) {

        document.getElementById("optativas4").innerHTML = oAjax.responseText;


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

function eliminarOptativas2(){
    $("#optativas2").empty();
}

function eliminarOptativas3(){
    $("#optativas3").empty();
}

function eliminarOptativas4(){
    $("#optativas4").empty();
}

function eliminarAsgItinerarios(){   
    $("#asigItinerarios").empty();
}