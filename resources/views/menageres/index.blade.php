{{-- resources/views/menageres/index.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-xl" >Liste des Ménagères</h1>

    <form action="{{ route('menageres.recherche') }}" method="GET"
    class=" mx-auto bg-white shadow-xl rounded-lg p-8 m-4 space-y-6"

    
    >
        <div class="grid md:grid-cols-2 gap-6">
        <input type="text" name="nom" placeholder="Rechercher par nom">
        <input type="text" name="ville" placeholder="Ville">
        <input type="number" name="age" placeholder="age">
        <input type="text" name="quartier" placeholder="quartier">

        </div>
        
        <div class="grid md:grid-cols-2 gap-6">
        <select name="langue">
            <option value="">Toutes les langues</option>
            <option value="français">Français</option>
            <option value="anglais">Anglais</option>
            <option value="anglais/français">Anglais/Français</option>

        </select>
        </div>
        
        <div class="flex justify-end">
        <button type="submit" class="bg-emerald-800 text-white p-3 rounded-lg hover:bg-emerald-500">Rechercher</button>
        </div>
    </form>

    <table class="w-full border-collapse bg-white shadow-lg rounded-lg mb-4 ">
    <thead>
        <tr class="bg-gray-300 text-gray-700  uppercase text-sm leading-normal">
            <th ></th>
            <th class="py-3 px-6 text-left">Nom</th>
            <th class="py-3 px-6 text-left">Prénom</th>
            <th class="py-3 px-6 text-left">Téléphone</th>
            <th class="py-3 px-6 text-center">Sous contrat</th>
            <th class="py-3 px-6 text-center">Actions</th>
        </tr>
    </thead>
    <tbody class="text-gray-600 text-sm font-light">
        
        {{-- Si on a une liste de résultats (par exemple via recherche) --}}
        @isset($resultats)
            @foreach($resultats as $resultat)
                <tr class="border-b border-gray-200 hover:bg-gray-100">
                    <td class="py-6 px-6">
                    @if(!empty($resultat->photo))
                        <img src="{{$resultat->photo}}" alt="Photo de {{ $resultat->photo }}" class="w-16 h-16 object-cover rounded-full">
                    @else
                        <span class="text-gray-500">Aucune photo</span>
                    @endif
                    </td>
                    <td class="">{{ $resultat->nom }}</td>
                    <td class="py-6 px-6">{{ $resultat->prenom }}</td>
                    <td class="py-6 px-6">{{ $resultat->telephone }}</td>
                    <td class="py-6 px-6 text-center">
                        @if($resultat->sous_contrat)
                            <span class="bg-green-500 text-white px-2 py-1 rounded text-xs">Oui</span>
                        @else
                            <span class="bg-red-500 text-white px-2 py-1 rounded text-xs">Non</span>
                        @endif
                    </td>
                    <td class="py-6 px-6 text-center">
                        <div class="flex justify-center space-x-2">
                            <a href="/menageres/show/{{$resultat->id}}" class="bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-600 text-xs">Détails</a>
                            <a href="/menageres/create/{{$resultat->id}}" class="bg-yellow-500 text-white px-3 py-1 rounded hover:bg-yellow-600 text-xs">Modifier</a>
                            <form action="/menageres/delete/{{$resultat->id}}" method="POST">
                                @method('delete')   
                                @csrf
                                <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600 text-xs">Supprimer</button>  
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        @endisset

        {{-- Si on a une seule ménagère (via show) --}}
        @isset($menageres)
            @foreach($menageres as $menagere)
                <tr class="border-b border-gray-200 hover:bg-gray-100">
                    <td class="py-6 px-6">
                    @if(!empty($menagere->photo))
                        <img src="{{ $menagere->photo }}" alt="Photo de {{ $menagere->nom }}" class="w-16 h-16 object-cover rounded-full">
                    @else
                        <span class="text-gray-500">Aucune photo</span>
                    @endif
                    </td>
                    <td class="py-6 px-6">{{ $menagere->nom }}</td>
                    <td class="py-6 px-6">{{ $menagere->prenom }}</td>
                    <td class="py-6 px-6">{{ $menagere->telephone }}</td>
                    <td class="py-6 px-6 text-center">
                        @if($menagere->sous_contrat)
                            <span class="bg-green-500 text-white px-2 py-1 rounded text-xs">Oui</span>
                        @else
                            <span class="bg-red-500 text-white px-2 py-1 rounded text-xs">Non</span>
                        @endif
                    </td>
                    <td class="py-3 px-6 text-center">
                        <div class="flex justify-center space-x-2">
                            <a href="/menageres/show/{{$menagere->id}}" class="bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-600 text-xs">Détails</a>
                            <a href="/menageres/create/{{$menagere->id}}" class="bg-yellow-500 text-white px-3 py-1 rounded hover:bg-yellow-600 text-xs">Modifier</a>
                            <form action="/menageres/delete/{{$menagere->id}}" method="POST">
                                @method('delete')   
                                @csrf
                                <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600 text-xs">Supprimer</button>  
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach    
        @endisset

    </tbody>
</table>

</div>
@endsection