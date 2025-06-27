<?php

use App\Http\Controllers\ResourceController;
use App\Http\Controllers\RH\resourceviewcontroller;
use App\Http\Controllers\RH\CollaborateurController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('login');
});

Route::get('/RH/seeAllresources', [ResourceController::class,'index']);
Route::resource('ResourceController', ResourceController::class);

Route::get('/RH/collaborateurs', [CollaborateurController::class, 'dashboard'])
    ->name('collaborateurs.index');

// Afficher le formulaire d'ajout
Route::get('/RH/collaborateurs/create', [CollaborateurController::class, 'create'])->name('collaborateurs.create');

Route::get('/RH/collaborateurs/{id}', [CollaborateurController::class, 'show'])->name('collaborateurs.show');

Route::resource('resourceview', resourceviewcontroller::class);
// Edit (formulaire)
Route::get('/RH/collaborateurs/{id}/edit', [CollaborateurController::class, 'edit'])->name('collaborateurs.edit');

// Update (soumission du formulaire)
Route::put('/RH/collaborateurs/{id}', [CollaborateurController::class, 'update'])->name('collaborateurs.update');

// Delete (suppression)
Route::delete('/RH/collaborateurs/{id}', [CollaborateurController::class, 'destroy'])->name('collaborateurs.destroy');


// Traiter la soumission du formulaire (ajout)
Route::post('/RH/collaborateurs', [CollaborateurController::class, 'store'])->name('collaborateurs.store');
