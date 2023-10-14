    document.addEventListener("DOMContentLoaded", function() {
        var nomAlumnoInput = document.querySelector("input[name='nomAlumno']");

        nomAlumnoInput.addEventListener("input", function() {
            var valorCampo = nomAlumnoInput.value;

            // Remueve caracteres no permitidos (deja solo letras y espacios)
            var valorFiltrado = valorCampo.replace(/[^a-zA-ZáéíóúÁÉÍÓÚ\s]/g, '');

            // Convierte la primera letra en mayúscula y el resto en minúscula
            valorFiltrado = valorFiltrado.toLowerCase().replace(/(?:^|\s)\S/g, function(a) {
                return a.toUpperCase();
            });

            nomAlumnoInput.value = valorFiltrado;
        });
    });

    document.addEventListener("DOMContentLoaded", function() {
        var apeAlumnoInput = document.querySelector("input[name='apeAlumno']");

        apeAlumnoInput.addEventListener("input", function() {
            var valorCampo = apeAlumnoInput.value;

            // Remueve caracteres no permitidos (deja solo letras y espacios)
            var valorFiltrado = valorCampo.replace(/[^a-zA-ZáéíóúÁÉÍÓÚ\s]/g, '');

            // Convierte la primera letra en mayúscula y el resto en minúscula
            valorFiltrado = valorFiltrado.toLowerCase().replace(/(?:^|\s)\S/g, function(a) {
                return a.toUpperCase();
            });

            apeAlumnoInput.value = valorFiltrado;
        });
    });


    document.addEventListener("DOMContentLoaded", function() {
        var alumdniInput = document.querySelector("input[name='alumdni']");

        alumdniInput.addEventListener("input", function() {
            var valorCampo = alumdniInput.value;

            // Remueve caracteres no permitidos (deja solo números)
            var valorFiltrado = valorCampo.replace(/[^0-9]/g, '');

            // Limita a 8 caracteres
            valorFiltrado = valorFiltrado.substring(0, 8);

            alumdniInput.value = valorFiltrado;
        });
    });





    document.addEventListener("DOMContentLoaded", function() {
        var emailAlumnoInput = document.querySelector("input[name='emailAlumno']");

        emailAlumnoInput.addEventListener("input", function() {
            var valorCampo = emailAlumnoInput.value;

            // Remueve caracteres no permitidos (deja letras, números, @ y puntos)
            var valorFiltrado = valorCampo.replace(/[^a-zA-Z0-9@.]/g, '');

            // Verifica si termina en @gmail.com o @hotmail.com
            if (valorFiltrado.endsWith("@gmail.com") || valorFiltrado.endsWith("@hotmail.com")) {
                emailAlumnoInput.value = valorFiltrado; // Permitir el valor
            } else {
                // Autocompletar si se ingresa "@" seguido de "g" o "h"
                if (valorFiltrado.endsWith("@g") && !valorFiltrado.endsWith("@gmail.com")) {
                    emailAlumnoInput.value = valorFiltrado.slice(0, -2) + "@gmail.com";
                } else if (valorFiltrado.endsWith("@h") && !valorFiltrado.endsWith("@hotmail.com")) {
                    emailAlumnoInput.value = valorFiltrado.slice(0, -2) + "@hotmail.com";
                } else {
                    emailAlumnoInput.value = valorFiltrado; // Dejar el valor sin cambios
                }
            }
        });
    });

    

    


