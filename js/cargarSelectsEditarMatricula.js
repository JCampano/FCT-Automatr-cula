inicio();
function inicio(){
    getCombos();    
}
function getCombos(){
    //Instanciar objeto Ajax
    var oAjax = instanciarXHR();

    //1. Preparar parametros
    var sDatos = "";    
    //2. Configurar la llamada --> Asincrono por defecto
    oAjax.open("GET", "php/matricula/getCombos.php?");

    //3. Asociar manejador de evento de la respuesta
    oAjax.addEventListener("readystatechange", procesoRespuestaGetCombos, false);

    //4. Hacer la llamada
    oAjax.send();
}

function procesoRespuestaGetCombos(){
    var oAjax = this;
    // 5. Proceso la respuesta cuando llega
    if (oAjax.readyState == 4 && oAjax.status == 200) {
        document.getElementById("combosRellenos").innerHTML = oAjax.responseText;
    }
}






