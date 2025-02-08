@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-4">
    <h1 class="text-3xl font-extrabold text-gray-800 mb-8 text-center">
        {{ isset($contrat) ? 'Modifier' : 'Créer' }} un Contrat
    </h1>

    <form 
        action="{{ isset($contrat) ? route('contrats.update', $contrat) : route('contrats.store') }}" 
        method="POST"
        class="max-w-2xl mx-auto bg-white shadow-lg rounded-lg p-8 space-y-6"
    >
        @csrf
        @if(isset($contrat))
            @method('PUT')
        @endif

        <div>
            <label class="block text-gray-700 font-semibold mb-2">Ménagère</label>
            <input type="hidden" name="menagere_id" class="w-full border-gray-300 rounded-lg p-2">
                @foreach($menageres as $m)
                    <p 
                        value="{{ $m->id }}"
                        {{ $m->id == request()->route('id') ? 'selected' : '' }}
                    >
                        {{ $m->nom }} {{ $m->prenom }}
                    </p>
                @endforeach
            </>
        </div>

        <div class="grid md:grid-cols-2 gap-6">
            <div>
                <label class="block text-gray-700 font-semibold mb-2">Date de début</label>
                <input type="date" name="date_debut" value="{{ $contrat->date_debut ?? '' }}" required 
                    class="w-full border-gray-300 rounded-lg p-2">
            </div>

            <div>
                <label class="block text-gray-700 font-semibold mb-2">Date de fin</label>
                <input type="date" name="date_fin" value="{{ $contrat->date_fin ?? '' }}" required 
                    class="w-full border-gray-300 rounded-lg p-2">
            </div>
        </div>

        <div>
            <label class="block text-gray-700 font-semibold mb-2">Durée du contrat (mois)</label>
            <input type="number" name="duree" value="{{ $contrat->duree ?? '' }}" required 
                class="w-full border-gray-300 rounded-lg p-2">
        </div>

        <div>
            <label class="block text-gray-700 font-semibold mb-2">Salaire mensuel</label>
            <input type="number" name="salaire" value="{{ $contrat->salaire ?? '' }}" required 
                class="w-full border-gray-300 rounded-lg p-2">
        </div>

        <div>
            <label class="block text-gray-700 font-semibold mb-2">Type de travail</label>
            <select name="temps_travail" required class="w-full border-gray-300 rounded-lg p-2">
                <option value="plein_temps" {{ isset($contrat) && $contrat->temps_travail == 'plein_temps' ? 'selected' : '' }}>
                    Plein temps
                </option>
                <option value="temps_partiel" {{ isset($contrat) && $contrat->temps_travail == 'temps_partiel' ? 'selected' : '' }}>
                    Temps partiel
                </option>
            </select>
        </div>

        <button type="submit" 
            class="w-full bg-emerald-600 text-white px-4 py-2 rounded-lg shadow-md hover:bg-emerald-700">
            Enregistrer
        </button>
    </form>
</div>

@endsection

