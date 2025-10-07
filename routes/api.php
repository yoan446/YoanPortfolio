<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TechnologieController;
use App\Http\Controllers\ContactController;

//endpoints pour la table projets
Route::get('/listes-projects', [ProjectController::class, 'listeprojets']);
Route::get('/un-projects/{id}', [ProjectController::class, 'show']);
Route::post('/add-projects', [ProjectController::class, 'ajouterprojet']);
Route::put('/update-projects/{id}', [ProjectController::class, 'update']);
Route::delete('/delete-projects/{id}', [ProjectController::class, 'destroy']);

//endpoints pour la table technologie
Route::get('/listes-technology', [TechnologieController::class, 'listetechnologies']);
Route::post('/ajouter-technology', [TechnologieController::class, 'ajoutertechnologies']);
Route::get('/une-technologies/{id}', [TechnologieController::class, 'show']);
Route::put('/modifier-technologies/{id}', [TechnologieController::class, 'update']);
Route::delete('/supprimer-technologies/{id}', [TechnologieController::class, 'destroy']);

//endpoints pour la table contact
Route::post('/envoyer-message', [ContactController::class, 'envoyerMessage']);
Route::get('/lister-contacts', [ContactController::class, 'listeMessages']);