<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Technologie;

class TechnologieController extends Controller
{
    // Méthode pour afficher toutes les technologies
    public function listetechnologies()
    {
        return response()->json(Technologie::all());
    }

    // Méthode pour ajouter une nouvelle technologie
    public function ajoutertechnologies(Request $request)
    {
        $validated = $request->validate([
            'tech_name' => 'required|string|max:255'
        ]);

        $technologie = Technologie::create($validated);

        return response()->json([
            'message' => 'Technologie ajoutée avec succès',
            'data' => $technologie
        ], 201);
    }

    // Méthode pour afficher une technologie spécifique
    public function show($id)
    {
        $technologie = Technologie::find($id);

        if (!$technologie) {
            return response()->json(['message' => 'Technologie non trouvée'], 404);
        }

        return response()->json($technologie);
    }

    // Méthode pour modifier une technologie
    public function update(Request $request, $id)
    {
        $technologie = Technologie::find($id);

        if (!$technologie) {
            return response()->json(['message' => 'Technologie non trouvée'], 404);
        }

        $validated = $request->validate([
            'tech_name' => 'required|string|max:255'
        ]);

        $technologie->update($validated);

        return response()->json([
            'message' => 'Technologie mise à jour avec succès',
            'data' => $technologie
        ]);
    }

    // Méthode pour supprimer une technologie
    public function destroy($id)
    {
        $technologie = Technologie::find($id);

        if (!$technologie) {
            return response()->json(['message' => 'Technologie non trouvée'], 404);
        }

        $technologie->delete();

        return response()->json(['message' => 'Technologie supprimée avec succès']);
    }
}
