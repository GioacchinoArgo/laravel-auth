@extends('layouts.app')

@section('title', 'Progetti')
    
@section('content')

    <header>
        <h1 class="mb-3"> {{ $project->title}} </h1>
    </header>
    <hr>
    <div>
        <p>{{ $project->content}}</p>
        
        <div>
            <strong>Creato il:</strong> {{ $project->created_at }}
            <strong class="ms-4">Ultima modifica:</strong> {{ $project->updated_at }}
        </div>
        <hr>
    </div>

    <footer class="d-flex justify-content-between align-items-center">
        <a href="{{ route('admin.projects.index') }}" class="btn btn-primary"> Torna indietro</a>
    </footer>
@endsection