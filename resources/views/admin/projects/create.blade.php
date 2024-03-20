@extends('layouts.app')

@section('title', 'Crea Progetto')
    
@section('content')

    <header>
        <h1>Nuovo progetto</h1>
    </header>

    <hr>

    @include('includes.projects.form')

@endsection
