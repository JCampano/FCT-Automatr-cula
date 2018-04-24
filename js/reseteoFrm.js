document.getElementById('btnLogin').addEventListener("click",resetFrmLogin,false);
function resetFrmLogin(){
	document.frmLogin.reset();	
}

document.getElementById('btnRegistro').addEventListener("click",resetFrmRegistro,false);
function resetFrmRegistro(){
	document.frmAltaAlumno.reset();
}