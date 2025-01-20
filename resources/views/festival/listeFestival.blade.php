@extends('layout.layoutGroover')

@section('content')
    <div>
        <p>
            test
        </p>
    </div>
@endsection

@section('scripts')

<script>
    const signInBtn = document.getElementById('signIn-btn');
    const signinDropdown = document.getElementById('signinDropdown');
    const logInBtn = document.getElementById("logIn-btn");
    const loginDropdown = document.getElementById("loginDropdown");

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

        document.addEventListener('click', (event) => {
            if (!signinDropdown.contains(event.target) && event.target !== signInBtn) {
                signinDropdown.classList.add('transition-backRight');
                setTimeout(() => {
                    signinDropdown.classList.add('hidden');
                    signinDropdown.classList.remove('transition-backRight');
                }, 800);
            }
            if (!loginDropdown.contains(event.target) && event.target !== logInBtn) {
                loginDropdown.classList.add('transition-backRight-login');
                setTimeout(() => {
                    loginDropdown.classList.add('hidden'); 
                    loginDropdown.classList.remove('transition-backRight-login');
                }, 800);
            }
        });

        // Ouvrir le dropdown si une erreur est présente
        @if(session('dropdownError'))
        signInDiv.classList.remove('hidden');
        @endif
    }
</script>

@endsection