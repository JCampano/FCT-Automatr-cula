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
	document.frmAltaAlumno.reset();
}