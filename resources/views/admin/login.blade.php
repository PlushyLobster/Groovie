@extends('Layout.layoutAdminNoSidenav')

@section('content')
    <div class="flex items-center justify-center min-h-screen bg-gray-100">
        <div class="bg-[#CCEFDA] p-8 rounded-lg shadow-md w-full max-w-md" style="border-radius: 39px;">
            <div class="flex justify-center mb-4">
                <img src="{{ asset('resources/svg/Logo.svg') }}" alt="Logo" class="h-16">            </div>
            <h1 class="text-2xl font-bold text-center mb-4">Connexion Administrateur</h1>

            @if ($errors->any())
                <div class="mb-4">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li class="text-red-500">{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('admin.login') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input type="email" name="email" id="email" class="mt-2 p-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                </div>
                <div class="mb-4">
                    <label for="password" class="block text-sm font-medium text-gray-700">Mot de passe</label>
                    <input type="password" name="password" id="password" class="mt-1 p-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                </div>
                <div class="flex justify-center">
                    <button type="submit" class="py-2 px-4 rounded" style="background-color: #E2FC98; color: #000B58;">Connexion</button>
                </div>
            </form>
        </div>
    </div>
@endsection
