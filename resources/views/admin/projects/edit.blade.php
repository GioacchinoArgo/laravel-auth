@extends('layouts.app')

@section('title', 'Modifica Progetto')
    
@section('content')

    <header>
        <h1>Modifica progetto</h1>
    </header>

    <hr>

    @include('includes.projects.form')
    @vite('resources/js/slug_preview.js')
@endsection