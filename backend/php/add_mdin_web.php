<?php
    require_once('../../backend/config/ConexionSNSesion.php');
    if(isset($_POST['md_insert'])){
    ///////////// Informacion enviada por el formulario /////////////
        $numc=$_POST['mdnum'];
        $dnic=$_POST['mddoc'];
        $nomc=$_POST['mdnom'];
        $apec=$_POST['mdap'];

    ///////// Fin informacion enviada por el formulario /// 

    ////////////// Insertar a la tabla la informacion generada /////////
    $sql="insert into clientes(dnic, numc, nomc,apec,estac) 
    values(:dnic, :numc,:nomc,:apec,'1')";
        
    $sql = $connect->prepare($sql);
        
    $sql->bindParam(':dnic',$dnic,PDO::PARAM_STR, 25);
    $sql->bindParam(':numc',$numc,PDO::PARAM_STR, 25);
    $sql->bindParam(':nomc',$nomc,PDO::PARAM_STR,25);
    $sql->bindParam(':apec',$apec,PDO::PARAM_STR,25);

        
    $sql->execute();

    $lastInsertId = $connect->lastInsertId();
    if($lastInsertId>0){
            echo '<div class="alert alert-primary alert-dismissible fade show" role="alert">
                                            Gracias .. Agregado correctamente
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                            </button>
                                        </div>';
    }
    else{
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
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
    // $adel=$_POST['rxade'];
    $observac=$_POST['rxobs'];

    // $idhab=12;
    // $iddn=11;
    // $feentra='2022-11-26';
    // $fesal='2022-11-26';
    $adel=0.00;
    // $observac=$_POST['rxobs'];



        $statement = $connect->prepare("INSERT INTO reservar (idhab,iddn,feentra,fesal,adel,state,observac) VALUES('$idhab', '$iddn','$feentra','$fesal','$adel','1', '$observac')");

        

         $statement2 = $connect->prepare("UPDATE habitaciones SET estadha='2' WHERE idhab= $idhab LIMIT 1;");

           //echo "$item";
                //Execute the statement and insert our values.
        $inserted = $statement->execute(); 
        $inserted = $statement2->execute(); 


        if($inserted>0){

            echo '<script type="text/javascript">
        swal("¡Registrado!", "Agregado correctamente", "success").then(function() {
                    window.location = "../recepcion/mostrar.php";
                });
                </script>';
        }
        else{
            

        echo '<script type="text/javascript">
        swal("Error!", "No se pueden agregar datos,  comuníquese con el administrador ", "error").then(function() {
                    window.location = "../recepcion/mostrar.php";
                });
                </script>';

        print_r($sql->errorInfo()); 
        }
  

    }
