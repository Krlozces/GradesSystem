<?php
session_start();
if(empty($_SESSION)){
    header("Location: /asistencia1");
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="estilo.css">
    <title>Document</title>
</head>
<body>
<?php include "nav.php"  ;?>


</body>

</html>