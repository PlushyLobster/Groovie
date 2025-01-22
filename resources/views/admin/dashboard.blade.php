@extends('Layout.layoutAdmin')

@section('content')
    <div class="container mx-auto p-4">
        <h1 class="text-center text-3xl font-bold mb-6">Dashboard Administrateur</h1>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <div class="bg-[#E2FC98] p-6 rounded-lg shadow-md admin-card">
                <h2 class="text-xl font-bold mb-2">Nombre d'utilisateurs</h2>
                <p>{{ $userCount }}</p>
            </div>
            <div class="bg-[#BC96E3] p-6 rounded-lg shadow-md admin-card">
                <h2 class="text-xl font-bold mb-2">Nombre de festivals</h2>
                <p>{{ $festivalCount }}</p>
            </div>
            <div class="bg-[#57E2CA] p-6 rounded-lg shadow-md admin-card">
                <h2 class="text-xl font-bold mb-2">Nombre de partenaires</h2>
                <p>{{ $partnerCount }}</p>
            </div>
        </div>
        <div class="bg-[#DDD9DF] p-6 rounded-lg shadow-md admin-card mt-6 md:col-span-2" style="border-radius: 39px;">
            <h2 class="text-xl font-bold mb-2">Inscriptions mensuelles</h2>
            <div><canvas class="chart-container" style="position: relative; height:40vh; width:80vw" id="monthlyRegistrationsChart"></canvas></div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const ctx = document.getElementById('monthlyRegistrationsChart').getContext('2d');
            const monthlyRegistrations = @json($monthlyRegistrations);

            const labels = [];
            const data = [];

            const startDate = new Date(2024, 0); // Janvier 2024
            const endDate = new Date(); // Aujourd'hui

            for (let date = startDate; date <= endDate; date.setMonth(date.getMonth() + 1)) {
                const monthLabel = date.toLocaleString('fr', { month: 'long', year: 'numeric' });
                labels.push(monthLabel);
                const year = date.getFullYear();
                const month = date.getMonth() + 1;
                data.push(monthlyRegistrations[year] && monthlyRegistrations[year][month] ? monthlyRegistrations[year][month] : 0);
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
        });
    </script>
@endsection
