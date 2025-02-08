@extends('layouts.app')

@section('content')
<div class="container  mx-auto px-4 py-4">
    <h1 class="text-3xl font-extrabold text-gray-800 mb-8 text-center">{{ isset($menagere) ? 'Modifier' : 'Ajouter' }} une Ménagère</h1>

    <form 
        action="{{ isset($menagere) ? route('menageres.update', $menagere) : route('menageres.store') }}" 
        method="POST" 
        enctype="multipart/form-data" 
        class="max-w-2xl mx-auto bg-white shadow-xl rounded-lg p-8 space-y-6"
    >
        @csrf
        @if(isset($menagere))
            @method('PUT')
        @endif

        <div class="grid md:grid-cols-2 gap-6">
            <!-- Nom -->
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Nom</label>
                <input 
                    type="text" 
                    name="nom" 
                    value="{{ $menagere->nom ?? '' }}" 
                    required 
                    class="w-full px-4 py-2 border-2 border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-300"
                >
            </div>

            <!-- Prénom -->
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Prénom</label>
                <input 
                    type="text" 
                    name="prenom" 
                    value="{{ $menagere->prenom ?? '' }}" 
                    required 
                    class="w-full px-4 py-2 border-2 border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-300"
                >
            </div>
        </div>

        <div class="grid md:grid-cols-2 gap-6">
            <!-- Téléphone -->
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Téléphone</label>
                <input 
                    type="tel" 
                    name="telephone" 
                    value="{{ $menagere->telephone ?? '' }}" 
                    required 
                    class="w-full px-4 py-2 border-2 border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-300"
                >
            </div>

            <!-- Âge -->
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Âge</label>
                <input 
                    type="number" 
                    name="age" 
                    value="{{ $menagere->age ?? '' }}" 
                    required 
                    class="w-full px-4 py-2 border-2 border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-300"
                >
            </div>
        </div>

        <div class="grid md:grid-cols-2 gap-6">
            <!-- Quartier -->
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Quartier</label>
                <input 
                    type="text" 
                    name="quartier" 
                    value="{{ $menagere->quartier ?? '' }}" 
                    required 
                    class="w-full px-4 py-2 border-2 border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-300"
                >
            </div>

            <!-- Ville -->
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Ville</label>
                <input 
                    type="text" 
                    name="ville" 
                    value="{{ $menagere->ville ?? '' }}" 
                    required 
                    class="w-full px-4 py-2 border-2 border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-300"
                >
            </div>
        </div>

        <!-- Langue parlée -->
        <div>
            <label class="block text-sm font-semibold text-gray-700 mb-2">Langue parlée</label>
            <select 
                name="langues_parlees" 
                class="w-full px-4 py-2 border-2 border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-300"
            >
                <option value="français" {{ isset($menagere) && $menagere->langue_parlee === 'français' ? 'selected' : '' }}>Français</option>
                <option value="anglais" {{ isset($menagere) && $menagere->langue_parlee === 'anglais' ? 'selected' : '' }}>Anglais</option>
            </select>
        </div>

        <!-- Commentaire -->
        <div>
            <label class="block text-sm font-semibold text-gray-700 mb-2">Commentaire</label>
            <textarea 
                name="commentaire" 
                rows="4" 
                class="w-full px-4 py-2 border-2 border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-300"
            >{{ $menagere->commentaire ?? '' }}</textarea>
        </div>

        <!-- Photo -->
        <div>
            <label class="block text-sm font-semibold text-gray-700 mb-2">Photo</label>
            <input 
                type="file" 
                name="photo" 
                class="w-full px-4 py-2 border-2 border-gray-300 rounded-md file:mr-4 file:rounded-md file:border-0 file:bg-blue-50 file:px-4 file:py-2 file:text-blue-700 hover:file:bg-blue-100"
            >
        </div>

        <!-- Sous contrat -->
        <div class="flex items-center space-x-3">
            <input type="hidden" name="sous_contrat" value="0">
            <input 
                type="checkbox" 
                name="sous_contrat" 
                value="1"
                {{ isset($menagere) && $menagere->sous_contrat ? 'checked' : '' }} 
                class="h-5 w-5 text-blue-600 border-gray-300 rounded focus:ring-2 focus:ring-blue-500"
            >
            <label class="text-sm font-medium text-gray-700">Sous contrat</label>
        </div>

        <!-- Bouton -->
        <div class="flex justify-end mt-6 ">
            <button 
                type="submit" 
                class="bg-emerald-800 text-white p-3 rounded-lg hover:bg-emerald-500"
            >
                Enregistrer
            </button>
        </div>
    </form>
</div>
@endsection