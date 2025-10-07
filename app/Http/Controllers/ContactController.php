<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMessage;

class ContactController extends Controller
{
    // Méthode pour envoyer un message
    public function envoyerMessage(Request $request)
    {
        // Validation des données
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string',
        ]);

        //Enregistrer dans la base de données
        $contact = Contact::create($validated);

        //Envoyer l'email
        Mail::to('yoantioma4@gmail.com')->send(new ContactMessage($contact));

        return response()->json([
            'message' => 'Votre message a été envoyé avec succès !',
            'data' => $contact
        ], 201);
    }

    // Méthode pour lister tous les messages (optionnel)
    public function listeMessages()
    {
        return response()->json(Contact::all());
    }
}

