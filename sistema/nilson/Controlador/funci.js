

    document.addEventListener("DOMContentLoaded", function() {
            var nomDocenteInput = document.querySelector("input[name='nomdocente']");

            nomDocenteInput.addEventListener("input", function() {
                var valorCampo = nomDocenteInput.value;

                // Remueve caracteres no permitidos (deja solo letras y espacios)
                var valorFiltrado = valorCampo.replace(/[^a-zA-ZáéíóúÁÉÍÓÚ\s]/g, '');

                // Convierte la primera letra en mayúscula y el resto en minúscula
                valorFiltrado = valorFiltrado.toLowerCase().replace(/(?:^|\s)\S/g, function(a) {
                    return a.toUpperCase();
                });

                nomDocenteInput.value = valorFiltrado;
        });
    });

    document.addEventListener("DOMContentLoaded", function() {
        var apeDocenteInput = document.querySelector("input[name='apedocente']");

        apeDocenteInput.addEventListener("input", function() {
            var valorCampo = apeDocenteInput.value;

            // Remueve caracteres no permitidos (deja solo letras y espacios)
            var valorFiltrado = valorCampo.replace(/[^a-zA-ZáéíóúÁÉÍÓÚ\s]/g, '');

            // Convierte la primera letra en mayúscula y el resto en minúscula
            valorFiltrado = valorFiltrado.toLowerCase().replace(/(?:^|\s)\S/g, function(a) {
                return a.toUpperCase();
            });

            apeDocenteInput.value = valorFiltrado;
        });
    });


    document.addEventListener("DOMContentLoaded", function() {
        var dnidoceInput = document.querySelector("input[name='dnidoce']");

        dnidoceInput.addEventListener("input", function() {
            var valorCampo = dnidoceInput.value;

            // Remueve caracteres no permitidos (deja solo números)
            var valorFiltrado = valorCampo.replace(/[^0-9]/g, '');

            // Limita a 8 caracteres
            valorFiltrado = valorFiltrado.substring(0, 8);

            dnidoceInput.value = valorFiltrado;
        });
    });


    document.addEventListener("DOMContentLoaded", function() {
        var telefonoInput = document.querySelector("input[name='telefono']");
        
        telefonoInput.addEventListener("input", function() {

            var valorCampo = telefonoInput.value;

            var valorFiltrado = valorCampo.replace(/[^0-9]/g, '');

            if (valorFiltrado.length > 9) {
                valorFiltrado = valorFiltrado.substring(0, 9);
            }

            telefonoInput.value = valorFiltrado;
        });
    });

        document.addEventListener("DOMContentLoaded", function() {
        var emailInput = document.querySelector("input[name='email']");

        emailInput.addEventListener("input", function() {
            var valorCampo = emailInput.value;

            // Remueve caracteres no permitidos (deja letras, números, @ y puntos)
            var valorFiltrado = valorCampo.replace(/[^a-zA-Z0-9@.]/g, '');

            // Verifica si termina en @gmail.com o @hotmail.com
            if (valorFiltrado.endsWith("@gmail.com") || valorFiltrado.endsWith("@hotmail.com")) {
                emailInput.value = valorFiltrado; // Permitir el valor
            } else {
                // Autocompletar si se ingresa "@" seguido de "g" o "h"
                if (valorFiltrado.endsWith("@g") && !valorFiltrado.endsWith("@gmail.com")) {
                    emailInput.value = valorFiltrado.slice(0, -2) + "@gmail.com";
                } else if (valorFiltrado.endsWith("@h") && !valorFiltrado.endsWith("@hotmail.com")) {
                    emailInput.value = valorFiltrado.slice(0, -2) + "@hotmail.com";
                } else {
                    emailInput.value = valorFiltrado; // Dejar el valor sin cambios
                }
            }
          });

        });

        document.addEventListener("DOMContentLoaded", function() {
            var especialidadInput = document.querySelector("input[name='especialidad']");
        
            especialidadInput.addEventListener("input", function() {
                var valorCampo = especialidadInput.value;
        
                // Remueve caracteres no permitidos (deja solo letras y espacios)
                var valorFiltrado = valorCampo.replace(/[^a-zA-ZáéíóúÁÉÍÓÚ\s]/g, '');
        
                // Convierte la primera letra en mayúscula y el resto en minúscula
                valorFiltrado = valorFiltrado.toLowerCase().replace(/(?:^|\s)\S/g, function(a) {
                    return a.toUpperCase();
                });
        
                especialidadInput.value = valorFiltrado;
            });
        });

        function validarNota(input) {
            // Obtén el valor ingresado
            var valor = input.value;
    
            // Elimina cualquier caracter que no sea un número o un punto
            valor = valor.replace(/[^0-9.]/g, '');
    
            // Divide el valor por el punto decimal (si lo hay)
            var partes = valor.split('.');
            if (partes.length > 2) {
                partes = [partes[0], partes.slice(1).join('')];
            }
    
            // Limita la longitud a 2 dígitos
            if (partes[0].length > 2) {
                partes[0] = partes[0].slice(0, 2);
            }
    
            // Convierte de nuevo a cadena y establece el valor del campo
            valor = partes.join('.');
            input.value = valor;
    
            // Verifica el límite de 20
            if (parseFloat(valor) > 20) {
                input.value = "20"; // Establece el valor máximo si se supera
            }
            }
        
       
        
  