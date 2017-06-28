<?php
require_once '../model/dto/Usuario.class.php';
require_once '../model/dao/implemen/UsuariosMySqlDAO.class.php';
$usuarioDAO = new UsuariosMySqlDAO();
$cedula = "";
$nombre = "";
$correo = "";
$estado = "";
$contrasena = "";
if (isset($_POST['registrar-usuario'])) {
    $cedula = ($_POST["dni"]);
    $nombre = ($_POST["nombres"]);
    $correo = ($_POST["correo"]);
    $estado = ($_POST["estado"]);
    $contrasena = ($_POST["contrasena"]);
    $usuario = new Usuario($cedula, $nombre, $correo, $estado, $contrasena);
    if ($usuarioDAO->insertar($usuario) > 0) {
        echo 'Si registro';
        $cedula = "";
        $nombre = "";
        $correo = "";
        $estado = "";
        $contrasena = "";
    } else {
        echo 'No registro';
    }
}
?>
<html>
    <head>
     <title>ADMIN CONJUNTO</title>
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
								<span><font face="sans-serif" color="black">Alejandra <br></font>
								</span>
								<p class="text-muted small">
									Administrador

								</p>
								<div class="divider">
								</div>
								<a href="index.php" class="view btn-sm active">
									Cerrar sesión
								</a>
							</div>
						</ul>
					</li>
				</ul>
			</div><!-- /.navbar-collapse -->
		</div><!-- /.container-fluid -->
	</nav>

	<!-- inicio menu -->
	<div class="row affix-row">
		<div class="col-sm-3 col-md-2 affix-sidebar">
			<div class="sidebar-nav" id="menu">
				<div class="navbar navbar-success" role="navigation">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-navbar-collapse">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<span class="visible-xs navbar-brand">Menu</span>
					</div>
					<div class="navbar-collapse collapse sidebar-navbar-collapse">
						<ul class="nav navbar-nav" id="sidenav01">
							<li>
								<a href="admin.html"><span class="glyphicon glyphicon-inbox"></span> Entrada </a>
							</li>						
							<li>
								<a href="si/usuarioAdmin.html" data-toggle="collapse" data-target="#toggleDemo2" data-parent="#sidenav01" class="collapsed">
									<span class="glyphicon glyphicon-user"></span> Gestion usuario <span class="caret"></span>
								</a>
								<div class="collapse" id="toggleDemo2" style="height: 0px;">
									<ul class="nav nav-list">
										<li><a href="#">Ingresar usuario</a></li>
										<li><a href="#">Buscar usuario</a></li>
									</ul>
								</div>
							</li>
							<li>
								<a href="#" data-toggle="collapse" data-target="#toggleDemo3" data-parent="#sidenav01" class="collapsed">
									<span class="glyphicon glyphicon-file"></span>  Gestion informacion <span class="caret"></span>
								</a>
								<div class="collapse" id="toggleDemo3" style="height: 0px;">
									<ul class="nav nav-list">
										<li><a href="si/residenteAdmin.html"> Residente</a></li>
										<li><a href="#"> Vehiculo</a></li>									
									</ul>
								</div>
							</li>
							<li>
								<a href="#" data-toggle="collapse" data-target="#toggleDemo4" data-parent="#sidenav01" class="collapsed">
									<span class="glyphicon glyphicon-folder-open"></span> Procesos Administrativos <span class="caret"></span>
								</a>
								<div class="collapse" id="toggleDemo4" style="height: 0px;">
									<ul class="nav nav-list">
										<li><a href="#">Parqueaderos</a></li>
										<li><a href="#">Pagos</a></li>
										<li><a href="#">Observaciones</a></li>
									</ul>
								</div>
							</li>
							<li>
								<a href="#" data-toggle="collapse" data-target="#toggleDemo5" data-parent="#sidenav01" class="collapsed">
									<span class="glyphicon glyphicon-list-alt"></span> Reportes <span class="caret"></span>
								</a>
								<div class="collapse" id="toggleDemo5" style="height: 0px;">
									<ul class="nav nav-list">
										<li><a href="si/reporteAdmin.html">Generar Reporte</a></li>
									</ul>
								</div>
							</li>						
						</div><!--/.nav-collapse -->
					</div>
				</div>
			</div>
			<!-- fin menu -->

			<!-- tabla de contenido -->
			<div class="col-sm-9 col-md-10 affix-content">
				<div class="container">

					<div class="page-header">
						<h3><span class="glyphicon glyphicon-user"></span> PERFIL ADMINISTRADOR</h3>
					</div>

					<table class="table" data-toggle="table" data-height="400" data-sort-name="apellido" data-sort-order="desc" data-show-columns="true" data-show-toggle="true" data-search="true" data-pagination="true" data-show-refresh="true">
						<thead>
							<tr>
								<th data align="center" data-sortable="true" data-field="numero">No.</th>
								<th data align="center" data-sortable="true" data-field="Actividad">Reporte de:</th>
								<th data align="center" data-sortable="true" data-field="Fecha">Fecha</th>										
							</tr>
						</thead>
						<tbody>
							<!-- tr*20>td*5 --><!-- tr filas td columnas -->
							<tr>
								<td>1</td>
								<td>Apartamentos en mora.
								</td>
								<td>05/01/2017</td>										
							</tr>
							<tr>
								<td>2</td>
								<td>Inquietud de residente</td>
								<td>08/01/2017</td>										
							</tr>
						</tbody>
						<!-- <tfoot></tfoot> -->
					</table>

					<h3 class="text-center"><font color="green">Nuevo usuario</font></h3> 
                                        <form id="formlogin" method="post" action="registrar-usuario.php">
						<div class="form-group label-floating has-success"> 
							<label class="control-label" for="focusedInput2">Documento del usuario</label>
                                                        <input type="number" class="form-control" name="dni" required="true" maxlength="11" value="<?= $cedula; ?>">
						</div>
						<div class="form-group label-floating has-success"> 
							<label class="control-label" for="focusedInput2">Nombre del usuario</label>
                                                        <input type="text" class="form-control" name="nombres" required="true" value="<?= $nombre; ?>">
						</div>
						<div class="form-group label-floating has-success"> 
							<label class="control-label" for="focusedInput2">Correo del usuario</label>
							<input type="text" class="form-control" name="correo" required="true" value="<?= $correo; ?>">
						</div>
						<div class="form-group label-floating has-success"> 
							<label class="control-label" for="focusedInput2">Estado del usuario</label>
							<input type="number" class="form-control" name="estado" required="true" value="<?= $estado; ?>">
						</div>
						<div class="form-group label-floating has-success"> 
							<label class="control-label" for="focusedInput2">Contrasena del usuario</label>
                                                        <input type="password" class="form-control" name="contrasena" required="true" value="<?= $contrasena; ?>">
						</div>

						<div class="modal-footer"> 
							<button type="submit" name="cancelar" class="btn btn-success" class="cancel" data-dismiss="modal">Cancelar</button>
                                                        <button type="submit" name="registrar-usuario" value="registrar-usuario" class="btn btn-success">Ingresar</button>  

						</div> 

					</form>

				</div>
			</div>
			<!-- fin tabla de contenido -->
    </body>
</html>
