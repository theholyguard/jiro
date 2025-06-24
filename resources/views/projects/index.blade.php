@extends('layouts.app')

@section('content')

@if (session('success'))
    <div class="bg-green-100 text-green-800 p-2 mb-4 rounded">
        {{ session('success') }}
    </div>
@endif

    <a href="{{ route('projects.create') }}" class="inline-block mb-4 bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">
    ➕ Nouveau projet
</a>

    <h1>Liste des projets</h1>

    <p>Utilisateur connecté : {{ Auth::user()->email }}</p>

    @if ($projects->isEmpty())
        <p>Aucun projet trouvé.</p>
    @else
        <ul>
            @foreach ($projects as $project)
                <li>{{ $project->name }}</li>
            @endforeach
        </ul>
    @endif
@endsection
