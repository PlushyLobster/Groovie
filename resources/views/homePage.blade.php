<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Concept Page</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .collapsed {
            height: 100px; /* Ajustez cette valeur selon vos besoins */
            overflow: hidden;
        }
        .expanded {
            height: calc(100% - 40px); /* Ajustez cette valeur selon vos besoins */
        }
    </style>
</head>
<body class="bg-white h-screen grid grid-rows-[auto_1fr_auto]">
<!-- Header -->
<header class="flex justify-between items-center p-4">
    <div class="flex items-center space-x-2">
        <div class="bg-blue-900 text-white w-10 h-10 flex items-center justify-center font-bold rounded-full">G</div>
        <div class="bg-green-300 text-blue-900 w-10 h-10 flex items-center justify-center font-bold rounded-full">🎟️</div>
    </div>
    <div class="space-x-4">
        <button class="bg-blue-900 text-white py-2 px-4 rounded">Se connecter</button>
        <button class="bg-pink-500 text-white py-2 px-4 rounded">Créer un compte</button>
    </div>
</header>

<!-- Main Content -->
<main class="grid grid-cols-3 gap-4 p-6">
    <!-- Concept Section -->
    <section class="col-span-2 bg-blue-900 text-white p-6 rounded-lg h-full">
        <h1 class="text-2xl font-bold">Concept</h1>
    </section>

    <!-- Latest News Section -->
    <section id="news-section" class="bg-lime-200 p-6 rounded-lg relative expanded">
        <h2 id="news-title" class="text-blue-900 text-xl font-bold flex items-center space-x-2 cursor-pointer">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21l-7-5-7 5V5a2 2 0 012-2h10a2 2 0 012 2z" />
            </svg>
            <span>Dernières actualités</span>
        </h2>
        <div class="grid grid-cols-2 gap-4 mt-4">
            <div class="bg-gray-300 h-20 rounded"></div>
            <div class="bg-gray-300 h-20 rounded"></div>
            <div class="bg-gray-300 h-20 rounded"></div>
            <div class="bg-gray-300 h-20 rounded"></div>
            <div class="bg-gray-300 h-20 rounded"></div>
            <div class="bg-gray-300 h-20 rounded"></div>
        </div>
        <div class="bg-pink-300 p-4 rounded-lg mt-6 absolute bottom-[-40px] left-0 w-full flex justify-between items-center shadow-lg">
            <div class="text-blue-900 font-bold flex items-center space-x-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14M12 5l7 7-7 7" />
                </svg>
                <span>Liste des festivals</span>
            </div>
            <button id="festivals-button" class="bg-white p-2 rounded-full">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-900" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14m7-7l-7 7-7 7" />
                </svg>
            </button>
        </div>
    </section>
</main>

<!-- Footer -->
<footer class="bg-gray-800 text-white text-center py-4">
    <p>&copy; 2025 Concept Page. Tous droits réservés.</p>
</footer>

<script>
    document.getElementById('festivals-button').addEventListener('click', function() {
        document.getElementById('news-section').classList.toggle('collapsed');
        document.getElementById('news-section').classList.toggle('expanded');
        document.getElementById('festivals-section').classList.toggle('collapsed');
        document.getElementById('festivals-section').classList.toggle('expanded');
    });

    document.getElementById('news-title').addEventListener('click', function() {
        document.getElementById('news-section').classList.toggle('collapsed');
        document.getElementById('news-section').classList.toggle('expanded');
        document.getElementById('festivals-section').classList.toggle('collapsed');
        document.getElementById('festivals-section').classList.toggle('expanded');
    });
</script>
</body>
</html>
