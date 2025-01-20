@extends('layouts.layoutAdmin')

@section('content')
    <div class="container mx-auto p-4">
        <h1 class="text-3xl font-bold mb-6">Dashboard Administrateur</h1>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <div class="bg-white p-6 rounded-lg shadow-md">
                <h2 class="text-xl font-bold mb-2">Card 1</h2>
                <p>Contenu de la première carte.</p>
            </div>
            <div class="bg-white p-6 rounded-lg shadow-md">
                <h2 class="text-xl font-bold mb-2">Card 2</h2>
                <p>Contenu de la deuxième carte.</p>
            </div>
            <div class="bg-white p-6 rounded-lg shadow-md">
                <h2 class="text-xl font-bold mb-2">Card 3</h2>
                <p>Contenu de la troisième carte.</p>
            </div>
        </div>
    </div>
@endsection
