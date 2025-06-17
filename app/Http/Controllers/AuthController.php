<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth; //Este paquete se encarga de gestionar las sesiones facilitando la creacion de registros y login
use Illuminate\Support\Facades\Hash; //Este paquete sirve para encriptar las contraseñas

class AuthController extends Controller
{
    // Mostrar formulario de registro
    public function mostrarFormularioRegistro()
    {
        return view('auth.registro');
    }

    // Procesar registro
    public function register(Request $request)
    {
        $request->validate([
            'name'                  => 'required|string|max:255',
            'email'                 => 'required|email|unique:users,email',
            'password'              => 'required|string|confirmed|min:6',
        ]);

        User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password), //Esta linea se encarga de gaurdar la contraseña encriptada
        ]);

        Auth::attempt($request->only('email','password')); //Esta linea se encarga de coger el email y password y si son correctos inicia la sesión automaticamente despues de registrarte

        //Si el login ha sido correcto te manda a / que es el inicio y devuelve en la vista un mensaje de registro completado
        return redirect()->intended('/')->with('success','¡Registro completo!');
    }

    // Mostrar formulario de login
    public function mostrarFormularioLogin()
    {
        return view('auth.login'); // aquí sigue siendo auth.login
    }

    // Procesar login
    public function login(Request $request)
    {

        //Comprueba que se han introducido los parametros validos
        $credentials = $request->validate([
            'email'    => 'required|email',
            'password' => 'required',
        ]);

        //Credentials es un array con los datos de login y lo siguientes por si marca la casilla de recuerdame
        if (Auth::attempt($credentials, $request->filled('remember'))) {
            //Si ha entrado en el logines que todo ha ido en el orden y le devuelve a / que es el inicio y le aparece un mensaje en la vista de Has iniciado sesion
            return redirect()->intended('/')->with('success','Has iniciado sesión.');
        }
        //Si ha llegado aqui es que el login ha ido mal y devuelve un mensaje de error que dice Credenciales incorrectas y recarga la pagina sin borrar el email para que solo tengas que poner la contraseña
        return back()
            ->withErrors(['email' => 'Credenciales incorrectas.'])
            ->withInput($request->only('email'));
    }

    // Logout
    public function logout(Request $request)
    {
        //Elimina la informacion de autenticacion de la sesion
        Auth::logout();
        //Borra todos los datos de la sesion que hemos cerrado
        $request->session()->invalidate();

        //Devuelve a /login
        return redirect('/login');
    }
}
