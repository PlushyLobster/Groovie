<header class="flex justify-between items-center">
    <nav id="desktop-nav">
        <div id="left-nav">
            @include('Include.svg.logoNav')
            <div class="picto-ticket" id="ticket-open">
                <svg width="29" height="21" viewBox="0 0 29 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M13.0524 16.7474V19.6667M13.0524 1.17778V4.09708M13.0524 8.96258V11.8819M27.2889 1.17778H1.86666V7.01638C1.86666 7.01638 5.93421 7.01638 5.93421 10.4222C5.93421 13.8281 1.86666 13.8281 1.86666 13.8281V19.6667H27.2889V13.8281C27.2889 13.8281 23.2213 13.8281 23.2213 10.4222C23.2213 7.01638 27.2889 7.01638 27.2889 7.01638V1.17778Z"
                        stroke="#000B58" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </div>
        </div>

        <div id="ticketDropdown" class="hidden">
            <div id="ticket-header">
                <div id="ticket-title">
                    <div class="picto-ticket">
                        <svg width="29" height="21" viewBox="0 0 29 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M13.0524 16.7474V19.6667M13.0524 1.17778V4.09708M13.0524 8.96258V11.8819M27.2889 1.17778H1.86666V7.01638C1.86666 7.01638 5.93421 7.01638 5.93421 10.4222C5.93421 13.8281 1.86666 13.8281 1.86666 13.8281V19.6667H27.2889V13.8281C27.2889 13.8281 23.2213 13.8281 23.2213 10.4222C23.2213 7.01638 27.2889 7.01638 27.2889 7.01638V1.17778Z"
                                stroke="#000B58" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </div>
                    <h3>Informations billet :</h3>
                </div>
                <div id="ticket-close">
                    <svg width="20" height="20" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M13 1L1 13M1 1L13 13" stroke="#000B58" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </div>
            </div>

            <form id="ticket-form" method="POST">
                @method('POST')
                @csrf
                <div class="ticket-div">
                    <input type="text" id="ticket-code" name="ticket-code" placeholder="Code billet" required>
                    @error('ticket-code')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <div class="dateScan-div">
                    <div class="ticket-div">
                        <input type="text" id="ticket-date" name="ticket-date" placeholder="Date" required>
                        @error('ticket-date')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                        
                    <div class="ticket-div">
                        <input type="text" id="ticket-scan" name="scan" placeholder="Scan">
                    </div>
                </div>
                    
                <div class="ticket-div">
                    <input type="password" id="ticket-password" name="ticket-password" placeholder="Mot de passe" required>
                    @error('ticket-password')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <button type="submit" class="ticketBtn">
                    Confirmer l'inscription
                    <span>
                        <svg width="19" height="15" viewBox="0 0 19 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M2 7.09985L7.625 12.5999L17 1.59985" stroke="#9747FF" stroke-width="3"
                                stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </span>
                </button>
            </form>       
        </div>

        <div id="right-nav">
            @auth()
                {{--<a href="{{ route('dashboard') }}" class="logs-btn">Mon compte</a>--}}
                <form action="{{ route('logout') }}" method="post">
                    @method('POST')
                    @csrf
                    <button class="logs-btn" id="logIn-btn">Se déconnecter</button>
                </form>
            @endauth
            @guest()
                <button class="logs-btn" id="logIn-btn">Se connecter</button>

                <button class="logs-btn" id="signIn-btn">Créer un compte</button>
            @endguest
            <div id="notif-btn">
                <svg width="22" height="26" viewBox="0 0 22 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M3.5 21.4V10.6C3.5 8.69043 4.29018 6.85909 5.6967 5.50883C7.10322 4.15856 9.01088 3.39999 11 3.39999C12.9891 3.39999 14.8968 4.15856 16.3033 5.50883C17.7098 6.85909 18.5 8.69043 18.5 10.6V21.4M3.5 21.4H18.5M3.5 21.4H1M18.5 21.4H21M9.75 25H12.25"
                        stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    <path
                        d="M11 3.4C11.6904 3.4 12.25 2.86274 12.25 2.2C12.25 1.53726 11.6904 1 11 1C10.3096 1 9.75 1.53726 9.75 2.2C9.75 2.86274 10.3096 3.4 11 3.4Z"
                        stroke="white" stroke-width="2"/>
                </svg>
            </div>
        </div>

        <div id="signinDropdown" class="hidden">
            <div class="signin-logo">
                <div id="signin-close">
                    <svg width="20" height="20" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M13 1L1 13M1 1L13 13" stroke="#000B58" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </div>
                <div class="signin-logoSvg">
                    @include('Include.svg.logoAuth')   
                </div>
            </div>
            <form action="{{route('register')}}" method="POST">
                @method('POST')
                @csrf
                <div class="nameDiv">
                    <div class="signin-div">
                        <input type="text" id="signin-name" name="signin-name" placeholder="Nom" required>
                        @error('signin-name')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="signin-div">
                        <input type="text" id="signin-firstname" name="signin-firstname" placeholder="Prénom" required>
                        @error('signin-firstname')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="signin-div">
                    <input type="email" id="signin-email" name="signin-email" placeholder="Adresse email" required>
                    @error('signin-email')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
                <div class="signin-div">
                    <input type="text" id="signin-city" name="signin-city" placeholder="Ville" required>
                    @error('signin-city')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
                <div class="signin-div">
                    <input type="password" id="signin-password" name="signin-password" placeholder="Mot de passe" required>
                    @error('signin-password')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
                <div class="signin-div">
                    <input type="password" id="signin-password" name="signin-password" placeholder="Mot de passe oublié" required>
                    @error('signin-password')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <button type="submit" class="signinBtn">
                    Confirmer l'inscription
                    <span>
                        <svg width="19" height="15" viewBox="0 0 19 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M2 7.09985L7.625 12.5999L17 1.59985" stroke="#9747FF" stroke-width="3"
                                  stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </span>
                </button>
                <p id="signin-cgu">
                    En validant votre inscription vous acceptez <br> <a href="#">la Politique de confidentialité</a> et
                    les <br> <a href="#">Conditions Générales d’utilisation</a> de Groovie.
                </p>
            </form>
        </div>


        <!-- Dropdown Connexion -->
        <div id="loginDropdown" class="hidden">
            <div class="login-logo">
                <div id="login-close">
                    <svg width="20" height="20" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M13 1L1 13M1 1L13 13" stroke="#000B58" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </div>
                <div class="login-logoSvg">
                    @include('Include.svg.logoAuth')     
                </div>
            </div>

            <form action="{{route('login')}}" method="POST">
                @method('POST')
                @csrf
                @error('login-error')
                    <div class="login-error">
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    </div>
                @enderror
                @error('login-email')
                    <div class="login-error">
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    </div>
                @enderror
                <div class="login-div">
                    <input type="text" name="login-email" id="login-email" placeholder="Email">
                </div>

                <div class="login-div">
                    <input type="password" name="login-password" id="login-password" placeholder="Mot de passe">
                </div>
                <div class="signin-forgot">
                    <a href="#" class="text-indigo-700 underline" id="openResetModal">Mot De Passe Oublié ?</a>
                </div>
                <button type="submit" class="loginBtn">
                    Connexion
                    <span>
                        <svg width="19" height="15" viewBox="0 0 19 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M2 7.5L7.625 13L17 2" stroke="white" stroke-width="3" stroke-linecap="round"
                                  stroke-linejoin="round"/>
                        </svg>
                    </span>
                </button>
                <p class="login-signin">
                    Pas encore de compte ? <br> <a href="#" class="underline">Inscrivez-vous</a>
                </p>
            </form>
        </div>
        <!-- Modal de réinitialisation de mot de passe -->
        <modal id="resetPasswordModal" class="hidden fixed inset-0 bg-gray-600 bg-opacity-50 flex items-center justify-center" style="z-index: 9999;">
            <div class="bg-white p-6 rounded-lg shadow-lg">
                <h2 class="text-xl font-bold mb-4" id="modalTitle">Réinitialiser le mot de passe</h2>
                <form id="resetPasswordForm">
                    @csrf
                    <!-- Étape 1 : Email -->
                    <div id="emailStep">
                        <div class="mb-4">
                            <label for="reset-email" class="block text-sm font-medium text-gray-700">Adresse email</label>
                            <input id="reset-email" type="email" name="email" placeholder="Entrez votre email" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm" required>
                            @error('email')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="flex justify-end">
                            <button type="button" class="mr-2 bg-gray-500 text-white px-4 py-2 rounded" id="closeResetModal">Annuler</button>
                            <button type="button" class="bg-indigo-600 text-white px-4 py-2 rounded" id="sendResetLink">Envoyer le lien</button>
                        </div>
                    </div>

                    <!-- Étape 2 : Code de vérification -->
                    <div id="codeStep" class="hidden">
                        <div class="mb-4">
                            <label for="reset-code" class="block text-sm font-medium text-gray-700">Code de vérification</label>
                            <input id="reset-code" type="text" name="code" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm">
                        </div>
                        <div class="flex justify-end">
                            <button type="button" class="mr-2 bg-gray-500 text-white px-4 py-2 rounded" id="backToEmailStep">Retour</button>
                            <button type="button" class="bg-indigo-600 text-white px-4 py-2 rounded" id="verifyCode">Vérifier le code</button>
                        </div>
                    </div>

                    <!-- Étape 3 : Nouveau mot de passe -->
                    <div id="passwordStep" class="hidden">
                        <div class="mb-4">
                            <label for="new-password" class="block text-sm font-medium text-gray-700">Nouveau mot de passe</label>
                            <input id="new-password" type="password" name="password" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm">
                        </div>
                        <div class="mb-4">
                            <label for="confirm-password" class="block text-sm font-medium text-gray-700">Confirmer le mot de passe</label>
                            <input id="confirm-password" type="password" name="password_confirmation" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm">
                        </div>
                        <div class="flex justify-end">
                            <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded">Réinitialiser le mot de passe</button>
                        </div>
                    </div>
                </form>
            </div>
        </modal>

    </nav>
</header>

