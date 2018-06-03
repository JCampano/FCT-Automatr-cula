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
	<form name="altaMatricula" class="needs-validation" novalidate>
		<div class="tab-pane fade show active" id="alumno" role="tabpanel" aria-labelledby="alumno-tab">
			<fieldset>
                <legend>Datos del ALumno/a:</legend>
                <div class="form-row">
                    <div class="col-md-4 mb-3">
                        <label for="nombre" class="control-label">Nombre</label>
                        <input type="text" class="form-control" name="nombre" placeholder="Nombre" required pattern="[a-zA-Z\s]{3,40}">
                        <span class="invalid-feedback">Introducir un nombre <strong>debe constar mínimo de 3 letras</strong></span>
                    </div>

                    <div class="col-md-4 mb-3">
                        <label for="apellido1" class="control-label">Primer apellido</label>
                        <input type="text" class="form-control" name="apellido1" placeholder="Primer apellido" required pattern="[a-zA-Z\s]{3,40}">
                        <span class="invalid-feedback">Introducir un apellido <strong>debe constar mínimo de 3 letras</strong></span>
                    </div>

                    <div class="col-md-4 mb-3">
                        <label for="apellido2" class="control-label">Segundo Apellido</label>
                        <input type="text" class="form-control" name="apellido2" placeholder="Segundo Apellido" required pattern="[a-zA-Z\s]{3,40}">
                        <span class="invalid-feedback">Introducir un apellido <strong>debe constar mínimo de 3 letras</strong></span>
                    </div>
                </div>

                <div class="form-row">
                    <div class="col-md-4 mb-3">
                        <label for="nie" class="control-label">NIE</label>
                        <input type="text" class="form-control" name="nie" placeholder="NIE" required pattern="^[XYZ]\d{7,8}[A-Z]$">
                        <span class="invalid-feedback">El campo NIE debe constar de <strong>1 letra, 7 números y 1 letra</strong></span>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="dni" class="control-label">DNI</label>
                        <input type="text" class="form-control" name="dni" placeholder="DNI" required pattern="\d{8}\w">
                        <span class="invalid-feedback">El campo DNI debe constar de <strong>8 Números y 1 Letra</strong></span>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="contrasena" class="control-label">Contrase&ntilde;a</label>
                        <input type="password" class="form-control" name="contrasena" placeholder="Contrase&ntilde;a" required>
                        <span class="invalid-feedback">Debe introducir una contrase&ntilde;a</span>
                    </div>
                </div>

                <div class="form-row">
                    <div class="col-md-6 mb-3">
                        <label for="direccion" class="control-label">Dirección</label>
                        <input type="text" class="form-control" name="direccion" placeholder="Dirección" required pattern="[a-zA-Z\s]{3,40}">
                        <span class="invalid-feedback">Introducir una dirección <strong>debe constar mínimo de 3 letras</strong></span>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="fecha_nac" class="control-label">Fecha Nacimiento</label>
                        <input type="date" class="form-control" name="fecha_nac" placeholder="Fecha Nacimiento">
                    </div>
                </div>

                <div class="form-row">
                    <div class="col-md-4 mb-3">
                        <label for="poblacion" class="control-label">Población</label>
                        <input type="text" class="form-control" name="poblacion" placeholder="Población" required pattern="[a-zA-Z\s]{3,40}">
                        <span class="invalid-feedback">Introducir una población <strong>debe constar mínimo de 3 letras</strong></span>
                    </div>

                    <div class="col-md-4 mb-3">
                        <label for="provincia" class="control-label">Provincia</label>
                        <input type="text" class="form-control" name="provincia" placeholder="Población" required pattern="[a-zA-Z\s]{3,40}">
                        <span class="invalid-feedback">Introducir una provincia <strong>debe constar mínimo de 3 letras</strong></span>
                    </div>

                    <div class="col-md-4 mb-3">
                        <label for="cod_postal" class="control-label">Código postal</label>
                        <input type="text" class="form-control" name="cod_postal" placeholder="Código postal" required pattern="^(?:0[1-9]\d{3}|[1-4]\d{4}|5[0-2]\d{3})$">
                        <span class="invalid-feedback">Introducir un código postal <strong>debe constar mínimo de 5 números comprendidos entre 01000 y 52999</strong></span>
                    </div>
                </div>

                <div class="form-row">
                    <div class="col-md-4 mb-3">
                        <label for="tel_fijo" class="control-label">Teléfono fijo</label>
                        <input type="text" class="form-control" name="tel_fijo" placeholder="Teléfono fijo" required pattern="^\d{9}$">
                        <span class="invalid-feedback">Introducir un teléfono fijo <strong>debe constar de 9 dígitos</strong></span>
                    </div>

                    <div class="col-md-4 mb-3">
                        <label for="tel_movil" class="control-label">Teléfono móvil</label>
                        <input type="text" class="form-control" name="tel_movil" placeholder="Teléfono móvil" required pattern="^\d{9}$">
                        <span class="invalid-feedback">Introducir un teléfono móvil <strong>debe constar de 9 dígitos</strong></span>
                    </div>

                    <div class="col-md-4 mb-3">
                        <label for="email" class="control-label">E-mail</label>
                        <input type="text" class="form-control" name="E-mail" placeholder="email" required pattern="^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$">
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
                        <input type="text" class="form-control" name="nombre_padre" placeholder="Nombre del padre" required pattern="[a-zA-Z\s]{3,40}">
                        <span class="invalid-feedback">Introducir un nombre <strong>debe constar mínimo de 3 letras</strong></span>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="dni_padre" class="control-label">DNI del padre</label>
                        <input type="text" class="form-control" name="dni_padre" placeholder="DNI del padre" required pattern="\d{8}\w">
                        <span class="invalid-feedback">El campo DNI debe constar de <strong>8 Números y 1 Letra</strong></span>
                    </div>
                </div>

                <div class="form-row">
                    <div class="col-md-12 mb-3">
                        <label for="apellidos_padre" class="control-label">Apellidos del padre</label>
                        <input type="text" class="form-control" name="apellidos_padre" placeholder="Apellidos del padre" required pattern="[a-zA-Z\s]{3,40}">
                        <span class="invalid-feedback">Introducir los apellidos <strong>debe constar mínimo de 3 letras</strong></span>
                    </div>
                </div>

                <div class="form-row">
                    <div class="col-md-4 mb-3">
                        <label for="tel_padre" class="control-label">Teléfono del padre</label>
                        <input type="text" class="form-control" name="tel_padre" placeholder="Teléfono del padre" required pattern="^\d{9}$">
                        <span class="invalid-feedback">Introducir un teléfono <strong>debe constar de 9 dígitos</strong></span>
                    </div>

                    <div class="col-md-8 mb-3">
                        <label for="email_padre" class="control-label">E-mail del padre</label>
                        <input type="text" class="form-control" name="email_padre" placeholder="E-mail del padre" required pattern="^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$">
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
                        <input type="text" class="form-control" name="nombre_madre" placeholder="Nombre de la madre" required pattern="[a-zA-Z\s]{3,40}">
                        <span class="invalid-feedback">Introducir un nombre <strong>debe constar mínimo de 3 letras</strong></span>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="dni_madre" class="control-label">DNI de la madre</label>
                        <input type="text" class="form-control" name="dni_madre" placeholder="DNI de la madre" required pattern="\d{8}\w">
                        <span class="invalid-feedback">El campo DNI debe constar de <strong>8 Números y 1 Letra</strong></span>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-12 mb-3">
                        <label for="apellidos_madre" class="control-label">Apellidos de la madre </label>
                        <input type="text" class="form-control" name="apellidos_madre" placeholder="Apellidos de la madre" required pattern="[a-zA-Z\s]{3,40}">
                        <span class="invalid-feedback">Introducir los apellidos <strong>debe constar mínimo de 3 letras</strong></span>
                    </div>
                </div>

                <div class="form-row">
                    <div class="col-md-6 mb-3">
                        <label for="tel_madre" class="control-label">Teléfono de la madre</label>
                        <input type="text" class="form-control" name="tel_madre" placeholder="Teléfono de la madre" required pattern="^\d{9}$">
                        <span class="invalid-feedback">Introducir un teléfono <strong>debe constar de 9 dígitos</strong></span>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="email_madre" class="control-label">E-mail de la madre</label>
                        <input type="text" class="form-control" name="E-mail_madre" placeholder="email del madre" required pattern="^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$">
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

	
                    
                           
                            	
                            		
		                                
		                            
		                                
		                            
		                               
		                            
                                
                        </div>
                    </div>
                

