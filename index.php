<!doctype html>
<html lang="es">
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<title>Login ERP - 100% Responsive</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" />
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://code.jquery.com/ui/1.13.3/jquery-ui.min.js"></script>
<link rel="stylesheet" href="https://code.jquery.com/ui/1.13.3/themes/base/jquery-ui.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.4/jquery-confirm.min.css">
<link href="css_load/index.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.blockUI/2.70/jquery.blockUI.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.4/jquery-confirm.min.js"></script>
<script src="js_load/principal.js"></script>  
</head>
<body>

<header>
  <div class="section-logo">
    <div class="logo-section">TIB</div>
  </div>
</header>

<section>
  <div class="login-container">
    <h2>Login ERP</h2>

     <form id="loginsubmit" autocomplete="off">
        <div class="input-group">
        <i class="fa fa-user"></i>
        <input type="text" name="usuario" id="usuario" placeholder="Usuario" />
        </div>


   

    <div class="input-group">
      <i class="fa fa-lock"></i>
      <input type="password" name="psw" id="psw" placeholder="Contraseña" />
    </div>

    <!--
    <div class="forgot-password">
      <a href="#" id="recuperar">¿Olvidé mi contraseña?</a>
    </div>
     -->
    
     <button type="submit" name="next" id="next">Siguiente</button>
   </form>
  </div>
</section>

<!-- Dialog -->
<div id="dialog-recuperar" title="Recuperar Contraseña">
  <p>Ingresa tu correo electrónico para recibir instrucciones:</p>
  <input type="email" placeholder="correo@ejemplo.com" style="width:100%; padding:8px; border-radius:5px; border:1px solid #ccc;">
</div>


<script src="js_load/index.js"></script>
</body>
</html>
