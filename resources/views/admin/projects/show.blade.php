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

        <div class="d-flex justify-content-between gap-2">
            <a href="{{ route('admin.projects.edit', $project)}}" class="btn btn-warning">
                <i class="fa-solid fa-pencil me-2"></i> Modifica
            </a>
            <form action="{{route('admin.projects.destroy', $project->id)}}" method="POST">
            @csrf 
            @method('DELETE')
                <button type="submit" class="btn btn-danger">
                    <i class="fa-solid fa-trash me-2"></i> Elimina
                </button>
            </form>
        </div>
    </footer>
@endsection