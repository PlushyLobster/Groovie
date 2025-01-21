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

        // Générer les labels des mois à partir de janvier 2024 jusqu'à aujourd'hui
        const startDate = new Date(2024, 0); // Janvier 2024
        const endDate = new Date(); // Aujourd'hui
        const labels = [];
        const data = [];

        for (let date = startDate; date <= endDate; date.setMonth(date.getMonth() + 1)) {
            const monthLabel = date.toLocaleString('fr', { month: 'long', year: 'numeric' });
            labels.push(monthLabel);
            const monthIndex = date.getMonth() + 1;
            data.push(monthlyRegistrations[monthIndex] || 0);
        }

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
