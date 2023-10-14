<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro del Alumno</title>
    <link rel="stylesheet" type="text/css" href="estilo1.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="Controlador/funci01.js" ></script>

</head>
<body>

<div class="texto">
        <h1>Registro del Alumno</h1>
    </div>

    <?php
        session_start();
        include "nav.php";
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
                    <img src="imagen/alumno.png" alt="Imagen de ejemplo">
                </div>

                <form method="POST" action="guardaralumno.php" autocomplete="off">
                    <div class="parte1">
                        <div class="campo">
                            <label for="ALUMDNI">DNI del Alumno:
                                <input type="text" id="ALUMDNI" name="alumdni" required pattern="[0-9]{8}"
                                title="El DNI debe contener 8 dígitos numéricos">
                            </label>
                        </div>
                    </div>


                    <div class="parte1">
                        <div class="campo">
                            <label for="NomAlumno">Nombres:
                                <input type="text" id="NomAlumno" name="nomAlumno" required>
                            </label>
                        </div>
                    </div>

                    <div class="parte1">
                        <div class="campo">
                            <label for="ApeAlumno">Apellidos:
                                <input type="text" id="ApeAlumno" name="apeAlumno" required>
                            </label>

                        </div>
                    </div>

                    <script>
                    $('#ALUMDNI').change(function() {
                    dni = $('#ALUMDNI').val();
                    $.ajax({
                        url: "Controlador/consultarApiC.php",
                        type: "post",
                        data: `ALUMDNI=${dni}`,
                        dataType: "json",
                        success: function(r) {
                            if (r.numeroDocumento == dni) {
                                // Manejar la respuesta de la api
                                $("#ApeAlumno").val(r.apellidoPaterno + " " + r.apellidoMaterno);
                                $("#NomAlumno").val(r.nombres);
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
                        <label for="FechaNaci">Fecha de Nacimiento :
                        <input type="date" id="FechaNaci" name="fechaNaciAlumno" required></label>
                        </div>
                    </div>

                    <script>
                        document.addEventListener("DOMContentLoaded", function() {
                        var fechaNacimientoInput = document.getElementById("FechaNaci");

                        fechaNacimientoInput.addEventListener("change", function() {
                            var fechaNacimiento = new Date(fechaNacimientoInput.value);
                            var fechaHoy = new Date();

                            // Calcula la edad del alumno
                            var edad = fechaHoy.getFullYear() - fechaNacimiento.getFullYear();

                            // Comprueba si el alumno tiene al menos 6 años
                            if (edad < 6) {
                                alert("El alumno debe tener al menos 6 años de edad para registrarse.");
                                fechaNacimientoInput.value = ""; // Limpia el campo de fecha de nacimiento
                            }
                        });
                    });

                    </script>

                    <div class="parte1">
                        <div class="campo">
                        <label for="sexo">Sexo:
                        <select name="sexo" id="sexo" required></label>
                            <option value=""></option>
                            <option value="H">Masculino</option>
                            <option value="M">Femenino</option>
                        </select>
                        </div>
                    </div>

                    <div class="parte1">
                        <div class="campo">
                        <label for="Email">Email del Alumno:
                        <input type="text" id="Email" name="emailAlumno" required pattern=".*@(gmail\.com|hotmail\.com)" 
                        title="El correo debe contener '@gmail.com' o '@hotmail.com'"></label>
                        </div>
                    </div>

                    <div class="parte1">
                        <div class="campo">
                        <label for="NomGrado">Grado:
                        <input type="text" id="NomGrado" name="nomGrado" required></label>
                        </div>
                    </div>

                    <div class="parte1">
                        <div class="campo">
                        <label for="Direccion">Dirección:
                        <input type="text" id="Direccion" name="direccionAlumno" required></label>
                        </div>
                    </div>

                    <div class="boton-container">
                        <div class="boton1">
                            <input type="submit" value="Guardar">
                        </div>

                        <div class="boton2">
                            <a href="tableEstudiantes.php"><button type="button">Lista </button></a>
                        </div>
                    </div>
                </form>
            </div>
        </section>
</body>
</html>


