<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
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
            ->select(\DB::raw('COUNT(*) as count'), \DB::raw('MONTH(created_at) as month'))
            ->whereYear('created_at', Carbon::now()->year)
            ->groupBy('month')
            ->pluck('count', 'month')->toArray();

        return view('admin.dashboard', compact('admins', 'userCount', 'festivalCount', 'partnerCount', 'monthlyRegistrations'));
    }
// ADMIN/CLIENTS
    public function clients()
    {
        $users = \DB::table('GRV1_Users')->select('Id_user', 'email', 'created_at', 'updated_at')->get();
        return view('admin.clients', compact('users'));
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
    // ADMIN/PROMOTIONS
    public function promotions(): \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application
    {
        return view('admin.promotions');
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
    // CONNEXION ADMIN
    public function showLoginForm()
    {
        return view('admin.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'firstname' => 'required|string',
        ]);

        $admin = Admin::where('name', $request->name)
            ->where('firstname', $request->firstname)
            ->first();

        if ($admin) {
            // Logique de connexion (par exemple, créer une session)
            return redirect()->route('admin.dashboard');
        } else {
            return back()->withErrors(['message' => 'Nom ou prénom incorrect']);
        }
    }
}
