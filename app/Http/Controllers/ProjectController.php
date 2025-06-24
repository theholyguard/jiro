<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProjectController extends Controller
{
    /**
     * Affiche tous les projets de l'utilisateur connecté
     */
    public function index()
    {
        $projects = Project::where('user_id', Auth::id())->get();

        return view('projects.index', compact('projects'));
    }

    /**
     * Affiche un projet et ses tickets
     */
    public function show(Project $project)
    {
        // Optionnel : vérifier que l'utilisateur a le droit de voir ce projet
        if ($project->user_id !== Auth::id()) {
            abort(403);
        }

        $project->load('tickets'); // Eager load des tickets

        return view('projects.show', compact('project'));
    }
    public function create()
{
    return view('projects.create');
}
public function store(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'description' => 'nullable|string',
    ]);

    $project = \App\Models\Project::create([
        'name' => $request->name,
        'description' => $request->description,
        'user_id' => auth()->id(),
    ]);

    return redirect()->route('projects.index')->with('success', 'Projet créé avec succès.');
}

    public function edit(Project $project) {}
    public function update(Request $request, Project $project) {}
    public function destroy(Project $project) {}
}
