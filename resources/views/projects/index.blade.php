@extends ('layouts.app')

@section('content')
<div class="container py-5">
      <div class="d-flex align-items-center">
        <h1 class="me-auto">Tutti i post</h1>
          <div>
            <a class="btn btn-sm btn-primary" href="{{ route('projects.create') }}">Nuovo post</a>
          </div>
      </div>
    </div>
    <div class="container">
      <table class="table table-striped table-inverse table-responsive">
        <thead class="table-primary table-striped">
          <tr>
            <th>Titolo</th>
            <th>Slug</th>
            <th>Descrizione</th>
            <th>Immagine</th>
            <th>Data creazione</th>
            <th>Data modifica</th>
            <th></th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          @foreach($projects as $project)
          <tr class="table-light table-striped">
            <td>
              <a href="{{ route('projects.show', $project) }}">{{ $project->title }}</a></td>
            <td>{{ $project->slug }}</td>
            <td>{{ $project->description }}</td>
            <td>
              <img src="{{ $project->project_image }}" width="100px" alt="">
            </td>
            <td>{{ $project->created_at }}</td>
            <td>{{ $project->updated_at }}</td>
            <td>
              <a class="btn btn-sm btn-success"href="{{ route('projects.edit', $project) }}">Modifica</a>
            </td>
            <td>
            <form action="{{ route('projects.destroy',$project) }}" method="POST">
                  @csrf
                  @method('DELETE')
                  <input type="submit" class="btn btn-danger btn-sm" value="Elimina">
                </form>
            </td>
          </tr>  
          @endforeach  
        </tbody>
      </table>
    </div>
@endsection