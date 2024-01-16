<?php

// Dependencias de Laravel.
use Illuminate\Support\Facades\Route;

// Importa el controlador de usuarios para que las rutas puedan ejecutar las funciones CRUD, login y logout.
use App\Http\Controllers\AuthController;

// Importa el controlador de gráficas para que las rutas puedan ejecutar las funciones de serialización de datos.
use App\Http\Controllers\SensorMeasurementController;

// Session view.
Route::get('/'      , [AuthController::class, 'authentication'])->name('users.authentication');

// Session logic.
Route::post('/login', [AuthController::class, 'login'         ])->name('users.login'         );

// Grupo de rutas que requieren autenticación.
Route::group(['middleware' => 'auth'], function () 
{
    // User views.
    Route::get(   '/users/register' , [AuthController::class,              'create' ])->name('users.create' );
    Route::get(   '/users/{id}/edit', [AuthController::class,              'edit'   ])->name('users.edit'   );
    Route::get(   '/users',           [AuthController::class,              'show'   ])->name('users.show'   );

    // User logic.
    Route::post(  '/users'          , [AuthController::class,              'store'  ])->name('users.store'  );
    Route::put(   '/users/{id}'     , [AuthController::class,              'update' ])->name('users.update' );
    Route::delete('/users/{id}'     , [AuthController::class,              'destroy'])->name('users.destroy');

    // Session logic.
    Route::post(  '/users/logout'   , [AuthController::class,              'logout' ])->name('users.logout' );

    // Graph views.
    Route::get(   '/graphics/home'  , [SensorMeasurementController::class, 'home'   ])->name('graphics.home');
});
