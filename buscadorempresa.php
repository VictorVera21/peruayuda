<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Ayuda Perú</title>
    <!-- Icono de la pagina -->
    <link rel="shortcut icon" href="assent/icon.jpeg" type="image/x-icon">

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/modern-business.css" rel="stylesheet">
    <link rel="stylesheet" href="css/jquery-ui.css">

    <script src="js/jquery-3.4.1.min.js"></script>

</head>

<body>

    <!-- Navigation -->
    <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-red fixed-top">
        <div class="container">
            <a class="navbar-brand" href="index.html">
                AYUDA PERÚ</a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="index.html">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.html">Services</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="contact.html">Contact</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownPortfolio" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Portfolio
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownPortfolio">
                            <a class="dropdown-item" href="index.html">1 Column Portfolio</a>
                            <a class="dropdown-item" href="index.html">2 Column Portfolio</a>
                            <a class="dropdown-item" href="index.html">3 Column Portfolio</a>
                            <a class="dropdown-item" href="index.html">4 Column Portfolio</a>
                            <a class="dropdown-item" href="index.html">Single Portfolio Item</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownBlog" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Blog
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownBlog">
                            <a class="dropdown-item" href="index.html">Blog Home 1</a>
                            <a class="dropdown-item" href="index.html">Blog Home 2</a>
                            <a class="dropdown-item" href="index.html">Blog Post</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownPages" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Other Pages
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownPages">
                            <a class="dropdown-item" href="index.html">Full Width Page</a>
                            <a class="dropdown-item" href="index.html">Sidebar Page</a>
                            <a class="dropdown-item" href="index.html">FAQ</a>
                            <a class="dropdown-item" href="index.html">404</a>
                            <a class="dropdown-item" href="index.html">Pricing Table</a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <br><br>
    <!-- Buscados / eventos-->
    <div class="container">
        <div class="row">
            <div class="col-lg-7 col-sm-9 portfolio-item">
                <form action="#" autocomplete="off" method="POST" class="form1">
                    <input type="text" class="form-control"  style="text-transform: uppercase;" placeholder="Escribe tu empresa..." name="busqueda" id="buscador">
                    <!-- For success/fail messages -->
                    <br>
                    <div style="text-align: center;">
                        <button type="submit" style="width: 100px;" class="btn btn-primary">Buscar</button>
                    </div>
                    <br>
                    <?php
                    include_once("functions/conexion.php");

                    if (isset($_POST['busqueda'])) {
                        $busqueda = $_POST['busqueda'];
                        $sql = "SELECT em.id, em.nomempre, cat.nomcat FROM empresa em INNER JOIN categoria cat on 
                        cat.id = em.idcat WHERE nomempre LIKE '" . $busqueda . "%' ORDER BY nomempre ASC";
                        $result = mysqli_query($conexion, $sql);
                        if ($result->num_rows >= 1) {
                            echo '<div class="col-lg-12 col-sm-12 portfolio-item">';
                                echo '<div class="card mb-3" style="background-color: white;">';
                                    echo '<div class="card-header text-center">Resultados</div>';
                                            while ($item = mysqli_fetch_assoc($result)) {
                                                echo '<div class="media" style="font-size: 16px;">';
                                                    echo '<div class="card-body">
                                                                <a style="color: black; text-transform: uppercase;" href="comentarioempresa.php?id=' . $item['id'] . '">
                                                                    <h6>Empresa: ' . $item['nomempre'] . '</h6>
                                                                    <span>Rubro: ' . $item['nomcat'] . '</span>
                                                                </a>
                                                        </div>';
                                            echo '</div>';                                   
                                            }
                                    echo '</div>';
                                echo '</div>';
                        } else {
                            echo "<br><center><h4>No hemos encontrado ningun registro con la palabra " . "<strong class='text-uppercase'>" . $busqueda . "</strong><h4><center>";
                        }
                    }
                    ?>
                </form>
            </div>
            <br><br>
            <div class="col-lg-5 col-sm-6 portfolio-item text-center">
                <div class="card bg-light mb-3">
                    <div class="card-header">Contacto</div>
                    <div class="card-body">
                        <div class="col-lg-4 mb-4">
                            <form name="sentMessage" id="contactForm" novalidate>
                                <div class="control-group form-group">
                                    <div class="controls">
                                        <input type="text" style="width: 250px;" class="form-control" id="name" placeholder="Nombre*" required data-validation-required-message="Please enter your name.">
                                        <p class="help-block"></p>
                                    </div>
                                </div>
                                <div class="control-group form-group">
                                    <div class="controls">
                                        <input type="email" style="width: 250px;" class="form-control" placeholder="Correo*" id="email" required data-validation-required-message="La dirección de email no es válida..">
                                    </div>
                                </div>
                                <div id="success"></div>
                                <!-- For success/fail messages -->
                                <div style="text-align: center;">
                                    <button type="submit" style="width: 100px;" class="btn btn-primary" id="sendMessageButton">Enviar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="card bg-light mb-3">
                    <div class="card-header">Contacto</div>
                    <div class="card-body">
                        <div class="col-lg-4 mb-4">
                            <form name="sentMessage" id="contactForm" novalidate>
                                <div class="control-group form-group">
                                    <div class="controls">
                                        <input type="text" style="width: 250px;" class="form-control" id="name" placeholder="Nombre*" required data-validation-required-message="Please enter your name.">
                                        <p class="help-block"></p>
                                    </div>
                                </div>
                                <div class="control-group form-group">
                                    <div class="controls">
                                        <input type="email" style="width: 250px;" class="form-control" placeholder="Correo*" id="email" required data-validation-required-message="La dirección de email no es válida..">
                                    </div>
                                </div>
                                <div id="success"></div>
                                <!-- For success/fail messages -->
                                <div style="text-align: center;">
                                    <button type="submit" style="width: 100px;" class="btn btn-primary" id="sendMessageButton">Enviar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div><br><br>

    <br><br>
    <div class="py-3 text-center" style="background-color: #6A5E5E;">
        <br>
        <div class="container">
            <div class="row" style="color: #fff;">
                <div class="col-md-12 col-lg-8 col-xl-7 mx-auto">
                    <h5 class="mb-5">¡Recibe las ultimas noticias!</h5>
                    <form>
                        <div class="form-row">
                            <div class="col-12 col-md-9 mb-2 mb-md-0">
                                <input type="email" class="form-control form-control-lg" placeholder="Email...." required>
                            </div>
                            <div class="col-12 col-md-3">
                                <button type="submit" class="btn btn-block btn-lg btn-primary">Suscribir!</button>
                            </div>
                        </div>
                    </form>
                    <br>
                </div>
            </div>
        </div>
        <br>
        <!---<hr style="background-color: #fff;">-->
    </div>
    <!-- Footer -->
    <footer class="py-3 bg-dark">
        <div class="container">
            <p class="m-0 text-center text-white">Copyright &copy; AYUDA PERÚ 2020</p>
        </div>
        <!-- /.container -->
    </footer>

    <!--Js buscador-->
    <script src="js/jquery-1.12.1.min.js"></script>
    <script src="js/jquery-ui.js"></script>
    <script src="js/main.js"></script>

</body>

</html>