@extends('layout.base')

@section('title', 'Bienvenido a SmartEcoSchool')

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/css/forms.css') }}" />
@endsection

@section('content')

    <h2>H O M E</h2>

    @if(session('success'))
        <script>
            alert("{{ session('success') }}");
        </script>
    @endif

@endsection
