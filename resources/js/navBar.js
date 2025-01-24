const ticketDropdown = document.getElementById("ticketDropdown");
const ticketOpen = document.getElementById('ticket-open');
const ticketClose = document.getElementById('ticket-close');
const scanOpen = document.getElementById('ticket-scan')
const scanDiv = document.getElementById('ticket-scanDiv')

if (ticketOpen && ticketDropdown) {

    ticketOpen.addEventListener("click", (event) => {
        event.stopPropagation();
        ticketDropdown.classList.remove("hidden");
        ticketDropdown.classList.add("flex");
        ticketDropdown.classList.add("transition-left-ticket");
    });

    ticketClose.addEventListener('click', (event) => {
        event.stopPropagation();
        ticketDropdown.classList.add('transition-backLeft-ticket');
        scanDiv.classList.remove('flex');
        scanDiv.classList.add('hidden');
        ticketDropdown.style.height = "32rem"
        setTimeout(() => {
            ticketDropdown.classList.add('hidden');
            ticketDropdown.classList.remove('transition-backLeft-ticket');
        }, 800);
    });
}

scanOpen.addEventListener('click', (event) => {
    event.stopPropagation();
    if (scanDiv.classList.contains('hidden')) {
        scanDiv.classList.remove('hidden');
        scanDiv.classList.add('flex');
        ticketDropdown.style.height = "46rem"
    } else {
        scanDiv.classList.remove('flex');
        scanDiv.classList.add('hidden');
        ticketDropdown.style.height = "32rem"
    }
});

const signInBtn = document.getElementById('signIn-btn');
const signinDropdown = document.getElementById('signinDropdown');
const logInBtn = document.getElementById("logIn-btn");
const loginDropdown = document.getElementById("loginDropdown");
const loginClose = document.getElementById('login-close');
const signinClose = document.getElementById('signin-close');

if (signInBtn && signinDropdown && logInBtn && loginDropdown && ticketOpen && ticketDropdown) {
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
}