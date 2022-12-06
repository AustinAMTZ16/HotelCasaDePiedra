<?php
    require_once('../../backend/config/ConexionSNSesion.php');
    
    //RUTA DE ARCHIVO PHPMAILER



    if (isset($_POST['md_insert'])) {
        ///////////// Informacion enviada por el formulario /////////////
        $numc = $_POST['mdnum'];
        $dnic = $_POST['mddoc'];
        $nomc = $_POST['mdnom'];
        $apec = $_POST['mdap'];

        ///////// Fin informacion enviada por el formulario /// 

        ////////////// Insertar a la tabla la informacion generada /////////
        $sql = "insert into clientes(dnic, numc, nomc,apec,estac) 
            values(:dnic, :numc,:nomc,:apec,'1')";

        $sql = $connect->prepare($sql);

        $sql->bindParam(':dnic', $dnic, PDO::PARAM_STR, 25);
        $sql->bindParam(':numc', $numc, PDO::PARAM_STR, 25);
        $sql->bindParam(':nomc', $nomc, PDO::PARAM_STR, 25);
        $sql->bindParam(':apec', $apec, PDO::PARAM_STR, 25);


        $sql->execute();

        $lastInsertId = $connect->lastInsertId();
        if ($lastInsertId > 0) {
            echo '  <div class="alert alert-primary alert-dismissible fade show" role="alert">
                        Gracias .. Agregado correctamente
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>';
        } else {
            echo '  <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        No se pueden agregar datos, comuníquese con el administrador
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>';

            print_r($sql->errorInfo());
        }
    }// Cierra envio de guardado

    if(isset($_POST['md_insert']))
    {

        $idhab=$_POST['rxha'];
        $iddn=$lastInsertId;
        $feentra=$_POST['rxent'];
        $fesal=$_POST['rxsal'];
        $observac=$_POST['rxobs'];
        $adel=0.00;
        $precioCobro = $_POST['precio'];
        $correo = $_POST['email'];


        $statement = $connect->prepare("INSERT INTO reservar (idhab,iddn,feentra,fesal,adel,state,observac) VALUES('$idhab', '$iddn','$feentra','$fesal','$adel','1', '$observac')");

            

        $statement2 = $connect->prepare("UPDATE habitaciones SET estadha='2' WHERE idhab= $idhab LIMIT 1;");


       
       
        //echo "$item";
        //Execute the statement and insert our values.
        $inserted = $statement->execute(); 
        $inserted = $statement2->execute(); 


        if($inserted>0){

            mail($correo, "Hotel Casa de Piedra", 'Su reservación está listo un asesor se podrá en contacto.');
            mail('soporte@hotelcasadepiedra.com', "Hotel Casa de Piedra", 'El sistema detectó una reservación por favor de revisar el sistema de gestión del hotel');
        }else{
                

            echo '  ';

            print_r($sql->errorInfo()); 
        }

        if($precioCobro == '260'){
            echo '  <div class="alert alert-primary alert-dismissible fade show" role="alert">
            Pagar Reservación Habitación Sencilla 1 Persona $260.00 MXN 
            <a href="../../index.php?view=paypal260">Pagar Ahora</a>
            </div>';
        }elseif ($precioCobro == '290'){
            echo '  <div class="alert alert-primary alert-dismissible fade show" role="alert">
            Pagar Reservación Habitación Sencilla 2 Persona $290.00 MXN 
            <a href="../../index.php?view=paypal290">Pagar Ahora</a>
            </div>';
        }elseif($precioCobro == '360'){
            echo '  <div class="alert alert-primary alert-dismissible fade show" role="alert">
            Pagar Reservación Habitación Doble 2 Persona $360.00 MXN 
            <a href="../../index.php?view=paypal360">Pagar Ahora</a>
            </div>';
        }elseif($precioCobro == '420'){
            echo '  <div class="alert alert-primary alert-dismissible fade show" role="alert">
            Pagar Reservación Habitación Doble 3 Persona $420.00 MXN 
            <a href="../../index.php?view=paypal420">Pagar Ahora</a>
            </div>';
        }elseif($precioCobro == '450'){
            echo '  <div class="alert alert-primary alert-dismissible fade show" role="alert">
            Pagar Reservación Habitación Doble 4 Persona $450.00 MXN 
            <a href="../../index.php?view=paypal450">Pagar Ahora</a>
            </div>';
        } 
    }
?>