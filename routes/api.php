<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TechnologieController;
use App\Http\Controllers\ContactController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

//endpoints pour la table projets
Route::get('/projects', [ProjectController::class, 'listeprojets']);
Route::post('/projects', [ProjectController::class, 'ajouterprojet']);

//endpoints pour la table technologie
Route::get('/technology', [TechnologieController::class, 'listetechnologies']);
Route::post('/technology', [TechnologieController::class, 'ajoutertechnologies']);

//endpoints pour la table contact
Route::post('/contacts', [ContactController::class, 'envoyerMessage']);
Route::get('/contacts', [ContactController::class, 'listeMessages']);