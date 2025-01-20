<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex">
<aside class="w-64 bg-blue-900 text-white h-screen p-4">
    <div class="flex items-center space-x-2 mb-6">
        <!-- svg à rajouter ici -->
        <span class="text-2xl font-bold">Admin</span>
    </div>
    <nav>
        <ul>
            <li class="mb-4">
                <a href="{{ route('admin.dashboard') }}" class="block py-2 px-4 rounded hover:bg-blue-700">Dashboard</a>
            </li>
            <li class="mb-4">
                <a href="{{ route('admin.clients') }}" class="block py-2 px-4 rounded hover:bg-blue-700">Gestion des comptes clients</a>
            </li>
            <li class="mb-4">
                <a href="{{ route('admin.transactions') }}" class="block py-2 px-4 rounded hover:bg-blue-700">Surveillance des transactions</a>
            </li>
            <li class="mb-4">
                <a href="{{ route('admin.festivals') }}" class="block py-2 px-4 rounded hover:bg-blue-700">Gestion des festivals</a>
            </li>
            <li class="mb-4">
                <a href="{{ route('admin.promotions') }}" class="block py-2 px-4 rounded hover:bg-blue-700">Gestion des offres promo</a>
            </li>
            <li class="mb-4">
                <a href="{{ route('admin.actualites') }}" class="block py-2 px-4 rounded hover:bg-blue-700">Mise à jour des actualités</a>
            </li>
        </ul>
    </nav>
</aside>
<main class="flex-1 p-4">
    @yield('content')
</main>
</body>
</html>
