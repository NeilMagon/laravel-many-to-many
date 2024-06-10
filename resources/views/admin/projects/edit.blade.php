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
            <label class="form-label" for="type_id">Type</label>
            <select class="form-select" id="type_id" name="type_id">
                <option value="">Select a type</option>
                @foreach ($types as $type)
                    <option @selected($type->id == old('type_id', $project->type_id)) value="{{ $type->id }}">{{ $type->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <h5>Technologies</h5>
            @foreach ($technologies as $technology)
                <div class="form-check">
                    @if ($errors->any())
                    <input class="form-check-input" @checked(in_array($technology->id, old('technologies', []))) name="technologies[]" type="checkbox" value="{{ $technology->id }}" id="technology-{{ $technology->id }}">
                    @else
                    <input class="form-check-input" @checked($project->technologies->contains($technology)) name="technologies[]" type="checkbox" value="{{ $technology->id }}" id="technology-{{ $technology->id }}">
                    @endif
                    <label class="form-check-label" for="technology-{{ $technology->id }}">
                        {{ $technology->name }}
                    </label>
                </div>
            @endforeach
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
