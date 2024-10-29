@extends('layout.base')

@section('title', 'Formulario de login SmartEcoSchool')

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/css/forms.css') }}" />
@endsection

@section('content')

    <main>
        <img id="SmartEcoSchool" class="smart-eco-school" src="{{ asset('assets/images/logos/SmartEcoSchool.png') }}" alt="Proyecto SmartEcoSchool" />
        <form action="{{ route('users.login') }}" method="post" id="forms-style">
            @csrf
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
            <input type="submit" value="Loguearse"/>
        </form>

        <!-- Agrega un enlace para ir a la página de registro -->
        <p>¿No tienes una cuenta? 
            <br />
            <br />
            <a href="{{ route('users.create') }}">
                👉 Regístrate aquí
            </a>
        </p>
    </main>

    <!-- Si alguien intento acceder a la app sin autenticarse, se le comunica que está prohibido -->
    @if(isset($message))
        <script>
            alert("{{ $message }}");
        </script>
    @endif
    @if ($errors->any())
        <script>
            alert("{{ $errors->first() }}");
        </script>
    @endif

@endsection
