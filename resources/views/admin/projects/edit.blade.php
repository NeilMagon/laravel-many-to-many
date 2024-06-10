@extends('layouts.admin')

@section('content')
    <h1>Modifica il progetto: {{ $project->name }}</h1>
    <form action="{{ route('admin.projects.update', $project->id) }}" method="post">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name" class="form-label">Titolo</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $project->name }}">
        </div>
        <div class="mb-3">
            <label for="client_name" class="form-label">Nome cliente</label>
            <input type="text" class="form-control" id="client_name" name="client_name" value="{{ $project->client_name }}">
        </div>
        <div class="mb-3">
            <label for="cover_image" class="form-label">Immagine</label>
            <input class="form-control" type="file" id="cover_image" name="cover_image">
            
            @if ($project->cover_image)
                <div>
                    <img src="{{ asset('storage/' . $project->cover_image) }}" alt="{{ $project->title }}">
                </div>
            @else
                <small>Nessuna immagine caricata</small>
            @endif
        </div>
        <div class="mb-3">
            <label for="summary" class="form-label">Descrizione</label>
            <textarea class="form-control" id="summary" rows="10" name="summary">{{ $project->summary }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Salva</button>
    </form>
@endsection
