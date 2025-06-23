@extends('layouts.app')

@section('content')
    <h1 class="text-2xl font-bold mb-4">{{ $project->name }}</h1>
    <p class="mb-6">{{ $project->description }}</p>

    <h2 class="text-xl font-semibold">Tickets du projet :</h2>
    <ul>
        @foreach ($project->tickets as $ticket)
            <li class="mb-1">
                <a href="{{ route('tickets.show', $ticket) }}" class="text-blue-600 underline">
                    {{ $ticket->title }} ({{ $ticket->status }})
                </a>
            </li>
        @endforeach
    </ul>
@endsection
