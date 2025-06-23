@extends('layouts.app')

@section('content')
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
