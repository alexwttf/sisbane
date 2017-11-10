
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
                                <li> <a href="account.php">Mi cuenta</a> </li>
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
                                    <a href="registrarse.php">Registrar Ban</a>
                                </li>
                                <li>
                                    <a href="./pages/timeline.html">Administrar Admins o Mods</a>
                                </li>
                                <li>
                                    <a href="./pages/login.html">Registrar Admins o Mods</a>
                                </li>
                            </ul>
                        </div>
                    </li>
             </ul>
            </div>
        </div>
        </div>
    </div>