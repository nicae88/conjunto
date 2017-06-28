<?php
require_once '../model/dto/Vehiculo.class.php';
require_once '../model/dao/implemen/VehiculosMySqlDAO.class.php';
$vehiculosDAO = new VehiculosMySqlDAO();
$idVehiculo = "";
$marcaVehiculo = "";
$placaVehiculo = "";
$tipoVehiculo = "";
$idUsuario = "";
if (isset($_POST['registrar-vehiculo'])) {
    $idVehiculo = ($_POST["VehId"]);
    $marcaVehiculo = ($_POST["vehMarca"]);
    $placaVehiculo = ($_POST["vehPlaca"]);
    $tipoVehiculo = ($_POST["vehTipo"]);
    $idUsuario = ($_POST["UsuId"]);
    $vehiculo = new Vehiculo($idVehiculo, $marcaVehiculo, $placaVehiculo, $tipoVehiculo, $idUsuario);
    if ($vehiculosDAO->insert($vehiculo) > 0) {
        echo 'Si registro';
        $idVehiculo = "";
        $marcaVehiculo = "";
        $placaVehiculo = "";
        $tipoVehiculo = "";
        $idUsuario = "";
    } else {
        echo 'No registro';
    }
}
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>Registrar Vehículo</title>
        <meta charset="utf-8"> 
        <meta http-equiv="X-UA-Compatible" content="IE=edge"> 
        <meta name="viewport" content="width=device-width, initial-scale=1"> 

        <!-- estilos -->
        <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="css/bootstrap-material-design.css">
        <link rel="stylesheet" type="text/css" href="css/ripples.css">	
        <link rel="stylesheet" type="text/css" href="css/font-awesome.css">
        <link rel="stylesheet" type="text/css" href="css/estilosAdmin.css">
        <link href="imgs/logoPerfil.ico" rel="icon">
        <!-- estilos -->

        <!-- iconos google -->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    </head>
    <body>
        <nav class="navbar navbar-success">
            <div id="uno" class="container-fluid">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#"><img src="imgs/logoPerfil2.jpg" class="img-circle" alt="logoSiji" width="55" height="40"></a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li class="active"><h1> EDIFICIO SENA </h1></li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><img src="imgs/usuarioA.jpg" class="img-circle" alt="user" width="55" height="40" margin-bottom="10"><span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <div id="dos" class="navbar-content">
                                    <span><font face="sans-serif" color="black">Administrador<br></font>
                                    </span>
                                    <p class="text-muted small">
                                        Registro Vehículo

                                    </p>
                                    <div class="divider">
                                    </div>
                                    <a href="admin.php" class="view btn-sm active">
                                        Volver
                                    </a>
                                </div>
                            </ul>
                        </li>
                    </ul>
                </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
        </nav>

        <div class="col-sm-9 col-md-10 affix-content">
            <div class="container">

                <div class="page-header">
                    <h3><span class="glyphicon glyphicon-user"></span> REGISTRO VEHÍCULO</h3>

                    <h3 class="text-center"><font color="green">Nuevo usuario</font></h3> 
                    <form id="formlogin" method="post" action="registrar-vehiculo.php">
                        <div class="form-group label-floating has-success"> 
                            <label class="control-label" for="focusedInput2">Id del Vehículo</label>
                            <input type="number" class="form-control" name="VehId" required="true" maxlength="11" value="<?= $idVehiculo; ?>">
                        </div>
                        <div class="form-group label-floating has-success"> 
                            <label class="control-label" for="focusedInput2">Marca</label>
                            <input type="text" class="form-control" name="vehMarca" required="true" value="<?= $marcaVehiculo; ?>">
                        </div>
                        <div class="form-group label-floating has-success"> 
                            <label class="control-label" for="focusedInput2">Placa</label>
                            <input type="text" class="form-control" name="vehPlaca" required="true" value="<?= $placaVehiculo; ?>">
                        </div>
                        <div class="form-group label-floating has-success"> 
                            <label class="control-label" for="focusedInput2">Tipo</label>
                            <input type="text" class="form-control" name="vehTipo" required="true" value="<?= $tipoVehiculo; ?>">
                        </div>
                        <div class="form-group label-floating has-success"> 
                            <label class="control-label" for="focusedInput2">Usuarios Id</label>
                            <input type="number" class="form-control" name="UsuId" required="true" maxlength="11" value="<?= $idUsuario; ?>">
                        </div>

                        <div class="modal-footer"> 
                            <button type="submit" name="cancelar" class="btn btn-success" class="cancel" data-dismiss="modal">Cancelar</button>
                            <button type="submit" name="registrar-vehiculo" value="registrar-vehiculo" class="btn btn-success">Ingresar</button>  

                        </div> 

                    </form>

                </div>

            </div>
        </div>

    </body>
</html>
