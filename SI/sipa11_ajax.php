<?php
  session_start();
  ini_set('display_errors','off');
  ini_set('max_execution_time', -1);

   include("/var/www/html/devtib/tibsa/validacionCredrenciales.php");

  $Action = strip_tags($_POST["action"]);
  echo $Action($tib);
  
   function pantallasweb($tib){
	   
	//$tib->debug=true;
	
	$pantalla = $_POST["pantalla"];
	$nombre = $_POST["nombre"];
	$url_desc = $_POST["url_desc"];
	$moduloweb = $_POST["moduloweb"];
	$tipomov = $_POST["tipomov"];
	$estadod = $_POST["estadod"];
	   
	   
	//$Consultita = "select pantalla, nombre, url_desc, estado, modulo, tipo_movimiento from pantallas where pantalla = '".$pantalla."' ";
	$Consultita = "select count(pantalla) as pantalla from pantallas where pantalla = '".$pantalla."' ";
	$ConstUrl = $tib->Execute($Consultita);
	if($ConstUrl->fields["pantalla"] > 0){
		
		$update = "update pantallas set nombre = '".$nombre."', 
		                                url_desc = '".$url_desc."', 
										estado = '".$estadod."', 
										modulo = '".$moduloweb."', 
										tipo_movimiento = '".$tipomov."' where pantalla = '".$pantalla."'  ";
										
		$updt = $tib->Execute($update);
		
		
	}else{
		
		$insert = "insert into pantallas 
		                       (pantalla, 
							    nombre, 
								url_desc, 
								estado, 
								modulo, 
								tipo_movimiento)
                               values ('".$pantalla."',
							   '".$nombre."',
							   '".$url_desc."',
							   '".$estadod."',
							   '".$moduloweb."',
							   '".$tipomov."' )";
		 $inst = $tib->Execute($insert);
		
		
	
	}


    $aData["ID"] = 1;


     return json_encode($aData);	
   }
   
   
  ?>