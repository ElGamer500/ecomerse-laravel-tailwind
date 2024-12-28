import Swal from 'sweetalert2';

$(document).ready(function () {
    console.log('login.js se ha cargado.'); // Verifica que el script se está ejecutando

    $('#FormLogin').on('submit', function (e) {
        e.preventDefault(); // Esto debe evitar la recarga de la página
        var formData = $(this).serialize(); // Serializa los datos del formulario
        console.log('Datos enviados:', formData); // Verifica qué datos se están enviando
        $.ajax({
            url: '/inicioSesion', // Verifica que esta URL sea correcta
            type: 'POST',
            data: formData,
            success: function (response) {
                console.log('Éxito:', response); // Para verificar la respuesta
                $('#FormLogin')[0].reset();
                Swal.fire({
                    icon: 'success',
                    title: '¡Éxito!',
                    text: response.success,
                    customClass: {
                        confirmButton: 'btn btn-success'
                    }
                })
            },
            error: function (xhr) {
                console.log('Error:', xhr); // Para verificar el error
                let errorMessage = xhr.responseJSON.error || 'Las credenciales proporcionadas son incorrectas.';
                Swal.fire({
                    icon: 'error',
                    title: '¡Error!',
                    text: errorMessage, // Muestra el mensaje de error del servidor
                    customClass: {
                        confirmButton: 'btn btn-danger'
                    }
                });
            }
        });
    });
});



$(document).ready(function () {
    $('#FormRegistro').on('submit', function (e) {
        e.preventDefault(); // Esto debe evitar la recarga de la página
        var formData = $(this).serialize(); // Serializa los datos del formulario
        console.log('Datos enviados:', formData); // Verifica qué datos se están enviando
        $.ajax({
            url: '/registro-Usuario', // Verifica que esta URL sea correcta
            type: 'POST',
            data: formData,
            success: function (response) {
                console.log('Éxito:', response); // Para verificar la respuesta
                $('#FormRegistro')[0].reset();
                window.location.href = '/inicio'; // Redirigir a la página de inicio
            },
            error: function (xhr) {
                console.log('Error:', xhr); // Para verificar el error
                let errorMessage = xhr.responseJSON.error || 'Las credenciales proporcionadas son incorrectas.';
                Swal.fire({
                    icon: 'error',
                    title: '¡Error!',
                    text: errorMessage, // Muestra el mensaje de error del servidor
                    customClass: {
                        confirmButton: 'btn btn-danger'
                    }
                });
            }
        });
    });
});
