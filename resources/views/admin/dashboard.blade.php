@extends('Layout.layoutAdmin')

@section('content')
    <div class="container mx-auto p-4">
        <h1 class="text-3xl font-bold mb-6">Dashboard Administrateur</h1>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <div class="bg-white p-6 rounded-lg shadow-md admin-card">
                <h2 class="text-xl font-bold mb-2">Nombre d'utilisateurs</h2>
                <p>{{ $userCount }}</p>
            </div>
            <div class="bg-white p-6 rounded-lg shadow-md admin-card">
                <h2 class="text-xl font-bold mb-2">Nombre de festivals</h2>
                <p>{{ $festivalCount }}</p>
            </div>
            <div class="bg-white p-6 rounded-lg shadow-md admin-card">
                <h2 class="text-xl font-bold mb-2">Nombre de partenaires</h2>
                <p>{{ $partnerCount }}</p>
            </div>
        </div>
        <div class="bg-white p-6 rounded-lg shadow-md admin-card mt-6" style="border-radius: 39px;">
            <h2 class="text-xl font-bold mb-2">Inscriptions mensuelles</h2>
            <canvas id="monthlyRegistrationsChart"></canvas>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const ctx = document.getElementById('monthlyRegistrationsChart').getContext('2d');
        const monthlyRegistrations = @json($monthlyRegistrations);
        const labels = Array.from({ length: 12 }, (_, i) => new Date(2024, i).toLocaleString('fr', { month: 'long' }));
        const data = labels.map((label, index) => monthlyRegistrations[index + 1] || 0);

        new Chart(ctx, {
            type: 'line',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Inscriptions',
                    data: data,
                    borderColor: 'rgba(75, 192, 192, 1)',
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    x: {
                        title: {
                            display: true,
                            text: 'Mois'
                        }
                    },
                    y: {
                        title: {
                            display: true,
                            text: 'Nombre d\'inscriptions'
                        }
                    }
                }
            }
        });
    </script>
@endsection
