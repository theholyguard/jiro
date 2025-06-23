@extends('layouts.app')

@section('content')
    <h1 class="text-2xl font-bold mb-4">Mes projets</h1>

    <ul>
        @foreach ($projects as $project)
            <li class="mb-2">
                <a href="{{ route('projects.show', $project) }}" class="text-blue-600 underline">
                    {{ $project->name }}
                </a>
            </li>
        @endforeach
    </ul>
@endsection
