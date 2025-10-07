<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;

class ProjectController extends Controller
{
    //Méthode pour afficher tous les projets
    public function listeprojets()
    {
        return response()->json(Project::with('technologies')->get());
    }

    //Méthode pour afficher un projet en particulier
    public function show($id)
    {
        $project = Project::with('technologies')->find($id);

        if (!$project) {
            return response()->json(['message' => 'Projet non trouvé'], 404);
        }

        return response()->json($project);
    }

    //Méthode pour ajouter un nouveau projet
    public function ajouterprojet(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'technologies' => 'required|array',
            'technologies.*' => 'integer|exists:technologies,id',
            'github_link' => 'required|url',
            'image' => 'required|string',
        ]);

        // Crée le projet avec les champs de la table projects
        $project = Project::create([
            'title' => $validated['title'],
            'description' => $validated['description'] ?? null,
            'github_link' => $validated['github_link'] ?? null,
            'image' => $validated['image'] ?? null,
        ]);

        // Associe les technologies via la table pivot
        $project->technologies()->attach($validated['technologies']);

        return response()->json([
            'message' => 'Projet créé avec succès',
            'data' => $project->load('technologies'),
        ], 201);
    }

    // 🔹 Méthode pour modifier un projet existant
    public function update(Request $request, $id)
    {
        $project = Project::find($id);

        if (!$project) {
            return response()->json(['message' => 'Projet non trouvé'], 404);
        }

        $validated = $request->validate([
            'title' => 'sometimes|required|string|max:255',
            'description' => 'nullable|string',
            'technologies' => 'nullable|array',
            'technologies.*' => 'integer|exists:technologies,id',
            'github_link' => 'nullable|url',
            'image' => 'nullable|string',
        ]);

        // Mise à jour des champs du projet
        $project->update([
            'title' => $validated['title'] ?? $project->title,
            'description' => $validated['description'] ?? $project->description,
            'github_link' => $validated['github_link'] ?? $project->github_link,
            'image' => $validated['image'] ?? $project->image,
        ]);

        // Mise à jour des technologies (si fournies)
        if (isset($validated['technologies'])) {
            $project->technologies()->sync($validated['technologies']);
        }

        return response()->json([
            'message' => 'Projet mis à jour avec succès',
            'data' => $project->load('technologies'),
        ]);
    }

    // 🔹 Méthode pour supprimer un projet
    public function destroy($id)
    {
        $project = Project::find($id);

        if (!$project) {
            return response()->json(['message' => 'Projet non trouvé'], 404);
        }

        // Détache les relations avec les technologies avant suppression
        $project->technologies()->detach();

        $project->delete();

        return response()->json(['message' => 'Projet supprimé avec succès']);
    }
}
