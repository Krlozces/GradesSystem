<?php
session_start();

if (empty($_SESSION)) {
    session_destroy();
    header("Location: ../asistencia1/index.php");
    exit;
}

if (!empty($_SESSION['verificacion_completada'])) {
    header('location: /asistencia1/sistema/nilson/');
    exit;
}

if (empty($_POST)) {
    $alert = 'No puede estar en blanco';
} else {
    require_once "conexion.php";
    
    $id = $_SESSION['id_usu'];
    $verifica = (mysqli_real_escape_string($conexion, $_POST['clave']));

    $query = mysqli_query($conexion, "SELECT * FROM usuario WHERE id='$id' AND verifica='$verifica' AND estado = 1 ");

    mysqli_close($conexion);
    
    $result = mysqli_num_rows($query);

    if ($result > 0) {
        // Marcar la verificación como completada
        $_SESSION['verificacion_completada'] = true;
        header('location: ./sistema/nilson');
    } else {
        $alert = 'Su contraseña de verificación no coincide';
    }
}
?>'
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="./css/style1.css">
    <title>Login</title>
</head>
<body class="body">
    <div class="contenedor">
    <div class="login-container">
        <div class="alert"><?php echo isset($alert) ? $alert : ''; ?></div>
        <form action="" method="POST" autocomplete="off">
            <h2>¡Hola <?php echo $_SESSION['nombre_usu']?>!</h2>
            <p>Necesitamos verificar que eres tu, por favor ingrese su clave de verificación: </p>
            <input type="text" id="clave" name="clave" maxlength="4" required>
            <br>
            <button type="submit" class="login-button">Verificar</button>
        </form>
    </div>
    <img src="./css/img/iz.svg" draggable="false" class="img3" alt="">
</div>
</body>
</html>
