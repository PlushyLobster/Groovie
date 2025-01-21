@extends('layout.layoutGroover')

@section('content')
<body>
    <main id="festival-main">
        <div id="festival-left">
            <div id="fest-title">
                <div id="fest-titleLeft">
                    <div class="festival-picto">
                        <svg width="24" height="28" viewBox="0 0 24 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M1.17676 9.94113H22.8238M1.17676 9.94113V21.847C1.17676 23.3623 1.17676 24.12 1.4717 24.699C1.73112 25.2081 2.14505 25.6221 2.65417 25.8815C3.23188 26.1764 3.98952 26.1764 5.50211 26.1764H18.4998C20.0124 26.1764 20.7687 26.1764 21.3464 25.8815C21.8551 25.6217 22.2691 25.2077 22.5289 24.699C22.8238 24.12 22.8238 23.365 22.8238 21.8524V9.94113M1.17676 9.94113V8.85878C1.17676 7.34349 1.17676 6.58584 1.4717 6.00678C1.73146 5.49672 2.14411 5.08407 2.65417 4.82431C3.23323 4.52937 3.99088 4.52937 5.50617 4.52937H6.58852M22.8238 9.94113V8.85472C22.8238 7.34213 22.8238 6.58449 22.5289 6.00678C22.2695 5.49766 21.8555 5.08373 21.3464 4.82431C20.7673 4.52937 20.0097 4.52937 18.4944 4.52937H17.4121M6.58852 4.52937H17.4121M6.58852 4.52937V1.82349M17.4121 4.52937V1.82349M15.3826 18.0588H12.0003M12.0003 18.0588H8.61793M12.0003 18.0588V14.6764M12.0003 18.0588V21.4411" stroke="#000B58" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </div>
                    <h2>Tout les festivals</h2>
                </div>
                <div id="fest-searchDiv">
                    <div class="fest-searchBar">
                        <input type="text" name="search-fest" id="fest-searchInput" placeholder="Rechercher un festival" autocomplete="off">
                        <button type="submit" id="fest-searchBtn">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M22.1333 24L13.7333 15.6C13.0667 16.1333 12.3 16.5556 11.4333 16.8667C10.5667 17.1778 9.64445 17.3333 8.66667 17.3333C6.24445 17.3333 4.19467 16.4942 2.51733 14.816C0.840001 13.1378 0.000889594 11.088 7.05467e-07 8.66667C-0.000888183 6.24533 0.838223 4.19556 2.51733 2.51733C4.19645 0.839111 6.24622 0 8.66667 0C11.0871 0 13.1373 0.839111 14.8173 2.51733C16.4973 4.19556 17.336 6.24533 17.3333 8.66667C17.3333 9.64444 17.1778 10.5667 16.8667 11.4333C16.5556 12.3 16.1333 13.0667 15.6 13.7333L24 22.1333L22.1333 24ZM8.66667 14.6667C10.3333 14.6667 11.7502 14.0836 12.9173 12.9173C14.0844 11.7511 14.6676 10.3342 14.6667 8.66667C14.6658 6.99911 14.0827 5.58267 12.9173 4.41733C11.752 3.252 10.3351 2.66844 8.66667 2.66667C6.99822 2.66489 5.58178 3.24844 4.41733 4.41733C3.25289 5.58622 2.66933 7.00267 2.66667 8.66667C2.664 10.3307 3.24756 11.7476 4.41733 12.9173C5.58711 14.0871 7.00356 14.6702 8.66667 14.6667Z" fill="#1E1E1E"/>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>

            <div class="fest-cate" id="fest-proximite">
                <div class="fest-cateTitle">
                    <p>À proximité</p>
                    <p>Voir plus</p>  
                </div>
                <div class="fest-cateSlider">
                    <div class="fest-card">
                        <div class="fest-cardTitle">
                            <p class="fest-cardName">Terres du son</p>
                            <p class="fest-cardDate">Du 1er au 4 juillet</p>
                        </div>
                        <div class="fest-cardImage">
                        </div>
                    </div>

                    <div class="fest-card">
                        <div class="fest-cardTitle">
                            <p class="fest-cardName">Terres du son</p>
                            <p class="fest-cardDate">Du 1er au 4 juillet</p>
                        </div>
                        <div class="fest-cardImage">
                        </div>
                    </div>

                    <div class="fest-card">
                        <div class="fest-cardTitle">
                            <p class="fest-cardName">Terres du son</p>
                            <p class="fest-cardDate">Du 1er au 4 juillet</p>
                        </div>
                        <div class="fest-cardImage">
                        </div>
                    </div>

                    <div class="fest-card">
                        <div class="fest-cardTitle">
                            <p class="fest-cardName">Terres du son</p>
                            <p class="fest-cardDate">Du 1er au 4 juillet</p>
                        </div>
                        <div class="fest-cardImage">
                        </div>
                    </div>

                    <div class="fest-card">
                        <div class="fest-cardTitle">
                            <p class="fest-cardName">Terres du son</p>
                            <p class="fest-cardDate">Du 1er au 4 juillet</p>
                        </div>
                        <div class="fest-cardImage">
                        </div>
                    </div>
                </div>
                <hr>
            </div>

            <div class="fest-cate" id="fest-populaire">
                <div class="fest-cateTitle">
                    <p>Les plus populaires</p>
                    <p>Voir plus</p>  
                </div>
                <div class="fest-cateSlider">
                    <div class="fest-card">
                        <div class="fest-cardTitle">
                            <p class="fest-cardName">Terres du son</p>
                            <p class="fest-cardDate">Du 1er au 4 juillet</p>
                        </div>
                        <div class="fest-cardImage">
                        </div>
                    </div>

                    <div class="fest-card">
                        <div class="fest-cardTitle">
                            <p class="fest-cardName">Terres du son</p>
                            <p class="fest-cardDate">Du 1er au 4 juillet</p>
                        </div>
                        <div class="fest-cardImage">
                        </div>
                    </div>

                    <div class="fest-card">
                        <div class="fest-cardTitle">
                            <p class="fest-cardName">Terres du son</p>
                            <p class="fest-cardDate">Du 1er au 4 juillet</p>
                        </div>
                        <div class="fest-cardImage">
                        </div>
                    </div>

                    <div class="fest-card">
                        <div class="fest-cardTitle">
                            <p class="fest-cardName">Terres du son</p>
                            <p class="fest-cardDate">Du 1er au 4 juillet</p>
                        </div>
                        <div class="fest-cardImage">
                        </div>
                    </div>

                    <div class="fest-card">
                        <div class="fest-cardTitle">
                            <p class="fest-cardName">Terres du son</p>
                            <p class="fest-cardDate">Du 1er au 4 juillet</p>
                        </div>
                        <div class="fest-cardImage">
                        </div>
                    </div>
                </div>              
                <hr>
            </div>

            <div class="fest-cate" id="fest-nouveaute">
                <div class="fest-cateTitle">
                    <p>Nouveautés</p>
                    <p>Voir plus</p>  
                </div>
                <div class="fest-cateSlider">
                    <div class="fest-card">
                        <div class="fest-cardTitle">
                            <p class="fest-cardName">Terres du son</p>
                            <p class="fest-cardDate">Du 1er au 4 juillet</p>
                        </div>
                        <div class="fest-cardImage">
                        </div>
                    </div>
                    
                    <div class="fest-card">
                        <div class="fest-cardTitle">
                            <p class="fest-cardName">Terres du son</p>
                            <p class="fest-cardDate">Du 1er au 4 juillet</p>
                        </div>
                        <div class="fest-cardImage">
                        </div>
                    </div>

                    <div class="fest-card">
                        <div class="fest-cardTitle">
                            <p class="fest-cardName">Terres du son</p>
                            <p class="fest-cardDate">Du 1er au 4 juillet</p>
                        </div>
                        <div class="fest-cardImage">
                        </div>
                    </div>

                    <div class="fest-card">
                        <div class="fest-cardTitle">
                            <p class="fest-cardName">Terres du son</p>
                            <p class="fest-cardDate">Du 1er au 4 juillet</p>
                        </div>
                        <div class="fest-cardImage">
                        </div>
                    </div>

                    <div class="fest-card">
                        <div class="fest-cardTitle">
                            <p class="fest-cardName">Terres du son</p>
                            <p class="fest-cardDate">Du 1er au 4 juillet</p>
                        </div>
                        <div class="fest-cardImage">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="festival-right">
        </div>
    </main>
</body>
@endsection

@section('scripts')

<script>
    const signInBtn = document.getElementById('signIn-btn');
    const signinDropdown = document.getElementById('signinDropdown');
    const logInBtn = document.getElementById("logIn-btn");
    const loginDropdown = document.getElementById("loginDropdown");
    const loginClose = document.getElementById('login-close');
    const signinClose = document.getElementById('signin-close');

    if (signInBtn && signinDropdown && logInBtn && loginDropdown) {
        signInBtn.addEventListener('click', (event) => {
            event.stopPropagation();
            loginDropdown.classList.add('hidden');
            signinDropdown.classList.remove('hidden');
            signinDropdown.classList.add('flex');
            signinDropdown.classList.add('transition-right');
        });

        logInBtn.addEventListener("click", (event) => {
            event.stopPropagation();
            signinDropdown.classList.add('hidden');
            loginDropdown.classList.remove("hidden");
            loginDropdown.classList.add("flex");
            loginDropdown.classList.add("transition-right-login");
        });

        loginClose.addEventListener('click', (event) => {
            event.stopPropagation();
            loginDropdown.classList.add('transition-backRight-login');
            setTimeout(() => {
                loginDropdown.classList.add('hidden');
                loginDropdown.classList.remove('transition-backRight-login');
            }, 800);
        });

        signinClose.addEventListener('click', (event) => {
            event.stopPropagation();
            signinDropdown.classList.add('transition-backRight');
            setTimeout(() => {
                signinDropdown.classList.add('hidden');
                signinDropdown.classList.remove('transition-backRight');
            }, 800);
        });

        // Ouvrir le dropdown si une erreur est présente
        @if(session('dropdownError'))
        signInDiv.classList.remove('hidden');
        @endif
    }
</script>

@endsection