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
    <style>
        td {
            padding: 5px;
        }
    </style>

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
        <h2 style="text-align: center;"><?php echo $resul['nomempre'] ?></h2>
        <hr>

        <div class="row">
            <div class="col-lg-8 col-sm-10 portfolio-item">
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-danger " style="margin: 10px;" data-toggle="modal" data-target="#staticBackdrop">
                    Agregar Comentario
                </button>
                <a href="empresabus.php?pagina=1" style="margin: 10px;" class="btn btn-danger">Buscar otro empresa</a>
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
                                        <input class="form-control" maxlength="50" placeholder="Nombre *" onkeypress="return soloLetras(event)" style="width: 300px" type="text" name="usuario" autocomplete="off" required>
                                    </p>
                                    <p>
                                        <input class="form-control" maxlength="50" placeholder="Cargo *" onkeypress="return soloLetras(event)" style="width: 300px" type="text" name="cargo" autocomplete="off" required>
                                    </p>
                                    <p>
                                        <select name="iddep" style="width: 300px" class="form-control" id="exampleFormControlSelect1" size="1" required>
                                            <option value="">Departamento *</option>
                                            <?php
                                            $id4 =  "SELECT * FROM departamento";
                                            $id5 = mysqli_query($conexion, $id4) or die(mysqli_error($conexion));
                                            while ($resul1 = mysqli_fetch_assoc($id5)) {
                                                echo "<option ";
                                                echo "value=";
                                                echo $resul1['id'];
                                                echo ">";
                                                echo $resul1['nomdep'];
                                                echo "</option>";
                                            }
                                            ?>
                                        </select>
                                    </p>
                                    <p>
                                        <input class="form-control" onkeypress='return event.charCode >= 48 && event.charCode <= 57' placeholder="Sueldo *" style="width: 300px" type="text" name="sueldo" autocomplete="off" required>
                                        <input class="form-control" style="width: 300px" type="hidden" name="idempre" value="<?php echo $resul['id'] ?> " required>
                                    </p>

                                    <p>
                                        <textarea maxlength="255" class="form-control" style="width: 300px" name="ambientelaboral" placeholder="Ambiente Laboral *" id="textarea" cols="100" rows="3" required></textarea>
                                        <span style="font-size: 10px;">Limite de Caracteres es de 255</span>
                                    </p>

                                    <p>
                                        <textarea maxlength="255" class="form-control" style="width: 300px" name="tips" placeholder="Tips *" id="textarea" cols="100" rows="3" required></textarea>
                                        <span style="font-size: 10px;">Limite de Caracteres es de 255</span>
                                    </p>

                                    <div class="modal-footer">
                                        <input type="submit" name="enviar" class="btn btn-danger" value="Comentar">
                                    </div>
                                    <?php
                                    if (isset($_POST['enviar'])) {
                                        $sentencia = "INSERT INTO comentario(usuario, ambientelaboral, sueldo, tips, cargo, idempre, iddep, fecha) 
                                        VALUES ('" . $_POST['usuario'] . "', '" . $_POST['ambientelaboral'] . "', '" . $_POST['sueldo'] . "', '" . $_POST['tips'] . "', 
                                        '" . $_POST['cargo'] . "', '" . $_POST['idempre'] . "', '" . $_POST['iddep'] . "', NOW())";
                                        mysqli_query($conexion, $sentencia) or die(mysqli_error($conexion));
                                        if ($sentencia) {
                                            header("Location: comentariompresa.php");
                                        }
                                    }

                                    ?>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                
                <br><br>
                <!--<div class='container'>-->
                <div class="row">
                    <div class="col-lg-12 col-sm-12 portfolio-item" style="font-size: 15px">
                        <div class="card mb-3" style="background-color: white; border-radius: 14px;">
                            <div class="card-header text-center">Comentarios</div>
                            <?php
                            $consulta1 = mysqli_query($conexion, "SELECT co.id,co.usuario, co.ambientelaboral, co.sueldo, co.tips, co.idempre, de.nomdep, co.cargo, co.fecha FROM comentario co INNER JOIN departamento de on 
                                de.id = co.iddep WHERE idempre = '" . $_GET['id'] . "' ORDER BY id DESC") or die(mysqli_error($conexion));
                            while ($row = mysqli_fetch_array($consulta1)) {
                                echo '<div class="card-body">
                                                <div class="row">
                                                    <div class="col-lg-8 mb-4 text-center">
                                                        <p class="mt-0 mb-1" style="font-size: 17px"><b>' . $row['usuario'] . '</b></p>
                                                        <p class="mt-0 mb-1">' . $row['cargo'] . ' - ' . $row['sueldo'] . '</p>
                                                    </div>
                                                    <div class="col-lg-4 mb-4">
                                                       <p class="mt-0 mb-1" style="text-align: end;">' . $row['nomdep'] . ' - ' . $row['fecha'] . '</p>
                                                    </div>                                                  
                                                </div> 
                                                <p class="mt-0 mb-1"><b>Ambiente Laboral:</b> ' . $row['ambientelaboral'] . '</p>
                                                <p class="mt-0 mb-1"><b>Tips para conseguir el trabajo:</b> ' . $row['tips'] . '</p>
                                                <hr>
                                            </div>';
                            }
                            ?>
                        </div>
                    </div>
                </div>
                <!--</div>-->
            </div>

            <br><br><br><br>
            <div class="col-lg-4 col-sm-7 portfolio-item">
                <div class="card bg-light mb-3">
                    <div class="card-header">Contacto</div>
                    <div class="card-body">
                        <div class="col-lg-7 mb-4">
                            <form name="sentMessage" id="contactForm" novalidate>
                                <div class="control-group form-group">
                                    <div class="controls">
                                        <input type="text" style="width: 200px;" class="form-control" id="name" placeholder="Nombre*" required data-validation-required-message="Please enter your name.">
                                        <p class="help-block"></p>
                                    </div>
                                </div>
                                <div class="control-group form-group">
                                    <div class="controls">
                                        <input type="email" style="width: 200px;" class="form-control" placeholder="Correo*" id="email" required data-validation-required-message="La dirección de email no es válida..">
                                    </div>
                                </div>
                                <div id="success"></div>
                                <!-- For success/fail messages -->
                                <div>
                                    <button type="submit" style="width: 100px;" class="btn btn-primary" id="sendMessageButton">Enviar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="card bg-light mb-3">
                    <div class="card-header">Contacto</div>
                    <div class="card-body">
                        <div class="col-lg-12 mb-4">
                            <form name="sentMessage" id="contactForm" novalidate>
                                <div class="control-group form-group">
                                    <div class="controls">
                                        <input type="text" style="width: 200px;" class="form-control" id="name" placeholder="Nombre*" required data-validation-required-message="Please enter your name.">
                                        <p class="help-block"></p>
                                    </div>
                                </div>
                                <div class="control-group form-group">
                                    <div class="controls">
                                        <input type="email" style="width: 200px;" class="form-control" placeholder="Correo*" id="email" required data-validation-required-message="La dirección de email no es válida..">
                                    </div>
                                </div>
                                <div id="success"></div>
                                <!-- For success/fail messages -->
                                <button type="submit" style="width: 100px;" class="btn btn-primary" id="sendMessageButton">Enviar</button>
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
<script>
    function soloLetras(e) {
        key = e.keyCode || e.which;
        tecla = String.fromCharCode(key).toLowerCase();
        letras = " áéíóúabcdefghijklmnñopqrstuvwxyz";
        especiales = "8-37-39-46";

        tecla_especial = false
        for (var i in especiales) {
            if (key == especiales[i]) {
                tecla_especial = true;
                break;
            }
        }

        if (letras.indexOf(tecla) == -1 && !tecla_especial) {
            return false;
        }
    }
</script>