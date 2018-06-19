<?php
    require_once("../functions.php");
    extract($_POST);
    $datos = ejecutaConsultaArray("SELECT * from alumnos where id='$id'");

    $imagen = ejecutaConsultaArray("select * from imagenes where id_usuario=$id");

    if(count($imagen)!=0){
       $ruta = $imagen[0]["imagen"];
    } else {
      $ruta = "img/default-user.png";
    }
    
?>
<div class="row">
  <div class="col-sm-3">
  	<img src=".././<?php echo $ruta;?>" width="100%" style="margin-bottom:30px;">
    <div class="list-group" id="list-tab" role="tablist">
      <a class="list-group-item list-group-item-action active" id="list-home-list" data-toggle="list" href="#lista-alumno" role="tab" aria-controls="home">Datos Alumno</a>
      <a class="list-group-item list-group-item-action" id="list-profile-list" data-toggle="list" href="#lista-padre" role="tab" aria-controls="profile">Padre/Tutor</a>
      <a class="list-group-item list-group-item-action" id="list-messages-list" data-toggle="list" href="#lista-madre" role="tab" aria-controls="messages">Madre/Tutor</a>
    </div>
  </div>
  <div class="col-sm-9">
  	<form class="needs-validation" name="frmRegistro" action="php/alumnos/editarAlumno.php" method="post" novalidate>
      <input style="display:none;" name="id" value="<?php echo $id;?>">
    <div class="tab-content" id="nav-tabContent">
      <div class="tab-pane fade show active" id="lista-alumno" role="tabpanel" aria-labelledby="list-home-list">
      	
		<div class="form-row">
                    <div class="col-md-4 mb-3">
                        <label for="nombre" class="control-label">Nombre</label>
                        <input type="text" class="form-control" name="nombre" placeholder="Nombre" required pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]{3,40}" value="<?php echo $datos[0]["nombre"]?>">
                        <span class="invalid-feedback">Introduzca un nombre mínimo de <strong>3 letras</strong></span>
                    </div>

                    <div class="col-md-4 mb-3">
                        <label for="apellido1" class="control-label">Primer apellido</label>
                        <input type="text" class="form-control" name="apellido1" placeholder="Primer apellido" required pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]{3,40}" value="<?php echo $datos[0]["apellido1"]?>">
                        <span class="invalid-feedback">Introduzca un apellido mínimo de <strong>3 letras</strong></span>
                    </div>

                    <div class="col-md-4 mb-3">
                        <label for="apellido2" class="control-label">Segundo Apellido</label>
                        <input type="text" class="form-control" name="apellido2" placeholder="Segundo Apellido" required pattern="[a-zA-Z\s]{3,40}" value="<?php echo $datos[0]["apellido2"]?>">
                        <span class="invalid-feedback">Introduzca un apellido mínimo de <strong>3 letras</strong></span>
                    </div>
                </div>

                <div class="form-row">
                    <div class="col-md-4 mb-3">
                        <label for="nie" class="control-label">NIE</label>
                        <input type="text" class="form-control" name="nie" placeholder="NIE" required pattern="^[XYZ]{1}[0-9]{7}[TRWAGMYFPDXBNJZSQVHLCKET]{1}$" value="<?php echo $datos[0]["nie"]?>">
                        <span class="invalid-feedback">Introduzca un NIE que conste de <strong>1 letra, 7 números y 1 letra</strong></span>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="dni" class="control-label">DNI</label>
                        <input type="text" class="form-control" name="dni" placeholder="DNI" required pattern="\d{8}\w" value="<?php echo $datos[0]["dni"]?>">
                        <span class="invalid-feedback">Introduzca un DNI que conste de <strong>8 números y 1 letra</strong></span>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="direccion" class="control-label">Dirección</label>
                        <input type="text" class="form-control" name="direccion" placeholder="Dirección" required pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ,º0-9\s]{3,40}" value="<?php echo $datos[0]["direccion"]?>">
                        <span class="invalid-feedback">Introduzca una dirección mínimo de <strong>3 caracteres</strong></span>
                    </div>
                </div>

                <div class="form-row">
                    <div class="col-md-4 mb-3">
                        <label for="contrasena" class="control-label">Contrase&ntilde;a</label>
                        <input type="password" class="form-control" name="contrasena" placeholder="Contrase&ntilde;a" required pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ0-9\s]{5,40}" value="">
                        <span class="invalid-feedback">Introduzca una contraseña mínimo de <strong>5 letras/números</strong></span>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="contrasena" class="control-label">Repetir Contrase&ntilde;a</label>
                        <input type="password" class="form-control" name="contrasena2" placeholder="Repetir contrase&ntilde;a" required pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ0-9\s]{5,40}">
                        <span class="invalid-feedback">Las contraseñas no coinciden.</span>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="fecha_nac" class="control-label">Fecha Nacimiento</label>
                        <input type="date" class="form-control" name="fecha_nac" placeholder="Fecha Nacimiento" required pattern="^(0?[1-9]|[12][0-9]|3[01])[\/\-](0?[1-9]|1[012])[\/\-]\d{4}$" value="<?php echo $datos[0]["fecha_nac"]?>">
                        <span class="invalid-feedback">Introduzca una fecha con el formato correcto</span>
                    </div>
                </div>

                <div class="form-row">
                    <div class="col-md-4 mb-3">
                        <label for="poblacion" class="control-label">Población</label>
                        <input type="text" class="form-control" name="poblacion" placeholder="Población" required pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]{3,40}" value="<?php echo $datos[0]["poblacion"]?>">
                        <span class="invalid-feedback">Introduzca una población mínimo de <strong>3 letras</strong></span>
                    </div>

                    <div class="col-md-4 mb-3">
                        <label for="provincia" class="control-label">Provincia</label>
                        <input type="text" class="form-control" name="provincia" placeholder="Población" required pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]{3,40}" value="<?php echo $datos[0]["provincia"]?>">
                        <span class="invalid-feedback">Introduzca una provincia mínimo de <strong>3 letras</strong></span>
                    </div>

                    <div class="col-md-4 mb-3">
                        <label for="cod_postal" class="control-label">Código postal</label>
                        <input type="text" class="form-control" name="cod_postal" placeholder="Código postal" required pattern="^(?:0[1-9]\d{3}|[1-4]\d{4}|5[0-2]\d{3})$" value="<?php echo $datos[0]["cod_postal"]?>">
                        <span class="invalid-feedback">Introduzca un código postal mínimo de <strong>5 números comprendidos entre 01000 y 52999</strong></span>
                    </div>
                </div>

                <div class="form-row">
                    <div class="col-md-4 mb-3">
                        <label for="tel_fijo" class="control-label">Teléfono fijo</label>
                        <input type="text" class="form-control" name="tel_fijo" placeholder="Teléfono fijo" required pattern="^\d{9}$" value="<?php echo $datos[0]["tel_fijo"]?>">
                        <span class="invalid-feedback">Introduzca un teléfono fijo de <strong>9 dígitos</strong></span>
                    </div>

                    <div class="col-md-4 mb-3">
                        <label for="tel_movil" class="control-label">Teléfono móvil</label>
                        <input type="text" class="form-control" name="tel_movil" placeholder="Teléfono móvil" required pattern="^\d{9}$" value="<?php echo $datos[0]["tel_movil"]?>">
                        <span class="invalid-feedback">Introduzca un teléfono móvil de <strong>9 dígitos</strong></span>
                    </div>

                    <div class="col-md-4 mb-3">
                        <label for="email" class="control-label">E-mail</label>
                        <input type="text" class="form-control" name="correo" placeholder="E-mail" required pattern="" value="<?php echo $datos[0]["correo"]?>">
                        <span class="invalid-feedback">Debe introducir un email válido</span>
                    </div>
                </div>


      </div>
      <div class="tab-pane fade" id="lista-padre" role="tabpanel" aria-labelledby="list-profile-list">
      	<div class="form-row">
      	    <div class="col-md-6 mb-3">
      	        <label for="nombre_padre" class="control-label">Nombre del padre</label>
      	        <input type="text" class="form-control" name="nombre_padre" placeholder="Nombre del padre" required pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]{3,40}" value="<?php echo $datos[0]["nombre_padre"]?>">
      	       <span class="invalid-feedback">Introduzca un nombre mínimo de <strong>3 letras</strong></span>
      	    </div>

      	    <div class="col-md-6 mb-3">
      	        <label for="dni_padre" class="control-label">DNI del padre</label>
      	        <input type="text" class="form-control" name="dni_padre" placeholder="DNI del padre" required pattern="\d{8}\w" value="<?php echo $datos[0]["dni_padre"]?>">
      	        <span class="invalid-feedback">Introduzca un DNI que conste de <strong>8 números y 1 letra</strong></span>
      	    </div>
      	</div>

      	<div class="form-row">
      	    <div class="col-md-12 mb-3">
      	        <label for="apellidos_padre" class="control-label">Apellidos del padre</label>
      	        <input type="text" class="form-control" name="apellidos_padre" placeholder="Apellidos del padre" required pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]{3,40}" value="<?php echo $datos[0]["apellidos_padre"]?>">
      	         <span class="invalid-feedback">Introduzca los apellidos mínimo de <strong>3 letras</strong></span>
      	    </div>
      	</div>

      	<div class="form-row">
      	    <div class="col-md-4 mb-3">
      	        <label for="tel_padre" class="control-label">Teléfono del padre</label>
      	        <input type="text" class="form-control" name="tel_padre" placeholder="Teléfono del padre" required pattern="^\d{9}$" value="<?php echo $datos[0]["tel_padre"]?>">
      	        <span class="invalid-feedback">Introduzca un teléfono móvil de <strong>9 dígitos</strong></span>
      	    </div>

      	    <div class="col-md-8 mb-3">
      	        <label for="email_padre" class="control-label">E-mail del padre</label>
      	        <input type="text" class="form-control" name="correo_padre" placeholder="E-mail del padre" required pattern="
                " value="<?php echo $datos[0]["correo_padre"]?>">
      	        <span class="invalid-feedback">Debe introducir un email válido</span>
      	    </div>
      	</div>
      </div>
      <div class="tab-pane fade" id="lista-madre" role="tabpanel" aria-labelledby="list-messages-list">
      	<div class="form-row">
      	    <div class="col-md-6 mb-3">
      	        <label for="nombre_madre" class="control-label">Nombre de la madre</label>
      	        <input type="text" class="form-control" name="nombre_madre" placeholder="Nombre de la madre" required pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]{3,40}" value="<?php echo $datos[0]["nombre_madre"]?>">
      	        <span class="invalid-feedback">Introduzca un nombre mínimo de <strong>3 letras</strong></span>
      	    </div>

      	    <div class="col-md-6 mb-3">
      	        <label for="dni_madre" class="control-label">DNI de la madre</label>
      	        <input type="text" class="form-control" name="dni_madre" placeholder="DNI de la madre" required pattern="\d{8}\w" value="<?php echo $datos[0]["dni_madre"]?>">
      	        <span class="invalid-feedback">Introduzca un DNI que conste de <strong>8 números y 1 letra</strong></span>
      	    </div>
      	</div>
      	<div class="form-row">
      	    <div class="col-md-12 mb-3">
      	        <label for="apellidos_madre" class="control-label">Apellidos de la madre </label>
      	        <input type="text" class="form-control" name="apellidos_madre" placeholder="Apellidos de la madre" required pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]{3,40}" value="<?php echo $datos[0]["apellidos_madre"]?>">
      	        <span class="invalid-feedback">Introduzca los apellidos mínimo de <strong>3 letras</strong></span>
      	    </div>
      	</div>

      	<div class="form-row">
      	    <div class="col-md-6 mb-3">
      	        <label for="tel_madre" class="control-label">Teléfono de la madre</label>
      	        <input type="text" class="form-control" name="tel_madre" placeholder="Teléfono de la madre" required pattern="^\d{9}$" value="<?php echo $datos[0]["tel_madre"]?>">
      	        <span class="invalid-feedback">Introduzca un teléfono móvil de <strong>9 dígitos</strong></span>
      	    </div>

      	    <div class="col-md-6 mb-3">
      	        <label for="email_madre" class="control-label">E-mail de la madre</label>
      	        <input type="text" class="form-control" name="correo_madre" placeholder="email del madre" required pattern="" value="<?php echo $datos[0]["correo_madre"]?>">
      	        <span class="invalid-feedback">Debe introducir un email válido</span>
      	    </div>
      	</div>

      </div>
   
    </div>
       <div class="form-group text-right" style="margin-top:20px;">
            <button type="submit" class="btn btn-primary ">Enviar</button>
            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        </div>    
  </form>
  </div>
</div>
