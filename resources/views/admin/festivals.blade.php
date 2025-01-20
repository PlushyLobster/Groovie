@extends('layouts.layoutAdmin')

@section('content')
    <div class="container mx-auto p-4">
        <h1 class="text-3xl font-bold mb-6">Gestion des festivals</h1>
        <div class="bg-white p-6 rounded-lg shadow-md">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                <tr>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Type</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nom</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Début</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Fin</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Créé le</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Mis à jour le</th>
                </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                @foreach($festivals as $festival)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $festival->Id_festival }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $festival->type }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $festival->name }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $festival->start_datetime }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $festival->end_datetime }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $festival->created_at }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $festival->updated_at }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
