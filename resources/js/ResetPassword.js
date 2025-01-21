document.addEventListener('DOMContentLoaded', function () {
    // Références des étapes
    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

    const emailStep = document.getElementById('emailStep');
    const codeStep = document.getElementById('codeStep');
    const passwordStep = document.getElementById('passwordStep');

    // Boutons de navigation
    const openModal = document.getElementById('openResetModal'); // Bouton pour ouvrir la modal
    const closeModal = document.getElementById('closeResetModal');
    const sendResetLink = document.getElementById('sendResetLink');
    const verifyCode = document.getElementById('verifyCode');
    const backToEmailStep = document.getElementById('backToEmailStep');
    const backToCodeStep = document.getElementById('backToCodeStep');

    // Gestion de l'ouverture de la modal
    openModal.addEventListener('click', function (event) {
        event.preventDefault();
        document.getElementById('resetPasswordModal').classList.remove('hidden');

        // Réinitialisation des étapes et affichage de la première étape
        emailStep.classList.remove('hidden');
        codeStep.classList.add('hidden');
        passwordStep.classList.add('hidden');
    });

    // Gestion de la fermeture de la modal
    closeModal.addEventListener('click', function () {
        document.getElementById('resetPasswordModal').classList.add('hidden');
    });

    // Étape 1 : Envoi du lien
    sendResetLink.addEventListener('click', function () {
        const email = document.getElementById('reset-email').value;

        fetch('/password/email', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'Accept': 'application/json',
                'X-CSRF-TOKEN': csrfToken
            },
            body: JSON.stringify({ email: email })
        })
            .then(response => {
                if (!response.ok) {
                    throw new Error('Erreur de communication avec le serveur');
                }
                return response.json(); // On analyse la réponse JSON
            })
            .then(data => {
                if (data.status === 'success') {
                    emailStep.classList.add('hidden');
                    codeStep.classList.remove('hidden');
                } else {
                    alert(data.message); // Gérer l'erreur côté serveur
                }
            })
            .catch(error => {
                console.error("Erreur AJAX :", error);
                alert('Une erreur est survenue, veuillez réessayer plus tard.');
            });
    });

    // Étape 2 : Vérification du code
    verifyCode.addEventListener('click', function () {
        const email = document.getElementById('reset-email').value;
        const code = document.getElementById('reset-code').value;

        fetch('/password/verify-code', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'Accept': 'application/json',
                'X-CSRF-TOKEN': csrfToken
            },
            body: JSON.stringify({ email: email, code: code })
        })
            .then(response => {
                if (!response.ok) {
                    throw new Error('Erreur de communication avec le serveur');
                }
                return response.json();
            })
            .then(data => {
                if (data.message === 'Code vérifié avec succès.') {
                    codeStep.classList.add('hidden');
                    passwordStep.classList.remove('hidden');
                } else {
                    alert(data.message);
                }
            })
            .catch(error => {
                console.error('Erreur:', error);
                alert('Une erreur est survenue, veuillez réessayer plus tard.');
            });
    });

    // Étape 3 : Réinitialisation du mot de passe
    document.getElementById('resetPasswordForm').addEventListener('submit', function (event) {
        event.preventDefault();

        const email = document.getElementById('reset-email').value;
        const password = document.getElementById('new-password').value;
        const password_confirmation = document.getElementById('confirm-password').value;
        const code = document.getElementById('reset-code').value;

        fetch('/password/reset', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'Accept': 'application/json',
                'X-CSRF-TOKEN': csrfToken
            },
            body: JSON.stringify({ email, password, password_confirmation, code })
        })
            .then(response => {
                if (!response.ok) {
                    response.text().then(body => {
                        console.error('Réponse du serveur (erreur):', body); // Affiche le corps de la réponse d'erreur
                    });
                    throw new Error('Erreur de communication avec le serveur');
                }
                return response.json();
            })
            .then(data => {
                if (data.message === 'Mot de passe réinitialisé avec succès.') {
                    alert(data.message);
                    document.getElementById('resetPasswordModal').classList.add('hidden');
                } else {
                    alert(data.message);
                }
            })
            .catch(error => {
                console.error('Erreur:', error);
                alert('Une erreur est survenue, veuillez réessayer plus tard.');
            });
    });

    // Boutons "Retour"
    backToEmailStep.addEventListener('click', function () {
        codeStep.classList.add('hidden');
        emailStep.classList.remove('hidden');
    });

    backToCodeStep.addEventListener('click', function () {
        passwordStep.classList.add('hidden');
        codeStep.classList.remove('hidden');
    });
});
