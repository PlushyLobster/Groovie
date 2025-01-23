@extends('Layout.layoutAdmin')

@section('content')
    <div class="container mx-auto p-4">
        <h1 class="text-3xl font-bold mb-6">Surveillance des transactions</h1>

        <!-- Section: Groovies par utilisateur -->
        <div class="bg-white p-6 rounded-lg shadow-md mt-6">
            <h2 class="text-2xl font-bold mb-4">Groovies par utilisateur</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                <div class="bg-gray-100 p-4 rounded-lg shadow">
                    <h3 class="text-xl font-bold mb-2">Utilisateur 1</h3>
                    <p>Nombre de Groovies: 100</p>
                    <p>Nom: Doe</p>
                    <p>Prénom: John</p>
                    <p>Ville: Paris</p>
                    <p>Niveau: 5</p>
                </div>
                <div class="bg-gray-100 p-4 rounded-lg shadow">
                    <h3 class="text-xl font-bold mb-2">Utilisateur 2</h3>
                    <p>Nombre de Groovies: 150</p>
                    <p>Nom: Smith</p>
                    <p>Prénom: Jane</p>
                    <p>Ville: Lyon</p>
                    <p>Niveau: 4</p>
                </div>
                <!-- Ajoutez plus de cards ici -->
            </div>
        </div>

        <!-- Section: Contrôle des transactions techniques -->
        <div class="bg-white p-6 rounded-lg shadow-md mt-6">
            <h2 class="text-2xl font-bold mb-4">Contrôle des transactions techniques</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div class="bg-gray-100 p-4 rounded-lg shadow">
                    <h3 class="text-xl font-bold mb-2">Moyens de transport utilisés</h3>
                    <!-- Contenu pour les moyens de transport -->
                </div>
                <div class="bg-gray-100 p-4 rounded-lg shadow">
                    <h3 class="text-xl font-bold mb-2">Empreinte carbone</h3>
                    <!-- Contenu pour l'empreinte carbone -->
                </div>
            </div>
        </div>

        <!-- Section: Analyse des aspects marketing -->
        <div class="bg-white p-6 rounded-lg shadow-md mt-6">
            <h2 class="text-2xl font-bold mb-4">Analyse des aspects marketing</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div class="bg-gray-100 p-4 rounded-lg shadow">
                    <h3 class="text-xl font-bold mb-2">Promotions</h3>
                    <!-- Contenu pour les promotions -->
                </div>
                <div class="bg-gray-100 p-4 rounded-lg shadow">
                    <h3 class="text-xl font-bold mb-2">Réductions obtenues</h3>
                    <!-- Contenu pour les réductions obtenues -->
                </div>
            </div>
        </div>
    </div>
@endsection
