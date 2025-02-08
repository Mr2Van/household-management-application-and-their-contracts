<?php

use App\Http\Controllers\MenagereController;
use App\Http\Controllers\ContratController
;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/layouts/app',[MenagereController::class, 'app']);

Route::get('/auth/login', [MenagereController::class,'login'])->name("login");
Route::get('/auth/logout', [MenagereController::class,'logout'])->name("logout");



// Routes Ménagères
//////////////////////////////cree une menagere
Route::get('/menageres/create',[MenagereController::class, 'create'])->name("menageres.create");
Route::post('/menageres/create',[MenagereController::class, 'store'])->name("menageres.store");

///////////////////////////////update une menagere
Route::put('/menageres/create/{id}', [MenagereController::class, 'update'])->name('menageres.update');
Route::get('/menageres/create/{id}',[MenagereController::class, 'edit'])->name("menageres.edit");

/////////////////////////////// liste les menagere
 Route::get('/menageres/index',[MenagereController::class,'index'])->name('menageres.index');

//////////////////////////////// affiche une  menagere specifique
 Route::get('/menageres/show/{id}', [MenagereController::class, 'show'])->name('menageres.show');

//////////////////////////////// supprime les menagere
Route::delete('/menageres/delete/{id}', [MenagereController::class,'delete'])->name("menageres.delete");

//////////////////////////////// recherche une menagerer
Route::get('menageres/recherche', [MenagereController::class, 'rechercher'])->name('menageres.recherche');



// Routes Contrats
////////////////////////////// cree un contrat         
Route::get('/contrats/create/{id?}', [ContratController::class, 'create'])->name("contrats.create");
Route::post('/contrats/create',[ContratController::class,'store'])->name("contrats.store");
 
//////////////////////////////liste les contrats
Route::get('/contrats/indexContrat',[ContratController::class, 'index'])->name("contrats.indexContrat");
                         
////////////////////////////// affichee un contrat
Route::get('/contrats/show/{id}',[ContratController::class,'show'])->name("contrats.show");

/////////////////////////////update un contrat
Route::put('/contrats/edit/{id}', [ContratController::class, 'update'])->name('contrats.update');
Route::get('/contrats/edit/{id}', [ContratController::class, 'edit'])->name('contrats.edit');

/////////////////////////////supprime un contrat
Route::delete('/contrats/delete/{id}', [ContratController::class, 'delete'])->name('contrats.delete');







