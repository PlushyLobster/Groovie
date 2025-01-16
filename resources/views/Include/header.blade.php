<header class="flex justify-between items-center p-4">
    <div class="flex items-center space-x-2">
        <!-- Utilisation d'une image à la place du SVG avec une taille plus grande -->
        <img src="{{ asset('storage/images/Logo.png') }}" alt="Logo" class="w-16 h-16 bg-blue-900 rounded-full">

        <!-- Inclusion directe du contenu SVG dans le HTML -->
        <svg class="w-10 h-10 text-blue-900 bg-green-300 rounded-full" width="52" height="52" viewBox="0 0 52 52" fill="none" xmlns="http://www.w3.org/2000/svg">
            <g id="Group 508">
                w      <circle id="Ellipse 161" cx="26" cy="26" r="26" fill="#63FF9C"/>
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
