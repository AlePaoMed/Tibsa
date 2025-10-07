<?php
  session_start();
  ini_set('display_errors','off');

  include("/var/www/html/devtib/tibsa/validacionCredrenciales.php");

  $Action = strip_tags($_POST["action"]);
  echo $Action($tib);
  
   function enviomodulosweb($tib){
	   
	 $modulo = $_POST["modulo"];
	 $descripcion = $_POST["descripcion"];
	 $estado = $_POST["estado"];
	
	   
	 $select = "select count(modulo) as modulo from modulos_web where modulo = '".$modulo."' ";
     $selt = $tib->Execute( $select);
     if($selt->fields["modulo"] > 0){
		 
		 $update = "update modulos_web set nombre = '".$descripcion."', estado = '". $estado."' where modulo = '".$modulo."' ";
		 $upt = $tib->Execute($update);
		 
	 }else{
		 
		 $insert = "insert into modulos_web (modulo, nombre, estado) values ('".$modulo."', '".$descripcion."', '".$estado."')  ";
		 $inst = $tib->Execute($insert);
		 
		 
	 }	 


    $aData["ID"] = 1;
	
	return json_encode($aData);	
   }
   
   
  ?>