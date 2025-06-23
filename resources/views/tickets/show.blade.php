@extends('layouts.app')

@section('content')
    <h1 class="text-2xl font-bold mb-2">{{ $ticket->title }}</h1>
    <p class="mb-4">{{ $ticket->description }}</p>
    <p>Status : <strong>{{ $ticket->status }}</strong></p>

    <h2 class="text-xl font-semibold mt-6">Commentaires :</h2>
    <ul>
        @foreach ($ticket->comments as $comment)
            <li class="mb-2 border-b pb-2">
                <strong>{{ $comment->user->name }}</strong> : {{ $comment->content }}
            </li>
        @endforeach
    </ul>
@endsection
