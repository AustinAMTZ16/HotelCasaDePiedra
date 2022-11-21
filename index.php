<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel Casas de Piedra</title>
    <!-- <link rel="stylesheet" href="./backend/css/orden.css"> -->
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="BackWeb/assets/img/logo.jpeg" />
    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="BackWeb/css/styles.css" rel="stylesheet" />


    <!-- Icomoon Font Icons css -->
    <link rel="stylesheet" href="backend/fonts/style.css">
    <!-- Main css -->
    <!-- <link rel="stylesheet" href="backend/css/main.css"> -->

    <!-- Data Tables -->
    <link rel="stylesheet" href="backend/vendor/datatables/dataTables.bs4.css" />
    <link rel="stylesheet" href="backend/vendor/datatables/dataTables.bs4-custom.css" />
    <link href="backend/vendor/datatables/buttons.bs.css" rel="stylesheet" />
</head>

<body id="page-top">
    <div class="paadre">
        <div class="hijo">
            <div class="fila">
                <div class="columna12">
                    <?php
                    require('./frontend/seccionWeb/header.php');
                    ?>
                </div>
            </div>
        </div>
    </div>
    <div class="padre-fondo">
        <div class="hijo">
            <div class="fila">
                <div class="columna12">
                    <?php
                    if (isset($_GET["view"]) && $_GET["view"] != "") {
                        $url = "frontend/seccionWeb/" . $_GET["view"] . ".php";
                        if (file_exists($url)) {
                            include $url;
                        } else {
                            echo "<h1>404 PAGINA NO ENCONTRADA</h1>";
                        }
                    } else {
                        include "./frontend/seccionWeb/home.html";
                    }
                    ?>
                </div>

            </div>
        </div>
    </div>
    <div class="paadre">
        <div class="hijo">
            <div class="fila">
                <div class="columna12">
                    <?php
                    require('./frontend/seccionWeb/fotter.php');
                    ?>
                </div>
            </div>
        </div>
    </div>


    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="BackWeb/js/scripts.js"></script>
    <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
    <!-- * *                               SB Forms JS                               * *-->
    <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
    <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
    <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>

    <!-- Required jQuery first, then Bootstrap Bundle JS -->
    <script src="backend/js/jquery.min.js"></script>
    <script src="backend/js/bootstrap.bundle.min.js"></script>
    <script src="backend/js/moment.js"></script>

    <!-- Data Tables -->
    <script src="backend/vendor/datatables/dataTables.min.js"></script>
    <script src="backend/vendor/datatables/dataTables.bootstrap.min.js"></script>


    <!-- Custom Data tables -->
    <script src="backend/vendor/datatables/custom/custom-datatables.js"></script>
    <script src="backend/vendor/datatables/custom/fixedHeader.js"></script>



    <!-- Main JS -->
    <script src="backend/js/main.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

    <!-- Slimscroll JS -->
    <script src="backend/vendor/slimscroll/slimscroll.min.js"></script>
    <script src="backend/vendor/slimscroll/custom-scrollbar.js"></script>
</body>

</html>