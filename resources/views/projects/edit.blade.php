@extends ('layouts.app')

@section ('content')
    <div class="container">
        <form action="{{ route('projects.update', $project) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="title" class="form-label">Titolo</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title',$project->title) }}">
                @error('title')
                    {{-- <div class="alert alert-danger">{{ $message }}</div> --}}
                    <div class="invalid-feedback">
                    {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="slug" class="form-label">Slug</label>
                <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug" value="{{ old('slug',$project->slug) }}">
                @error('slug')
                    {{-- <div class="alert alert-danger">{{ $message }}</div> --}}
                    <div class="invalid-feedback">
                    {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Descrizione</label>
                <input type="text" class="form-control @error('description') is-invalid @enderror" id="description" name="description"value="{{ old('description',$project->description) }}">
                @error('description')
                    {{-- <div class="alert alert-danger">{{ $message }}</div> --}}
                    <div class="invalid-feedback">
                    {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="project_image" class="form-label">Immagine</label>
                <input type="text" class="form-control @error('project_image') is-invalid @enderror" id="project_image" name="project_image" value="{{ old('project_image',$project->project_image) }}">
                @error('project_image')
                    {{-- <div class="alert alert-danger">{{ $message }}</div> --}}
                    <div class="invalid-feedback">
                    {{ $message }}
                    </div>
                @enderror
            </div>


            <div class="mb-3">
              <label for="tags" class="form-label">Tecnologie utilizzate</label>
              <div class="d-flex @error('technologies') is-invalid @enderror flex-wrap gap-3">
                  @foreach($technologies as $key => $technology)
                  <div class="form-check">
                    <input name="technologies[]" @checked( in_array($technology->id, old('technologies',$project->getTechnologiesIds()) ) ) class="form-check-input" type="checkbox" value="{{ $technology->id }}" id="flexCheckDefault">
                    <label class="form-check-label" for="flexCheckDefault">
                      {{ $technology->name }}
                    </label>
                  </div>
                @endforeach
              </div>
              @error('projects')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
              @enderror
            </div>



            <button type="submit" class="btn btn-primary">Salva</button>
        </form>
    </div>
@endsection