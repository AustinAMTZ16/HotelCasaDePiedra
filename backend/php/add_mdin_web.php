<?php
    require_once('../../backend/config/ConexionSNSesion.php');
    
    //RUTA DE ARCHIVO PHPMAILER
    use PHPMailer\PHPMailer;
    use PHPMailer\Exception;

    require('../../backend/php/PHPMailer/PHPMailer.php');
    require('../../backend/php/PHPMailer/SMTP.php');
    require('../../backend/php/PHPMailer/Exception.php');



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

            mail($correo, "Hotel Casa de Piedra", 'Su reservacio esta listo un asesor se podrá en contacto.');
        }else{
                

            echo '  ';

            print_r($sql->errorInfo()); 
        }








        if($precioCobro == '260'){
            echo '  <div class="alert alert-primary alert-dismissible fade show" role="alert">
            Pagar Reservación Habitación Sencilla 1 Persona $260.00 MXN </div>';
        }elseif ($precioCobro == '290'){
            echo '  <div class="alert alert-primary alert-dismissible fade show" role="alert">
            Pagar Reservación Habitación Sencilla 2 Persona $290.00 MXN </div>';
        }elseif($precioCobro == '360'){
            echo '  <div class="alert alert-primary alert-dismissible fade show" role="alert">
            Pagar Reservación Habitación Doble 2 Persona $360.00 MXN </div>';
        }elseif($precioCobro == '420'){
            echo '  <div class="alert alert-primary alert-dismissible fade show" role="alert">
            Pagar Reservación Habitación Doble 3 Persona $420.00 MXN </div>';
        }elseif($precioCobro == '450'){
            echo '  <div class="alert alert-primary alert-dismissible fade show" role="alert">
            Pagar Reservación Habitación Doble 4 Persona $450.00 MXN </div>';
        } 
    }





















    if($_POST['email']){
        $correo = $_POST['email'];
        $asunto = 'Notificacion de reservación';
        $mensaje = 'Reservación agendada';

        $mail = new PHPMailer(true);

        try {
            //Server settings
            $email->SMTPDebug=0;                   //Enable verbose debug output
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host       = 'smtp.hostinger.com';                     //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $mail->Username   = 'soporte@hotelcasadepiedra.com';                     //SMTP username
            $mail->Password   = 'CasaDePiedra-22';                               //SMTP password
            $mail->SMTPSecure = 'tls';            //Enable implicit TLS encryption
            $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

            //Recipients
            $mail->setFrom('soporte@hotelcasadepiedra.com', 'Hotel Casa de Piedra');
            $mail->addAddress('austintv52@gmail.com');     //Add a recipient

            //Attachments
            // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
            // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = 'Notificación reservacion';
            $mail->Body    = 'Reservación agendada';

            $mail->send();

            echo '  <div class="alert alert-primary alert-dismissible fade show" role="alert">
            Se manda por correo electronico indicaciones</div>';
            
            ;
        } catch (Exception $e) {
            echo '<div class="alert alert-primary alert-dismissible fade show" role="alert">
            Se manda por correo electronico indicaciones  </div>  '+$mail->ErrorInfo;
        }
    }
    

?>