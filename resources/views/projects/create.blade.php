@extends('layouts.app')

@section('content')
    <h1 class="text-2xl font-bold mb-4">Créer un nouveau projet</h1>

    @if ($errors->any())
        <div class="bg-red-100 text-red-800 p-2 mb-4">
            <ul class="list-disc ml-4">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('projects.store') }}" class="space-y-4">
        @csrf

        <div>
            <label for="name" class="block font-medium">Nom du projet</label>
            <input type="text" name="name" id="name" class="w-full border p-2" required>
        </div>

        <div>
            <label for="description" class="block font-medium">Description</label>
            <textarea name="description" id="description" class="w-full border p-2" rows="4"></textarea>
        </div>

        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
            Créer le projet
        </button>
    </form>
@endsection
