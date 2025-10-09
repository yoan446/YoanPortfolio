<?php

use Illuminate\Support\Facades\Route;

Route::get('/La-b@se-portfolio', function () {
    return view('client.homepage1');
});

Route::get('/navbar', function () {
    return view('partials.header');
});

Route::get('/footer', function () {
    return view('partials.footer');
});

Route::get('/entete-admin', function () {
    return view('partials.header-admin');
});

Route::get('/Admin-dashboard-home', function () {
    return view('administrateur.dashboard-accueill');
});

Route::get('/project-management', function () {
    return view('administrateur.projects-management');
});

Route::get('/technology-management', function () {
    return view('administrateur.technology-management');
});