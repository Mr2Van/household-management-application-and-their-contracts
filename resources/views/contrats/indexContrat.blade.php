
@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-6">
    <h1 class="text-3xl font-extrabold text-gray-800 text-center mb-6">Contrats des Ménagères</h1>

    <div class="overflow-x-auto">
        <table class="min-w-full bg-white shadow-md rounded-lg overflow-hidden">
            <thead class="bg-gray-800 text-white">
                <tr>
                    <th></th>
                    <th class="py-3 px-6 text-left">Ménagère</th>
                    <th class="py-3 px-6 text-left">Durée</th>
                    <th class="py-3 px-6 text-left">Salaire</th>
                    <th class="py-3 px-6 text-left">Type de Travail</th>
                    <th class="py-3 px-6 text-center">Actions</th>
                </tr>
            </thead>
            <tbody class="text-gray-700">
                @foreach($contrats as $contrat)
                <tr class="border-b hover:bg-gray-100">
                <td class="py-6 px-6">
                    @if(!empty($contrat->menagere->photo))
                        <img src="{{ $contrat->menagere->photo }}" alt="Photo de {{ $contrat->menagere->nom }}" class="w-16 h-16 object-cover rounded-full">
                    @else
                        <span class="text-gray-500">Aucune photo</span>
                    @endif
                    </td>
                    <td class="py-4 px-6">{{ $contrat->menagere->nom }} {{ $contrat->menagere->prenom }}</td>
                    <td class="py-4 px-6">{{ $contrat->date_debut }} - {{ $contrat->date_fin }}</td>
                    <td class="py-4 px-6">{{ $contrat->salaire }} FCFA</td>
                    <td class="py-4 px-6">
                        <span class="px-2 py-1 rounded-full text-white 
                            {{ $contrat->temps_travail == 'plein_temps' ? 'bg-green-500' : 'bg-yellow-500' }}">
                            {{ $contrat->temps_travail == 'plein_temps' ? 'Plein temps' : 'Temps partiel' }}
                        </span>
                    </td>
                    <td class="py-4 px-6 flex justify-center space-x-2">
                        <a href="{{ route('contrats.show', $contrat->id) }}" 
                            class="bg-blue-600 text-white px-4 py-2 rounded-lg shadow-md hover:bg-blue-700">
                            Détails
                        </a>

                        <a href="/contrats/edit/{{$contrat->id}}"
                            class="bg-yellow-600 text-white px-4 py-2 rounded-lg shadow-md hover:bg-yellow-700">
                            Modifier
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection