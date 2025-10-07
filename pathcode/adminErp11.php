<?php

 session_start();

 include("/var/www/html/config/conexion_erp.php");

 $Action = strip_tags($_POST["action"]);
 echo $Action($tib);
 $tib->close(); 


function ActivarLogueo($tib){

$_SESSION["idUsuario"] = 0;
$_SESSION["Conectividad"] = 0;

$idUsuario = trim($_POST["usuario"]);
$Pswn = trim($_POST["psw"]);


$Select = "select  usuario, contrasena, tipo_usuario
                  from usuarios where usuario = $1 and estado = 'A' ";
$Selt = $tib->GetRow($Select, [$idUsuario]);


if($Pswn == $Selt["contrasena"]){

    $_SESSION["idUsuario"] = $Selt["usuario"];
	$_SESSION["Conectividad"] = 400;
    $_SESSION["csrf_token"]   = bin2hex(random_bytes(32));

    if($Selt["tipo_usuario"] == 'A'){

       $aData["url_web"] = "adminErp.php";

    }else{

       $aData["url_web"] = "usergb.php";

    }


    $aData["codigo"] = 1;

    $aData["mensaje"] = "MSJ: EL USUARIO HA INGRESADO CORRECTAMENTE AL SISTEMA";

}else{
  
    $aData["mensaje"] = "MSJ: EL USUARIO NO ESTA REGISTRADO EN LA BASE DE DATOS ";
    $aData["codigo"] = 0;

}


return json_encode($aData);

}


?>