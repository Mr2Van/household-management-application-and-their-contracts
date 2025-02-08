@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto bg-white shadow-lg rounded-xl p-6 mt-6">
    <h1 class="text-2xl font-bold text-gray-800 mb-4">
        Détails de {{ $menagere->prenom }} {{ $menagere->nom }}
    </h1>

    <div class="flex justify-between">
    <div class="space-y-4 text-gray-700">
        
        <div><strong class="text-blue-700 font-bold">Téléphone :</strong> {{ $menagere->telephone }}</div>
        <div><strong class="text-blue-700 font-bold">Âge :</strong> {{ $menagere->age }} ans</div>
        <div><strong class="text-blue-700 font-bold">Quartier :</strong> {{ $menagere->quartier }}</div>
        <div><strong class="text-blue-700 font-bold">Ville :</strong> {{ $menagere->ville }}</div>
        <div><strong class="text-blue-700 font-bold">Langue parlée :</strong> {{ $menagere->langue_parlee }}</div>
        <div><strong class="text-blue-700 font-bold">Commentaire :</strong> {{ $menagere->commentaire }}</div>
    </div>
    <div>
            @if(!empty($menagere->photo))
                <img src="{{ $menagere->photo }}" alt="Photo de {{ $menagere->nom }}" class="w-60 h-90 ">
            @else
                <span class="text-gray-500">Aucune photo</span>
            @endif
    </div>

    </div>

    

    @if(!$menagere->sous_contrat)
        <div class="mt-6 flex justify-end">
            <form action="{{ route('contrats.create', $menagere->id) }}" method="GET">
                @csrf
                <button type="submit" 
                    class="bg-green-600 text-white px-4 py-2 rounded-lg shadow-md hover:bg-green-700">
                    Créer Contrat
                </button>
            </form> 
        </div>
    @else
        <div class="mt-6 p-4 bg-green-100 text-green-700 text-center font-bold rounded-lg">
            <h2>Sous-Contrat</h2>
        </div>
    @endif
</div>

@endsection