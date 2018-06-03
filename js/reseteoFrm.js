if(document.getElementById('btnLogin')){
	document.getElementById('btnLogin').addEventListener("click",resetFrmLogin,false);
}

if(document.getElementById('btnRegistro')){
	document.getElementById('btnRegistro').addEventListener("click",resetFrmRegistro,false);
}

function resetFrmLogin(){
	document.frmLogin.reset();	
}


function resetFrmRegistro(){
	document.altaMatricula.reset();
}

function ocultarTabs(){
	document.getElementById('alumno').style.display = "none";
	document.getElementById('padre').style.display = "none";
	document.getElementById('madre').style.display = "none";
}

if(document.getElementById('alumno-tab')){
	document.getElementById('alumno-tab').addEventListener("click",mostrarAlum,false);
	document.getElementById('padre-tab').addEventListener("click",mostrarPadre,false);
	document.getElementById('madre-tab').addEventListener("click",mostrarMadre,false);
}
function mostrarAlum(){
	ocultarTabs();
	document.getElementById('alumno').style.display = "block";
}
function mostrarPadre(){
	ocultarTabs();
	document.getElementById('padre').style.display = "block";
}
function mostrarMadre(){
	ocultarTabs();
	document.getElementById('madre').style.display = "block";
}