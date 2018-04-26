  <div class="container-fluid">
  <div class = "row">
    <div class ="col-lg-12">
      <form class="needs-validation" name="frmAltaAlumno" action="php/alumnos/altaAlumno.php" method="post" novalidate>
          <div class="form-group">
            <label for="dni" class="control-label">DNI</label>
            <input type="text" class="form-control"  name="dni" placeholder="DNI" required>
            <span class="invalid-feedback">Debe introducir el DNI</span>          
        </div>

          <div class="form-group">
            <label for="nombre" class="control-label">Nombre</label>
            <input type="text" class="form-control"  name="nombre" placeholder="Nombre" required>
            <span class="invalid-feedback">Debe introducir un nombre</span>         
        </div>  

        <div class="form-group">
            <label for="apellidos" class="control-label">Apellidos</label>
            <input type="text" class="form-control"  name="apellidos" placeholder="Apellidos" required>
            <span class="invalid-feedback">Debe introducir los Apellidos</span>         
        </div>  

          <div class="form-group">
            <label for="contrasena" class="control-label">Contrase&ntilde;a</label>
          <input type="password" class="form-control" id="contrasena" name="contrasena" placeholder="Contrase&ntilde;a" required>
          <span class="invalid-feedback">Debe introducir una contrase&ntilde;a</span>
          </div>

          <div class="form-group">
            <button type="submit" class="btn btn-primary ">Enviar</button>
            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        </div>
      </form>
    </div>
  </div>
</div>     
