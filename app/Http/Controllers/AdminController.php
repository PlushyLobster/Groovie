<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin;
use Illuminate\Http\Request;
use Carbon\Carbon;

class AdminController extends Controller
{
    public function index(): \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application
    {
        $admins = Admin::all();
        $userCount = \DB::table('GRV1_Users')->count();
        $festivalCount = \DB::table('GRV1_Festivals')->count();
        $partnerCount = \DB::table('GRV1_Partners')->count();

        $monthlyRegistrations = \DB::table('GRV1_Users')
            ->select(\DB::raw('COUNT(*) as count'), \DB::raw('MONTH(created_at) as month'), \DB::raw('YEAR(created_at) as year'))
            ->whereYear('created_at', '>=', 2024)
            ->groupBy('year', 'month')
            ->orderBy('year')
            ->orderBy('month')
            ->get()
            ->groupBy('year')
            ->map(function ($yearData) {
                return $yearData->pluck('count', 'month');
            });

        return view('admin.dashboard', compact('admins', 'userCount', 'festivalCount', 'partnerCount', 'monthlyRegistrations'));
    }
    // CONNEXION ADMIN
    public function showLoginForm()
    {
        return view('admin.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        $user = DB::table('GRV1_Users')->where('email', $request->email)->first();

        if ($user && Hash::check($request->password, $user->password)) {
            $admin = Admin::where('Id_user', $user->Id_user)->first();
            if ($admin) {
                Auth::login($admin);
                return redirect()->route('admin.dashboard');
            } else {
                return back()->withErrors(['message' => 'Cet utilisateur n\'est pas un administrateur']);
            }
        } else {
            return back()->withErrors(['message' => 'Email ou mot de passe incorrect']);
        }
    }
// ADMIN/CLIENTS
    public function clients(Request $request)
    {
        $query = \DB::table('GRV1_Users')->select('Id_user', 'email', 'created_at', 'updated_at');

        if ($request->has('search')) {
            $query->where('email', 'like', '%' . $request->search . '%');
        }

        $users = $query->paginate(10);

        return view('admin.clients', compact('users'));
    }
    public function addClient(Request $request)
    {
        $newUser = \DB::table('GRV1_Users')->insertGetId([
            'email' => 'nouveauclient@example.com', // Remplacez par les données nécessaires
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $user = \DB::table('GRV1_Users')->where('Id_user', $newUser)->first();

        return response()->json($user);
    }
    public function autocomplete(Request $request)
    {
        $term = $request->get('term');
        $results = \DB::table('GRV1_Users')
            ->where('email', 'LIKE', '%' . $term . '%')
            ->pluck('email');

        return response()->json($results);
    }

    // ADMIN/TRANSACTIONS
    public function transactions(): \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application
    {
        return view('admin.transactions');
    }
    // ADMIN/FESTIVALS
    public function festivals(): \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application
    {
        $festivals = \DB::table('GRV1_Festivals')->get(['Id_festival', 'type', 'name', 'start_datetime', 'end_datetime', 'created_at', 'updated_at']);
        return view('admin.festivals', compact('festivals'));
    }
    public function deleteFestival($id)
    {
        $festival = \DB::table('GRV1_Festivals')->where('Id_festival', $id)->first();
        $userFestival = \DB::table('GRV1_Users_Festivals')->where('Id_festival', $id)->exists();

        if ($userFestival) {
            return response()->json(['message' => 'Ce festival est lié à un utilisateur et ne peut pas être supprimé.'], 400);
        }

        \DB::table('GRV1_Festivals')->where('Id_festival', $id)->delete();
        return response()->json(['message' => 'Festival supprimé avec succès.'], 200);
    }
    public function updateFestival(Request $request, $id)
    {
        $request->validate([
            'type' => 'required|string|max:50',
            'name' => 'required|string|max:100',
            'start_datetime' => 'required|date',
            'end_datetime' => 'required|date',
        ]);

        \DB::table('GRV1_Festivals')->where('Id_festival', $id)->update([
            'type' => $request->type,
            'name' => $request->name,
            'start_datetime' => $request->start_datetime,
            'end_datetime' => $request->end_datetime,
            'updated_at' => now(),
        ]);

        return response()->json(['message' => 'Festival mis à jour avec succès.'], 200);
    }
    // ADMIN/PROMOTIONS
    public function promotions(): \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application
    {
        return view('admin.promotions');
    }
    public function getOffers()
    {
        $offers = \DB::table('GRV1_Offers')->select('type', 'name', 'description', 'created_at')->get();
        return view('admin.promotions', compact('offers'));
    }
    // ADMIN/ACTUALITES
    public function actualites(): \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application
    {
        return view('admin.actualites');
    }
    // ADMIN/NOTIFICATIONS
    public function notifications(): \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application
    {
        return view('admin.notifications');
    }

}
