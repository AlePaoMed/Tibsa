<?php 

include("validacionCredrenciales.php");
	   
$Perfilusuario = "select perfil from usuarios where usuario = '".$_SESSION["idUsuario"]."' ";
$PerfilUSer = $tib->Execute($Perfilusuario);
		 
$selectAdmin = "select usuario_admin from perfiles where perfil = '".$PerfilUSer->fields["perfil"]."' ";
$seleAdmin = $tib->Execute($selectAdmin);
		 
$WhereArea = "";
		 
if($seleAdmin->fields["usuario_admin"] == 'S'){
			 
}else{
			 
	$WhereArea = "and modulo in (select modulo from derechos_pantallas where perfil = '".$PerfilUSer->fields["perfil"]."' group by modulo) ";
			 
}

$select = "select modulo, nombre from modulos_web where estado = 'A' $WhereArea ";
$lct = $tib->Execute($select);
foreach($lct as $cbn =>$ven){
   $varMenu .= '
    <a class="nav-link" href="'.$ven["modulo"].'" >
       '.$ven["nombre"].' <i class="fa fa-plus arrow"></i>
    </a>';

}

  
$tib->close();

?>
<!doctype html>
<html lang="es">
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<title>TIB - ERP En crecimiento </title>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" />
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="css_load/principal.css?v.383490348" rel="stylesheet">
</head>
<body>

<!-- Header/logo -->
<header>
  <div class="section-logo">
  <span>TIB</span>
  
<div class="d-flex align-items-center">
  <!-- Botón Cerrar sesión -->
  <a href="logout.php" class="btn btn-danger btn-sm me-2" id="logoutBtn">
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
      <input type="text" id="search-modules" class="form-control" placeholder="Buscar módulo..." autocomplete="off">
    </div>

    <!-- Inicio -->
    <a href="#" class="nav-link active" data-module="bienvenida">INICIO</a>

    <?php echo $varMenu; ?>
    
    
    </nav>  
    


  
  <!-- Overlay para móvil -->
  <div class="overlay" id="overlay"></div>

  <!-- Main Content -->
  <div class="main-content col-lg-9 col-xl-10">
    <!-- Contenedor dinámico -->
    <div id="module-content">
      <div id="bienvenida-content">
        <div class="mb-4 p-3 rounded bg-light shadow-sm">
          <span class="tituloLeyenda"><h4>Bienvenido, <span id="user-name"><?php echo $_SESSION["idUsuario"]; ?></span> </h4></span>
          <p>Estas son tus últimas notificaciones:</p> No tiene notificaciones.
        </div>

        
  
    </div>
  </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="js_load/admin.js"></script>
</body>
</html>
