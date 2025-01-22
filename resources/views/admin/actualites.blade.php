@extends('Layout.layoutAdmin')

@section('content')
    <div class="container mx-auto p-4">
        <h1 class="text-3xl font-bold mb-6">Mise à jour des actualités</h1>

        <!-- Section: Carte Nouveautés -->
        <div class="bg-white p-6 rounded-lg shadow-md mt-6">
            <h2 class="text-2xl font-bold mb-4">Nouveautés</h2>
            <p class="text-gray-700">Découvrez les dernières nouveautés et mises à jour de notre plateforme.</p>
        </div>

        <!-- Section: Liste des actualités -->
        <div class="bg-white p-6 rounded-lg shadow-md mt-6">
            <h2 class="text-2xl font-bold mb-4">Liste des actualités</h2>
            <table id="actualites-table" class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                <tr>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Titre</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                <!-- Les articles seront insérés ici via JavaScript -->
                </tbody>
            </table>
        </div>

        <!-- Section: Formulaire d'ajout/modification -->
        <div class="bg-white p-4 rounded-lg shadow-md mt-6 max-w-md mx-auto">
            <h2 class="text-2xl font-bold mb-4">Ajouter/Modifier une actualité</h2>
            <form id="actualite-form">
                <div class="mb-4">
                    <label for="title" class="block text-sm font-medium text-gray-700">Titre</label>
                    <input type="text" id="title" name="title" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                </div>
                <div class="mb-4">
                    <label for="content" class="block text-sm font-medium text-gray-700">Contenu</label>
                    <textarea id="content" name="content" rows="4" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm"></textarea>
                </div>
                <div class="mb-4">
                    <label for="date" class="block text-sm font-medium text-gray-700">Date</label>
                    <input type="date" id="date" name="date" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                </div>
                <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded">Enregistrer</button>
            </form>
        </div>
    </div>

    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap4.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap4.min.js"></script>
    <script>
        $(document).ready(function() {
            // Initialiser DataTable
            $('#actualites-table').DataTable({
                "language": {
                    "url": "https://cdn.datatables.net/plug-ins/1.13.5/i18n/fr-FR.json"
                },
                "pageLength": 10,
                "lengthMenu": [5, 10, 20, 50],
                "deferRender": true,
                "destroy": true,
                "drawCallback": function() {
                    $('#actualites-table').css("visibility", "visible");
                }
            });

            // Charger les actualités via API
            function loadActualites() {
                $.ajax({
                    url: '/api/actualites',
                    method: 'GET',
                    success: function(data) {
                        var table = $('#actualites-table').DataTable();
                        table.clear();
                        data.forEach(function(actualite) {
                            table.row.add([
                                actualite.title,
                                actualite.date,
                                '<button class="bg-orange-400 text-white px-4 py-2 rounded" onclick="editActualite(' + actualite.id + ')">Modifier</button>' +
                                '<button class="bg-red-500 text-white px-4 py-2 rounded" onclick="deleteActualite(' + actualite.id + ')">Supprimer</button>'
                            ]).draw(false);
                        });
                    }
                });
            }

            // Appeler la fonction pour charger les actualités
            loadActualites();

            // Formulaire d'ajout/modification
            $('#actualite-form').on('submit', function(e) {
                e.preventDefault();
                var formData = $(this).serialize();
                $.ajax({
                    url: '/api/actualites',
                    method: 'POST',
                    data: formData,
                    success: function() {
                        loadActualites();
                        alert('Actualité enregistrée avec succès !');
                    },
                    error: function() {
                        alert('Erreur lors de l\'enregistrement de l\'actualité');
                    }
                });
            });
        });

        function editActualite(id) {
            // Charger les données de l'actualité et les remplir dans le formulaire
        }

        function deleteActualite(id) {
            if (confirm('Êtes-vous sûr de vouloir supprimer cette actualité ?')) {
                $.ajax({
                    url: '/api/actualites/' + id,
                    method: 'DELETE',
                    success: function() {
                        loadActualites();
                        alert('Actualité supprimée avec succès !');
                    },
                    error: function() {
                        alert('Erreur lors de la suppression de l\'actualité');
                    }
                });
            }
        }
    </script>
@endsection
