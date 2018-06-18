<?php	
    include "header.php";
    $_SESSION['ruta']= "registro-matricula.php";
    include "php/gestionlogin.php";

    //obtenemos el id del alumno
    $dni=$_SESSION['login'];    
    $consulta="SELECT * FROM alumnos WHERE DNI='".$dni."';";
    $resulset=ejecutaConsulta($consulta);
    $alumno=$resulset->fetch(PDO::FETCH_ASSOC);


    $consulta="SELECT * FROM matriculas WHERE id_alumno='".$alumno['id']."'";

if(ejecutaConsulta2($consulta)!=0)
{
    $_SESSION['tipoMensaje']= "warning";
    $_SESSION['mensajeRegistro'] = "<strong>Error</strong> Ese usuario ya tiene registrada una matricula, vaya a gestionar matriculas y seleccione editar matriculas";
    header('Location: index.php');    
}
?>

    <div class="fondo padding-arriba">
        <div class="container">


            <div class="card">
                <div class="card-header">
                    <h3>Registrar Matrícula</h3>
                </div>
                <div class="card-body">
                    <form name="altaMatricula" class="needs-validation" action="php/matricula/altaMatricula.php" method="post" novalidate>
                    	<div><!--style="display:none"-->
                            <fieldset>
                                <legend>Datos del Alumno/a:</legend>
                                <div class="form-row">
                                    <div class="col-md-4 mb-3">
                                        <label for="nombre">Nombre</label>
                                        <input type="text" class="form-control" disabled name="nombreAlumno" placeholder="Nombre" value="<?php echo $alumno['nombre']; ?>" >
                                    </div>

                                    <div class="col-md-4 mb-3">
                                        <label for="apellido1">Primer Apellido</label>
                                        <input type="text" class="form-control"   disabled name="apellido1Alumno"  placeholder="Primer Apellido" value="<?php echo $alumno['apellido1']; ?>"">
                                    </div>

                                    <div class="col-md-4 mb-3">
                                        <label for="apellido2">Segundo Apellido</label>
                                        <input type="text" class="form-control"   disabled name="apellido2Alumno"  placeholder="Segundo Apellido" value="<?php echo $alumno['apellido2']; ?>">
                                    </div>    
                                </div>

                                <div class="form-row">
                                    <div class="col-md-6 mb-3">
                                        <label for="nie">NIE</label>
                                        <input type="text" class="form-control"   disabled name="nieAlumno" placeholder="NIE" value="<?php echo $alumno['nie']; ?>">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="dni">DNI</label>
                                        <input type="text" class="form-control"  disabled  name="dniAlumno" placeholder="DNI" value="<?php echo $alumno['dni']; ?>">
                                    </div>                                  
                                </div>

                                <div class="form-row">
                                    <div class="col-md-12 mb-3">
                                        <label for="direccion">Dirección</label>
                                        <input type="text" class="form-control"   disabled name="direcionAlumno" placeholder="Dirección" value="<?php echo $alumno['direccion']; ?>">
                                    </div>                                                  
                                </div>

                                <div class="form-row">
                                    <div class="col-md-4 mb-3">
                                        <label for="poblacion">Población</label>
                                        <input type="text" class="form-control"   disabled name="poblacionAlumno" placeholder="Población" value="<?php echo $alumno['poblacion']; ?>">
                                    </div>

                                    <div class="col-md-4 mb-3">
                                        <label for="provincia">Provincia</label>
                                        <input type="text" class="form-control"   disabled name="provinciaAlumno"  placeholder="Provincia" value="<?php echo $alumno['provincia']; ?>">
                                    </div>

                                    <div class="col-md-4 mb-3">
                                        <label for="codigoPostal">Código Postal</label>
                                        <input type="text" class="form-control"   disabled name="codPostalAlumno"  placeholder="Código Postal" value="<?php echo $alumno['cod_postal']; ?>" >
                                    </div>    
                                </div>

                                <div class="form-row">
                                    <div class="col-md-4 mb-3">
                                        <label for="telefono">Teléfono</label>
                                        <input type="text" class="form-control"   disabled name="telefonoAlumno" placeholder="Teléfono" value="<?php echo $alumno['tel_fijo']; ?>">
                                    </div>

                                    <div class="col-md-4 mb-3">
                                        <label for="movil">Móvil</label>
                                        <input type="text" class="form-control"   disabled name="movilAlumno"  placeholder="Móvil" value="<?php echo $alumno['tel_movil']; ?>">
                                    </div>

                                    <div class="col-md-4 mb-3">
                                        <label for="email">Email</label>
                                        <input type="email" class="form-control"   disabled name="emailAlumno"  placeholder="Email" value="<?php echo $alumno['correo']; ?>" >
                                    </div>    
                                </div>

                                </fieldset>


                                <fieldset>
                                <legend>Datos del Padre/Tutor:</legend> 
                                <div class="form-row">
                                    <div class="col-md-6 mb-3">
                                        <label for="nombre">Nombre</label>
                                        <input type="text" class="form-control"  disabled name="nombrePadre" placeholder="Nombre" value="<?php echo $alumno['nombre_padre']; ?>" >
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label for="dni">DNI</label>
                                        <input type="text" class="form-control"  disabled name="dniPadre" placeholder="DNI" value="<?php echo $alumno['dni_padre']; ?>"> 
                                    </div>
                                </div>  

                                <div class="form-row">
                                    <div class="col-md-12 mb-3">
                                        <label for="apellidos">Apellidos</label>
                                        <input type="text" class="form-control"  disabled name="apellidosPadre"  placeholder="Apellidos" value="<?php echo $alumno['apellidos_padre']; ?>" >
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="col-md-4 mb-3">
                                        <label for="telefono">Teléfono</label>
                                        <input type="text" class="form-control"  disabled name="telefonoPadre" placeholder="Teléfono" value="<?php echo $alumno['tel_padre']; ?>">
                                    </div>

                                    <div class="col-md-8 mb-3">
                                        <label for="email">Email</label>
                                        <input type="email" class="form-control" disabled  name="emailPadre"  placeholder="Email" value="<?php echo $alumno['correo_padre']; ?>">
                                    </div>
                                </div>  
                                </fieldset> 

                                <fieldset>
                                <legend>Datos de la Madre/Tutora:</legend>  
                                <div class="form-row">
                                    <div class="col-md-6 mb-3">
                                        <label for="nombre">Nombre</label>
                                        <input type="text" class="form-control"  disabled name="nombreMadre" placeholder="Nombre" value="<?php echo $alumno['nombre_madre']; ?>">
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label for="dni">DNI</label>
                                        <input type="text" class="form-control" disabled  name="dmiMadre" placeholder="DNI" value="<?php echo $alumno['dni_madre']; ?>" >
                                    </div>                                 
                                </div>  
                                <div class="form-row">
                                    <div class="col-md-12 mb-3">
                                        <label for="apellidos">Apellidos</label>
                                        <input type="text" class="form-control" disabled  name="apellidosMadre"  placeholder="Apellidos" value="<?php echo $alumno['apellidos_madre']; ?>" >
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="col-md-4 mb-3">
                                        <label for="telefono">Teléfono</label>
                                        <input type="text" class="form-control"  disabled name="telefonoMadre" placeholder="Teléfono" value="<?php echo $alumno['tel_madre']; ?>" >
                                    </div>

                                    <div class="col-md-8 mb-3">
                                        <label for="email">Email</label>
                                        <input type="email" class="form-control"  disabled name="emailMadre"  placeholder="Email" value="<?php echo $alumno['correo_madre']; ?>" >
                                    </div>
                                </div>  
                                </fieldset> 
                            </div>

                                <fieldset>
                                <legend>Matrícula</legend>
                                <div class="form-row">
                                   <div class="col-md-12 mb-3" id="enseñanzas">                            
                                        
                                    </div>

                                    <div class="col-md-12 mb-3" id="cursos">                       
                                        
                                        
                                    </div>
                                    
                                    <div class="col-md-12 mb-3" id="itinerarios">                            
                                        
                                    </div>

                                    <div class="col-md-12 mb-3" id="asigItinerarios">

                                    </div>                   

	                                <div class="col-md-12 mb-3" id="combosOptativas">

                                    </div>                                  

                                    
                                </div>                                          
                                
                                </fieldset> 
                                    <div class="row">
                                	   <div id="btnSubmit" style="margin-left: 10px;margin-right: 10px;"></div>
                                       <div><a class="btn btn-danger" href="index.php">Volver</a></div>
                            	   <div>
                        </form>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript" src="js/cargarSelectsMatricula.js"> </script>
    <?php

    include "footer.php";
?>
