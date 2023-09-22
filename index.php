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




    <!-- Messenger Plugin de chat Code -->
    <div id="fb-root"></div>

    <!-- Your Plugin de chat code -->
    <div id="fb-customer-chat" class="fb-customerchat">
    </div>

    <script>
      var chatbox = document.getElementById('fb-customer-chat');
      chatbox.setAttribute("page_id", "100180828258427");
      chatbox.setAttribute("attribution", "biz_inbox");
    </script>

    <!-- Your SDK code -->
    <script>
      window.fbAsyncInit = function() {
        FB.init({
          xfbml            : true,
          version          : 'v15.0'
        });
      };

      (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = 'https://connect.facebook.net/es_LA/sdk/xfbml.customerchat.js';
        fjs.parentNode.insertBefore(js, fjs);
      }(document, 'script', 'facebook-jssdk'));
    </script>
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
                    // mostrar.php
                    if (isset($_GET["view"]) && $_GET["view"] != "") {
                        $url = "frontend/seccionWeb/" . $_GET["view"] . ".php";
                        if (file_exists($url)) {
                            include $url;
                        } else {
                            echo "<h1>404 PAGINA NO ENCONTRADA</h1>";
                        }
                    } else {
                        include "./frontend/seccionWeb/home.php";
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





    <!-- FORMULARIO INDEX CONTACTO -->
    <script>

        const d = document,
        $form = d.querySelector(".crud-form");

        const ajax = (options) => {
            let {url, method, success, error, data} = options;
            let xhr = new XMLHttpRequest();

            xhr.addEventListener("readystatechange", e =>{
                if(xhr.readyState !== 4)return;

                if(xhr.status >= 200 && xhr.status < 300) {
                    let json = JSON.parse(xhr.responseText);
                    success(json);

                }else{
                    let message = xhr.statusText || "Ocurrio un error";
                    error(`Error ${xhr.status}: ${message}`);
                }
            });

            xhr.open(method || "GET", url);

            xhr.setRequestHeader("Content-type","application/json; charset=utf-8");
            xhr.send(JSON.stringify(data));
            
        }

        d.addEventListener("submit", e => {
                if(e.target === $form) {
                    e.preventDefault();
                    if(!e.target.id.value) {
                        //Create POST
                        ajax({
                            url: "https://mexiclientes.engranetmx.com/prospecto/agregar.php",
                            method: "POST",
                            success: (res) => location.reload(),
                            error: () => $form.insertAdjacentHTML("aftered", `<p><b>${err}</b></p>`),
                            data:{
                                nombre:e.target.nombre.value,
                                telefono:e.target.telefono.value,
                                correo:e.target.correo.value,
                                mensaje:e.target.mensaje.value,
                                asunto:e.target.asunto.value,
                                dominioOrigen:e.target.dominioOrigen.value,
                                giroDominio:e.target.giroDominio.value,
                                categoriaProspecto:e.target.categoriaProspecto.value,
                                estadoSistema:e.target.estadoSistema.value,
                                conversacion:e.target.conversacion.value     
                            }

                        });
                    }else{
                        //Update PUT
                    }
                }
        });

        
    </script>

    <!-- FORMULARIO CITA -->
    <script>        
        const cita = document,
        $form_cita = cita.querySelector(".cita-form");

        const ajax_cita = (options) => {
            let {url, method, success, error, data} = options;
            let xhr_cita = new XMLHttpRequest();

            xhr_cita.addEventListener("readystatechange", e =>{
                if(xhr_cita.readyState !== 4)return;

                if(xhr_cita.status >= 200 && xhr_cita.status < 300) {
                    let json = xhr_cita.responseText;
                    success(json);

                }else{
                    let message = xhr_cita.statusText || "Ocurrio un error";
                    error(`Error ${xhr_cita.status}: ${message}`);
                }
            });

            xhr_cita.open(method || "GET", url);

            xhr_cita.setRequestHeader("Content-type","application/json; charset=utf-8");
            xhr_cita.send(JSON.stringify(data));
            
        }

        cita.addEventListener("submit", e => {
            // var boton_cita = d.getElementById('boton_cita');
            // var mensaje = d.querySelectorAll('.valores');

                if(e.target === $form_cita) {
                    e.preventDefault();
                    if(!e.target.id.value) {
                        //Create POST
                        ajax_cita({
                            url: "https://mexiclientes.engranetmx.com/prospecto/agregar.php",
                            method: "POST",
                            success: (res) => location.reload(),
                            error: () => $form_cita.insertAdjacentHTML("aftered", `<p><b>${err}</b></p>`),
                            data:{
                                nombre:e.target.nombre.value,
                                telefono:e.target.telefono.value,
                                correo:e.target.correo.value,
                                asunto:e.target.asunto.value,
                                dominioOrigen:e.target.dominioOrigen.value,
                                giroDominio:e.target.giroDominio.value,
                                categoriaProspecto:e.target.categoriaProspecto.value,
                                estadoSistema:e.target.estadoSistema.value,
                                conversacion:e.target.conversacion.value,
                                mensajes_cita:e.target.mensajes_cita.value,
                                fecha:e.target.fecha.value,
                                pacas:e.target.pacas.value,
                                ubicacion:e.target.ubicacion.value,
                                mensaje:e.target.fecha.value+" "+e.target.pacas.value+" "+e.target.ubicacion.value+" "+e.target.mensajes_cita.value
                            }

                        });
                    }else{
                        //Update PUT
                    }
                }
        });
    </script>

</body>

</html>