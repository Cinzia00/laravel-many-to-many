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
    <div class="col">{{ $project->title }}</div>
    <div class="col">{{ $project->description }}</div>
    <div class="col">{{ $project->project_image }}</div>
  </div>
</div>
@endsection