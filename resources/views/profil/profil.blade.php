@extends('layout.layoutGroover')

@section('content')
    <main id="profil-main">
        <div class="profil-card">
            <div class="profil-title">
                <h2>Profil</h2>
            </div>
            <div class="profil-svg">
                <a href="{{ route('home') }}">
                    <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M16 31C7.71573 31 1 24.2843 1 16C1 7.71573 7.71573 0.999999 16 0.999999C24.2843 1 31 7.71573 31 16C31 24.2843 24.2843 31 16 31Z" stroke="#000B58" stroke-width="2"/>
                        <path d="M22 10L10 22M10 10L22 22" stroke="#000B58" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </a>
            </div>
            <div class="profil-avatar">
                @if($user->avatar)
                    <img src="{{ $user->avatar }}" alt="" class="avatar-img" id="avatar-img">
                @else
                    <div class="avatar-img default-avatar" style="background-color: #9747FF; color: #F7F7F7; display: flex; justify-content: center; align-items: center; font-size: 2rem;">
                        {{ $initials }}
                    </div>
                @endif
                <a href="#" class="avatar-svg" onclick="document.getElementById('avatar-input').click()">
                    <svg width="57" height="57" viewBox="0 0 57 57" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M41.8383 18.2677H35.9102V16H21.0898V18.2677H15.1617C14.3231 18.2677 13.519 18.5863 12.926 19.1533C12.3331 19.7204 12 20.4894 12 21.2913V36.9764C12 37.7783 12.3331 38.5474 12.926 39.1144C13.519 39.6814 14.3231 40 15.1617 40H41.8383C42.6769 40 43.481 39.6814 44.074 39.1144C44.6669 38.5474 45 37.7783 45 36.9764V21.2913C45 20.4894 44.6669 19.7204 44.074 19.1533C43.481 18.5863 42.6769 18.2677 41.8383 18.2677ZM28.4992 38.2992C23.216 38.2992 18.9193 34.1871 18.9193 29.1346C18.9193 24.0821 23.216 19.97 28.4992 19.97C33.7824 19.97 38.0823 24.0821 38.0823 29.1346C38.0823 34.1871 33.7824 38.2962 28.4992 38.2962V38.2992ZM28.4992 22.9921C27.6556 22.9922 26.8203 23.1512 26.041 23.46C25.2617 23.7689 24.5536 24.2215 23.9572 24.792C23.3607 25.3625 22.8877 26.0398 22.5649 26.7851C22.2422 27.5305 22.0762 28.3294 22.0763 29.1361C22.0764 29.9429 22.2426 30.7417 22.5655 31.487C22.8885 32.2323 23.3617 32.9095 23.9583 33.4798C24.5549 34.0502 25.2631 34.5026 26.0425 34.8113C26.8219 35.1199 27.6572 35.2787 28.5008 35.2786C30.2047 35.2784 31.8387 34.6309 33.0434 33.4785C34.2481 32.3262 34.9247 30.7633 34.9245 29.1339C34.9243 27.5044 34.2472 25.9417 33.0423 24.7896C31.8373 23.6375 30.2031 22.9904 28.4992 22.9906V22.9921Z" fill="#382396"/>
                        <circle cx="28.5" cy="28.5" r="27.5" transform="rotate(90 28.5 28.5)" stroke="#382396" stroke-width="2"/>
                    </svg>
                </a>
                <input type="file" id="avatar-input" style="display: none;" accept="image/*" onchange="updateAvatar(event)">
            </div>
            <div class="profil-info">
                <div class="info-item">
                    <label for="user-fullname">Nom & Prénom:</label>
                    <span id="user-fullname">{{ $groover->name ?? 'Nom non disponible' }} {{ $groover->firstname ?? 'Prénom non disponible' }}</span>
                </div>
                <hr>
                <div class="info-item">
                    <label for="user-email">Adresse mail:</label>
                    <span id="user-email">{{ $user->email }}</span>
                    <button class="edit-btn" onclick="openModal('email')">Modifier</button>
                </div>
                <hr>
                <div class="info-item">
                    <label for="user-city">Ville:</label>
                    <span id="user-city">{{ $groover->city }}</span>
                    <button class="edit-btn" onclick="openModal('city')">Modifier</button>
                </div>
                <hr>
                <div class="info-item">
                    <label for="user-password">Mot de passe:</label>
                    <span id="user-password">********</span>
                    <button class="edit-btn" onclick="openModal('password')">Modifier</button>
                </div>
                <hr>
                <div class="info-item">
                    <label for="user-id">ID Groover:</label>
                    <span id="user-id">{{ $groover->Id_user ?? 'ID non disponible' }}</span>
                </div>
                <hr>
                <div class="info-item">
                    <label for="user-expenses">Historique des dépenses:</label>
                    <a href="#" class="details-link">Voir les détails
                        <svg width="25" height="17" viewBox="0 0 25 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M16.6004 16.8409L14.6062 14.73L19.2276 9.88453L9.60554e-06 9.86517L0.00283743 6.8879L19.1782 6.90726L14.6345 2.09897L16.6371 -3.48666e-07L24.6136 8.44055L16.6004 16.8409Z" fill="#382396"/>
                        </svg>
                    </a>
                </div>
                <hr>
                <div class="profil-cloture">
                    <button id="clotureButton" class="cloture-btn">Clôturer le compte</button>
                </div>
            </div>
        </div>
        <div class="profil-pref">
            <div class="profil-title">
                <h2>Préférences</h2>
            </div>
        </div>
    </main>

    <!-- Modale de modification -->
    <div id="editModal" class="hidden fixed inset-0 bg-gray-600 bg-opacity-50 flex items-center justify-center">
        <div class="bg-white p-4 rounded">
            <h2 class="text-xl mb-4">Modifier <span id="modal-field-name"></span></h2>
            <form id="editForm" method="POST" action="{{ route('profil.update') }}">
                @csrf
                <input type="hidden" name="field" id="modal-field">
                <input type="text" name="new_value" id="modal-new-value" class="border p-2 w-full mb-4">
                <div class="flex justify-end">
                    <button type="button" class="bg-gray-500 text-white px-4 py-2 rounded mr-2" onclick="closeModal()">Annuler</button>
                    <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded">Enregistrer</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Modale de modification du mot de passe -->
    <div id="editPasswordModal" class="hidden fixed inset-0 bg-gray-600 bg-opacity-50 flex items-center justify-center">
        <div class="bg-white p-6 rounded-lg">
            <h2 class="text-xl mb-4">Modifier le mot de passe</h2>
            <form action="{{ route('profil.update') }}" method="POST">
                @csrf
                <input type="hidden" name="field" value="password">
                <div class="mb-4">
                    <label for="new_password" class="block text-sm font-medium text-gray-700">Nouveau mot de passe</label>
                    <input type="password" name="new_value" id="new_password" class="mt-1 block w-full" required>
                </div>
                <div class="flex justify-end">
                    <button type="button" class="mr-4" onclick="closeModal('password')">Annuler</button>
                    <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded">Enregistrer</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Modale de confirmation -->
    <div id="confirmationModal" class="hidden fixed inset-0 bg-gray-600 bg-opacity-50 flex items-center justify-center">
        <div class="bg-white p-6 rounded-lg shadow-lg">
            <h2 class="text-xl mb-4">Confirmer la clôture du compte</h2>
            <p>Êtes-vous sûr de vouloir clôturer votre compte ? Cette action est irréversible.</p>
            <div class="flex justify-end mt-4">
                <button id="confirmButton" class="bg-red-600 text-white px-4 py-2 rounded mr-2">Confirmer</button>
                <button id="cancelButton" class="bg-gray-500 text-white px-4 py-2 rounded">Annuler</button>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('clotureButton').addEventListener('click', function() {
            document.getElementById('confirmationModal').classList.remove('hidden');
        });

        document.getElementById('cancelButton').addEventListener('click', function() {
            document.getElementById('confirmationModal').classList.add('hidden');
        });

        document.getElementById('confirmButton').addEventListener('click', function() {
            fetch('{{ route('profil.cloturer') }}', {
                method: 'POST', headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }
            })
                .then(response => response.json())
                .then(data => {
                    if (data.message === 'Compte désactivé') {
                        window.location.href = '{{ route('home') }}';
                    }
                });
        });

        function openModal(field) {
            if (field === 'password') {
                document.getElementById('editPasswordModal').classList.remove('hidden');
            } else {
                document.getElementById('modal-field').value = field;
                document.getElementById('modal-field-name').innerText = field === 'email' ? 'l\'adresse mail' : 'la ville';
                document.getElementById('editModal').classList.remove('hidden');
            }
        }

        function closeModal(field) {
            if (field === 'password') {
                document.getElementById('editPasswordModal').classList.add('hidden');
            } else {
                document.getElementById('editModal').classList.add('hidden');
            }
        }

        function updateAvatar(event) {
            const input = event.target;
            if (input.files && input.files[0]) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    document.getElementById('avatar-img').src = e.target.result;
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
@endsection
