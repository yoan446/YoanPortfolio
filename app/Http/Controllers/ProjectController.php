<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;

class ProjectController extends Controller
{
    // Méthode pour afficher tous les projets
    public function listeprojets()
    {
        return response()->json(Project::with('technologies')->get());
    }

    // Méthode pour ajouter un nouveau projet
    public function ajouterprojet(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'technologies' => 'required|array',
            'technologies.*' => 'integer|exists:technologies,id',
            'github_link' => 'nullable|url',
            'image' => 'nullable|string',
        ]);

        //Crée le projet avec uniquement les champs de la table projects
        $project = Project::create([
            'title' => $validated['title'],
            'description' => $validated['description'] ?? null,
            'github_link' => $validated['github_link'] ?? null,
            'image' => $validated['image'] ?? null,
        ]);

        //Associe les technologies via la table pivot
        $project->technologies()->attach($validated['technologies']);

        //Retourne le projet avec les technologies liées
        return response()->json([
            'message' => 'Projet créé avec succès',
            'data' => $project->load('technologies'),
        ], 201);
    }
}
