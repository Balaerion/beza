    <?php
  if ($_SESSION['tipo']=='Admin'){
      header('Location: controlador/admin/listaclientes.php');
  }

?>
    <!DOCTYPE HTML>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="author" content="Bootstrap-ecommerce by Vosidiy">

        <title>BEZA</title>

        <link rel="shortcut icon" type="image/x-icon" href="images/favicon.ico">

        <!-- jQuery -->
        <script src="vendor/jquery/jquery.min.js" type="text/javascript"></script>

        <!-- Bootstrap4 files-->
        <script src="js/bootstrap.bundle.min.js" type="text/javascript"></script>
        <link href="css/bootstrap-custom.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
        <link href="css/full-slider.css" rel="stylesheet">


        <!-- Font awesome 5 -->
        <link href="fonts/fontawesome/css/fontawesome-all.min.css" type="text/css" rel="stylesheet">

        <!-- plugin: fancybox  -->
        <script src="plugins/fancybox/fancybox.min.js" type="text/javascript"></script>
        <link href="plugins/fancybox/fancybox.min.css" type="text/css" rel="stylesheet">

        <!-- custom style -->
        <link href="css/uikit.css" rel="stylesheet" type="text/css" />
        <link href="css/responsive.css" rel="stylesheet" media="only screen and (max-width: 1200px)" />

        <!-- custom javascript -->
        <script src="js/script.js" type="text/javascript"></script>
        <script src="js/login.js"></script>
        <script type="text/javascript">
            /// some script

            // jquery ready start
            $(document).ready(function () {
                // jQuery code
                $('.dropdown-toggle').dropdown()

            });
            // jquery end
        </script>

    </head>

    <body class="relative" data-spy="scroll" data-target=".navbar-landing">
        <header class="section-header">
            <nav class="navbar navbar-landing navbar-expand-lg navbar-light bg2">
                <div class="container">
                    <a class="navbar-brand mr-auto" href="#">
                        <img class="logo" src="images/logo-white.png"> BEZA</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar1">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbar1">
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item">
                                <a class="nav-link page-scroll" href="index.php">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link page-scroll" href="floral.php">Floral Ties</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link page-scroll" href="moños.php">Bow Ties</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link page-scroll" href="about.php">About Us</a>
                            </li>
                            <?php
                            if (isset($_SESSION['user'])) {
                        ?>
                                <li class="nav-item">
                                    <a class="nav-link page-scroll" href="cart2.php">Cart</a>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle btn " href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false">
                                        <?php echo $_SESSION['user'] ?>
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="cerrarsesion.php">Log out</a>
                                    </div>
                                </li>
                                <?php
                            } else { ?>
                                    <li class="nav-item">
                                        <button type="button" class="btn btn-outline-danger" data-toggle="modal" data-target="#exampleModalLong">
                                            Log In
                                        </button>
                                    </li>
                                    <?php
                            }
                        ?>

                        </ul>
                    </div>
                </div>
                <!-- container //  -->
            </nav>
        </header>
        <!-- section-header.// -->

    </body>

    </html>