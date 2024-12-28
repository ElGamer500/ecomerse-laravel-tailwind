<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi Aplicación</title>
    @vite(['resources/css/app.css', 'resources/js/app.js']) <!-- Añadir esta línea -->
    <!-- Page Scripts -->
    @section('page-script')
        @vite(['resources/js/login.js']) <!-- Asegúrate de que este archivo se carga -->
    @endsection
</head>
<body class="min-h-screen flex items-center justify-center bg-gradient-to-br from-black to-gray-900">

    <div class="w-full max-w-md p-8 space-y-8 bg-white rounded-lg shadow-2xl">
        <div class="text-center">
            <img src="{{ asset('img/logo.png') }}" alt="LOGO" class="w-32 mx-auto"> <!-- Logo -->
            <h2 class="mt-6 text-3xl font-extrabold text-gray-900">Inicia Sesión</h2>
        </div>
        <form id="FormLogin" class="mt-8 space-y-6" method="POST">
            @csrf
            <div class="rounded-md shadow-sm">
                <div>
                    <label for="email-address" class="sr-only">Correo Electrónico</label>
                    <input id="email-address" name="email" type="email" autocomplete="email" required
                        class="appearance-none rounded-t-md relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-red-500 focus:border-red-500 sm:text-sm"
                        placeholder="Correo Electrónico">
                </div>

                <div class="relative mt-4">
                    <label for="password" class="sr-only">Contraseña</label>
                    <input id="password" name="password" type="password" required
                        class="appearance-none rounded-b-md relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-red-500 focus:border-red-500 sm:text-sm"
                        placeholder="Contraseña">
                    <button type="button" id="togglePassword" class="absolute inset-y-0 right-0 pr-3 flex items-center">
                        <i class="ri-eye-fill" id="eyeIcon"></i> <!-- Icono de ojo -->
                    </button>
                </div>
            </div>

            <div class="flex items-center justify-between">
                <div class="flex items-center">
                    <input id="remember-me" name="remember" type="checkbox" class="h-4 w-4 text-red-600 focus:ring-red-500 border-gray-300 rounded">
                    <label for="remember-me" class="ml-2 block text-sm text-gray-900">Recuérdame</label>
                </div>

                <div class="text-sm">
                    <a href="" class="font-medium text-red-600 hover:text-red-500">¿Olvidaste tu contraseña?</a>
                </div>
            </div>

            <div>
                <button type="submit" class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                    Iniciar Sesión
                </button>
            </div>
            <div>
                <p class="mt-4 text-sm text-center text-gray-600">
                    ¿No tienes una cuenta?
                    <a href="{{ route('register') }}" class="font-medium text-red-600 hover:text-red-500">Regístrate</a>
                </p>
            </div>
        </form>
    </div>
</body>

</html>
