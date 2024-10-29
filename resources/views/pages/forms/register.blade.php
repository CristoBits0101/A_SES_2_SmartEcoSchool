@extends('layout.base')

@section('title', 'Formulario de registro SmartEcoSchool')

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/css/forms.css') }}" />
@endsection

@section('content')

    <main>
        <img id="SmartEcoSchool" class="smart-eco-school" src="{{ asset('assets/images/logos/SmartEcoSchool.png') }}" alt="Proyecto SmartEcoSchool" />
        <form action="{{ route('users.store') }}" method="post" id="forms-style">
            @csrf
            <div>
                <label for="name">Nombre:</label>
                <input
                    type="text"
                    id="name"
                    name="name"
                    placeholder="Ingrese su nombre"
                />
            </div>
            <div>
                <label for="email">Correo electrónico:</label>
                <input
                    type="email"
                    id="email"
                    name="email"
                    placeholder="Ingrese su correo electrónico"
                />
            </div>
            <div>
                <label for="password">Contraseña:</label>
                <input
                    type="password"
                    id="password"
                    name="password"
                    placeholder="Ingrese su contraseña"
                />
            </div>
            <input type="submit" value="Registrarse"/>
        </form>
        <!-- Agrega un enlace para ir a la página de inicio de sesión -->
        <p>
            ¿Ya tienes una cuenta?
            <br />
            <br />
            <a href="{{ route('users.authentication') }}">
                👉 Inicia sesión aquí
            </a>
        </p>
        </main>
    </main>

@endsection
