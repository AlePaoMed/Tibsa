<?php

include("/var/www/html/devtib/tibsa/validacionCredrenciales.php");

$url_ptr = explode("/", filter_var($_SERVER['REQUEST_URI'], FILTER_SANITIZE_URL));

$ObtenerModulo = "select modulo, nombre from modulos_Web where modulo = '".$url_ptr[2]."' ";
$ObtMd = $tib->Execute($ObtenerModulo);

$Modulito = $ObtMd->fields["nombre"];

$Perfilusuario = "select perfil from usuarios where usuario = '".$_SESSION["idUsuario"]."' ";
$PerfilUSer = $tib->Execute($Perfilusuario);
		
 $selectAdmin = "select usuario_admin from perfiles where perfil = '".$PerfilUSer->fields["perfil"]."' ";
 $seleAdmin = $tib->Execute($selectAdmin);
		 
 $WhereAre = "";
		 
 if($seleAdmin->fields["usuario_admin"] == "S"){
			 
			 
}else{
			 
			 $WhereAre = " and pantalla in (select pantalla from derechos_pantallas where perfil = '".$PerfilUSer->fields["perfil"]."' ) ";
			 
}

	    $Consultita = "select tipo_movimiento, descripcion, estado, prefijo from movimientos where estado = 'A' order by tipo_movimiento asc ";
	    $Constis = $tib->Execute($Consultita);
	    foreach($Constis as $consti => $vbn){
	     
       $MenuHorizontal .= '
       <a class="nav-link" data-bs-toggle="collapse" href="#'.$vbn["descripcion"].'_'.$url_ptr[2].'" role="button" aria-expanded="false">
         '.$vbn["descripcion"].'<i class="fa fa-plus arrow"></i>
       </a>
       <div class="collapse ms-3" id="'.$vbn["descripcion"].'_'.$url_ptr[2].'">';
			  $selectUna = "select pantalla, nombre, url_desc from pantallas where modulo = '".$url_ptr[2]."' and estado = 'A' and tipo_movimiento = '".$vbn["tipo_movimiento"]."'  $WhereAre  ";
			  $seltUna = $tib->Execute($selectUna);
			  foreach($seltUna as $cvn => $dre){

            $MenuHorizontal .= '
              <a href="'.$dre["url_desc"].'" class="nav-link sublink">'.$dre["nombre"].'</a>';
			  }

        
        $MenuHorizontal .= '</div>';
	      }



 include("/var/www/html/devtib/tibsa/DEVELOP/index.php");


?>