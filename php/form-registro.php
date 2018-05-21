<?php
ob_start();
?>

<div class="container-fluid">
  <div class = "row">
    <div class ="col-lg-12">
      <form class="needs-validation" name="frmAltaAlumno" action="php/alumnos/altaAlumno.php" method="post" novalidate>
          <div class="form-group">
            <label for="dni" class="control-label">DNI</label>
            <input type="text" class="form-control"  name="dni" placeholder="DNI" required pattern="\d{8}\w">
              <span class="invalid-feedback">El campo DNI debe constar de <strong>8 Números</strong> y <strong>1 Letra</strong></span>
          </div>

          <div class="form-group">
            <label for="contrasena" class="control-label">Contrase&ntilde;a</label>
          <input type="password" class="form-control" name="contrasena" placeholder="Contrase&ntilde;a" required>
          <span class="invalid-feedback">Debe introducir una contrase&ntilde;a</span>
          </div>

          <div class="form-group">
            <label for="nombre" class="control-label">Nombre</label>
            <input type="text" class="form-control"  name="nombre" placeholder="Nombre" required pattern="[a-zA-Z\s]{3,40}">
            <span class="invalid-feedback">Introducir un nombre, <strong>Debe constar mínimo de 3 letras</strong></span>         
        </div>  

        <div class="form-group">
            <label for="apellido1" class="control-label">Primer apellido</label>
            <input type="text" class="form-control"  name="apellido1" placeholder="Primer apellido" required pattern="[a-zA-Z\s]{3,40}">
            <span class="invalid-feedback">Introducir un Apellido, <strong>Debe constar mínimo de 3 letras</strong></span>         
        </div>

        <div class="form-group">
            <label for="apellido2" class="control-label">Segundo Apellido</label>
            <input type="text" class="form-control"  name="apellido2" placeholder="Segundo Apellido" required pattern="[a-zA-Z\s]{3,40}">
            <span class="invalid-feedback">Introducir un Apellido, <strong>Debe constar mínimo de 3 letras</strong></span>
        </div>

        <div class="form-group">
            <label for="nie" class="control-label">NIE</label>
            <input type="text" class="form-control"  name="nie" placeholder="NIE" required pattern="/^[XYZ][0-9]{7}[A-Z]$/i">
              <span class="invalid-feedback">El campo NIE debe constar de <strong>7 números</strong> y <strong>dos letras</strong></span>
          </div>

          <div class="form-group">
              <label for="fecha_nac" class="control-label">Fecha Nacimiento</label>
            <input type="text" class="form-control"  name="fecha_nac" placeholder="Fecha Nacimiento" required pattern="^\d{1,2}\/\d{1,2}\/\d{2,4}$">
              <span class="invalid-feedback">El campo fecha debe tener el formato correcto. <strong>Ej: 3/09/1985</strong></span>
          </div>
          <!--
          <div class="form-group">

          </div>

          <div class="form-group">

          </div>

          <div class="form-group">

          </div>

          <div class="form-group">

          </div>

          <div class="form-group">

          </div>

          <div class="form-group">

          </div>

          <div class="form-group">

          </div>

          <div class="form-group">

          </div>

          <div class="form-group">

          </div>

          <div class="form-group">

          </div>

          <div class="form-group">

          </div>

          <div class="form-group">

          </div>

          <div class="form-group">

          </div>

          <div class="form-group">

          </div>

          <div class="form-group">

          </div>
          -->

          <div class="form-group">
            <button type="submit" class="btn btn-primary ">Enviar</button>
            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        </div>
      </form>
    </div>
  </div>
</div>     
