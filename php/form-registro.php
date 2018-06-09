<?php
ob_start();
?>
<ul class="nav nav-tabs" id="myTab" role="tablist">
  <li class="nav-item">
    <a class="nav-link active" id="alumno-tab" data-toggle="tab" href="#alumno" role="tab" aria-controls="alumno" aria-selected="true"> Datos Alumno</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="padre-tab" data-toggle="tab" href="#padre" role="tab" aria-controls="padre" aria-selected="false">Datos Padre / Tutor</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="madre-tab" data-toggle="tab" href="#madre" role="tab" aria-controls="madre" aria-selected="false">Madre / Tutor</a>
  </li>
</ul>
<div class="tab-content">
     <form class="needs-validation" name="frmRegistro" action="php/alumnos/altaAlumno.php" method="post" novalidate>
		<div class="tab-pane fade show active" id="alumno" role="tabpanel" aria-labelledby="alumno-tab">
			<fieldset>
                <legend>Datos del Alumno/a:</legend>
                <div class="form-row">
                    <div class="col-md-4 mb-3">
                        <label for="nombre" class="control-label">Nombre</label>
                        <input type="text" class="form-control" name="nombre" placeholder="Nombre" required pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]{3,40}">
                        <span class="invalid-feedback">Introduzca un nombre mínimo de <strong>3 letras</strong></span>
                    </div>

                    <div class="col-md-4 mb-3">
                        <label for="apellido1" class="control-label">Primer apellido</label>
                        <input type="text" class="form-control" name="apellido1" placeholder="Primer apellido" required pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]{3,40}">
                        <span class="invalid-feedback">Introduzca un apellido mínimo de <strong>3 letras</strong></span>
                    </div>

                    <div class="col-md-4 mb-3">
                        <label for="apellido2" class="control-label">Segundo Apellido</label>
                        <input type="text" class="form-control" name="apellido2" placeholder="Segundo Apellido" required pattern="[a-zA-Z\s]{3,40}">
                        <span class="invalid-feedback">Introduzca un apellido mínimo de <strong>3 letras</strong></span>
                    </div>
                </div>

                <div class="form-row">
                    <div class="col-md-4 mb-3">
                        <label for="nie" class="control-label">NIE</label>
                        <input type="text" class="form-control" name="nie" placeholder="NIE" required pattern="^[XYZ]{1}[0-9]{7}[A-Z]{1}$">
                        <span class="invalid-feedback">Introduzca un NIE que conste de <strong> letra "X" o "Y" o "Z", 7 números y  1 letra de la Aa la Z </strong></span>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="dni" class="control-label">DNI</label>
                        <input type="text" class="form-control" name="dni" placeholder="DNI" required pattern="\d{8}\w">
                        <span class="invalid-feedback">Introduzca un DNI que conste de <strong>8 números y 1 letra</strong></span>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="direccion" class="control-label">Dirección</label>
                        <input type="text" class="form-control" name="direccion" placeholder="Dirección" required pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ,º0-9\s]{3,40}">
                        <span class="invalid-feedback">Introduzca una dirección mínimo de <strong>3 caracteres</strong></span>
                    </div>
                </div>

                <div class="form-row">
                    <div class="col-md-4 mb-3">
                        <label for="contrasena" class="control-label">Contrase&ntilde;a</label>
                        <input type="password" autofocus="autofocus" class="form-control" name="contrasena" id="contrasena" placeholder="Contrase&ntilde;a" >
                        <!-- <span class="invalid-feedback">Introduzca una contraseña mínimo de <strong>5 letras/números</strong></span> -->
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="contrasena2" class="control-label">Repetir Contrase&ntilde;a</label>
                        <input type="password" class="form-control" name="contrasena2" id="contrasena2" placeholder="Repetir contrase&ntilde;a">
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="fecha_nac" class="control-label">Fecha Nacimiento</label>
                        <input type="date" class="form-control" name="fecha_nac" placeholder="Fecha Nacimiento" required pattern="^(0?[1-9]|[12][0-9]|3[01])[\/\-](0?[1-9]|1[012])[\/\-]\d{4}$">
                        <span class="invalid-feedback">Introduzca una fecha con el formato correcto</span>
                    </div>
                </div>

                <div class="form-row">
                    <div class="col-md-4 mb-3">
                        <label for="poblacion" class="control-label">Población</label>
                        <input type="text" class="form-control" name="poblacion" placeholder="Población" required pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]{3,40}">
                        <span class="invalid-feedback">Introduzca una población mínimo de <strong>3 letras</strong></span>
                    </div>

                    <div class="col-md-4 mb-3">
                        <label for="provincia" class="control-label">Provincia</label>
                        <input type="text" class="form-control" name="provincia" placeholder="Población" required pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]{3,40}">
                        <span class="invalid-feedback">Introduzca una provincia mínimo de <strong>3 letras</strong></span>
                    </div>

                    <div class="col-md-4 mb-3">
                        <label for="cod_postal" class="control-label">Código postal</label>
                        <input type="text" class="form-control" name="cod_postal" placeholder="Código postal" required pattern="^(?:0[1-9]\d{3}|[1-4]\d{4}|5[0-2]\d{3})$">
                        <span class="invalid-feedback">Introduzca un código postal mínimo de <strong>5 números comprendidos entre 01000 y 52999</strong></span>
                    </div>
                </div>

                <div class="form-row">
                    <div class="col-md-4 mb-3">
                        <label for="tel_fijo" class="control-label">Teléfono fijo</label>
                        <input type="text" class="form-control" name="tel_fijo" placeholder="Teléfono fijo" required pattern="^\d{9}$">
                        <span class="invalid-feedback">Introduzca un teléfono fijo de <strong>9 dígitos</strong></span>
                    </div>

                    <div class="col-md-4 mb-3">
                        <label for="tel_movil" class="control-label">Teléfono móvil</label>
                        <input type="text" class="form-control" name="tel_movil" placeholder="Teléfono móvil" required pattern="^\d{9}$">
                        <span class="invalid-feedback">Introduzca un teléfono móvil de <strong>9 dígitos</strong></span>
                    </div>

                    <div class="col-md-4 mb-3">
                        <label for="email" class="control-label">E-mail</label>
                        <input type="text" class="form-control" name="email" placeholder="E-mail" required pattern="^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3,4})+$">
                        <span class="invalid-feedback">Debe introducir un email válido</span>
                    </div>
                </div>

            </fieldset>
		</div>
		<div class="tab-pane fade" id="padre" role="tabpanel" aria-labelledby="padre-tab" style="display:none">
			<fieldset>
                <legend>Datos del Padre/Tutor:</legend>
                <div class="form-row">
                    <div class="col-md-6 mb-3">
                        <label for="nombre_padre" class="control-label">Nombre del padre</label>
                        <input type="text" class="form-control" name="nombre_padre" placeholder="Nombre del padre" required pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]{3,40}">
                       <span class="invalid-feedback">Introduzca un nombre mínimo de <strong>3 letras</strong></span>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="dni_padre" class="control-label">DNI del padre</label>
                        <input type="text" class="form-control" name="dni_padre" placeholder="DNI del padre" required pattern="\d{8}\w">
                        <span class="invalid-feedback">Introduzca un DNI que conste de <strong>8 números y 1 letra</strong></span>
                    </div>
                </div>

                <div class="form-row">
                    <div class="col-md-12 mb-3">
                        <label for="apellidos_padre" class="control-label">Apellidos del padre</label>
                        <input type="text" class="form-control" name="apellidos_padre" placeholder="Apellidos del padre" required pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]{3,40}">
                         <span class="invalid-feedback">Introduzca los apellidos mínimo de <strong>3 letras</strong></span>
                    </div>
                </div>

                <div class="form-row">
                    <div class="col-md-4 mb-3">
                        <label for="tel_padre" class="control-label">Teléfono del padre</label>
                        <input type="text" class="form-control" name="tel_padre" placeholder="Teléfono del padre" required pattern="^\d{9}$">
                        <span class="invalid-feedback">Introduzca un teléfono móvil de <strong>9 dígitos</strong></span>
                    </div>

                    <div class="col-md-8 mb-3">
                        <label for="email_padre" class="control-label">E-mail del padre</label>
                        <input type="text" class="form-control" name="email_padre" placeholder="E-mail del padre" required pattern="^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3,4})+$">
                        <span class="invalid-feedback">Debe introducir un email válido</span>
                    </div>
                </div>
            </fieldset>
		</div>
		<div class="tab-pane fade" id="madre" role="tabpanel" aria-labelledby="madre-tab" style="display:none">
			 <fieldset>
                <legend>Datos de la Madre/Tutora:</legend>
                <div class="form-row">
                    <div class="col-md-6 mb-3">
                        <label for="nombre_madre" class="control-label">Nombre de la madre</label>
                        <input type="text" class="form-control" name="nombre_madre" placeholder="Nombre de la madre" required pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]{3,40}">
                        <span class="invalid-feedback">Introduzca un nombre mínimo de <strong>3 letras</strong></span>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="dni_madre" class="control-label">DNI de la madre</label>
                        <input type="text" class="form-control" name="dni_madre" placeholder="DNI de la madre" required pattern="\d{8}\w">
                        <span class="invalid-feedback">Introduzca un DNI que conste de <strong>8 números y 1 letra</strong></span>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-12 mb-3">
                        <label for="apellidos_madre" class="control-label">Apellidos de la madre </label>
                        <input type="text" class="form-control" name="apellidos_madre" placeholder="Apellidos de la madre" required pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]{3,40}">
                        <span class="invalid-feedback">Introduzca los apellidos mínimo de <strong>3 letras</strong></span>
                    </div>
                </div>

                <div class="form-row">
                    <div class="col-md-6 mb-3">
                        <label for="tel_madre" class="control-label">Teléfono de la madre</label>
                        <input type="text" class="form-control" name="tel_madre" placeholder="Teléfono de la madre" required pattern="^\d{9}$">
                        <span class="invalid-feedback">Introduzca un teléfono móvil de <strong>9 dígitos</strong></span>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="email_madre" class="control-label">E-mail de la madre</label>
                        <input type="text" class="form-control" name="email_madre" placeholder="email del madre" required pattern="^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3,4})+$">
                        <span class="invalid-feedback">Debe introducir un email válido</span>
                    </div>
                </div>
            </fieldset>
		</div>
		<div class="form-group">
            <button type="submit" class="btn btn-primary ">Enviar</button>
            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        </div>						      
    </form>
</div>
