@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-6">
    <div class="max-w-2xl mx-auto bg-white shadow-lg rounded-lg p-8 space-y-6">
        <h1 class="text-3xl font-extrabold text-gray-800 text-center mb-6">Détails du Contrat</h1>

        <div>
            <strong class="text-lg font-semibold">Ménagère :</strong> 
            <a href="{{ route('menageres.show', $contrat->menagere) }}" class="text-blue-600 hover:underline">
                {{ $contrat->menagere->nom }} {{ $contrat->menagere->prenom }}
            </a>
        </div>

        <div>
            <strong class="text-lg font-semibold">Période :</strong> 
            {{ $contrat->date_debut }} au {{ $contrat->date_fin }}
        </div>

        <div>
            <strong class="text-lg font-semibold">Durée :</strong> {{ $contrat->duree }} mois
        </div>

        <div>
            <strong class="text-lg font-semibold">Salaire :</strong> {{ $contrat->salaire }} FCFA
        </div>

        <div>
            <strong class="text-lg font-semibold">Type de travail :</strong> 
            <span class="px-2 py-1 rounded-full 
                {{ $contrat->temps_travail == 'plein_temps' ? 'bg-green-500 text-white' : 'bg-yellow-500 text-gray-800' }}">
                {{ $contrat->temps_travail == 'plein_temps' ? 'Plein temps' : 'Temps partiel' }}
            </span>
        </div>

        <div class="flex justify-between space-x-4 pt-4">
            <form action="/contrats/edit/{{$contrat->id}}" method="get">
                @csrf
                <button class="bg-blue-600 text-white px-4 py-2 rounded-lg shadow-md hover:bg-blue-700">
                    Modifier le contrat
                </button>  
            </form>

            <form action="{{ route('contrats.delete', $contrat) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" onclick="return confirm('Voulez-vous vraiment supprimer ce contrat ?')"
                    class="bg-red-600 text-white px-4 py-2 rounded-lg shadow-md hover:bg-red-700">
                    Supprimer
                </button>
            </form>
        </div>
    </div>
</div>

@endsection