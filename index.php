<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel Casas de Piedra</title>
    <link rel="stylesheet" href="./backend/css/orden.css">
</head>

<body>
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
                            $url = "frontend/seccionWeb/" . $_GET["view"] . ".html";
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

</body>

</html>