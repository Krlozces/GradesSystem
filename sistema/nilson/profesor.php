<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro de Docente</title>
    <link rel="stylesheet" type="text/css" href="estilo1.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="Controlador/funci.js" ></script>

</head>
<body>
<?php include "nav.php"; ?>
<div class="texto">
        <h1>Registro de Docente</h1>
    </div>

    <?php
        session_start();

        // Mostrar mensajes de éxito o error
        if (isset($_SESSION['success'])) {
            echo "<div class='success'>" . $_SESSION['success'] . "</div>";
            unset($_SESSION['success']); // Limpiar el mensaje de éxito
        }

        if (isset($_SESSION['error'])) {
            echo "<div class='error'>" . $_SESSION['error'] . "</div>";
            unset($_SESSION['error']); // Limpiar el mensaje de error
        }
    ?>

        <section class="almacenar">
            <div class="conteiner">
                <div class="imagen">
                    <img src="imagen/profesor.png" draggable="false" alt="Imagen de ejemplo">
                </div>

                <form method="POST" action="guardar_profesor.php" autocomplete="off">
                    <div class="parte1">
                        <div class="campo">
                            <label for="dnidoce">DNI del Docente:
                                <input type="text" maxlength="8" name="dnidoce" id="dnidoce" required pattern="[0-9]{8}"
                                title="El DNI debe contener 8 dígitos numéricos">
                            </label>
                        </div>
                    </div>

                    <div class="parte1">
                        <div class="campo">
                            <label for="nomdocente">Nombre del Docente:
                                <input type="text" name="nomdocente" id="nomdocente" required>
                            </label>
                        </div>
                    </div>

                    <div class="parte1">
                        <div class="campo">
                            <label for="apedocente">Apellido del Docente:
                                <input type="text" name="apedocente" id="apedocente" required>
                            </label>

                        </div>
                    </div>

                    <script>
                    $('#dnidoce').change(function() {
                    dni = $('#dnidoce').val();
                    $.ajax({
                        url: "Controlador/consultarApiB.php",
                        type: "post",
                        data: `dnidoce=${dni}`,
                        dataType: "json",
                        success: function(r) {
                            if (r.numeroDocumento == dni) {
                                // Manejar la respuesta de la api
                                $("#apedocente").val(r.apellidoPaterno + " " + r.apellidoMaterno);
                                $("#nomdocente").val(r.nombres);
                                console.log(r);
                            } else {
                                console.error(r.error);
                            }
                        },
                        error: function() {
                            console.error("Hubo un error al realizar la llamada AJAX");
                        }
                    });
                });
                </script>

                    <div class="parte1">
                        <div class="campo">
                            <label for="telefono">Teléfono:
                                <input type="text" name="telefono" id="telefono" required pattern="[0-9]{9}"
                                title="El teléfono debe contener 9 dígitos numéricos">
                            </label>
                        </div>
                    </div>

                    <div class="parte1">
                        <div class="campo">
                            <label for="email">Correo Electrónico:
                                <input type="email" name="email" id="email" required pattern=".*@(gmail\.com|hotmail\.com)" 
                        title="El correo debe contener '@gmail.com' o '@hotmail.com'"></label>
                        </div>
                    </div>

                    <div class="parte1">
                        <div class="campo">
                        <label for="NomEspecialidad">Especialidad:
                        <input type="text" id="NomEspecialidad" name="especialidad" required></label>
                        </div>
                    </div>

                    <div class="boton-container">
                        <div class="boton1">
                            <input type="submit" value="Guardar">
                        </div>

                        <div class="boton2">
                            <a href="lis_docentes.php"><button type="button">Lista </button></a>
                        </div>
                    </div>
                </form>
            </div>
        </section>
</body>
</html>


