@extends('Layout.layoutAdmin')

@section('content')
    <div class="container mx-auto p-4">
        <div class="flex items-center justify-between mb-4">
            <h1 class="text-3xl font-bold">Gestion des offres promotionnelles</h1>
            <button id="add-client" class="bg-green-500 text-white px-4 py-2 rounded">Ajouter une Offre</button>
        </div>
        <table id="offers-table" class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
            <tr>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Type</th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nom</th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Description</th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Créé le</th>
            </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
            @foreach($offers as $offer)
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $offer->type }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $offer->name }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $offer->description }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $offer->created_at }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#clients-table').DataTable({
                "language": {
                    "url": "https://cdn.datatables.net/plug-ins/1.13.5/i18n/fr-FR.json"
                },
                "pageLength": 10,
                "lengthMenu": [5, 10, 20, 50],
                "deferRender": true,
                "destroy": true,
                "drawCallback": function() {
                    $('#clients-table').css("visibility", "visible");
                }
            });
        });
    </script>
@endsection
