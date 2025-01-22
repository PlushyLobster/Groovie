@extends('Layout.layoutAdmin')

@section('content')
    <div class="container mx-auto p-4">
        <div class="flex items-center justify-between mb-4">
            <h1 class="text-3xl font-bold">Gestion des festivals</h1>
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
                        <td class="px-6 py-4 whitespace-nowrap">{{ $festival->start_datetime }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $festival->end_datetime }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $festival->created_at }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $festival->updated_at }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <button class="bg-orange-400 text-white px-4 py-2 rounded" onclick="updateFestival({{ $festival->Id_festival }})">Modifier</button>
                            <button class="bg-red-500 text-white px-4 py-2 rounded" onclick="deleteFestival({{ $festival->Id_festival }})">Supprimer</button>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Modale pour ajouter un festival -->
    <div id="addFestivalModal" class="hidden fixed z-10 inset-0 overflow-y-auto">
        <div class="flex items-center justify-center min-h-screen">
            <div class="bg-white p-6 rounded-lg shadow-md w-full max-w-md">
                <h2 class="text-2xl font-bold mb-4">Ajouter un festival</h2>
                <form id="addFestivalForm">
                    @csrf
                    <div class="mb-4">
                        <label for="type" class="block text-sm font-medium text-gray-700">Type</label>
                        <select name="type" id="type" class="mt-1 p-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                            <option value="Intérieur">Intérieur</option>
                            <option value="Extérieur">Extérieur</option>
                        </select>
                    </div>
                    <div class="mb-4">
                        <label for="name" class="block text-sm font-medium text-gray-700">Nom</label>
                        <input type="text" name="name" id="name" class="mt-1 p-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                    </div>
                    <div class="mb-4">
                        <label for="start_datetime" class="block text-sm font-medium text-gray-700">Début</label>
                        <input type="datetime-local" name="start_datetime" id="start_datetime" class="mt-1 p-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                    </div>
                    <div class="mb-4">
                        <label for="end_datetime" class="block text-sm font-medium text-gray-700">Fin</label>
                        <input type="datetime-local" name="end_datetime" id="end_datetime" class="mt-1 p-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                    </div>
                    <div class="mb-4">
                        <label for="Id_musical_genre" class="block text-sm font-medium text-gray-700">Genre musical</label>
                        <select name="Id_musical_genre" id="Id_musical_genre" class="mt-1 p-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                            @foreach($musicalGenres as $genre)
                                <option value="{{ $genre->Id_musical_genre }}">{{ $genre->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="flex justify-center">
                        <button type="submit" class="py-2 px-4 rounded bg-green-500 text-white">Ajouter</button>
                        <button type="button" class="py-2 px-4 rounded bg-gray-500 text-white ml-2" onclick="closeModal()">Annuler</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
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
                            '<button class="bg-orange-400 text-white px-4 py-2 rounded" onclick="updateFestival(' + response.Id_festival + ')">Modifier</button>' +
                            '<button class="bg-red-500 text-white px-4 py-2 rounded" onclick="deleteFestival(' + response.Id_festival + ')">Supprimer</button>'
                        ]).draw(false);
                        closeModal();
                        alert('Festival ajouté avec succès !');
                    },
                    error: function(response) {
                        let errorMessage = 'Erreur lors de l\'ajout du festival';
                        if (response.responseJSON && response.responseJSON.error) {
                            errorMessage = response.responseJSON.error;
                        }
                        alert(errorMessage);
                    }
                });
            });
        });

        function closeModal() {
            $('#addFestivalModal').addClass('hidden');
        }

        function deleteFestival(id) {
            if (confirm('Êtes-vous sûr de vouloir supprimer ce festival ?')) {
                $.ajax({
                    url: '{{ route("admin.festivals.delete", "") }}/' + id,
                    method: 'DELETE',
                    data: {
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        if (response.message) {
                            $('#festivals-table').DataTable().row($('#festival-' + id)).remove().draw();
                            alert('Festival supprimé avec succès !');
                        }
                    },
                    error: function(response) {
                        alert('Erreur lors de la suppression du festival');
                    }
                });
            }
        }
    </script>
@endsection
