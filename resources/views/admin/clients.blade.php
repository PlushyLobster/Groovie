@extends('Layout.layoutAdmin')

@section('content')
    <div class="container mx-auto p-4">
        <div class="flex items-center justify-between mb-4">
            <h1 class="text-3xl font-bold">Catalogue des Clients</h1>
        </div>
        <div class="bg-white p-6 rounded-lg shadow-md">
            <table id="clients-table" class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                <tr>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Compte</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nb Groovies</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Niveau</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nom</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Prénom</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Ville</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Créé le</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">M.a.j</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                </tr>
                </thead>
                <tbody id="user-table" class="bg-white divide-y divide-gray-200">
                @foreach($users as $user)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">{{ e($user->email) }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            {{ $user->active ? 'Actif' : 'Suspendu' }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ e($user->groovers->nb_groovies) }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ e($user->groovers->level) }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ e($user->groovers->name) }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ e($user->groovers->firstname) }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ e($user->groovers->city) }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ \Carbon\Carbon::parse($user->created_at)->format('d/m/Y') }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ \Carbon\Carbon::parse($user->updated_at)->format('d/m/Y') }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <button class="bg-blue-500 text-white px-4 py-2 rounded ml-2" onclick="showUserDetails({{ $user->Id_user }})">Détail</button>
                            @if($user->active)
                                <button class="bg-red-500 text-white px-4 py-2 rounded" onclick="deactivateUser({{ $user->Id_user }})">Suspendre</button>
                            @else
                                <button class="bg-green-500 text-white px-4 py-2 rounded" onclick="activateUser({{ $user->Id_user }})">Activer</button>
                            @endif
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Modale pour afficher les détails d'un client -->
    <div id="userDetailsModal" class="hidden fixed z-10 inset-0 overflow-y-auto">
        <div class="flex items-center justify-center min-h-screen">
            <div class="bg-white p-6 rounded-lg shadow-md w-full max-w-md">
                <h2 class="text-2xl font-bold mb-4">Détails du Client</h2>
                <form id="userDetailsForm">
                    @csrf
                    @method('PUT')
                    <input type="hidden" id="detail-user-id" name="user_id">
                    <div class="mb-4">
                        <label for="detail-email" class="block text-sm font-medium text-gray-700">Email</label>
                        <input type="email" name="email" id="detail-email" class="mt-1 p-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                    </div>
                    <div class="mb-4">
                        <label for="detail-active" class="block text-sm font-medium text-gray-700">Compte</label>
                        <select name="active" id="detail-active" class="mt-1 p-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                            <option value="1">Actif</option>
                            <option value="0">Suspendu</option>
                        </select>
                    </div>
                    <div class="mb-4">
                        <label for="detail-nb-groovies" class="block text-sm font-medium text-gray-700">Nb Groovies</label>
                        <input type="text" id="detail-nb-groovies" class="mt-1 p-1 block w-full border-gray-300 rounded-md shadow-sm" readonly>
                    </div>
                    <div class="mb-4">
                        <label for="detail-level" class="block text-sm font-medium text-gray-700">Niveau</label>
                        <input type="text" id="detail-level" class="mt-1 p-1 block w-full border-gray-300 rounded-md shadow-sm" readonly>
                    </div>
                    <div class="mb-4">
                        <label for="detail-name" class="block text-sm font-medium text-gray-700">Nom</label>
                        <input type="text" name="name" id="detail-name" class="mt-1 p-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                    </div>
                    <div class="mb-4">
                        <label for="detail-firstname" class="block text-sm font-medium text-gray-700">Prénom</label>
                        <input type="text" name="firstname" id="detail-firstname" class="mt-1 p-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                    </div>
                    <div class="mb-4">
                        <label for="detail-city" class="block text-sm font-medium text-gray-700">Ville</label>
                        <input type="text" name="city" id="detail-city" class="mt-1 p-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                    </div>
                    <div class="flex justify-center">
                        <button type="submit" class="py-2 px-4 rounded bg-blue-500 text-white">Mettre à jour</button>
                        <button type="button" class="py-2 px-4 rounded bg-gray-500 text-white ml-2" onclick="closeModal()">Annuler</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap4.min.css">
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

        function closeModal() {
            $('#userDetailsModal').addClass('hidden');
        }

        function activateUser(userId) {
            $.post("{{ url('/admin/clients/activate') }}/" + userId, {
                _token: '{{ csrf_token() }}'
            }, function(data) {
                if (data.success) {
                    location.reload();
                }
            });
        }

        function deactivateUser(userId) {
            $.post("{{ url('/admin/clients/deactivate') }}/" + userId, {
                _token: '{{ csrf_token() }}'
            }, function(data) {
                if (data.success) {
                    location.reload();
                }
            });
        }

        function showUserDetails(userId) {
            $.get("{{ url('/admin/clients') }}/" + userId, function(data) {
                $('#detail-user-id').val(userId);
                $('#detail-email').val(data.email);
                $('#detail-active').val(data.active ? 1 : 0);
                $('#detail-nb-groovies').val(data.groovers.nb_groovies);
                $('#detail-level').val(data.groovers.level);
                $('#detail-name').val(data.groovers.name);
                $('#detail-firstname').val(data.groovers.firstname);
                $('#detail-city').val(data.groovers.city);
                $('#userDetailsModal').removeClass('hidden');
            }).fail(function() {
                alert('Erreur lors de la récupération des informations.');
            });
        }

        $('#userDetailsForm').on('submit', function(e) {
            e.preventDefault();
            var userId = $('#detail-user-id').val();
            $.ajax({
                url: "/admin/clients/" + userId,
                method: 'PUT',
                data: $(this).serialize(),
                success: function(data) {
                    if (data.success) {
                        location.reload();
                    }
                },
                error: function(data) {
                    alert('Erreur lors de la mise à jour des informations.');
                }
            });
        });
    </script>
@endsection
