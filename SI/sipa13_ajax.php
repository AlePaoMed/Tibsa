<?php
  session_start();
  ini_set('display_errors','off');

  include("/var/www/html/devtib/tibsa/validacionCredrenciales.php");


  $Action = strip_tags($_POST["action"]);
  echo $Action($tib);
  
   function EnvioPerfiles($tib){
	   
    //$tib->debug=true;

    $perfil = $_POST["perfil"];
    $mombre = $_POST["mombre"];
    $estado = $_POST["estado"];

    $Consultita = "select count(perfil) as perfil from perfiles where perfil = '".$perfil."' ";
    $Constc = $tib->Execute($Consultita);
    if($Constc->fields["perfil"] > 0){

         $update = "update perfiles set 
                           nombre = '".$mombre."', 
                           estado =  '".$estado."' 
                           where perfil = '".$perfil."' ";
        $updt = $tib->Execute($update);

    }else{

         $insert = "insert into perfiles (perfil, nombre, estado) 
                                values
                                ('".$perfil."',
                                '".$mombre."',
                                '".$estado."') ";
         $inst = $tib->Execute( $insert );


    }

    $aData["ID"] = 1;
	
	return json_encode($aData);	
   }
   
   
  ?>