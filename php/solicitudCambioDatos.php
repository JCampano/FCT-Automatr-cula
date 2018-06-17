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
    <form name="frmSolicitudCambioDatos" id="frmSolicitudCambioDatos" action="php/cambioDatos.php" class="needs-validation" method="post" novalidate>
        <div class="tab-pane fade show active" id="alumno" role="tabpanel" aria-labelledby="alumno-tab">
            <fieldset>
                <legend>Datos del Alumno/a:</legend>
                <div class="form-row">
                    <div class="col-md-4 mb-3">
                        <label for="nombre" class="control-label">Nombre</label>
                        <input type="text" class="form-control" name="nombre" placeholder="Nombre" value="<?php echo $alumno['nombre'];?>" required pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]{3,40}">
                        <span class="invalid-feedback">Introduzca un nombre mínimo de <strong>3 letras</strong></span>
                    </div>

                    <div class="col-md-4 mb-3">
                        <label for="apellido1" class="control-label">Primer apellido</label>
                        <input type="text" class="form-control" name="apellido1" placeholder="Primer apellido" value="<?php echo $alumno['apellido1'];?>" required pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]{3,40}">
                        <span class="invalid-feedback">Introduzca un apellido mínimo de <strong>3 letras</strong></span>
                    </div>

                    <div class="col-md-4 mb-3">
                        <label for="apellido2" class="control-label">Segundo Apellido</label>
                        <input type="text" class="form-control" name="apellido2" placeholder="Segundo Apellido" value="<?php echo $alumno['apellido2'];?>" required pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]{3,40}">
                        <span class="invalid-feedback">Introduzca un apellido mínimo de <strong>3 letras</strong></span>
                    </div>
                </div>

                <div class="form-row">
                    <div class="col-md-4 mb-3">
                        <label for="nie" class="control-label">NIE</label>
                        <input type="text" class="form-control" name="nie" placeholder="NIE" value="<?php echo $alumno['nie'];?>" required pattern="^[XYZ]{1}[0-9]{7}[A-Z]{1}$">
                        <span class="invalid-feedback">Introduzca un NIE que conste de <strong>1 letra ("X", "Y" o "Z"), 7 números y  1 letra de la "A" a la "Z" </strong></span>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="dni" class="control-label">DNI</label>
                        <input type="text" class="form-control" name="dni" placeholder="DNI" value="<?php echo $alumno['dni'];?>" required pattern="^(([A-Z])|\d)?\d{8}(\d|[A-Z])?$">
                        <span class="invalid-feedback">Introduzca un DNI que conste de <strong>8 números y 1 letra</strong></span>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="contrasena" class="control-label">Contrase&ntilde;a</label>
                        <input type="password" autofocus="autofocus" class="form-control" name="contrasenaCambioDatos" id="contrasenaCambioDatos" required pattern="[a-zA-Z0-9]{5,}$" value="<?php echo $alumno['clave']; ?>" 
                        placeholder ="Contrase&ntilde;a">
                        <span class="invalid-feedback">Introduzca una contraseña mínimo de <strong>5 letras/números.</strong></span>
                    </div>
                </div>

                <div class="form-row">
                    <div class="col-md-6 mb-3">
                        <label for="direccion" class="control-label">Dirección</label>
                        <input type="text" class="form-control" name="direccion" placeholder="Dirección" value="<?php echo $alumno['direccion'];?>" required pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ,º\/0-9\s]{3,40}">
                        <span class="invalid-feedback">Introduzca una dirección mínimo de <strong>3 caracteres</strong></span>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="fecha_nac" class="control-label">Fecha Nacimiento</label>
                        <input type="text" class="form-control" name="fecha_nac" placeholder="Fecha Nacimiento" value="
<?php echo $alumno['fecha_nac'];?>" required pattern="^\d{4}\-\d{2}\-\d{2}$">
                        <span class="invalid-feedback">Introduzca una fecha con el formato correcto</span>
                    </div>
                </div>

                <div class="form-row">
                    <div class="col-md-4 mb-3">
                        <label for="poblacion" class="control-label">Población</label>
                        <input type="text" class="form-control" name="poblacion" placeholder="Población" value="
<?php echo $alumno['poblacion'];?>" required pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]{3,40}">
                        <span class="invalid-feedback">Introduzca una población mínimo de <strong>3 letras</strong></span>
                    </div>

                    <div class="col-md-4 mb-3">
                        <label for="provincia" class="control-label">Provincia</label>
                        <input type="text" class="form-control" name="provincia" placeholder="Población" value="
<?php echo $alumno['provincia'];?>" required pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]{3,40}">
                        <span class="invalid-feedback">Introduzca una provincia mínimo de <strong>3 letras</strong></span>
                    </div>

                    <div class="col-md-4 mb-3">
                        <label for="cod_postal" class="control-label">Código postal</label>
                        <input type="text" class="form-control" name="cod_postal" placeholder="Código postal" value="
<?php echo $alumno['cod_postal'];?>" required pattern="^(?:0[1-9]\d{3}|[1-4]\d{4}|5[0-2]\d{3})$">
                        <span class="invalid-feedback">Introduzca un código postal mínimo de <strong>5 números comprendidos entre 01000 y 52999</strong></span>
                    </div>
                </div>

                <div class="form-row">
                    <div class="col-md-4 mb-3">
                        <label for="tel_fijo" class="control-label">Teléfono fijo</label>
                        <input type="text" class="form-control" name="tel_fijo" placeholder="Teléfono fijo" value="
<?php echo $alumno['tel_fijo'];?>" required pattern="^\d{9}$">
                        <span class="invalid-feedback">Introduzca un teléfono fijo de <strong>9 dígitos</strong></span>
                    </div>

                    <div class="col-md-4 mb-3">
                        <label for="tel_movil" class="control-label">Teléfono móvil</label>
                        <input type="text" class="form-control" name="tel_movil" placeholder="Teléfono móvil" value="
<?php echo $alumno['tel_movil'];?>" required pattern="^\d{9}$">
                        <span class="invalid-feedback">Introduzca un teléfono móvil de <strong>9 dígitos</strong></span>
                    </div>

                    <div class="col-md-4 mb-3">
                        <label for="email" class="control-label">E-mail</label>
                        <input type="text" class="form-control" name="email" placeholder="E-mail" value="
<?php echo $alumno['correo'];?>" required pattern="^[_a-z0-9-]+(.[_a-z0-9-]+)*@[a-z0-9-]+(.[a-z0-9-]+)*(.[a-z]{2,4})$">
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
                        <input type="text" class="form-control" name="nombre_padre" placeholder="Nombre del padre" value="
<?php echo $alumno['nombre_padre'];?>" required pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]{3,40}">
                        <span class="invalid-feedback">Introduzca un nombre mínimo de <strong>3 letras</strong></span>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="dni_padre" class="control-label">DNI del padre</label>
                        <input type="text" class="form-control" name="dni_padre" placeholder="DNI del padre" value="
<?php echo $alumno['dni_padre'];?>" required pattern="\d{8}\w">
                        <span class="invalid-feedback">Introduzca un DNI que conste de <strong>8 números y 1 letra</strong></span>
                    </div>
                </div>

                <div class="form-row">
                    <div class="col-md-12 mb-3">
                        <label for="apellidos_padre" class="control-label">Apellidos del padre</label>
                        <input type="text" class="form-control" name="apellidos_padre" placeholder="Apellidos del padre" value="
<?php echo $alumno['apellidos_padre'];?>" required pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]{3,40}">
                        <span class="invalid-feedback">Introduzca los apellidos mínimo de <strong>3 letras</strong></span>
                    </div>
                </div>

                <div class="form-row">
                    <div class="col-md-4 mb-3">
                        <label for="tel_padre" class="control-label">Teléfono del padre</label>
                        <input type="text" class="form-control" name="tel_padre" placeholder="Teléfono del padre" value="
<?php echo $alumno['tel_padre'];?>" required pattern="^\d{9}$">
                        <span class="invalid-feedback">Introduzca un teléfono móvil de <strong>9 dígitos</strong></span>
                    </div>

                    <div class="col-md-8 mb-3">
                        <label for="email_padre" class="control-label">E-mail del padre</label>
                        <input type="text" class="form-control" name="email_padre" placeholder="E-mail del padre" value="
<?php echo $alumno['correo_padre'];?>" required pattern="^[_a-z0-9-]+(.[_a-z0-9-]+)*@[a-z0-9-]+(.[a-z0-9-]+)*(.[a-z]{2,4})$">
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
                        <input type="text" class="form-control" name="nombre_madre" placeholder="Nombre de la madre" value="
<?php echo $alumno['nombre_madre'];?>" required pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]{3,40}">
                        <span class="invalid-feedback">Introduzca un nombre mínimo de <strong>3 letras</strong></span>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="dni_madre" class="control-label">DNI de la madre</label>
                        <input type="text" class="form-control" name="dni_madre" placeholder="DNI de la madre" value="
<?php echo $alumno['dni_madre'];?>" required pattern="\d{8}\w">
                        <span class="invalid-feedback">Introduzca un DNI que conste de <strong>8 números y 1 letra</strong></span>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-12 mb-3">
                        <label for="apellidos_madre" class="control-label">Apellidos de la madre </label>
                        <input type="text" class="form-control" name="apellidos_madre" placeholder="Apellidos de la madre" value="
<?php echo $alumno['apellidos_madre'];?>" required pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]{3,40}">
                        <span class="invalid-feedback">Introduzca los apellidos mínimo de <strong>3 letras</strong></span>
                    </div>
                </div>

                <div class="form-row">
                    <div class="col-md-6 mb-3">
                        <label for="tel_madre" class="control-label">Teléfono de la madre</label>
                        <input type="text" class="form-control" name="tel_madre" placeholder="Teléfono de la madre" value="
<?php echo $alumno['tel_madre'];?>" required pattern="^\d{9}$">
                        <span class="invalid-feedback">Introduzca un teléfono móvil de <strong>9 dígitos</strong></span>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="email_madre" class="control-label">E-mail de la madre</label>
                        <input type="text" class="form-control" name="email_madre" placeholder="email del madre" value="
<?php echo $alumno['correo_madre'];?>" required pattern="^[_a-z0-9-]+(.[_a-z0-9-]+)*@[a-z0-9-]+(.[a-z0-9-]+)*(.[a-z]{2,4})$">
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
