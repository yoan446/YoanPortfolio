<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Technologie;

class TechnologieController extends Controller
{
    //methode pour afficher toutes les technologies
    public function listetechnologies()
    {
        return response()->json(Technologie::all());
    }

    //methode pour ajouter une nouvelle technologie
    public function ajoutertechnologies(Request $request)
    {
        $validated = $request->validate([
            'tech_name' => 'required|string|max:255'
        ]);

        $project = Technologie::create($validated);
        return response()->json($project, 201);
    }
}
