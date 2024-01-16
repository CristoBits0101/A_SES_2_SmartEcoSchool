@extends('layout.base')

@section('title', 'Bienvenido a SmartEcoSchool')

@section('css')
    {{-- <link rel="stylesheet" href="{{ asset('assets/css/forms.css') }}" /> --}}
@endsection

@section('content')

    <h1>H O M E</h1>

    <div>
        {!! $chart->render() !!}
    </div>    

    @if(session('success'))
        <script>
            alert("{{ session('success') }}");
        </script>
    @endif

@endsection
