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
        <!-- Utilisation d'une image à la place du SVG avec une taille plus grande -->
        <img src="{{ asset('storage/images/Logo.png') }}" alt="Logo" class="w-16 h-16 bg-blue-900 rounded-full">

        <!-- Inclusion directe du contenu SVG dans le HTML -->
        <svg class="w-10 h-10 text-blue-900 bg-green-300 rounded-full" width="52" height="52" viewBox="0 0 52 52" fill="none" xmlns="http://www.w3.org/2000/svg">
            <g id="Group 508">
                <circle id="Ellipse 161" cx="26" cy="26" r="26" fill="#63FF9C"/>
                <path id="Vector" d="M25.0525 31.7473V34.6666M25.0525 16.1777V19.097M25.0525 23.9625V26.8818M39.2889 16.1777H13.8667V22.0163C13.8667 22.0163 17.9343 22.0163 17.9343 25.4222C17.9343 28.828 13.8667 28.828 13.8667 28.828V34.6666H39.2889V28.828C39.2889 28.828 35.2214 28.828 35.2214 25.4222C35.2214 22.0163 39.2889 22.0163 39.2889 22.0163V16.1777Z" stroke="#000B58" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            </g>
        </svg>
    </div>
    <div class="space-x-4">
        <button id="openLoginDropdownButton" class="bg-blue-900 text-white py-2 px-4 rounded">Se connecter</button>
        <button id="toggleDropdownButton" class="bg-pink-500 text-white py-2 px-4 rounded">Créer un compte</button>

        <!-- Dropdown -->
        <div id="dropdownMenu" class="absolute bg-lime-200 border rounded-lg shadow-lg p-6 w-80 mt-2 hidden z-10 right-0">
            <div class="flex justify-between items-center mb-4">
                <div class="w-12 h-12 bg-indigo-900 rounded-full flex items-center justify-center">
                    <span class="text-white font-bold text-xl">G</span>
                </div>
                <button id="closeDropdownButton" class="text-indigo-900 text-xl font-bold">×</button>
            </div>
            <form>
                <div class="mb-4">
                    <label for="dropdown-name" class="sr-only">Nom</label>
                    <div class="relative">
                        <input type="text" id="dropdown-name" placeholder="Nom" class="w-full p-3 bg-lime-100 rounded-md placeholder-gray-700 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                    </div>
                </div>
                <div class="mb-4">
                    <label for="dropdown-firstname" class="sr-only">Nom</label>
                    <div class="relative">
                        <input type="text" id="dropdown-name" placeholder="Prénom" class="w-full p-3 bg-lime-100 rounded-md placeholder-gray-700 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                    </div>
                </div>
                <div class="mb-4">
                    <label for="dropdown-email" class="sr-only">Adresse email</label>
                    <div class="relative">
                        <input type="email" id="dropdown-email" placeholder="Adresse email" class="w-full p-3 bg-lime-100 rounded-md placeholder-gray-700 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                    </div>
                </div>
                <div class="mb-4">
                    <label for="dropdown-city" class="sr-only">Ville</label>
                    <div class="relative">
                        <input type="text" id="dropdown-city" placeholder="Ville" class="w-full p-3 bg-lime-100 rounded-md placeholder-gray-700 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                    </div>
                </div>
                <div class="mb-4">
                    <label for="dropdown-password" class="sr-only">Mot de passe</label>
                    <div class="relative">
                        <input type="password" id="dropdown-password" placeholder="Mot de passe" class="w-full p-3 bg-lime-100 rounded-md placeholder-gray-700 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                    </div>
                </div>
                <div class="flex justify-center">
                    <button type="submit" class="w-full bg-indigo-500 text-white font-bold py-3 px-6 rounded-lg flex items-center justify-center space-x-2">
                        <span>Confirmer l'inscription</span>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14M12 5l7 7-7 7" />
                        </svg>
                    </button>
                </div>
                <p class="text-xs text-center mt-4 text-indigo-900">
                    En validant votre inscription, vous acceptez la <a href="#" class="underline">Politique de confidentialité</a> et les <a href="#" class="underline">Conditions générales</a>.
                </p>
            </form>
        </div>
        <!-- Dropdown Connexion -->
        <div id="loginDropdown" class="absolute bg-lime-200 border rounded-lg shadow-lg p-6 w-80 mt-2 hidden z-10 right-0">
            <div class="flex justify-between items-center mb-4">
                <div class="w-12 h-12 bg-indigo-900 rounded-full flex items-center justify-center">
                    <span class="text-white font-bold text-xl">G</span>
                </div>
                <button id="closeLoginDropdown" class="text-indigo-900 text-xl font-bold">×</button>
            </div>
            <form>
                <div class="mb-4">
                    <label for="login-identifier" class="sr-only">Identifiant</label>
                    <div class="relative">
                        <input type="text" id="login-identifier" placeholder="Identifiant" class="w-full p-3 bg-lime-100 rounded-md placeholder-gray-700 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                    </div>
                </div>
                <div class="mb-4">
                    <label for="login-password" class="sr-only">Mot de passe</label>
                    <div class="relative">
                        <input type="password" id="login-password" placeholder="Mot de passe" class="w-full p-3 bg-lime-100 rounded-md placeholder-gray-700 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                    </div>
                </div>
                <div class="flex justify-end text-sm mb-4">
                    <a href="#" class="text-indigo-700 underline">Mot de passe oublié ?</a>
                </div>
                <div class="flex justify-center">
                    <button type="submit" class="w-full bg-indigo-900 text-white font-bold py-3 px-6 rounded-lg flex items-center justify-center space-x-2">
                        <span>Connexion</span>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-pink-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14M12 5l7 7-7 7" />
                        </svg>
                    </button>
                </div>
                <p class="text-xs text-center mt-4 text-indigo-900">
                    Pas encore de compte ? <a href="#" class="underline">Inscrivez-vous</a>.
                </p>
            </form>
        </div>
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
    // Gestion du dropdown principal (toggleDropdownButton)
    const toggleDropdownButton = document.getElementById('toggleDropdownButton');
    const dropdownMenu = document.getElementById('dropdownMenu');
    const openButton = document.getElementById("openLoginDropdownButton");
    const loginDropdown = document.getElementById("loginDropdown");

    if (toggleDropdownButton && dropdownMenu && openButton && loginDropdown) {
        toggleDropdownButton.addEventListener('click', (event) => {
            event.stopPropagation(); // Empêche le clic de remonter
            loginDropdown.classList.add('hidden'); // Masque le dropdown de connexion
            dropdownMenu.classList.toggle('hidden'); // Affiche ou masque le menu d'inscription
        });

        openButton.addEventListener("click", (event) => {
            event.stopPropagation(); // Empêche le clic de remonter
            dropdownMenu.classList.add('hidden'); // Masque le menu d'inscription
            loginDropdown.classList.toggle("hidden"); // Affiche ou masque le dropdown de connexion
        });

        document.addEventListener('click', (event) => {
            if (!dropdownMenu.contains(event.target) && event.target !== toggleDropdownButton) {
                dropdownMenu.classList.add('hidden'); // Masque le menu d'inscription si clic en dehors
            }
            if (!loginDropdown.contains(event.target) && event.target !== openButton) {
                loginDropdown.classList.add('hidden'); // Masque le dropdown de connexion si clic en dehors
            }
        });

        // Ouvrir le dropdown si une erreur est présente
        @if(session('dropdownError'))
        dropdownMenu.classList.remove('hidden');
        @endif
    }
</script>
</body>
</html>
