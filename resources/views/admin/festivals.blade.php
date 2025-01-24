@extends('Layout.layoutAdmin')

@section('content')
    <div class="container mx-auto p-4">
        <div class="flex items-center justify-between mb-4">
            <h1 class="text-3xl font-bold">Catalogue des festivals</h1>
            <button id="import-json" class="bg-blue-500 text-white px-4 py-2 rounded">Importer le JSON</button>
            <button id="add-festival" class="bg-green-500 text-white px-4 py-2 rounded">Ajouter un festival</button>
        </div>
        <div class="bg-white p-6 rounded-lg shadow-md">
            <table id="festivals-table" class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                <tr>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Type</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nom</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Début</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Fin</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Créé le</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Mis à jour le</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                @foreach($festivals as $festival)
                    <tr id="festival-{{ $festival->Id_festival }}">
                        <td class="px-6 py-4 whitespace-nowrap">{{ $festival->type }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $festival->name }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ \Carbon\Carbon::parse($festival->start_datetime)->format('d/m/Y') }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ \Carbon\Carbon::parse($festival->end_datetime)->format('d/m/Y') }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ \Carbon\Carbon::parse($festival->created_at)->format('d/m/Y') }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ \Carbon\Carbon::parse($festival->updated_at)->format('d/m/Y') }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <button class="bg-blue-500 text-white px-4 py-2 rounded" onclick="showFestivalDetails({{ $festival->Id_festival }})">Détail</button>
                            <button class="bg-red-500 text-white px-4 py-2 rounded" onclick="deleteFestival({{ $festival->Id_festival }})">Supprimer</button>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Modale pour importer le JSON -->
    <div id="importJsonModal" class="hidden fixed z-10 inset-0 overflow-y-auto">
        <div class="flex items-center justify-center min-h-screen">
            <div class="bg-white p-6 rounded-lg shadow-md w-full max-w-md">
                <h2 class="text-2xl font-bold mb-4">Importer le JSON</h2>
                <form id="importJsonForm" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-4">
                        <label for="jsonFile" class="block text-sm font-medium text-gray-700">Fichier JSON</label>
                        <input type="file" name="jsonFile" id="jsonFile" class="mt-1 p-1 block w-full border-gray-300 rounded-md shadow-sm" accept=".json" required>
                    </div>
                    <td id="user-{{ $user->id }}">
                        <button class="suspend-button bg-red-500 text-white px-4 py-2 rounded" data-id="{{ $user->id }}" {{ $user->active ? '' : 'hidden' }}>Suspendre</button>
                        <button class="activate-button bg-green-500 text-white px-4 py-2 rounded" data-id="{{ $user->id }}" {{ $user->active ? 'hidden' : '' }}>Activer</button>
                    </td>
                </form>
            </div>
        </div>
    </div>

    <!-- Modale pour afficher les détails du festival -->
    <div id="festivalDetailsModal" class="hidden fixed z-10 inset-0 overflow-y-auto">
        <div class="flex items-center justify-center min-h-screen">
            <div class="bg-white p-6 rounded-lg shadow-md w-full max-w-md">
                <h2 class="text-2xl font-bold mb-4">Détails du Festival</h2>
                <form id="festivalDetailsForm">
                    @csrf
                    <input type="hidden" id="detail-festival-id">
                    <div class="mb-4">
                        <label for="detail-type" class="block text-sm font-medium text-gray-700">Type</label>
                        <select id="detail-type" class="mt-1 p-1 block w-full border-gray-300 rounded-md shadow-sm">
                            <option value="Intérieur">Intérieur</option>
                            <option value="Extérieur">Extérieur</option>
                        </select>
                    </div>
                    <div class="mb-4">
                        <label for="detail-name" class="block text-sm font-medium text-gray-700">Nom</label>
                        <input type="text" id="detail-name" class="mt-1 p-1 block w-full border-gray-300 rounded-md shadow-sm">
                    </div>
                    <div class="mb-4">
                        <label for="detail-start-datetime" class="block text-sm font-medium text-gray-700">Début</label>
                        <input type="datetime-local" id="detail-start-datetime" class="mt-1 p-1 block w-full border-gray-300 rounded-md shadow-sm">
                    </div>
                    <div class="mb-4">
                        <label for="detail-end-datetime" class="block text-sm font-medium text-gray-700">Fin</label>
                        <input type="datetime-local" id="detail-end-datetime" class="mt-1 p-1 block w-full border-gray-300 rounded-md shadow-sm">
                    </div>
                    <div class="flex justify-center">
                        <button type="button" class="py-2 px-4 rounded bg-gray-500 text-white ml-2" onclick="closeDetailModal()">Fermer</button>
                        <button type="button" class="py-2 px-4 rounded bg-blue-500 text-white ml-2" onclick="updateFestival()">Mettre à jour</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap4.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap4.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#import-json').on('click', function() {
                $('#importJsonModal').removeClass('hidden');
            });

            $('#importJsonForm').on('submit', function(e) {
                e.preventDefault();
                let formData = new FormData(this);
                $.ajax({
                    url: '{{ route("admin.festivals.importJson") }}',
                    method: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        alert('JSON importé avec succès !');
                        closeImportModal();
                        // Actualisez la table des festivals si nécessaire
                    },
                    error: function(response) {
                        alert('Erreur lors de l\'importation du JSON');
                    }
                });
            });
        });

        function closeImportModal() {
            $('#importJsonModal').addClass('hidden');
        }
    </script>
    <script>
        $(document).ready(function() {
            $('.suspend-button').on('click', function() {
                let userId = $(this).data('id');
                $.ajax({
                    url: '/admin/clients/deactivate/' + userId,
                    method: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        if (response.success) {
                            $('#user-' + userId + ' .suspend-button').addClass('hidden');
                            $('#user-' + userId + ' .activate-button').removeClass('hidden');
                            alert('Compte suspendu avec succès.');
                        } else {
                            alert('Erreur lors de la suspension du compte.');
                        }
                    },
                    error: function() {
                        alert('Erreur lors de la suspension du compte.');
                    }
                });
            });

            $('.activate-button').on('click', function() {
                let userId = $(this).data('id');
                $.ajax({
                    url: '/admin/clients/activate/' + userId,
                    method: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        if (response.success) {
                            $('#user-' + userId + ' .activate-button').addClass('hidden');
                            $('#user-' + userId + ' .suspend-button').removeClass('hidden');
                            alert('Compte activé avec succès.');
                        } else {
                            alert('Erreur lors de l\'activation du compte.');
                        }
                    },
                    error: function() {
                        alert('Erreur lors de l\'activation du compte.');
                    }
                });
            });
        });
    </script>
@endsection
