<?php 
ob_start();
session_start();
require_once 'config.php'; 
if(!isset($_SESSION['logged_in'])){
    header('Location: index.php');
}
?>

<?php 
	if(!empty($_POST)){
		try {
			$user_obj = new Cl_User();
			$data = $user_obj->registrationbit( $_POST );
			if($data)$success = USER_REGISTER_SUCCESS;
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
    <script src="js/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>

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
                        <a href="principal.php">
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

 <nav class="navbar navbar-transparent navbar-absolute">
                <div class="container-fluid">
                    <div class="navbar-minimize">
                        <button id="minimizeSidebar" class="btn btn-round btn-white btn-fill btn-just-icon">
                            <i class="material-icons visible-on-sidebar-regular">more_vert</i>
                            <i class="material-icons visible-on-sidebar-mini">view_list</i>
                        </button>
                    </div>
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                    <div class="collapse navbar-collapse">
                        <ul class="nav navbar-nav navbar-right">
                            <li>
                                <a href="#pablo" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="material-icons">dashboard</i>
                                    <p class="hidden-lg hidden-md">Dashboard</p>
                                </a>
                            </li>
                    </div>
                </div>
            </nav>

		<div class="login-form">
			<?php require_once 'templates/message.php';?>
			  
            <div class="form-header">
                <i class="fa fa-user"></i>
            </div>
            <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" class="form-register" role="form" id="register-form">
                <div>
                    <label><?php echo $_SESSION['usuario']; ?></label>
                    <input type="hidden" id="iduser" name="iduser" value="<?php echo $_SESSION['id_usuario']; ?>">
                    <span class="help-block"></span>
                </div>
                <div>
                    <input name="idfacebook" id="idfacebook" type="text" class="form-control" placeholder="Ingrese el id de facebook" >
                    <span class="help-block"></span>
                </div>
                <div>
                    <textarea name="bitacora" id="bitacora" class="form-control" placeholder="Escriba el motivo del ban "></textarea>
                    <span class="help-block"></span>
                </div>
                <div>
                    <label>¿HA SIDO BANEADO ANTERIORMENTE?</label>
                     <label><input type="radio" name="pregun" value="SI" id="cbox1" checked> SI</label>
                     <label><input type="radio" name="pregun" value="NO" id="cbox1"> NO</label>
                </div>
                <button class="btn btn-block bt-login" type="submit" id="submit_btn" data-loading-text="Registrando....">Registrar BAN</button>
            </form>
            <div class="form-footer">
                <div class="row">
                    <div class="col-xs-6 col-sm-6 col-md-6">
                    
                    </div>
                    
                    <div class="col-xs-6 col-sm-6 col-md-6">
                    </div>
                </div>
            </div>
        </div>
    </div>
	<!-- /container -->
        </div>
 <script src="js/jquery.validate.min.js"></script>
    <script src="js/bitacora.js"></script>
</body>
</html>
