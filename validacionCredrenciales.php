<?php 

 session_start();


if (!isset($_SESSION["idUsuario"]) || !isset($_SESSION["Conectividad"])) {
    // No hay sesión -> redirigir al login
    header("Location: ../tibsa");
    exit();
}

// Opcional: validar la conectividad (ejemplo: debe ser 400)
if ($_SESSION["Conectividad"] !== 400) {
    header("Location: ../tibsa");
    exit();
}

include("/var/www/html/config/conexion_erp.php");
?>