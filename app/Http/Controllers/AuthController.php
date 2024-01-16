<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Models\User;

class AuthController extends Controller
{
    /**
     * User Creation View
     */
    public function create()
    {
        // Retorna un formulario que permite crear a un usuario administrador.
        return view('pages.forms.register');
    }

    /**
     * User Creation Logic
     */
    public function store(Request $request)
    {
        // Almacena un nuevo usuario administrador con los datos de la petición.
        User::create([
            'name'     => $request->input('name'),
            'email'    => $request->input('email'),
            'password' => Hash::make($request->input('password')),
        ]);

        // Después de registrar a un usuario, se redirecciona a la página de login y le comunica que fue registrado correctamente.
        return redirect()->route('graphics.home')->with('success', '¡Usuario creado exitosamente!');
    }

    /**
     * USER UPDATE VIEW
     */
    public function edit(string $id)
    {
        // Busca a un usuario mediante el id de la petición.
        $user = User::find($id);

        // Retorna un formulario de edición con la información del usuario identificado por el id de la petición.
        return view('pages.forms.edit', compact('user'));
    }

    /**
     * USER UPDATE LOGIC
     */
    public function update(Request $request, string $id)
    {
        // Busca a un usuario mediante el id de la petición.
        $user = User::find($id);

        // Sobreescribe su información con los datos de la petición.
        $user->update($request->all());

        // Después de actualizar los datos te los muestra y te deja editarlos y bórralos otra vez.
        return view('pages.forms.edit', compact('user'));
    }

    /**
     * USER READING VIEW
     */
    public function show()
    {
        // Busca a todos los usuarios registrados en la aplicación.
        $users = User::all();

        // Retorna una vista que muestra a todos los usuarios administradores.
        return view('pages.forms.users', compact('users'));
    }

    /**
     * USER DELETE LOGIC
     */
    public function destroy(string $id)
    {
        // Obtener el usuario a eliminar.
        $userToDelete = User::find($id);

        // Obtener el usuario actual.
        $currentUser = auth()->user();

        // Para poder eliminar administradores tienes que ser root y para poder eliminar usuarios tienes que ser root o admin.
        if ($currentUser->role !== 'admin' && $currentUser->role !== 'root')
            return back()->withErrors(['error' => 'No tienes permisos para eliminar usuarios.']);

        // El administrador root es la máxima autoridad de la aplicación y no puede ser eliminado.
        if ($currentUser->role === 'root')
            return back()->withErrors(['error' => 'No puedes eliminar al usuario root.']);

        // Tienes que ser el root de la aplicación para eliminar a un administrador.
        if ($userToDelete->role === 'admin' && $currentUser->role !== 'root')
            return back()->withErrors(['error' => 'No tienes permisos para eliminar a un administrador.']);

        // Elimina al usuario.
        $userToDelete->delete();

        return redirect()->route('users.show')->with('success', 'Usuario eliminado exitosamente.');
    }

    /**
     * User Authentication View
     */
    public function authentication()
    {
        // Obtener el mensaje de la variable mensaje de la sesión flash.
        $message = Session::get('message');

        // Retorna un formulario que permite crear a un usuario administrador.
        return view('pages.forms.login', compact('message'));
    }

    /**
     * User Authentication Logic
     */
    public function login(Request $request)
    {
        // Obtiene el email y la contraseña de la petición.
        $credentials = $request->only('email', 'password');

        // Se intenta autentificar al usuario.
        // Redirect intentará enviar al usuario a la página que intento entrar antes de ser redirigido a login.
        // Si no puede ir a la página que intento entrar antes de ir a login lo reenviará a home.
        if (Auth::attempt($credentials))
            return redirect()->intended('pages.graphics.home');

        // Te devuelve al formulario de login si no te puedes autentificar.
        return back()->withErrors(['error' => '¡Las credenciales proporcionadas no son válidas!']);
    }

    /**
     * USER LOGOUT LOGIC
     */
    public function logout()
    {
        // Cierra la sesión del usuario.
        Auth::logout();

        // Te redirige a la página de inicio de sesión porque si no estás autenticado, no puedes acceder a las vistas.
        return redirect('pages.forms.login');
    }
}
