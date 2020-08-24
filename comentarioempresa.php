<?php
include_once("functions/conexion.php");
ini_set('error_reporting', 0);
$id =  "SELECT * FROM empresa WHERE id ='" . $_GET['id'] . "'";
$id2 = mysqli_query($conexion, $id) or die(mysqli_error($conexion));
$resul = mysqli_fetch_assoc($id2);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comentario Empresa</title>
    <!-- Icono de la pagina -->
    <link rel="shortcut icon" href="assent/icon.jpeg" type="image/x-icon">

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/modern-business.css" rel="stylesheet">
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

    <div class="container">
        <hr>
        <h2 style="text-align: center; background-color: black; color: white;"><?php echo $resul['nombre'] ?></h2>
        <hr>

        <div class="row">
            <div class="col-lg-8 col-sm-6 portfolio-item">
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#staticBackdrop">
                    Agregar Comentario
                </button>
                <a href="buscadorempresa.php" class="btn btn-primary">Buscar otro empresa</a>

                <!-- Modal -->
                <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header" style="background-color: red; color: white;">
                                <h5 class="modal-title" id="staticBackdropLabel">Deja tu comentario: </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form name="form1" method="post" action="">
                                    <h6>* Campos Obligatorios</h6>
                                    <p>
                                        <!--<p style="text-align: initial">NroCam * </p>-->
                                        <input class="form-control" placeholder="Cargo *" style="width: 300px" type="text" name="nrocam" autocomplete="off" required>
                                    </p>
                                    <p>
                                        <!--<p style="text-align: initial">Departamento * </p>-->
                                        <select name="idpro" style="width: 300px" class="form-control" id="exampleFormControlSelect1" size="1" required>
                                            <option value="">Departamento *</option>
                                            <?php
                                            $id4 =  "SELECT * FROM provincia";
                                            $id5 = mysqli_query($conexion, $id4) or die(mysqli_error($conexion));
                                            while ($resul1 = mysqli_fetch_assoc($id5)) {
                                                echo "<option ";
                                                echo "value=";
                                                echo $resul1['id'];
                                                echo ">";
                                                echo $resul1['nompro'];
                                                echo "</option>";
                                            }
                                            ?>
                                        </select>
                                    </p>
                                    <p>
                                        <!--<p style="text-align: initial">Sueldo * </p>-->
                                        <input class="form-control" placeholder="Sueldo *" style="width: 300px" type="text" name="sueldo" autocomplete="off" required>
                                        <input class="form-control" style="width: 300px" type="hidden" name="idempre" value="<?php echo $resul['id'] ?> " required>
                                    </p>

                                    <p>
                                        <!--<p style="text-align: initial">Ambiente Laboral * </p>
                                <input class="form-control" placeholder="Ambiente Laboral *" style="width: 300px" type="text" name="ambientelaboral">-->
                                        <textarea class="form-control" style="width: 300px" name="ambientelaboral" placeholder="Ambiente Laboral *" id="textarea" cols="100" rows="3" required></textarea>
                                    </p>

                                    <p>
                                        <!--<p style="text-align: initial">Tips * </p>
                                <input class="form-control" placeholder="Tips *" style="width: 300px" type="text" name="tips">-->
                                        <textarea class="form-control" style="width: 300px" name="tips" placeholder="Tips *" id="textarea" cols="100" rows="3" required></textarea>
                                    </p>

                                    <div class="modal-footer">
                                        <input type="submit" name="enviar" class="btn btn-danger" value="Comentar">
                                    </div>
                                    <?php
                                    if (isset($_POST['enviar'])) {
                                        $sentencia = "INSERT INTO comentario(ambientelaboral, sueldo, tips, idempre, idpro, cargo) 
                                        VALUE ('" . $_POST['ambientelaboral'] . "', '" . $_POST['sueldo'] . "', '" . $_POST['tips'] . "','" . $_POST['idempre'] . "', 
                                        '" . $_POST['idpro'] . "', '" . $_POST['nrocam'] . "')";
                                        mysqli_query($conexion, $sentencia) or die(mysqli_error($conexion));
                                    }

                                    ?>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <br><br>
                <div class='container'>
                    <?php
                    $consulta1 = mysqli_query($conexion, "SELECT co.id, co.ambientelaboral, co.sueldo, co.tips, co.idempre, pr.nompro, co.cargo FROM comentario co INNER JOIN provincia pr on 
                    pr.id = co.idpro WHERE idempre = '" . $_GET['id'] . "' ORDER BY id DESC") or die(mysqli_error($conexion));
                    while ($row = mysqli_fetch_array($consulta1)) {

                        echo '<div class="row">
                                <div class="col-lg-12 col-sm-6">
                                    <ul class="list-unstyled">
                                            <li class="media">
                                                <div class="media-body">
                                                    <div class="row">
                                                        <div class="col-lg-6 col-sm-6">
                                                            <h5 class="mt-0 mb-1">' . $row['cargo'] . '</h5>
                                                        </div>
                                                        <div class="col-lg-6 col-sm-6">
                                                            <h5 class="mt-0 mb-1" style="text-align: end;">' . $row['nompro'] . '- 22/08/2020</h5>
                                                        </div>
                                                    </div>
                                                    <br>
                                                    <h5 class="mt-0 mb-1">' . $row['ambientelaboral'] . ' </h5>
                                                    <div class="col-lg-0">
                                                    </div>
                                                    <h5 class="mt-0 mb-1">' . $row['sueldo'] . '</h5> 
                                                    <br>
                                                    <h5 class="mt-0 mb-1">' . $row['tips'] . '</h5>
                                                </div>
                                            </li>
                                            <hr>
                                        </ul>
                                    </div>
                                </div>';
                    }
                    ?>
                </div>
            </div>

            <br><br><br><br>
            <div class="col-lg-4 col-sm-6 portfolio-item text-center">
                <div class="card bg-light mb-3" style="max-width: 30rem;">
                    <div class="card-header">Contacto</div>
                    <div class="card-body">
                        <div class="col-lg-12 mb-4">
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
                <div class="card bg-light mb-3" style="max-width: 30rem;">
                    <div class="card-header">Contacto</div>
                    <div class="card-body">
                        <div class="col-lg-12 mb-4">
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
    </div>

    <!-- Footer -->
    <footer class="py-3 bg-dark">
        <div class="container">
            <p class="m-0 text-center text-white">Copyright &copy; AYUDA PERÚ 2020</p>
        </div>
        <!-- /.container -->
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Contact form JavaScript -->
    <!-- Do not edit these files! In order to set the email address and subject line for the contact form go to the bin/contact_me.php file. -->
    <script src="js/jqBootstrapValidation.js"></script>
    <script src="js/contact_me.js"></script>
</body>

</html>