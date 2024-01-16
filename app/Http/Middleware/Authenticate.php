<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectTo(Request $request): ?string
    {
        // Mensaje a mostrar si se intenta acceder a las rutas sin autenticarse.
        $message = '¡Debe autenticarse para poder acceder a la aplicación!';

        // Almacena el mensaje en la sesión flash.
        Session::flash('message', $message);
        
        // Se redirecciona a la página de login si no se está autenticado.
        return $request->expectsJson() ? null : route('users.authentication');
    }
}
