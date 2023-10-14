$("#dni").change(function() {
    dni = $('#dni').val();
    $.ajax({
        url: "../Controlador/consultarApi.php",
        type: "post",
        data: `dni=${dni}`,
        dataType: "json",
        success: function(r) {
            if (r.numeroDocumento == dni) {
                // Manejar la respuesta de la api
                $("#apellidos").val(r.apellidoPaterno + " " + r.apellidoMaterno);
                $("#nombre").val(r.nombres);
            } else {
                console.error(r.error);
            }
        },
        error: function() {
            console.error("Hubo un error al realizar la llamada AJAX");
        }
    });
});

//filtro por especialidad
$(document).ready(function() {
    // Captura el evento de cambio en el select
    $('#esp').change(function() {
        var formData = $(this).serialize();

        // Realiza la solicitud AJAX
        $.ajax({
            type: 'POST',
            url: './CRUD/procesarFiltro.php',
            data: formData,
            success: function(data) {
                $('#tablaResultados').html(data); // Mostrar resultados en el contenedor
            }
        });
    });
});

//filtro por sexo
$(document).ready(function(){
    $('#sex').change(function(){
        var formData = $(this).serialize();
        $.ajax({
            type: 'POST',
            url: './CRUD/procesarFiltroSex.php',
            data: formData,
            success: function(data){
                $('#tablaResults').html(data);
            }
        });
    });
});

//filtro por notas
$(document).ready(function(){
    $('#nota').change(function(){
        var formData = $(this).serialize();
        $.ajax({
            type: 'POST',
            url: './CRUD/procesarFiltroNotas.php',
            data: formData,
            success: function(data){
                console.log(data);
                $('#tablaResultados').html(data);
            }
        });
    });
});

let editarModal = document.getElementById('editarModal');
let eliminarModal = document.getElementById('eliminarModal');

editarModal.addEventListener('hide.bs.modal', event =>{
    editarModal.querySelector('.modal-body #nombre').value = ""
    editarModal.querySelector('.modal-body #apellidos').value = ""
    editarModal.querySelector('.modal-body #tel').value = ""
    editarModal.querySelector('.modal-body #email').value = ""
})

editarModal.addEventListener('shown.bs.modal', event => {
    let button = event.relatedTarget
    let id = button.getAttribute('data-bs-id')

    let inputId = editarModal.querySelector('.modal-body #id')
    let inputNombre = editarModal.querySelector('.modal-body #nombre')
    let inputApellidos = editarModal.querySelector('.modal-body #apellidos')
    let inputTel = editarModal.querySelector('.modal-body #tel')
    let email = editarModal.querySelector('.modal-body #email')
                
    let url = "CRUD/getEstudiantes.php"
    let formData = new FormData()
    formData.append('id', id)

    fetch(url, {
        method:"POST",
        body: formData
    }).then(response => response.json()).then(data=>{
        console.log("Datos recibidos:", data);
        inputId.value = data.ALUMDNI
        inputNombre.value = data.NomAlumno
        inputApellidos.value = data.ApeAlumno
        inputTel.value = data.FechaNaci
        email.value = data.Email
        }).catch(err => console.log(err))
    });

    eliminarModal.addEventListener('shown.bs.modal', event =>{
        let button = event.relatedTarget
        let id = button.getAttribute('data-bs-id')
        eliminarModal.querySelector('.modal-footer #id').value = id
    })