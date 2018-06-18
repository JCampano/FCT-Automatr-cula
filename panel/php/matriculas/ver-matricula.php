<?php
    require_once ("../functions.php");
    extract($_POST);
    $matricula = ejecutaConsultaArray("SELECT m.cod_matricula as codM, m.fecha as fM, m.hora as hM, a.dni as dA,a.nombre as nombreA, a.apellido1 aA1, a.apellido2 as aA2, a.nie as nA, a.fecha_nac as fnA, a.direccion as dirA, a.poblacion as pA, a.provincia as provA, a.cod_postal as cpA, a.tel_fijo as tfA, a.tel_movil as tmA, a.correo as correoA, a.dni_padre as dPA, a.nombre_padre as nPA, a.apellidos_padre as aPA, a.tel_padre as tPA, a.correo_padre as cPA, a.dni_madre as dMA, a.nombre_madre as nMA, a.apellidos_madre as aMA, a.tel_madre as tMA, a.correo_madre as cMA, i.nombre as nI, c.nombre as nC, e.nombre as nE  from matriculas m inner join enseñanzas e, cursos c, itinerarios i, alumnos a where m.id_itinerario = i.id and c.id = i.id_curso and e.id = c.id_enseñanza and m.id_alumno = a.id and m.id=".$id);
?>

  <nav>
    <fieldset>
        <div class="row">
            <div class="col-md-12"> <h5>Datos académicos</h5></div>
        <div class="col-md-4 mb-3">
            <label>Enseñanza</label>
            <input type="text" class="form-control"  disabled value="<?php echo $matricula[0]['enseñanza']; ?>" >
        </div>
        <div class="col-md-4 mb-3">
            <label>Curso</label>
            <input type="text" class="form-control"  disabled value="<?php echo $matricula[0]['enseñanza']; ?>" >
        </div>
        <div class="col-md-4 mb-3">
            <label>Itinerario</label>
            <input type="text" class="form-control"  disabled value="<?php echo $matricula[0]['enseñanza']; ?>" >
        </div>
      
        <div class="col-md-3 mb-3">
            <label>Bloque 1</label>
            <input type="text" class="form-control"  disabled value="<?php echo $matricula[0]['enseñanza']; ?>" >
        </div>
        <div class="col-md-3 mb-3">
            <label>Bloque 2</label>
            <input type="text" class="form-control"  disabled value="<?php echo $matricula[0]['enseñanza']; ?>" >
        </div>
        <div class="col-md-3 mb-3">
            <label>Bloque 3</label>
            <input type="text" class="form-control"  disabled value="<?php echo $matricula[0]['enseñanza']; ?>" >
        </div>
        <div class="col-md-3 mb-3">
            <label>Bloque 4</label>
            <input type="text" class="form-control"  disabled value="<?php echo $matricula[0]['enseñanza']; ?>" >
        </div>
    </div>
    </fieldset>
    
   <h5>Datos Personales</h5>
    <div class="nav nav-tabs" id="nav-tab" role="tablist">
      <a class="nav-item nav-link active" id="btn-tab-alumno" data-toggle="tab" href="#tab-alumno" role="tab" aria-controls="nav-home" aria-selected="true">Alumno</a>
      <a class="nav-item nav-link" id="btn-tab-padre" data-toggle="tab" href="#tab-padre" role="tab" aria-controls="nav-profile" aria-selected="false">Padre</a>
      <a class="nav-item nav-link" id="btn-tab-madre" data-toggle="tab" href="#tab-madre" role="tab" aria-controls="nav-contact" aria-selected="false">Madre</a>

      
    </div>
  </nav>
  <div class="tab-content" id="nav-tabContent">
    <div class="tab-pane fade show active" id="tab-alumno" role="tabpanel" aria-labelledby="nav-home-tab">

    <div class="form-row">
        <div class="col-md-4 mb-3">
            <label for="nombre">Nombre</label>
            <input type="text" class="form-control" disabled name="nombreAlumno" placeholder="Nombre" value="<?php echo $matricula[0]['nombreA']; ?>" >
        </div>

        <div class="col-md-4 mb-3">
            <label for="apellido1">Primer Apellido</label>
            <input type="text" class="form-control"   disabled name="apellido1Alumno"  placeholder="Primer Apellido" value="<?php echo $matricula[0]['aA1']; ?>"">
        </div>

        <div class="col-md-4 mb-3">
            <label for="apellido2">Segundo Apellido</label>
            <input type="text" class="form-control"   disabled name="apellido2Alumno"  placeholder="Segundo Apellido" value="<?php echo $matricula[0]['aA2']; ?>">
        </div>    
    </div>

    <div class="form-row">
        <div class="col-md-6 mb-3">
            <label for="nie">NIE</label>
            <input type="text" class="form-control"   disabled name="nieAlumno" placeholder="NIE" value="<?php echo $matricula[0]['nA']; ?>">
        </div>
        <div class="col-md-6 mb-3">
            <label for="dni">DNI</label>
            <input type="text" class="form-control"  disabled  name="dniAlumno" placeholder="DNI" value="<?php echo $matricula[0]['dA']; ?>">
        </div>                                  
    </div>

    <div class="form-row">
        <div class="col-md-12 mb-3">
            <label for="direccion">Dirección</label>
            <input type="text" class="form-control"   disabled name="direcionAlumno" placeholder="Dirección" value="<?php echo $matricula[0]['direccion']; ?>">
        </div>                                                  
    </div>

    <div class="form-row">
        <div class="col-md-4 mb-3">
            <label for="poblacion">Población</label>
            <input type="text" class="form-control"   disabled name="poblacionAlumno" placeholder="Población" value="<?php echo $matricula[0]['poblacion']; ?>">
        </div>

        <div class="col-md-4 mb-3">
            <label for="provincia">Provincia</label>
            <input type="text" class="form-control"   disabled name="provinciaAlumno"  placeholder="Provincia" value="<?php echo $matricula[0]['provincia']; ?>">
        </div>

        <div class="col-md-4 mb-3">
            <label for="codigoPostal">Código Postal</label>
            <input type="text" class="form-control"   disabled name="codPostalAlumno"  placeholder="Código Postal" value="<?php echo $matricula[0]['cod_postal']; ?>" >
        </div>    
    </div>

    <div class="form-row">
        <div class="col-md-4 mb-3">
            <label for="telefono">Teléfono</label>
            <input type="text" class="form-control"   disabled name="telefonoAlumno" placeholder="Teléfono" value="<?php echo $matricula[0]['tel_fijo']; ?>">
        </div>

        <div class="col-md-4 mb-3">
            <label for="movil">Móvil</label>
            <input type="text" class="form-control"   disabled name="movilAlumno"  placeholder="Móvil" value="<?php echo $matricula[0]['tel_movil']; ?>">
        </div>

        <div class="col-md-4 mb-3">
            <label for="email">Email</label>
            <input type="email" class="form-control"   disabled name="emailAlumno"  placeholder="Email" value="<?php echo $matricula[0]['correo']; ?>" >
        </div>    
    </div>

    </fieldset>



    </div>
    <div class="tab-pane fade" id="tab-padre" role="tabpanel" aria-labelledby="nav-profile-tab">
        <fieldset>
     
        <div class="form-row">
            <div class="col-md-6 mb-3">
                <label for="nombre">Nombre</label>
                <input type="text" class="form-control"  disabled name="nombrePadre" placeholder="Nombre" value="<?php echo $matricula[0]['nombre_padre']; ?>" >
            </div>

            <div class="col-md-6 mb-3">
                <label for="dni">DNI</label>
                <input type="text" class="form-control"  disabled name="dniPadre" placeholder="DNI" value="<?php echo $matricula[0]['dni_padre']; ?>"> 
            </div>
        </div>  

        <div class="form-row">
            <div class="col-md-12 mb-3">
                <label for="apellidos">Apellidos</label>
                <input type="text" class="form-control"  disabled name="apellidosPadre"  placeholder="Apellidos" value="<?php echo $matricula[0]['apellidos_padre']; ?>" >
            </div>
        </div>

        <div class="form-row">
            <div class="col-md-4 mb-3">
                <label for="telefono">Teléfono</label>
                <input type="text" class="form-control"  disabled name="telefonoPadre" placeholder="Teléfono" value="<?php echo $matricula[0]['tel_padre']; ?>">
            </div>

            <div class="col-md-8 mb-3">
                <label for="email">Email</label>
                <input type="email" class="form-control" disabled  name="emailPadre"  placeholder="Email" value="<?php echo $matricula[0]['correo_padre']; ?>">
            </div>
        </div>  
        </fieldset> 

        

    </div>
    <div class="tab-pane fade" id="tab-madre" role="tabpanel" aria-labelledby="nav-contact-tab">

        <fieldset>
 
                <div class="form-row">
                    <div class="col-md-6 mb-3">
                        <label for="nombre">Nombre</label>
                        <input type="text" class="form-control"  disabled name="nombreMadre" placeholder="Nombre" value="<?php echo $matricula[0]['nombre_madre']; ?>">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="dni">DNI</label>
                        <input type="text" class="form-control" disabled  name="dmiMadre" placeholder="DNI" value="<?php echo $matricula[0]['dni_madre']; ?>" >
                    </div>                                 
                </div>  
                <div class="form-row">
                    <div class="col-md-12 mb-3">
                        <label for="apellidos">Apellidos</label>
                        <input type="text" class="form-control" disabled  name="apellidosMadre"  placeholder="Apellidos" value="<?php echo $matricula[0]['apellidos_madre']; ?>" >
                    </div>
                </div>

                <div class="form-row">
                    <div class="col-md-4 mb-3">
                        <label for="telefono">Teléfono</label>
                        <input type="text" class="form-control"  disabled name="telefonoMadre" placeholder="Teléfono" value="<?php echo $matricula[0]['tel_madre']; ?>" >
                    </div>

                    <div class="col-md-8 mb-3">
                        <label for="email">Email</label>
                        <input type="email" class="form-control"  disabled name="emailMadre"  placeholder="Email" value="<?php echo $matricula[0]['correo_madre']; ?>" >
                    </div>
                </div>  
                </fieldset> 
            </div>
            

        </div>

  </div>

   
  
