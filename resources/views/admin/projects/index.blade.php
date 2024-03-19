@extends('layouts.app')

@section('title', 'Progetti')
    
@section('content')

    <header>
        <h1>Progetti</h1>
    </header>

    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Titolo</th>
                <th scope="col">Slug</th>
                <th scope="col">Creato il</th>
                <th scope="col">Ultima modifica</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
        @forelse($projects as $project)
            <tr>
                <th scope="row">{{$project->id}}</th>
                <td>{{$project->title}}</td>
                <td>{{$project->slug}}</td>
                <td>{{$project->created_at}}</td>
                <td>{{$project->updated_at}}</td>
                <td>
                    <div class="d-flex justify-content-end">
                        <a href="{{route('admin.projects.show', $project)}}" class="btn btn-sm btn-primary">
                            <i class="fa-solid fa-eye"></i>
                        </a>
                    </div>
                </td>
            </tr>
        @empty 
            <tr>
                <td colspan="6">
                    <h3 class="text-center">Non ci sono progetti</h3>
                </td>
            </tr>
        @endforelse
        </tbody>
    </table>

@endsection