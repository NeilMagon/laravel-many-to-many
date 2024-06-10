@extends('layouts.admin')

@section('content')
    <h1>Progetti</h1>
    <table class="table">
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Name</th>
            <th scope="col">CLient Name</th>
            <th scope="col">Creazione</th>
            <th scope="col">Ultima modifica</th>
            <th scope="col">Azioni</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($projects as $project)
            <tr>
                <td>{{$project->id}}</td>
                <td>{{$project->name}}</td>
                <td>{{$project->client_name}}</td>
                <td>{{$project->created_at}}</td>
                <td>{{$project->updated_at}}</td>
                <td>
                    <a href="{{  route('admin.projects.show', ['project' => $project->id])}}"><i class="fa-regular fa-eye"></i></a>
                </td>
                <td>
                  <a href="{{  route('admin.projects.edit', ['project' => $project->id])}}"><i class="fa-solid fa-pen"></i></a>
                </td>
                <td>
                  <form action="{{ route('admin.projects.destroy', ['project' => $project->id]) }}" method="POST">
                    @csrf
                    @method('DELETE')

                    <button type="submit" class="btn btn-danger"><i class="fa-solid fa-trash"></i></button>
                </form>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
@endsection 