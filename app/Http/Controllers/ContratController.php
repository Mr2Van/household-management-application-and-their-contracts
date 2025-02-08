<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contrat;
use App\Models\Menagere;



class ContratController extends Controller
{
    //

    public function create($id)
{
    // Récupérer la ménagère spécifique
    $menagere = Menagere::findOrFail($id);
    
    // Créer un tableau contenant cette ménagère
    $menageres = collect([$menagere]);
    
    return view('contrats.create', compact('menageres', 'menagere'));    
}

    public function index() {


        $contrats = Contrat::all();
        
        return view('contrats.indexContrat', compact('contrats'));
        
    }

    public function delete($id){

        $menagere = Contrat::findOrFail($id);
        $menagere->delete();

        return redirect('/contrats/indexContrat');

    }

    public function store(Request $request) {
        $validated = $request->validate([
            'menagere_id' => 'required|exists:menageres,id',
            'date_debut' => 'required|date',
            'date_fin' => 'required|date|after:date_debut',
            'duree' => 'required|integer',
            'salaire' => 'required|numeric',
            'temps_travail' => 'required|in:plein_temps,temps_partiel'
        ]);

        $contrat = Contrat::create($validated);
        
        // Mettre à jour le statut de la ménagère
        Menagere::find($validated['menagere_id'])->update(['sous_contrat' => true]);

        return redirect()->route('contrats.indexContrat');
    }

    public function edit($id){

    $contrat = Contrat::findOrFail($id);

    $menagere = Menagere::findOrFail($contrat->menagere_id);



      return view('contrats.edit', compact('contrat', 'menagere'));


    
}

    public function update(Request $request, $id){

        $validated = $request->validate([
            'menagere_id' => 'required|exists:menageres,id',
            'date_debut' => 'required|date',
            'date_fin' => 'required|date|after:date_debut',
            'duree' => 'required|integer',
            'salaire' => 'required|numeric',
            'temps_travail' => 'required|in:plein_temps,temps_partiel'
        ]);

        $contrat = Contrat::findOrFail($id);

        $contrat->fill($validated);

        $contrat->save();

         return redirect()->route('contrats.indexContrat');


    }  


    public function show($contrat){

        $contrat = Contrat::findOrFail($contrat);



        return view('/contrats/show', compact('contrat'));
    }

}
