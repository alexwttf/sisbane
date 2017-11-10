<?php 
ob_start();
session_start();
require_once 'config.php'; 
if(!isset($_SESSION['logged_in'])){
    header('Location: index.php');
}
?>



<?php 
	if( !empty( $_POST )){
		try {
			$user_obj = new Cl_User();
			$data = $user_obj->account( $_POST );
			if($data)$success = PASSOWRD_CHANAGE_SUCCESS;
		} catch (Exception $e) {
			$error = $e->getMessage();
		} 
	}
?>




<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png" />
    <link rel="icon" type="image/png" href="../assets/img/favicon.png" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>SISBANE LH</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
    <!-- Bootstrap core CSS     -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
    <!--  Material Dashboard CSS    -->
    <link href="assets/css/material-dashboard.css" rel="stylesheet" />
    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="assets/css/demo.css" rel="stylesheet" />
    <!--     Fontnd icons     -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Material+Icons" />

    <!--     Fontnd icons     -->
    <link href='https://fonts.googleapis.com/css?family=Pacifico' rel='stylesheet' type='text/css'>
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/login.css" rel="stylesheet">
</head>
<body>
 <div class="wrapper">
        <div class="sidebar" data-active-color="green" data-background-color="black" data-image="assets/img/sidebar-1.jpg">
            <!--
        Tip 1: You can change the color of active element of the sidebar using: data-active-color="purple | blue | green | orange | red | rose"
        Tip 2: you can also add an image using data-image tag
        Tip 3: you can change the color of the sidebar with data-background-color="white | black"
    -->
            <div class="logo">
                <a href="https://holklegion.com" class="simple-text">
                    LEGION HOLK
                </a>
            </div>
            <div class="logo logo-mini">
                <a href="https://holklegion.com" class="simple-text">
                    LH
                </a>
            </div>
            <div class="sidebar-wrapper">
                <div class="user">
                 <?php if($_SESSION['logged_in']) { ?>
                    <div class="photo">
                        <img src="<?php echo $_SESSION['fotoperfil']; ?>" alt="picture"/> 
                    </div>
                    <div class="info">
                        <a data-toggle="collapse" href="#collapseExample" class="collapsed">

                                Hola,  
                            
                       
                            <?php echo $_SESSION['usuario']; ?>
                            <b class="caret"></b>
                        </a>
                        <div class="collapse" id="collapseExample">
                            <ul class="nav">
                                <li> <a href="cuenta.php">Mi cuenta</a> </li>
                            <li class="divider"></li>
                            <li> <a href="logout.php">Salir</a> </li>
                            <li> <a href="#">Settings</a> </li>
                            </ul>
                            <?php } ?>
                        </div>
                    </div>
                </div>
                <ul class="nav">
                    <li>
                        <a href="dashboard.php">
                            <i class="material-icons">dashboard</i>
                            <p>Inicio</p>
                        </a>
                    </li>
                    <li>
                        <a data-toggle="collapse" href="#pagesExamples">
                            <i class="material-icons">card_travel</i>
                            <p>Herramientas
                                <b class="caret"></b>
                            </p>
                        </a>
                        <div class="collapse" id="pagesExamples">
                             <ul class="nav">
                                <li>
                                    <a href="#">Registrar Ban</a>
                                </li>
                                <li>
                                    <a href="#">Administrar Admins o Mods</a>
                                </li>
                                <li>
                                    <a href="registrarse.php">Registrar Admins o Mods</a>
                                </li>
                            </ul>
                        </div>
                    </li>
             </ul>
            </div>
        </div>


	<div class="main-panel">
     	<div class="login-form">
     		<div class="col-md-8 col-sm-8 col-xs-12">
     			<?php require_once 'templates/message.php';?>
     			<h1>Mi cuenta:</h1><br>
				<form action="<?php echo $_SERVER['PHP_SELF']; ?>" id="account-form" method="post" class="form-horizontal myaccount" role="form">
					<div class="form-group">
						<span for="inputEmail3" class="col-sm-4 control-span">Nombres</span>
						<div class="col-sm-8">
							<p> <?php echo $_SESSION['usuario']; ?> </p>
						</div>
					</div>
					<div class="form-group">
						<span for="inputPassword3" class="col-sm-4 control-span">Correo electrónico</span>
						<div class="col-sm-8">
							<p> <?php echo $_SESSION['email']; ?> </p>
						</div>
					</div>
					<hr>
					<div class="form-group">
						<span for="inputPassword3" class="col-sm-4 control-span">Contraseña Actual</span>
						<div class="col-sm-8">
							<input name="old_password" id="old_password" type="password">
							<span class="help-block"></span>
						</div>
					</div>
					
					<div class="form-group">
						<span for="inputPassword3" class="col-sm-4 control-span"> Nueva Contraseña</span>
						<div class="col-sm-8">
							<input name="password" id="password" type="password">
							<span class="help-block"></span>
						</div>
					</div>
					<div class="form-group">
						<span for="inputPassword3" class="col-sm-4 control-span"> Confirmar Contraseña</span>
						<div class="col-sm-8">
							<input name="confirm_password" id="confirm_password" type="password">
							<span class="help-block"></span>
						</div>
					</div>
					<input type="hidden" id="user_id" name="user_id" value="<?php echo $_SESSION['user_id']; ?>">
					<input type="hidden" id="email" value="<?php echo $_SESSION['email']; ?>" />
					
					
					<div class="form-group">
						<div class="col-sm-offset-4 col-sm-8">
							<button type="submit" class="btn btn-default" id="submit_btn" data-loading-text="Cambiando contraseña....">Cambiar Contraseña</button>
						</div>
					</div>
				</form>
		</div>
     		<?php require_once 'templates/sidebar.php';?>
     		
     	</div>
    </div> <!-- /container -->

        </div>

</body>

<script src="js/jquery.validate.min.js"></script>
<script src="js/account.js"></script>    


<!--   Core JS Files   -->
<script src="assets/js/jquery-3.1.1.min.js" type="text/javascript"></script>
<script src="assets/js/jquery-ui.min.js" type="text/javascript"></script>
<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>
<script src="assets/js/material.min.js" type="text/javascript"></script>
<script src="assets/js/perfect-scrollbar.jquery.min.js" type="text/javascript"></script>
<!-- Forms Validations Plugin -->
<script src="assets/js/jquery.validate.min.js"></script>
<!--  Charts Plugin -->
<script src="assets/js/chartist.min.js"></script>
<!-- Sliders Plugin -->
<script src="assets/js/nouislider.min.js"></script>
<!-- Select Plugin -->
<script src="assets/js/jquery.select-bootstrap.js"></script>
<!--  DataTables.net Plugin    -->
<script src="assets/js/jquery.datatables.js"></script>
<!-- Sweet Alert 2 plugin -->
<script src="assets/js/sweetalert2.js"></script>
<!--	Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
<script src="assets/js/jasny-bootstrap.min.js"></script>
<!-- Material Dashboard javascript methods -->
<script src="assets/js/material-dashboard.js"></script>
<!-- Material Dashboard DEMO methods, don't include it in your project! -->
<script src="assets/js/demo.js"></script>
<script type="text/javascript">
    $(document).ready(function() {

        // Javascript method's body can be found in assets/js/demos.js
        demo.initDashboardPageCharts();

        demo.initVectorMap();
    });
</script>

</html>
