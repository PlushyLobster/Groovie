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
    public function showLoginForm(): \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application
    {
        return view('admin.login');
    }

    public function login(Request $request): \Illuminate\Http\RedirectResponse
    {

        $user = DB::table('GRV1_Users')->where('email', $request->email)->first();

        if ($user && Hash::check($request->password, $user->password)) {
            $admin = Admin::where('Id_user', $user->Id_user)->first();
            if ($admin) {
                Auth::guard('admin')->login($admin);
                return redirect()->route('admin.dashboard');
            } else {
                return back()->withErrors(['message' => 'Cet utilisateur n\'est pas un administrateur']);
            }
        } else {
            return back()->withErrors(['message' => 'Email ou mot de passe incorrect']);
        }
    }
// ADMIN/CLIENTS
    public function clients(Request $request): \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application
    {
        $users = User::where('role', '=', "groover")->with('groovers')->get();
        return view('admin.clients', compact('users'));
    }
    public function show($id)
    {
        $user = User::with('groovers')->find($id);
        return response()->json($user);
    }
    public function activate($id)
    {
        $user = User::find($id);
        $user->active = 1;
        $user->save();

        return response()->json(['success' => true]);
    }

    public function deactivate($id)
    {
        $user = User::find($id);
        $user->active = 0;
        $user->save();

        return response()->json(['success' => true]);
    }
    public function autocomplete(Request $request)
    {
        $term = $request->get('term');
        $results = \DB::table('GRV1_Users')
            ->where('email', 'LIKE', '%' . $term . '%')
            ->pluck('email');

        return response()->json($results);
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'email' => 'required|email',
            'active' => 'required|boolean',
            'name' => 'required|string|max:50',
            'firstname' => 'required|string|max:50',
            'city' => 'required|string|max:110',
        ]);

        $user = User::find($id);
        $user->email = $request->email;
        $user->active = $request->active;
        $user->save();

        $groover = $user->groovers;
        $groover->name = $request->name;
        $groover->firstname = $request->firstname;
        $groover->city = $request->city;
        $groover->save();

        return response()->json(['success' => true]);
    }

    // ADMIN/TRANSACTIONS
    public function transactions(): \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application
    {
        return view('admin.transactions');
    }
    // ADMIN/FESTIVALS
    // app/Http/Controllers/AdminController.php

    public function festivals(): \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application
    {
        $festivals = \DB::table('GRV1_Festivals')->get(['Id_festival', 'type', 'name', 'start_datetime', 'end_datetime', 'created_at', 'updated_at']);
        $musicalGenres = \DB::table('GRV1_Musical_genres')->get(['Id_musical_genre', 'name']);
        return view('admin.festivals', compact('festivals', 'musicalGenres'));
    }
    public function addFestival(Request $request)
    {
        $request->validate([
            'type' => 'required|string|max:50',
            'name' => 'required|string|max:100',
            'start_datetime' => 'required|date',
            'end_datetime' => 'required|date',
        ]);

        $festivalId = \DB::table('GRV1_Festivals')->insertGetId([
            'type' => $request->type,
            'name' => $request->name,
            'start_datetime' => $request->start_datetime,
            'end_datetime' => $request->end_datetime,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $festival = \DB::table('GRV1_Festivals')->where('Id_festival', $festivalId)->first();

        return response()->json($festival);
    }
    public function showFestival($id)
    {
        $festival = \DB::table('GRV1_Festivals')->where('Id_festival', $id)->first();
        return response()->json($festival);
    }
    public function deleteFestival($id)
    {
        try {
            $festival = \DB::table('GRV1_Festivals')->where('Id_festival', $id)->first();
            $userFestival = \DB::table('GRV1_Users_Festivals')->where('Id_festival', $id)->exists();

            if ($userFestival) {
                return response()->json(['message' => 'Ce festival est lié à un utilisateur et ne peut pas être supprimé.'], 400);
            }

            \DB::table('GRV1_Festivals')->where('Id_festival', $id)->delete();
            \DB::table('GRV1_Festivals_Musical_genres')->where('Id_festival', $id)->delete();

            return response()->json(['message' => 'Festival supprimé avec succès.'], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Erreur lors de la suppression du festival : ' . $e->getMessage()], 500);
        }
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

        $festival = \DB::table('GRV1_Festivals')->where('Id_festival', $id)->first();

        return response()->json($festival);
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
    public function addOffer(Request $request)
    {
        $request->validate([
            'type' => 'required|string|max:50',
            'name' => 'required|string|max:50',
            'description' => 'required|string',
        ]);

        $offerId = \DB::table('GRV1_Offers')->insertGetId([
            'type' => $request->type,
            'name' => $request->name,
            'description' => $request->description,
            'created_at' => now(),
            'updated_at' => now(),
            'Id_journey' => 1, // Remplacez par la valeur appropriée
            'Id_partner' => 1, // Remplacez par la valeur appropriée
        ]);



        return response()->json($offer);
    }
    // ADMIN/ACTUALITES
    public function actualites(): \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application
    {
        return view('admin.actualites');
    }
    // ADMIN/NOTIFICATIONS
    public function notifications()
    {
        $notifications = \DB::table('GRV1_Notifications')
            ->join('GRV1_Users_Notifications', 'GRV1_Notifications.Id_notification', '=', 'GRV1_Users_Notifications.Id_notification')
            ->join('GRV1_Users', 'GRV1_Users_Notifications.Id_user', '=', 'GRV1_Users.Id_user')
            ->select('GRV1_Notifications.importance', 'GRV1_Notifications.message', 'GRV1_Notifications.created_at', 'GRV1_Users.email')
            ->get();

        return view('admin.notifications', compact('notifications'));
    }
}
