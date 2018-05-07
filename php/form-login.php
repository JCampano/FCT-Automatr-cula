    
    <div id="beforeFrm"></div>
    <div class="container-fluid">
    <div class = "row">
      <div class ="col-lg-12">
        <form class="needs-validation" name="frmLogin" action="php/comprobar-login.php" method="post" novalidate>
            <div class="form-group">
              <label for="dni" class="control-label">DNI</label>
              <input type="text" class="form-control" id="dni" name="dni" placeholder="DNI" required>
              <span class="invalid-feedback">Debe introducir un dni</span>
          </div>  

            <div class="form-group">
              <label for="contrasena" class="control-label">Contrase&ntilde;a</label>
            <input type="password" class="form-control" name="contrasena" placeholder="Contrase&ntilde;a" required>
            <span class="invalid-feedback">Debe introducir una contrase&ntilde;a</span>
            </div>

            <div class="form-group">
              <button type="submit" class="btn btn-primary ">Enviar</button>
              <button type="button" onclick = "location='index.php';" class="btn btn-default" data-dismiss="modal">Cerrar</button>
          </div>
        </form>
      </div>
    </div>
  </div>
