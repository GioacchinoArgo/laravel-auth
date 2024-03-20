@if($project->exists)
    <form action="{{ route('admin.projects.update', $project)}}" method="POST" novalidate>
        @method('PUT')

@else
    <form action="{{ route('admin.projects.store')}}" method="POST" novalidate> 

@endif

    @csrf
    <div class="row">
        <div class="col-6">
            <div class="mb-3">
                <label for="title" class="form-label">Titolo</label>
                <input type="text" name="title" class="form-control @error('title') is-invalid @elseif(old('title', '')) is-valid @enderror" id="title" placeholder="Titolo..." value="{{old('title', $project->title)}}" required>
                @error('title')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @else
                    <div class="form-text">
                        Inserisci il titolo del post
                    </div>
                @enderror
            </div>
        </div>
        <div class="col-6">
            <div class="mb-3">
                <label for="slug" class="form-label">Slug</label>
                <input type="text" class="form-control" id="slug" value="{{ Str::slug(old('title', $project->title)) }}" disabled>
            </div>
        </div>
        <div class="col-12">
            <div class="mb-3">
                <label for="content" class="form-label">Descrizione</label>
                <textarea name="content" class="form-control @error('content') is-invalid @elseif(old('content', '')) is-valid @enderror" id="content" rows="20" required>
                    {{ old('content', $project->content)}}
                </textarea>
                @error('content')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @else
                    <div class="form-text">
                        Inserisci la descrizione del progetto
                    </div>
                @enderror
            </div>
        </div>
        <div class="col-12"></div>
    </div>
    <hr>
    <div class="d-flex align-items-center justify-content-between">
        <a href="{{route('admin.projects.index')}}" class="btn btn-primary">Torna indientro</a>

        <div class="d-flex align-items-center gap-2">
            <button type="reset" class="btn btn-secondary">Svuota i campi</button>
            <button type="submit" class="btn btn-success">Salva</button>

        </div>
    </div>
</form>