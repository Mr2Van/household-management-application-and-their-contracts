<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\MenagereRequest;

use App\Models\Menagere;

class MenagereController extends Controller
{
    //

    

    public function create(){

        return view('menageres.create');
    }

    public function app(){

        return view('layouts.app');
    }

    public function show($id){
        $menagere = Menagere::findOrFail($id);

        // Transmettre la variable à la vue
        return view('menageres.show', compact('menagere'));
    }

    public function edit($id){

        $menagere = Menagere::findOrFail($id);


      return view('menageres.create', compact('menagere'));
    }

    public function update(Request $request, $id)
{
    // Valider les données du formulaire
    $validatedData = $request->validate([
        'nom' => 'required|string|max:255',
        'prenom' => 'required|string|max:255',
        'telephone' => 'required|string|max:15',
        'age' => 'required|integer|min:18|max:100',
        'quartier' => 'required|string|max:255',
        'ville' => 'required|string|max:255',
        'langues_parlees' => 'nullable|string',
        'commentaire' => 'nullable|string',
        'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        'sous_contrat' => 'boolean',
    ]);

    // Récupérer la ménagère existante
    $menagere = Menagere::findOrFail($id);

    // Mettre à jour les champs
    $menagere->fill($validatedData);

    // Gestion de l'upload de la photo (si modifiée)
    if ($request->hasFile('photo')) {
        // Vérifier si l'ancienne photo est valide avant de la supprimer
        if (!empty($menagere->photo) && filter_var($menagere->photo, FILTER_VALIDATE_URL)) {
            $oldPath = parse_url($menagere->photo, PHP_URL_PATH);
            $oldPath = ltrim($oldPath, '/');
            Storage::disk('s3')->delete($oldPath);
        }

        // Stocker la nouvelle photo sur S3 et récupérer l'URL
        $path = $request->file('photo')->store('menageres', 's3');
        Storage::disk('s3')->setVisibility($path, 'public');
        $menagere->photo = Storage::disk('s3')->url($path);
    }

    // Sauvegarder les modifications
    $menagere->save();

    // Rediriger avec un message de confirmation
    return redirect()->route('menageres.index')->with('success', 'Ménagère mise à jour avec succès.');
}


    public function index() {


        $menageres = Menagere::all();
        
      return view('menageres.index', compact('menageres'));

        
    }

    public function delete($id){

        $menagere = Menagere::findOrFail($id);
        $menagere->delete();

        return redirect('/menageres/index');

    }


    public function store(Request $request){
        
        $data = $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'telephone' => 'required|numeric|digits_between:8,15',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'age' => 'required|integer|min:18|max:65',
            'quartier' => 'required|string|max:255',
            'ville' => 'required|string|max:255',
            'langues_parlees' => 'required|in:français,anglais', 
            'commentaire' => 'nullable|string|max:500',
            'sous_contrat' => 'nullable|boolean',
        ]);

        if ($request->hasFile('photo')) {
            // Stocker le fichier sur S3 et récupérer le chemin
            $path = $request->file('photo')->store('menageres', 's3');

            Storage::disk('s3')->setVisibility($path, 'public');          
            // Générer l'URL publique
            $data['photo'] = Storage::disk('s3')->url($path);
        }
   
        $menagere = Menagere::create($data);


        return redirect()->route('menageres.index')->with('success', 'Ménagère créée');
    }



    public function rechercher(Request $request)
{
    $query = Menagere::query();

    // Recherche par nom
    if ($request->filled('nom')) {
        $query->where('nom', 'LIKE', "%{$request->nom}%");
    }


    // Recherche par ville
    if ($request->filled('ville')) {
        $query->where('ville', 'LIKE', "%{$request->ville}%");
    }

    // Recherche par âge
    if ($request->filled('age')) {
        $query->where('age', $request->age);
    }

    // Recherche par quartier
    if ($request->filled('quartier')) {
        $query->where('quartier', 'LIKE', "%{$request->quartier}%");
    }

    // Recherche par langue
    if ($request->filled('langues_parlees')) {
        $query->where('langues_parlees', $request->langue);
    }

    $resultats = $query->get();
    
    return view('menageres.index', compact('resultats'));
}

}
