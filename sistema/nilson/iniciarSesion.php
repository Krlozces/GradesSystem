<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Iniciar Sesión</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="scss/sesion.css">
    </head>
    <body>
        <div class="container-general">
            <div class="container-left">
                <!-- <img src="./images/school01removebg.png" alt="fondo de aula"> -->
            </div>
            <div class="container-right">
                <h1>Hola!</h1>
                <div class="sub-container">
                    <h2>Iniciar sesión</h2>
                    <i class="fa-solid fa-school icon-center"></i>
                    <form action="" method="POST" class="container-form">
                        <label for="user" class="input-container">
                            <span class="icon"><i class="fa-regular fa-user"></i></span><input type="text" name="user" id="user" placeholder="Usuario">
                        </label>
                        <label for="pass" class="input-container">
                            <span class="icon"><i class="fa-solid fa-lock"></span></i><input type="password" name="pass" id="pass" placeholder="Contraseña">
                        </label>
                        <button type="submit">Iniciar sesión</button>
                    </form>
                </div>
                <hr>
                <p>¿No tienes una cuenta? <a href="" target="_blank">Registrarse</a></p>
            </div>
        </div>
        <script src="" async defer></script>
    </body>
</html>