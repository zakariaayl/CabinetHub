<?php

use App\Http\Controllers\inventaireController;
use App\Http\Controllers\ResourceController;
use App\Http\Controllers\RH\resourceviewcontroller;
use App\Http\Controllers\RH\CollaborateurController;
use App\Http\Controllers\RH\PosteController;
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

Route::get('/resourceview/view/{id}/{designation}', [resourceviewcontroller::class, 'view'])
    ->name('resourceview.view');
Route::post('/resourceview/store/{id}/', [resourceviewcontroller::class, 'storeplanif'])
    ->name('resourceview.storeplanif');
Route::resource('postes', App\Http\Controllers\RH\PosteController::class);

Route::prefix('RH')->group(function () {
    Route::resource('postes', PosteController::class)->names([
        'index' => 'postes.index',
        'create' => 'postes.create',
        'store' => 'postes.store',
        'show' => 'postes.show',
        'edit' => 'postes.edit',
        'update' => 'postes.update',
        'destroy' => 'postes.destroy',
    ]);
});
Route::resource('inventaire',inventaireController::class);
