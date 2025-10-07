<?php
  session_start();
  ini_set('display_errors','off');

  
  include("/var/www/html/devtib/tibsa/validacionCredrenciales.php");


  $Action = strip_tags($_POST["action"]);
  echo $Action($tib);
  
   function EnvioUsuario($tib){
	   
   // $tib->debug=true;

    $usuarioid = $_POST["usuarioid"];
    $rfcid = $_POST["rfcid"];
    $fechaalta = $_POST["fechaalta"];
    $perfil = $_POST["perfil"];
    $estado = $_POST["estado"];

    $SelUsr = "select count(usuario) as usuario from usuarios where usuario = '".$usuarioid."' ";
    $SelU = $tib->Execute($SelUsr);
    if( $SelU->fields["usuario"] > 0 ){

      $update = "update usuarios set 
                       rfc = '".$rfcid."', 
                       estado = '".$estado."', 
                       fecha_alta = '".$fechaalta ."', 
                       perfil = '".$perfil."' 
                       where usuario = '".$usuarioid."' ";
       $updt = $tib->Execute($update );

    }else{
  
        $insert = "insert into usuarios 
                               (usuario,
                               contrasena,
                               rfc,
                               estado, 
                               fecha_alta,
                               perfil) values 
                               ('".$usuarioid."',
                               '".$rfcid."',
                               '".$rfcid."',
                               '". $estado."',
                               '".$fechaalta."',
                               '". $perfil."') ";
        $inst = $tib->Execute($insert );

    }

    $aData["ID"] = 1;
	
	return json_encode($aData);	
   }
   
   
  ?>