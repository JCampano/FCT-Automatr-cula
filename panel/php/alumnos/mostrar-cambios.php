<?php
    require_once("../functions.php");

    extract($_POST);

    $resultado = ejecutaConsultaArray("SELECT * from alumnos where id=$id");

    $cambios = json_decode($resultado[0]["cambio_datos"]);
    $consulta="";
    echo '<form method="POST" action="php/alumnos/guardar-cambios.php">';
    echo '<input style="display:none;" name="id" value="'.$id.'">';
    foreach ($cambios as $indice=>$valor){
        if($indice=="dni"){
            $tipo = "DNI";
        }

        if($indice=="nombre"){
            $tipo = "Nombre";
        }

        if($indice=="apellido1"){
            $tipo = "Primer Apellido";
        }

        if($indice=="apellido2"){
            $tipo = "Segundo Apellido";
        }

        if($indice=="nie"){
            $tipo = "NIE";
        }

        if($indice=="fecha_nac"){
            $tipo = "Fecha de Nacimiento";
        }

        if($indice=="direccion"){
            $tipo = "Dirección";
        }
        if($indice=="poblacion"){
            $tipo = "Población";
        }

        if($indice=="provincia"){
            $tipo = "Provincia";
        }

        if($indice=="cod_postal"){
            $tipo = "Código Postal";
        }

        if($indice=="fel_fijo"){
            $tipo = "Teléfono Fijo";
        }

        if($indice=="tel_movil"){
            $tipo = "Teléfono Móvil";
        }

        if($indice=="correo"){
            $tipo = "Correo Electrónico";
        }

        if($indice=="dni_padre"){
            $tipo = "DNI Padre";
        }

        if($indice=="nombre_padre"){
            $tipo = "Nombre Padre";
        }
        if($indice=="apellidos_padre"){
            $tipo = "Apellidos Padre";
        }
        if($indice=="tel_padre"){
            $tipo = "Teléfono Padre";
        }

        if($indice=="correo_padre"){
            $tipo = "Correo Electrónico Padre";
        }

        if($indice=="dni_madre"){
            $tipo = "DNI Madre";
        }

        if($indice=="nombre_madre"){
            $tipo = "Nombre Madre";
        }
        if($indice=="apellidos_madre"){
            $tipo = "Apellidos Madre";
        }
        if($indice=="tel_madre"){
            $tipo = "Teléfono Madre";
        }

        if($indice=="correo_madre"){
            $tipo = "Correo Electrónico Madre";
        }

        


        echo '<div class="row" style="margin-top:20px;">

                <div class="col-sm-6">
                    <label for="nombre" class="control-label">'.$tipo.'</label>
                    <input type="text" class="form-control" disabled value="'.$resultado[0][$indice].'">
                    
                </div>

                <div class="col-sm-6">
                    <label for="nombre" class="control-label"> </label>
                    <input type="text" class="form-control" name="'.$indice.'" value="'.$valor.'">

                </div>

            </div>';
    }   



?>

<div class="text-right" style="margin-top:30px;"><button type="submit" class="btn btn-success">Confirmar Cambios</button><button type="button" class="btn btn-danger btn-denegar"  data-id="<?php echo $id; ?>" data-dismiss="modal">Denegar Cambios</button></div>
</form>
<script type="text/javascript">
    $(".btn-denegar").on("click", cancelarCambios);
    </script>