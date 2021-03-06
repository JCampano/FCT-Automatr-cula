<?php
    include "header.php";
    include "php/gestionlogin.php";
    $dni=$_SESSION['login'];    
    $consulta="SELECT * FROM alumnos WHERE DNI='".$dni."';";
    $resulset=ejecutaConsulta($consulta);
    $alumno=$resulset->fetch(PDO::FETCH_ASSOC);

    /*$consulta="SELECT * FROM MATRICULAS_REGISTRADAS WHERE ID_USUARIO='".$alumno['id']."';";
    $resulset=ejecutaConsulta($consulta);
    $matriculaRegistrada=$resulset->fetch(PDO::FETCH_ASSOC);
    */

    $consulta="SELECT * FROM matriculas WHERE ID_ALUMNO='".$alumno['id']."';";
    $resulset=ejecutaConsulta($consulta);
    $matricula=$resulset->fetch(PDO::FETCH_ASSOC);
    $fecha = date("d/m/Y", strtotime($matricula['fecha']));

    $urlEliminar = "id=".$matricula['id']."&codMat=".$matricula['cod_matricula'];
    $urlFinalizarMatricula = "id_alumno=".$alumno['id']."&id_matricula=".$matricula['id'];
   
?>

<div class="container margen-arriba">
        
    <div class="jumbotron">      
      <p class="lead">Aquí puedes gestionar las matrículas que has creado, además de guardarla e imprimirla en formato PDF.</p>
      
    </div>
    <?php
         if (isset($_SESSION['mensajeRegistro']) && isset($_SESSION['tipoMensaje']))  {
             echo '<div class="alert alert-'.$_SESSION['tipoMensaje'].' alert-dismissable ">
               <button type="button" class="close" data-dismiss="alert">&times;</button>'.$_SESSION["mensajeRegistro"].'</div>';
             unset($_SESSION['mensajeRegistro']);
             unset($_SESSION['tipoMensaje']);
        }
    ?>
    <div class="card">
      <div class="card-header">
        <?php if($matricula['id']!=""){?>
        Matrícula generada
      </div>
      <div class="card-body">
        <table class="table table-striped table-hover">
      <thead>
        <tr>
          <!--<th scope="col">Nº</th>-->
          <th scope="col">Código</th>
          <th scope="col">Nombre</th>
          <th scope="col">Fecha</th>
          <th scope="col">Acción</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <!--<th scope="row">1</th>-->
          
          <th scope="row"><?php echo $matricula['cod_matricula'];?></th>
          <td> <?php echo $alumno['nombre']." ".$alumno['apellido1']." ".$alumno['apellido2']; ?></td>
          <td><?php echo $fecha;?></td>
          <td>
            
            <div class="btn-group">
              <?php 
              if($matricula['finalizada']==0){
                echo '
                <a href="mostrarEditarMatricula.php" class="btn btn-secondary">Editar</a>
                <button type="button" class="btn btn-secondary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <span class="sr-only">Editar</span>
                </button>
                <div class="dropdown-menu">
                  <a class="dropdown-item" href="php/matricula/finalizarMatricula.php?'.$urlFinalizarMatricula.'">Finalizar Mátricula</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="php/matricula/eliminarMatricula.php?'.$urlEliminar.'">Eliminar</a>
                </div>';
                }else{
                  echo '<a href="php/imprimirMatricula.php" target="blank" class="btn btn-secondary">Imprimir</a>'; 
                }
              ?>
            </div>
         </td>
        </tr>
        
      </tbody>
    </table>
      </div>
    <?php }else{
      echo 'No has registrado ninguna matrícula. <a href="registro-matricula.php">Pulsa aquí para generar una</a>';
    }?>
     

</div></div>
    
</div>


<?php
    include "footer.php";
?>
