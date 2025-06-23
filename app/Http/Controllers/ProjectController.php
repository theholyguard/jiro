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

    /**
     * Méthodes restantes pas encore utilisées
     */
    public function create() {}
    public function store(Request $request) {}
    public function edit(Project $project) {}
    public function update(Request $request, Project $project) {}
    public function destroy(Project $project) {}
}
