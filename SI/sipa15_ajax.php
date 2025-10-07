<?php
  session_start();
  ini_set('display_errors','off');


 include("/var/www/html/devtib/tibsa/validacionCredrenciales.php");

  $Action = strip_tags($_POST["action"]);
  echo $Action($tib);
  
  function PermisosWeb($tib){
	  
	 //$tib->debug=true;
	 
	 $perfil = $_POST["perfil"];
	 $permiso = $_POST["permiso"];
	 $pantalla = $_POST["pantalla"];
	 $modulo = $_POST["modulo"];
	  
	 $select = "select count(pantalla) as pantalla from derechos_pantallas where pantalla = '".$pantalla."' and modulo = '".$modulo."' and perfil = '".$perfil."' ";
	 $selt = $tib->Execute($select);
	 if($selt->fields["pantalla"] > 0){
		 
		 if($permiso == '99'){
			 
			 $update = "delete from derechos_pantallas where pantalla = '".$pantalla."' and modulo = '".$modulo."' and perfil = '".$perfil."' ";
             $upt = $tib->Execute( $update);
			 
		 }else{
		   
		   $update = "update derechos_pantallas set nivel_acceso = '".$permiso."' where pantalla = '".$pantalla."' and modulo = '".$modulo."' and perfil = '".$perfil."' ";
           $upt = $tib->Execute( $update);
		   
		 }
		 
	 }else{
		 
		 $insert = "insert into derechos_pantallas 
		                        (pantalla, 
								nivel_acceso, 
								modulo, 
								perfil) values 
								('".$pantalla."',
								 '".$permiso."',
								 '".$modulo."',
								 '".$perfil."')";
		 $inst = $tib->Execute( $insert );
		 
	 }
	  
	$aData["ID"] = 1;
	
	return json_encode($aData);	
  }