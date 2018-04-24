    <div class="container-fluid">
    <div class = "row">
      <div class ="col-lg-12">
        <form class="needs-validation" name="frmLogin" action="" method="post" novalidate>
            <div class="form-group">
              <label for="Email" class="control-label">Email</label>
              <input type="email" class="form-control"  name="email" placeholder="Email" required>
              <span class="invalid-feedback">Debe introducir un email</span>          
          </div>  

            <div class="form-group">
              <label for="password" class="control-label">Password</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Contrase&ntilde;a" required>
            <span class="invalid-feedback">Debe introducir una contrase&ntilde;a</span>
            </div>

            <div class="form-group">
              <button type="submit" class="btn btn-primary ">Submit</button>
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </form>
      </div>
    </div>
  </div>
