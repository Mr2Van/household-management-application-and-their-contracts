<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des Ménagères</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100" >
    <!-- Navigation -->
    <nav class="bg-emerald-500  p-4 shadow-md">
        <div class="container mx-auto flex justify-between items-center">
            <h1 class="text-xl font-bold">Gestion des Ménagères</h1>
            <div class="space-x-4">
                <a href="{{ route('menageres.index') }}" class="bg-emerald-800 text-white p-3 rounded-lg hover:bg-emerald-500">Ménagères</a>
                <a href="{{ route('menageres.create') }}" class="bg-emerald-800 text-white p-3 rounded-lg hover:bg-emerald-500">Nouvelle Ménagère</a>
                <a href="{{route('contrats.indexContrat')}}"  class="bg-emerald-800 text-white p-3 rounded-lg hover:bg-emerald-500"> Liste de Contrat</a>
                <a href="{{ route('logout') }}" class="bg-emerald-800 text-white p-3 rounded-lg hover:bg-emerald-500">Déconnexion</a>
            </div>
        </div>
    </nav>

    <!-- Contenu principal -->
    <main class="container mx-auto mt-8 px-4">
        @yield('content')
    </main>
</body>
</html>
