<!DOCTYPE html>
<?php 
    

    require_once("php/functions.php");
    require_once("php/gestionlogin.php");

    if(!ISSET($_SESSION["role"])){
      session_destroy();
      header("Location: login.php");
    }

?>
<html lang="es">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" type="image/png" href="img/favicon.png" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>MatriculaT! | Panel de Control</title>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.16/datatables.min.css" />
    <link rel="stylesheet" href="css/style.css">
    <!-- Bootstrap core CSS-->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom fonts for this template-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <!-- Page level plugin CSS-->
    <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="css/sb-admin.css" rel="stylesheet">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
    <link rel="stylesheet" href="css/style.css">



</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
    <div class="modal fade" id="cerrar-sesion" tabindex="-1" role="dialog" aria-labelledby="cerrar-sesion" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Salir</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body" id="modal-asignatura">
                    <div class="row">
                        <div class="col-sm-9">
                            <p>¿Está seguro de que desea salir?</p>
                        </div>
                        <div class="col-sm-3">
                            <form action="php/logout.php" method="post" novalidate>




                                <button type="submit" class="btn btn-primary ">Si</button>
                                <button type="button" class="btn btn-primary" data-dismiss="modal">No</button>

                            </form>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
        <a class="navbar-brand" href="index.php"><img class="logo" src="img/logo.png"> </a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
        <div class="collapse navbar-collapse" id="navbarResponsive" data-toggle="collapse">
            <ul class="navbar-nav navbar-sidenav" id="ocultar-menu">
                <li id="btnInicioLista" class="nav-item" data-toggle="tooltip" data-placement="right" title="Inicio">
                    <a id="btnInicio" class="nav-link" href="index.php">
            <i class="fa fa-fw fa-dashboard"></i>
            <span class="nav-link-text '.$inicioActivo.'">Inicio</span>
          </a>
                </li>

                <li id="btnMatriculas" class="nav-item fondo-administrativo" data-toggle="tooltip" data-placement="right" title="Matrículas">
                    <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#menuMatriculas" data-parent="#menuMatriculas">
            <i class="fa fa-fw fa-file-alt"></i>
            <span class="nav-link-text">Matrículas</span>
          </a>
                    <ul class="sidenav-second-level collapse" id="menuMatriculas">
                        <li id="btnRegistrarMatriculaLista">
                            <a id="btnRegistrarMatricula" href="registrar-matricula.php"><i class="fa fa-fw fa-angle-right"></i>Registrar Matrícula</a>
                        </li>
                        <li id="btnMatriculasRegistradasLista">
                            <a id="btnMatriculasRegistradas" href="matriculas.php"><i class="fa fa-fw fa-angle-right"></i>Matrículas Registradas</a>
                        </li>
                        <li id="btnMatriculasNRegistradasLista">
                            <a id="btnMatriculasNRegistradas" href="matriculas.php?v=n"><i class="fa fa-fw fa-angle-right"></i>Matrículas no Registradas</a>
                        </li>
                    </ul>
                </li>

                <?php
          if($_SESSION["role"]=="gestor" || $_SESSION["role"]=="administrador"){


        ?>
                    <li id="btnEnsenanzasLista" class="nav-item fondo-gestor" data-toggle="tooltip" data-placement="right" title="Enseñanzas">
                        <a id="btnEnsenanzas" class="nav-link" href="ensenanzas.php">
            <i class="fa fa-fw fa-table"></i>
            <span class="nav-link-text">Enseñanzas</span>
          </a>
                    </li>
                    <li id="btnCursosLista" class="nav-item fondo-gestor" data-toggle="tooltip" data-placement="right" title="Cursos">
                        <a id="btnCursos" class="nav-link" href="cursos.php">
            <i class="fa fa-fw fa-table"></i>
            <span class="nav-link-text">Cursos</span>
          </a>
                    </li>


                    <li id="btnItinerariosLista" class="nav-item fondo-gestor" data-toggle="tooltip" data-placement="right" title="Itinerarios">
                        <a id="btnItinerarios" class="nav-link" href="itinerarios.php">
            <i class="fa fa-fw fa-table"></i>
            <span class="nav-link-text">Itinerarios</span>
          </a>
                    </li>
                    <li id="btnAsignaturaLista" class="nav-item fondo-gestor" data-toggle="tooltip" data-placement="right" title="Asignaturas">
                        <a id="btnAsignaturas" class="nav-link" href="asignaturas.php">
            <i class="fa fa-fw fa-table"></i>
            <span class="nav-link-text">Asignaturas</span>
          </a>
                    </li>
                    <li id="btnOptativasLista" class="nav-item fondo-gestor" data-toggle="tooltip" data-placement="right" title="Optativas">
                        <a id="btnOptativas" class="nav-link" href="optativas.php">
            <i class="fa fa-fw fa-table"></i>
            <span class="nav-link-text">Optativas</span>
          </a>
                    </li>
                    <li id="btnAlumnos" class="nav-item fondo-gestor" data-toggle="tooltip" data-placement="right" title="Alumnos">
                        <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#menuAlumnos" data-parent="#menuAlumnos">
            <i class="fa fa-fw fa-graduation-cap "></i>
            <span class="nav-link-text">Alumnos</span>
          </a>
                        <ul class="sidenav-second-level collapse" id="menuAlumnos">
                            <li id="btnGestionAlumnosLista">
                                <a id="btnGestionAlumnos" href="alumnos.php"><i class="fa fa-fw fa-angle-right"></i>Gestión Alumnos</a>
                            </li>
                            <li id="btnSolicitudesLista">
                                <a id="btnSolicitudes" href="solicitudes.php"><i class="fa fa-fw fa-angle-right"></i>Solicitudes</a>
                            </li>
                            <li id="btnImportarDatosLista">
                                <a id="btnImportarDatos" href="importar-datos.php"><i class="fa fa-fw fa-angle-right"></i>Importar Datos</a>
                            </li>
                        </ul>
                    </li>

                    <?php
          }

          if($_SESSION["role"]=="administrador"){


        ?>
                        <li id="btnUsuariosLista" class="nav-item fondo-administrador" data-toggle="tooltip" data-placement="right" title="Usuarios">
                            <a id="btnUsuarios" class="nav-link" href="usuarios.php">
            <i class="fa fa-fw fa-users"></i>
            <span class="nav-link-text">Usuarios</span>
          </a>
                        </li>


                        <?php
         }

        ?>
            </ul>

            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown">

                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle mr-lg-2" id="botonNotificaciones" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fa fa-fw fa-bell"></i>
            <span class="d-lg-none">Notificaciones
              <span class="badge badge-pill badge-warning"></span>
            </span>
            <span class="indicator text-warning d-none d-lg-block">
              <i class="fa fa-fw fa-circle" id="circuloNotificaciones" style="display:none;"></i>
            </span>
          </a>
                    <div class="dropdown-menu" aria-labelledby="alertsDropdown" id="zonaNotificaciones">
                        <div class="text-center"><img src="img/cargando.gif" style="width:50px;"></div>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="mi-perfil.php">
                     <i class="fa fa-fw fa-user"></i><?php echo $_SESSION["nombre"]; ?></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="modal" data-target="#cerrar-sesion">
            <i class="fa fa-fw fa-sign-out"></i>Salir</a>
                </li>
            </ul>
        </div>
    </nav>
