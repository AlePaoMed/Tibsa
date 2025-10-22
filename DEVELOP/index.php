<?php

if($_GET["f"] == true){

  $pantallitas = $_GET["f"].".php";
    
  include($pantallitas);
  $valorSee = $_GET["_g"];

  $objetitos = new $_GET["f"]();
  $SistemaWebPP = $objetitos->$valorSee($tib);
    
  $Perfilusuario = "select perfil from usuarios where usuario = '".$_SESSION["idUsuario"]."' ";
  $PerfilUSer = $tib->Execute($Perfilusuario);
    
  $SelectNumber = "select nivel_acceso from derechos_pantallas where  pantalla = '".$pantallitas."' and perfil = '".$PerfilUSer->fields["perfil"]."' ";
  $Select = $tib->Execute($SelectNumber);
    
  $NivelAcceso = (Int)$Select->fields["nivel_acceso"];
    
  $selectAdmin = "select usuario_admin from perfiles where perfil = '".$PerfilUSer->fields["perfil"]."' ";
  $seleAdmin = $tib->Execute($selectAdmin);

   if($NivelAcceso > 0 || $seleAdmin->fields["usuario_admin"] == 'S'){
	
	  $ContenidoWeb = '
	    <div class="sweb">
          <div class="siswebweb">
	
	
	        '.$SistemaWebPP.' 
	
	
	
	       </div>
	    </div>

	  ';


	}else{
		
	  $ContenidoWeb = '
	    <div class="sweb">
          <div class="siswebweb">
	
	         <div style="background-color:#af002a; color:#fff; padding:5px 10px; border-radius:10px;">
	
	              ACCESO DENEGADO, FAVOR DE SOLICITAR PERMISOS AL ADMINISTRADOR DE PLATAFORMA! 
	
	         </div>
	
	       </div>
	    </div>

	  ';		
		
	
	}
	
	
	
}else{
 
  ob_start();
  include("principal.php"); 
  $ContenidoWeb = ob_get_clean();

}


?>

<!doctype html>
<html lang="es">
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<title>ERP En Crecimiento</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" />
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
<link href="../css/principal.css?v.2355343354645646464476" rel="stylesheet">
<link href="//cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.min.css">
<link rel="stylesheet" href="https://code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
<link rel="stylesheet" href="../css_load/principal.css?v.8283867657523">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.4/jquery-confirm.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.js"></script>
<script src="//cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js?v.3232"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.jquery.min.js"></script>
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.blockUI/2.70/jquery.blockUI.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.4/jquery-confirm.min.js"></script>
<script src="../js_load/principal.js"></script>
</head>
<body>

<header>
  <div class="section-logo">
  <span><a href="../adminErp.php" style=" color: inherit; text-decoration: none;">TIB</a></span>
  
<div class="d-flex align-items-center">
  <!-- Botón Cerrar sesión -->
  <a href="../logout.php" class="btn btn-danger btn-sm me-2" id="logoutBtn">
    <i class="fa fa-sign-out-alt"></i> Cerrar
</a>

  <!-- Botón hamburguesa solo en móviles -->
  <button class="btn btn-outline-light d-lg-none" id="toggleSidebar">
    <i class="fa fa-bars"></i>
  </button>
</div>

</div>
</header>

<div class="d-flex">
  <!-- Sidebar -->
  <nav class="sidebar col-lg-3 col-xl-2" id="sidebar">
    <div class="sidebar-search mb-2">
      <input type="text" id="search-modules" class="form-control" placeholder="Buscar Pantalla..." autocomplete="off">
    </div>

    <a href="#" class="nav-link active" data-module="bienvenida">INICIO</a>
    <!-- Talento Humano -->

     
    <a class="nav-link" data-bs-toggle="collapse" href="#talentoHumano" role="button" aria-expanded="false">
      <span><?php echo $Modulito; ?></span>
      <i class="fa fa-chevron-right arrow"></i>
    </a> 
    <div class="collapse ms-3" id="talentoHumano">
     
      <?php echo  $MenuHorizontal; ?>

    </div>
  </nav>

  <div class="main-content">

   <?php echo  $ContenidoWeb ; ?> 

  </div>


   <?php echo  $tib->close(); ?>
<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="../js_load/funcion.js?v.3453"></script>
</body>
</html>
