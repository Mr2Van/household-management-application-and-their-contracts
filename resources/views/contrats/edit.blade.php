@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-6">
    <h1 class="text-3xl font-extrabold text-gray-800 mb-8 text-center">Modifier un Contrat</h1>

    <form action="{{ route('contrats.update', $contrat) }}" method="POST" 
        class="max-w-2xl mx-auto bg-white shadow-xl rounded-lg p-8 space-y-6">
        
        @csrf
        @method('PUT')

        <!-- Ménagère -->
        <div>
            <label class="block text-gray-700 font-semibold">Ménagère</label>
            <input type="hidden" name="menagere_id" value="{{ $menagere->id }} " class="w-full border-gray-300 rounded-lg p-2">
            <p class="text-lg font-medium text-gray-900">{{ $menagere->nom }} {{ $menagere->prenom }}</p>
        </div>

        <!-- Dates -->
        <div class="grid md:grid-cols-2 gap-6">
            <div>
                <label class="block text-gray-700 font-semibold">Date de début</label>
                <input type="date" name="date_debut"  value="{{ $contrat->date_debut }}" required
                    class="w-full p-2 border rounded-md focus:ring-2 focus:ring-blue-500">
            </div>

            <div>
                <label class="block text-gray-700 font-semibold">Date de fin</label>
                <input type="date" name="date_fin"  value="{{ $contrat->date_fin }}" required
                    class="w-full p-2 border rounded-md focus:ring-2 focus:ring-blue-500">
            </div>
        </div>

        <!-- Durée -->
        <div>
            <label class="block text-gray-700 font-semibold">Durée du contrat (mois)</label>
            <input type="number" name="duree" value="{{ $contrat->duree }}" required
                class="w-full p-2 border rounded-md focus:ring-2 focus:ring-blue-500">
        </div>

        <!-- Salaire -->
        <div>
            <label class="block text-gray-700 font-semibold">Salaire mensuel (FCFA)</label>
            <input type="number" name="salaire" value="{{ $contrat->salaire }}" required
                class="w-full p-2 border rounded-md focus:ring-2 focus:ring-blue-500">
        </div>

        <!-- Type de travail -->
        <div>
            <label class="block text-gray-700 font-semibold">Type de travail</label>
            <select name="temps_travail" required
                class="w-full p-2 border rounded-md focus:ring-2 focus:ring-blue-500">
                <option value="plein_temps" {{ $contrat->temps_travail == 'plein_temps' ? 'selected' : '' }}>Plein temps</option>
                <option value="temps_partiel" {{ $contrat->temps_travail == 'temps_partiel' ? 'selected' : '' }}>Temps partiel</option>
            </select>
        </div>

        <!-- Bouton de soumission -->
        <button type="submit"
            class="w-full bg-emerald-600 text-white px-4 py-2 rounded-lg shadow-md hover:bg-emerald-700">
            Enregistrer
        </button>
    </form>
</div>

@endsection

