@extends('layouts.layoutAdmin')

@section('content')
    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-bold mb-4">Dashboard Administrateur</h1>
        <table class="min-w-full bg-white">
            <thead>
            <tr>
                <th class="py-2 px-4 border-b">ID</th>
                <th class="py-2 px-4 border-b">Nom</th>
                <th class="py-2 px-4 border-b">Prénom</th>
                <th class="py-2 px-4 border-b">Super Admin</th>
                <th class="py-2 px-4 border-b">Créé le</th>
                <th class="py-2 px-4 border-b">Mis à jour le</th>
            </tr>
            </thead>
            <tbody>
            @foreach($admins as $admin)
                <tr>
                    <td class="py-2 px-4 border-b">{{ $admin->Id_admin }}</td>
                    <td class="py-2 px-4 border-b">{{ $admin->name }}</td>
                    <td class="py-2 px-4 border-b">{{ $admin->firstname }}</td>
                    <td class="py-2 px-4 border-b">{{ $admin->super_admin ? 'Oui' : 'Non' }}</td>
                    <td class="py-2 px-4 border-b">{{ $admin->created_at }}</td>
                    <td class="py-2 px-4 border-b">{{ $admin->updated_at }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
