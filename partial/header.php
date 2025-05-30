<?php session_start();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="Primer Asset Management y Propietary Trading de América Latina. Hacemos crypto fácil." />
        <meta name="keywords" content="Assets funds, Asset Management, Trading, Black Whale"/>
        <meta name="author" content="http://www.estudiochento.com.ar" />
        <title>Black Whale - Hacemos crypto fácil</title>
        <link rel="icon" type="image/x-icon" href="assets/img/favicon.png" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v5.15.4/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css2?family=Merriweather:wght@300;400;700;900&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" /> 
        <script src="js/jquery.js"></script>  
        <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>

    </head>
    <body>
        <header>
            <!-- Navigation-->
            <nav class="navbar navbar-expand-lg" id="mainNav">
                <div class="container-fluid">
                    <div class="navbar-brand">
                        <a href="index.php">
                            <img class="logo" src="assets/img/logo-header.png" alt="Black Whale">
                        </a>
                    </div>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon">
                            <img src="assets/img/icon-menu.png" alt="">
                        </span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav">
                            <li class="nav-item px-lg-4"><a class="nav-link text-uppercase" href="index.php">Home</a></li>
                            <li class="nav-item px-lg-4"><a class="nav-link text-uppercase" href="asset-management.php">Asset Management</a></li>
                            <li class="nav-item px-lg-4"><a class="nav-link text-uppercase" href="trade.php">Trading</a></li>
                            <li class="nav-item px-lg-4"><a class="nav-link text-uppercase" href="about.php">Equipo</a></li>
                            <?php if(!empty($_SESSION['id_user'])){ ?>
                                <li class="nav-item px-lg-3"><a class="nav-link text-uppercase" href="panel.php"><?php echo $_SESSION['name_user']; ?></a></li>
                                <li class="nav-item px-lg-3"><a class="nav-link text-uppercase" href="_save/save_logout.php">Salir</a></li>
                            <?php }else{ ?>
                                <li class="nav-item px-lg-4"><a class="nav-link text-uppercase btn-login-menu" href="login.php">Ingresar</a></li>
                            <?php } ?>
                        </ul>
                    </div>
                    
                </div>
            </nav>
        </header>
        
