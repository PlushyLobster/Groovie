@extends('layout.layoutAdmin')

@section('content')
    <div class="container mx-auto p-4">
        <div class="flex items-center justify-between mb-4">
            <h1 class="text-3xl font-bold">Catalogue des offres promotionnelles</h1>
            <button id="add-offer" class="bg-green-500 text-white px-4 py-2 rounded">Ajouter une Offre</button>
        </div>
        <table id="offers-table" class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
            <tr>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Partenaire
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Type
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Nom abonnement
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Description
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Condition
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Créé le
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Actions
                </th>
            </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
            @foreach($offers as $offer)
                <tr id="offer-{{ $offer->Id_offer }}">
                    <td class="px-6 py-4 whitespace-nowrap">{{ $offer->partner_name }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $offer->type }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $offer->name }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $offer->description }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $offer->condition_purchase }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $offer->created_at }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <button class="bg-blue-500 text-white px-4 py-2 rounded"
                                onclick="showOfferDetails({{ $offer->Id_offer }})">Voir Promo
                        </button>
                        <button class="bg-red-500 text-white px-4 py-2 rounded"
                                onclick="deleteOffer({{ $offer->Id_offer }})">Supprimer
                        </button>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    <!-- Modale pour ajouter une offre -->
    <div id="addOfferModal" class="hidden fixed z-10 inset-0 overflow-y-auto">
        <div class="flex items-center justify-center min-h-screen">
            <div class="bg-white p-6 rounded-lg shadow-md w-full max-w-md">
                <h2 class="text-2xl font-bold mb-4">Ajouter une offre</h2>
                <form id="addOfferForm">
                    @csrf
                    <div class="mb-4">
                        <label for="partner" class="block text-sm font-medium text-gray-700">Partenaire</label>
                        <select name="partner" id="partner"
                                class="mt-1 p-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                            @foreach($partners as $partner)
                                <option value="{{ $partner->Id_partner }}">{{ $partner->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-4">
                        <label for="type" class="block text-sm font-medium text-gray-700">Type</label>
                        <select name="type" id="type" class="mt-1 p-1 block w-full border-gray-300 rounded-md shadow-sm"
                                required>
                            @foreach($types as $type)
                                <option value="{{ $type->type }}">{{ $type->type }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-4">
                        <label for="name" class="block text-sm font-medium text-gray-700">Nom abonnement</label>
                        <input type="text" name="name" id="name"
                               class="mt-1 p-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                    </div>
                    <div class="mb-4">
                        <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                        <textarea name="description" id="description"
                                  class="mt-1 p-1 block w-full border-gray-300 rounded-md shadow-sm"
                                  required></textarea>
                    </div>
                    <div class="mb-4">
                        <label for="condition_purchase"
                               class="block text-sm font-medium text-gray-700">Condition</label>
                        <textarea name="condition_purchase" id="condition_purchase"
                                  class="mt-1 p-1 block w-full border-gray-300 rounded-md shadow-sm"
                                  required></textarea>
                    </div>
                    <div class="mb-4">
                        <label for="created_at" class="block text-sm font-medium text-gray-700">Créé le</label>
                        <input type="date" name="created_at" id="created_at"
                               class="mt-1 p-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                    </div>
                    <div class="flex justify-center">
                        <button type="submit" class="py-2 px-4 rounded bg-green-500 text-white">Ajouter</button>
                        <button type="button" class="py-2 px-4 rounded bg-gray-500 text-white ml-2"
                                onclick="closeModal()">Annuler
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modale pour afficher et modifier les détails de l'offre -->
    <div id="offerDetailsModal" class="hidden fixed z-10 inset-0 overflow-y-auto">
        <div class="flex items-center justify-center min-h-screen">
            <div class="bg-white p-6 rounded-lg shadow-md w-full max-w-md">
                <h2 class="text-2xl font-bold mb-4">Détails de l'Offre</h2>
                <form id="offerDetailsForm">
                    @csrf
                    <input type="hidden" id="detail-offer-id">
                    <div class="mb-4">
                        <label for="detail-partner" class="block text-sm font-medium text-gray-700">Partenaire</label>
                        <input type="text" id="detail-partner"
                               class="mt-1 p-1 block w-full border-gray-300 rounded-md shadow-sm" readonly>
                    </div>
                    <div class="mb-4">
                        <label for="detail-type" class="block text-sm font-medium text-gray-700">Type</label>
                        <select id="detail-type" class="mt-1 p-1 block w-full border-gray-300 rounded-md shadow-sm">
                            @foreach($types as $type)
                                <option value="{{ $type->type }}">{{ $type->type }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-4">
                        <label for="detail-name" class="block text-sm font-medium text-gray-700">Nom abonnement</label>
                        <input type="text" id="detail-name"
                               class="mt-1 p-1 block w-full border-gray-300 rounded-md shadow-sm">
                    </div>
                    <div class="mb-4">
                        <label for="detail-description"
                               class="block text-sm font-medium text-gray-700">Description</label>
                        <textarea id="detail-description"
                                  class="mt-1 p-1 block w-full border-gray-300 rounded-md shadow-sm"></textarea>
                    </div>
                    <div class="mb-4">
                        <label for="detail-condition" class="block text-sm font-medium text-gray-700">Condition</label>
                        <textarea id="detail-condition"
                                  class="mt-1 p-1 block w-full border-gray-300 rounded-md shadow-sm"></textarea>
                    </div>
                    <div class="mb-4">
                        <label for="detail-created-at" class="block text-sm font-medium text-gray-700">Créé le</label>
                        <input type="date" id="detail-created-at"
                               class="mt-1 p-1 block w-full border-gray-300 rounded-md shadow-sm">
                    </div>
                    <div class="flex justify-center">
                        <button type="button" class="py-2 px-4 rounded bg-blue-500 text-white ml-2"
                                onclick="updateOffer()">Mettre à jour
                        </button>
                        <button type="button" class="py-2 px-4 rounded bg-gray-500 text-white ml-2"
                                onclick="closeDetailModal()">Fermer
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#offers-table').DataTable({
                "language": {
                    "url": "https://cdn.datatables.net/plug-ins/1.13.5/i18n/fr-FR.json"
                },
                "pageLength": 10,
                "lengthMenu": [5, 10, 20, 50],
                "deferRender": true,
                "destroy": true,
                "columnDefs": [
                    {
                        "targets": 5, // Index de la colonne "Créé le"
                        "render": function (data, type, row) {
                            return moment(data).format('DD/MM/YYYY');
                        }
                    }
                ],
                "drawCallback": function () {
                    $('#offers-table').css("visibility", "visible");
                }
            });

            $('#add-offer').on('click', function () {
                $('#addOfferModal').removeClass('hidden');
            });

            $('#addOfferForm').on('submit', function (e) {
                e.preventDefault();
                $.ajax({
                    url: '{{ route("admin.offers.add") }}',
                    method: 'POST',
                    data: $(this).serialize(),
                    success: function (response) {
                        $('#offers-table').DataTable().row.add([
                            response.partner_name,
                            response.type,
                            response.name,
                            response.description,
                            response.condition_purchase,
                            moment(response.created_at).format('DD/MM/YYYY'),
                            '<button class="bg-blue-400 text-white px-4 py-2 rounded" onclick="showOfferDetails(' + response.Id_offer + ')">Voir Promo</button>' +
                            '<button class="bg-red-500 text-white px-4 py-2 rounded" onclick="deleteOffer(' + response.Id_offer + ')">Supprimer</button>'
                        ]).draw(false);
                        closeModal();
                        alert('Offre ajoutée avec succès !');
                    },
                    error: function (response) {
                        let errorMessage = 'Erreur lors de l\'ajout de l\'offre';
                        if (response.responseJSON && response.responseJSON.error) {
                            errorMessage = response.responseJSON.error;
                        }
                        alert(errorMessage);
                    }
                });
            });
        });

        function closeModal() {
            $('#addOfferModal').addClass('hidden');
        }

        function showOfferDetails(id) {
            $.ajax({
                url: '/admin/offers/' + id,
                method: 'GET',
                success: function (response) {
                    console.log(response); // Ajoutez cette ligne pour vérifier la réponse
                    $('#detail-offer-id').val(response.Id_offer);
                    $('#detail-partner').val(response.partner_name);
                    $('#detail-type').val(response.type);
                    $('#detail-name').val(response.name);
                    $('#detail-description').val(response.description);
                    $('#detail-condition').val(response.condition_purchase);
                    $('#detail-created-at').val(moment(response.created_at).format('YYYY-MM-DD'));
                    $('#offerDetailsModal').removeClass('hidden');
                },
                error: function (response) {
                    alert('Erreur lors de la récupération des détails de l\'offre');
                }
            });
        }

        function closeDetailModal() {
            $('#offerDetailsModal').addClass('hidden');
        }

        function updateOffer() {
            let id = $('#detail-offer-id').val();
            let data = {
                _token: '{{ csrf_token() }}',
                type: $('#detail-type').val(),
                name: $('#detail-name').val(),
                description: $('#detail-description').val(),
                condition_purchase: $('#detail-condition').val(),
                created_at: $('#detail-created-at').val()
            };

            $.ajax({
                url: '/admin/offers/' + id,
                method: 'PUT',
                data: data,
                success: function (response) {
                    let table = $('#offers-table').DataTable();
                    let row = table.row('#offer-' + id).node();
                    table.row(row).data([
                        response.partner_name,
                        response.type,
                        response.name,
                        response.description,
                        response.condition_purchase,
                        moment(response.created_at).format('DD/MM/YYYY'),
                        '<button class="bg-blue-400 text-white px-4 py-2 rounded" onclick="showOfferDetails(' + response.Id_offer + ')">Voir Promo</button>' +
                        '<button class="bg-red-500 text-white px-4 py-2 rounded" onclick="deleteOffer(' + response.Id_offer + ')">Supprimer</button>'
                    ]).draw(false);
                    closeDetailModal();
                    alert('Offre mise à jour avec succès !');
                },
                error: function (response) {
                    alert('Erreur lors de la mise à jour de l\'offre');
                }
            });
        }

        function deleteOffer(id) {
            if (confirm('Êtes-vous sûr de vouloir supprimer cette offre ?')) {
                $.ajax({
                    url: '/admin/offers/' + id,
                    method: 'DELETE',
                    data: {
                        _token: '{{ csrf_token() }}'
                    },
                    success: function (response) {
                        if (response.message) {
                            $('#offers-table').DataTable().row($('#offer-' + id)).remove().draw();
                            alert('Offre supprimée avec succès !');
                        }
                    },
                    error: function (response) {
                        alert('Erreur lors de la suppression de l\'offre');
                    }
                });
            }
        }
    </script>
@endsection
