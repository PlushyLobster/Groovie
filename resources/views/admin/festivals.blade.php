@extends('Layout.layoutAdmin')

@section('content')
    <div class="container mx-auto p-4">
        <div class="flex items-center justify-between mb-4">
            <h1 class="text-3xl font-bold">Catalogue des festivals</h1>
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
            $('#festivals-table').DataTable({
                "language": {
                    "url": "https://cdn.datatables.net/plug-ins/1.13.5/i18n/fr-FR.json"
                },
                "pageLength": 10,
                "lengthMenu": [5, 10, 20, 50],
                "deferRender": true,
                "destroy": true,
                "drawCallback": function() {
                    $('#festivals-table').css("visibility", "visible");
                }
            });

            $('#add-festival').on('click', function() {
                $('#addFestivalModal').removeClass('hidden');
            });

            $('#addFestivalForm').on('submit', function(e) {
                e.preventDefault();
                $.ajax({
                    url: '{{ route("admin.festivals.add") }}',
                    method: 'POST',
                    data: $(this).serialize(),
                    success: function(response) {
                        $('#festivals-table').DataTable().row.add([
                            response.type,
                            response.name,
                            response.start_datetime,
                            response.end_datetime,
                            response.created_at,
                            response.updated_at,
                            '<button class="bg-blue-500 text-white px-4 py-2 rounded" onclick="showFestivalDetails(' + response.Id_festival + ')">Détail</button>' +
                            '<button class="bg-red-500 text-white px-4 py-2 rounded" onclick="deleteFestival(' + response.Id_festival + ')">Supprimer</button>'
                        ]).draw(false);
                        closeModal();
                        alert('Festival ajouté avec succès !');
                    },
                    error: function(response) {
                        alert('Erreur lors de l\'ajout du festival');
                    }
                });
            });
        });

        function closeModal() {
            $('#addFestivalModal').addClass('hidden');
        }

        function showFestivalDetails(festivalId) {
            $.get("/admin/festivals/" + festivalId, function(data) {
                $('#detail-festival-id').val(festivalId);
                $('#detail-type').val(data.type);
                $('#detail-name').val(data.name);
                $('#detail-start-datetime').val(data.start_datetime);
                $('#detail-end-datetime').val(data.end_datetime);
                $('#festivalDetailsModal').removeClass('hidden');
            }).fail(function() {
                alert('Erreur lors de la récupération des informations.');
            });
        }

        function closeDetailModal() {
            $('#festivalDetailsModal').addClass('hidden');
        }

        function updateFestival() {
            let festivalId = $('#detail-festival-id').val();
            let data = {
                _token: '{{ csrf_token() }}',
                type: $('#detail-type').val(),
                name: $('#detail-name').val(),
                start_datetime: $('#detail-start-datetime').val(),
                end_datetime: $('#detail-end-datetime').val()
            };

            $.ajax({
                url: '/admin/festivals/' + festivalId,
                method: 'PUT',
                data: data,
                success: function(response) {
                    $('#festivals-table').DataTable().row('#festival-' + festivalId).data([
                        data.type,
                        data.name,
                        data.start_datetime,
                        data.end_datetime,
                        response.created_at,
                        response.updated_at,
                        '<button class="bg-blue-500 text-white px-4 py-2 rounded" onclick="showFestivalDetails(' + festivalId + ')">Détail</button>' +
                        '<button class="bg-red-500 text-white px-4 py-2 rounded" onclick="deleteFestival(' + festivalId + ')">Supprimer</button>'
                    ]).draw(false);
                    closeDetailModal();
                    alert('Festival mis à jour avec succès !');
                },
                error: function(response) {
                    alert('Erreur lors de la mise à jour du festival');
                }
            });
        }
    </script>
@endsection
