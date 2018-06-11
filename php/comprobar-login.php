 <?php
session_start();
require_once("functions.php");
extract($_POST);

$dni=$_POST['dni'];
$contrasena=$_POST['contrasena'];
$consulta="SELECT * FROM alumnos WHERE DNI='".$dni."' AND CLAVE='".$contrasena."'";
$resulset=ejecutaConsulta($consulta);

    if($fila=$resulset->fetch(PDO::FETCH_ASSOC))
    {
        $_SESSION["login"]=$dni;
        $_SESSION["usuario"]=$fila['nombre'];
        if(isset($_SESSION['ruta'])){
            header('Location:../'.$_SESSION['ruta']);
        }else{
            header('Location: ../index.php');
        }
    }
    else
    {
        $_SESSION['tipoMensaje']= "danger";
        $_SESSION['mensajeRegistro'] = "Datos incorrectos";
        $_SESSION['sinLogin']="logueate";
        header('Location: ../index.php');
    }
?>
