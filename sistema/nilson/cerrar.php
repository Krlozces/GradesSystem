<?php
// Inicia o reanuda la sesión
session_start();

// Destruye todas las variables de sesión
session_destroy();

// Redirige al usuario a la página de inicio de sesión o a donde desees
header("Location: /asistencia1");
exit; // Asegúrate de detener la ejecución del script después de redirigir
?>
