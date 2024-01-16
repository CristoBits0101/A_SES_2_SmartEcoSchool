<?php

// Dependencias de Laravel.
use Illuminate\Support\Facades\Route;

// Importa el controlador de usuarios para que las rutas puedan ejecutar las funciones CRUD, login y logout.
use App\Http\Controllers\AuthController;

// Importa el controlador de gráficas para que las rutas puedan ejecutar las funciones de serialización de datos.
use App\Http\Controllers\SensorMeasurementController;

// Session views.
Route::get('/'              , [AuthController::class, 'authentication'])->name('users.authentication');
Route::get('/users/register', [AuthController::class, 'create'        ])->name('users.create'        );

// Session logic.
Route::post('/login'        , [AuthController::class, 'login'         ])->name('users.login'         );
Route::post('/users'        , [AuthController::class, 'store'         ])->name('users.store'         );

// Grupo de rutas que requieren autenticación.
Route::group(['middleware' => 'auth'], function () 
{
    // User views.
    Route::get(   '/users/{id}/edit', [AuthController::class,              'edit'   ])->name('users.edit'   );
    Route::get(   '/users'          , [AuthController::class,              'show'   ])->name('users.show'   );

    // User logic.
    Route::put(   '/users/{id}'     , [AuthController::class,              'update' ])->name('users.update' );
    Route::delete('/users/{id}'     , [AuthController::class,              'destroy'])->name('users.destroy');

    // Session logic.
    Route::post(  '/users/logout'   , [AuthController::class,              'logout' ])->name('users.logout' );

    // Graph views.
    Route::get('/graphics/table'    , [SensorMeasurementController::class, 'table'  ])->name('graphics.table');
    Route::get('/graphics/bar'      , [SensorMeasurementController::class,  'bar'   ])->name('graphics.bar');

});
