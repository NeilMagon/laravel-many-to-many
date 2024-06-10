@extends('layouts.admin')

@section('content')
    <h1>{{ $project->name }}</h1>
    <div class="my-1">
        <strong>ID:</strong> {{ $project->id }}
    </div>
    <div class="my-1">
        <strong>Slug:</strong> {{ $project->slug }}
    </div>
    <div>
        <strong>Tipo</strong>: {{ $project->type ? $project->type->name : 'No type' }}
    </div>
    <div>
        <strong>Technologies</strong>:
        @if (count($project->technologies) > 0)
             @foreach ($project->technologies as $technology)
                 {{ $technology->name }}
             @endforeach
        @else
            No technology assigned yet
        @endif
    </div>

    <div class="my-1">
        <strong>Nome cliente:</strong> {{ $project->client_name }}
    </div>
    <div class="my-1">
        <strong>Crato il:</strong> {{ $project->created_at }}
    </div>
    <div class="my-1">
        <strong>Ultima modifica:</strong> {{ $project->updated_at }}
    </div>
    @if ($project->cover_image)
        <div class="my-1">
            <img src="{{ asset('storage/' . $project->cover_image) }}" alt="{{ $project->title }}">
        </div>
    @endif
    <div class="my-1">
        <strong>Descrizione:</strong> {{ $project->summary }}
    </div>
@endsection
