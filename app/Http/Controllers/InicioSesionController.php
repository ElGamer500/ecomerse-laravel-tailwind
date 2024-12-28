<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;


class InicioSesionController extends Controller
{
    public function index(){
        return view('InicioSesion');
    }


    public function registervista(Request $request){
        return view('register');
    }

    public function create(Request $request)
    {
        // Validar los datos
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required',
        ]);

        // Crear un nuevo usuario
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();

        // Redirigir al usuario a la vista de inicio de sesión
        return view('InicioSesion');
    }

    public function dashboard(Request $request)
    {
        return view('inicio'); // Asegúrate de tener la vista 'inicio.blade.php'
    }

    public function login(Request $request)
    {
        // Validar las credenciales
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Buscar al usuario en la base de datos
        $user = User::where('email', $request->email)->first();

        // Verificar si el usuario existe y si la contraseña es correcta
        if ($user && Hash::check($request->password, $user->password)) {
            // Autenticación exitosa, devolver respuesta JSON
            return view('inicio');
        }

        // Si la autenticación falla, devolver error
        return response()->json(['error' => 'Las credenciales proporcionadas son incorrectas.'], 401);
    }


}
