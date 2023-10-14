<?php
$alert='';
session_start();
    if(!empty($_SESSION['active']) ){
        header('location: /asistencia1/sistema/nilson');
    }else{
        if(!empty($_POST)){
    
            if(empty($_POST['usuario']) || empty($_POST['clave'])){
                $alert = 'Ingrese su usuario y su clave';
            }else{
            
                require_once "conexion.php";
                $user = mysqli_real_escape_string($conexion,$_POST['usuario']);
               
                $pass = (mysqli_real_escape_string($conexion,$_POST['clave']));


                $query = mysqli_query($conexion,"SELECT u.id as id_usu ,u.nombre as nombre_usu,u.usuario,r.id rol,r.nombre rolnom,u.correo
                                                FROM usuario u INNER JOIN rol r ON u.rol = r.id WHERE usuario='$user' AND clave='$pass' AND estado=1");
                mysqli_close($conexion);
                $result = mysqli_num_rows($query);

                if($result > 0){
                    $data = mysqli_fetch_array($query);
                    $_SESSION['active'] = true;
                    $_SESSION['id_usu'] = $data['id_usu'];
                    $_SESSION['nombre_usu'] = $data['nombre_usu'];
                    $_SESSION['usuario'] = $data['usuario']; 
                    $_SESSION['rol'] = $data['rol'];
                    $_SESSION['rolnom'] = $data['rolnom'];
                    $_SESSION['correo'] = $data['correo'];

                    header('location: verifica.php');
                }else{
                    $alert = 'El usuario o la clave son incorrectos';
                    session_destroy();
                }
            }
        }
    }

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="./css/style.css">
    <title>Login</title>
</head>
<body class="body">
    <div class="contenedor">
    <img src="./css/img/iz.svg" draggable="false" class="img3" alt="">
    <div class="login-container">
        <div class="alert"><?php echo isset($alert) ? $alert : ''; ?></div>
        <form action="" method="POST" autocomplete="off">
            <h1>Iniciar Sesión</h1>
            <div class="form-group">
                <label>Usuario:</label>
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-password-user" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                <path d="M12 17v4"></path>
                <path d="M10 20l4 -2"></path>
                <path d="M10 18l4 2"></path>
                <path d="M5 17v4"></path>
                <path d="M3 20l4 -2"></path>
                <path d="M3 18l4 2"></path>
                <path d="M19 17v4"></path>
                <path d="M17 20l4 -2"></path>
                <path d="M17 18l4 2"></path>
                <path d="M9 6a3 3 0 1 0 6 0a3 3 0 0 0 -6 0"></path>
                <path d="M7 14a2 2 0 0 1 2 -2h6a2 2 0 0 1 2 2"></path>
                </svg>
                <input type="text" id="usuario" name="usuario" required>
            </div>
            <div class="form-group">
                <label>Contraseña:</label>
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-brand-samsungpass" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                <path d="M4 10m0 2a2 2 0 0 1 2 -2h12a2 2 0 0 1 2 2v7a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2z"></path>
                <path d="M7 10v-1.862c0 -2.838 2.239 -5.138 5 -5.138s5 2.3 5 5.138v1.862"></path>
                <path d="M10.485 17.577c.337 .29 .7 .423 1.515 .423h.413c.323 0 .633 -.133 .862 -.368a1.27 1.27 0 0 0 .356 -.886c0 -.332 -.128 -.65 -.356 -.886a1.203 1.203 0 0 0 -.862 -.368h-.826a1.2 1.2 0 0 1 -.861 -.367a1.27 1.27 0 0 1 -.356 -.886c0 -.332 .128 -.651 .356 -.886a1.2 1.2 0 0 1 .861 -.368h.413c.816 0 1.178 .133 1.515 .423"></path>
                </svg>
                <input type="password" id="clave" name="clave" required>
            </div>
            <br>
            <button type="submit" class="login-button">Iniciar Sesión</button>
        </form>
    </div>
</div>
</body>
</html>
