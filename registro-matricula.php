<?php	
    include "header.php";
    $_SESSION['ruta']= "registro-matricula.php";
    include "php/gestionlogin.php";
?>
    <div class="fondo padding-arriba">
        <div class="container">


            <div class="card">
                <div class="card-header">
                    <h3>Registrar Matrícula</h3>
                </div>
                <div class="card-body">
                    <form name="altaMatricula" class="needs-validation" novalidate>
                            <fieldset>
                                <legend>Datos del ALumno/a:</legend>
                                <div class="form-row">
                                    <div class="col-md-4 mb-3">
                                        <label for="nombre">Nombre</label>
                                        <input type="text" class="form-control" name="nombreAlumno" placeholder="Nombre" value="" required pattern="[a-zA-Z\s]{3,20}">
                                        <div class="invalid-feedback">El nombre debe constar de entre 3 y 20 letras</div>
                                    </div>

                                    <div class="col-md-4 mb-3">
                                        <label for="apellido1">Primer Apellido</label>
                                        <input type="text" class="form-control"  name="apellido1Alumno"  placeholder="Primer Apellido" value="" required pattern="[a-zA-Z\s]{3,20}">
                                        <div class="invalid-feedback">El apellido debe constar de entre 3 y 20 letras</div>
                                    </div>

                                    <div class="col-md-4 mb-3">
                                        <label for="apellido2">Segundo Apellido</label>
                                        <input type="text" class="form-control"  name="apellido2Alumno"  placeholder="Segundo Apellido" value="" required pattern="[a-zA-Z\s]{3,20}">
                                        <div class="invalid-feedback">El apellido debe constar de entre 3 y 20 letras</div>
                                    </div>    
                                </div>

                                <div class="form-row">
                                    <div class="col-md-6 mb-3">
                                        <label for="nie">NIE</label>
                                        <input type="text" class="form-control"  name="nieAlumno" placeholder="NIE" value="" required pattern="\w\d{7}\w">
                                        <div class="invalid-feedback">el NIE debe constar de 1 letra, 7 numeros y otra letras</div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="dni">DNI</label>
                                        <input type="text" class="form-control"  name="dniAlumno" placeholder="DNI" value="" required pattern="\d{8}\w">
                                        <div class="invalid-feedback">Debe introducir el DNI,consta de 8 numeros y 1 letra</div>
                                    </div>                                  
                                </div>

                                <div class="form-row">
                                    <div class="col-md-12 mb-3">
                                        <label for="direccion">Dirección</label>
                                        <input type="text" class="form-control"  name="direcionAlumno" placeholder="Dirección" value="" required>
                                        <div class="invalid-feedback">Debe introducir una Dirección</div>
                                    </div>                                                  
                                </div>

                                <div class="form-row">
                                    <div class="col-md-4 mb-3">
                                        <label for="poblacion">Población</label>
                                        <input type="text" class="form-control"  name="poblacionAlumno" placeholder="Población" value="" required pattern="[a-zA-Z\s]{3,20}">
                                        <div class="invalid-feedback">Consta de entre 3 y 20 letras</div>
                                    </div>

                                    <div class="col-md-4 mb-3">
                                        <label for="provincia">Provincia</label>
                                        <input type="text" class="form-control"  name="provinciaAlumno"  placeholder="Provincia" value="" required pattern="[a-zA-Z\s]{3,20}">
                                        <div class="invalid-feedback">Consta de entre 3 y 20 letras</div>
                                    </div>

                                    <div class="col-md-4 mb-3">
                                        <label for="codigoPostal">Código Postal</label>
                                        <input type="text" class="form-control"  name="codPostalAlumno"  placeholder="Código Postal" value="" required pattern="\d{5}">
                                        <div class="invalid-feedback">Debe introducir el Código Postal, consta de 5 números</div>
                                    </div>    
                                </div>

                                <div class="form-row">
                                    <div class="col-md-4 mb-3">
                                        <label for="telefono">Teléfono</label>
                                        <input type="text" class="form-control"  name="telefonoAlumno" placeholder="Teléfono" value="" required pattern="\w{9}">
                                        <div class="invalid-feedback">Debe introducir un Teléfono, consta de 9 numeros</div>
                                    </div>

                                    <div class="col-md-4 mb-3">
                                        <label for="movil">Móvil</label>
                                        <input type="text" class="form-control"  name="movilAlumno"  placeholder="Móvil" value="" required pattern="\w{9}">
                                        <div class="invalid-feedback">Debe introducir un Móvil,consta de 9 numeros</div>
                                    </div>

                                    <div class="col-md-4 mb-3">
                                        <label for="email">Email</label>
                                        <input type="email" class="form-control"  name="emailAlumno"  placeholder="Email" value="" required>
                                        <div class="invalid-feedback">Debe introducir el Email</div>
                                    </div>    
                                </div>

                                </fieldset>


                                <fieldset>
                                <legend>Datos del Padre/Tutor:</legend> 
                                <div class="form-row">
                                    <div class="col-md-6 mb-3">
                                        <label for="nombre">Nombre</label>
                                        <input type="text" class="form-control"  name="nombrePadre" placeholder="Nombre" value="" required pattern="[a-zA-Z\s]{3,20}">
                                        <div class="invalid-feedback">Debe introducir un nombre,consta de entre 3 y 20 letras</div>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label for="dni">DNI</label>
                                        <input type="text" class="form-control"  name="dniPadre" placeholder="DNI" value="" required pattern="\d{8}\w"> 
                                        <div class="invalid-feedback">Debe introducir un DNI,consta de 8 numeros y una letra</div>
                                    </div>
                                </div>  

                                <div class="form-row">
                                    <div class="col-md-12 mb-3">
                                        <label for="apellidos">Apellidos</label>
                                        <input type="text" class="form-control"  name="apellidosPadre"  placeholder="Apellidos" value="" required pattern="[a-zA-Z\s]{3,40}">
                                        <div class="invalid-feedback">Debe introducir los apellidos, constan de entre 3 y 40 letras</div>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="col-md-4 mb-3">
                                        <label for="telefono">Teléfono</label>
                                        <input type="text" class="form-control"  name="telefonoPadre" placeholder="Teléfono" value="" required pattern="\w{9}">
                                        <div class="invalid-feedback">Debe introducir un Teléfono consta de 9 números</div>
                                    </div>

                                    <div class="col-md-8 mb-3">
                                        <label for="email">Email</label>
                                        <input type="email" class="form-control"  name="emailPadre"  placeholder="Email" value="" required>
                                        <div class="invalid-feedback">Debe introducir el Email</div>
                                    </div>
                                </div>  
                                </fieldset> 

                                <fieldset>
                                <legend>Datos de la Madre/Tutora:</legend>  
                                <div class="form-row">
                                    <div class="col-md-6 mb-3">
                                        <label for="nombre">Nombre</label>
                                        <input type="text" class="form-control"  name="nombreMadre" placeholder="Nombre" value="" required pattern="[a-zA-Z\s]{3,20}">
                                        <div class="invalid-feedback">Debe introducir un nombre,consta de entre 3 y 20 letras</div>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label for="dni">DNI</label>
                                        <input type="text" class="form-control"  name="dmiMadre" placeholder="DNI" value="" required pattern="\d{8}\w">
                                        <div class="invalid-feedback">Debe introducir un DNI,consta de 8 números y 1 letra</div>
                                    </div>                                 
                                </div>  
                                <div class="form-row">
                                    <div class="col-md-12 mb-3">
                                        <label for="apellidos">Apellidos</label>
                                        <input type="text" class="form-control"  name="apellidosMadre"  placeholder="Apellidos" value="" required pattern="[a-zA-Z\s]{3,40}">
                                        <div class="invalid-feedback">Debe introducir los apellidos ,consta de entre 3 y 40 letras</div>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="col-md-4 mb-3">
                                        <label for="telefono">Teléfono</label>
                                        <input type="text" class="form-control"  name="telefonoMadre" placeholder="Teléfono" value="" required pattern="\w{9}">
                                        <div class="invalid-feedback">Debe introducir un Teléfono,consta de 9 números</div>
                                    </div>

                                    <div class="col-md-8 mb-3">
                                        <label for="email">Email</label>
                                        <input type="email" class="form-control"  name="emailMadre"  placeholder="Email" value="" required>
                                        <div class="invalid-feedback">Debe introducir el Email</div>
                                    </div>
                                </div>  
                                </fieldset> 


                                <fieldset>
                                <legend>Curso</legend>
                                <div class="form-row">
                                    <div class="col-md-4 mb-3">                            
                                        <label>Enseñanza</label>
                                        <select class="custom-select" name="selectEnseñanza">
                                            <option selected>Selecione</option>
                                            <option value="1">1 </option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                        </select>
                                    </div>

                                    <div class="col-md-4 mb-3">                            
                                        <label>Curso</label>
                                        <select class="custom-select" name="selectCurso">
                                            <option selected>Selecione</option>
                                            <option value="1">1 </option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                        </select>
                                    </div>

                                    <div class="col-md-4 mb-3">                            
                                        <label>Itinerario</label>
                                        <select class="custom-select" name="selectItinerario">
                                            <option selected>Selecione</option>
                                            <option value="1">1 </option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="col-md-4 mb-3">                            
                                        <label>Optativa</label>
                                        <select class="custom-select" name="selectOptativa1">
                                            <option selected>Selecione</option>
                                            <option value="1">1 </option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                        </select>
                                    </div>

                                    <div class="col-md-4 mb-3">                            
                                        <label>Optativa</label>
                                        <select class="custom-select" name="selectOptativa2">
                                            <option selected>Selecione</option>
                                            <option value="1">1 </option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                        </select>
                                    </div>

                                    <div class="col-md-4 mb-3">                            
                                        <label>Optativa</label>
                                        <select class="custom-select" name="selectOptativa3">
                                            <option selected>Selecione</option>
                                            <option value="1">1 </option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                        </select>
                                    </div>
                                </div>                                          
                                
                                </fieldset> 
                                <button class="btn btn-primary" type="submit">Submit </button>
                        </form>
                </div>
            </div>
        </div>
    </div>
    <?php
    include "footer.php";
?>
