@extends ('layouts.app')

@section ('content')
<div class="container text-center">
  <h1 class="py-4">{{ $project->title }}</h1>
  @if($project->type)
        <h2 class="badge rounded-pill bg-warning">{{ $project->type->name }}</h2>
    @else
        <h3 class="badge rounded-pill bg-secondary">Nessuna categoria</h3>
    @endif
  <div class="row row-cols-3 py-4">
    <div class="col">
      <h3 class="py-3">Titolo:</h3>
      {{ $project->title }}
    </div>
      <div class="col">
      <h3 class="py-3">Descrizione:</h3>
      {{ $project->description }}
    </div>
  </div>
  @if($project->project_image) 
    <h3 class="py-4">Immagine:</h3>
    <div>
      <img src="{{ $project->project_image }}" width="300px" alt="">  
    </div>
  @endif
  <div class="mb-3">
    <label for="project-id" class="form-label"></label>
      {{-- <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title') }}" id="title" aria-describedby="titleHelp"> --}}
      {{-- errore title --}}
      @error('category_id')
      <div class="invalid-feedback">
        {{ $message }}
      </div>
      @enderror
      </div>
      <p>Tecnologie utilizzate:</p>
      @foreach($project->technologies as $technology)
        <div>{{$technology->name}}</div>
      @endforeach
</div>
@endsection