@extends ('layouts.app')

@section ('content')
<div class="container">
    <h2 class="py-5">Crea nuovo progetto</h2>
    <form action="{{route('projects.store') }}"  method="POST">
    @csrf
        <table class="table table-inverse table-responsive">
            <thead class="table-primary table-striped">
              <tr>
                <th>Titolo</th>
                <th>Slug</th>
                <th>Descrizione</th>
                <th>Immagine</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title') }}">
                        @error('title')
                        {{-- <div class="alert alert-danger">{{ $message }}</div> --}}
                        <div class="invalid-feedback">
                        {{ $message }}
                        </div>
                         @enderror
                    </td>
                    <td>
                        <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug" value="{{ old('slug') }}">
                        @error('slug')
                        {{-- <div class="alert alert-danger">{{ $message }}</div> --}}
                        <div class="invalid-feedback">
                        {{ $message }}
                        </div>
                         @enderror
                    </td>
                    <td>
                        <input type="text" class="form-control" id="description" name="description" value="{{ old('description') }}">
                    </td>
                    <td>
                        <input type="text" class="form-control" id="project_image" name="project_image" value="{{ old('project_image') }}">
                    </td>
                </tr>  
            </tbody>
        </table>
        <div class="mb-3">
            <label for="project-id" class="form-label">Categoria</label>
            <select class="form-select @error('project_id') is-invalid @enderror" id="project-id" name="project_id" aria-label="Default select example">
                <option value="" selected>Seleziona categoria</option>
                @foreach($types as $type)
                <option @selected( old('project_id') == $type->id ) value="{{ $type->id }}">{{ $type->name }}</option>
                @endforeach
            </select>
            {{-- <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title') }}" id="title" aria-describedby="titleHelp"> --}}
            {{-- errore title --}}
            @error('category_id')
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
                    <input name="technologies[]" class="form-check-input" type="checkbox" value="{{ $technology->id }}" id="flexCheckDefault">
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