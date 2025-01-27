<?php

namespace App\Http\Controllers;

use App\Models\Festival;
use App\Models\MusicalBand;
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
    public function logout(): \Illuminate\Http\RedirectResponse
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login');
    }
// ADMIN/CLIENTS
    public function clients(Request $request): \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application
    {
        $users = User::where('role', '=', "groover")->with('groovers')->get();
        return view('admin.clients', compact('users'));
    }
    public function show($id): \Illuminate\Http\JsonResponse
    {
        $user = User::with('groovers')->find($id);
        return response()->json($user);
    }
    public function activate($id): \Illuminate\Http\JsonResponse
    {
        $user = User::find($id);
        $user->active = 1;
        $user->save();

        return response()->json(['success' => true]);
    }

    public function deactivate($id): \Illuminate\Http\JsonResponse
    {
        $user = User::find($id);
        $user->active = 0;
        $user->save();

        return response()->json(['success' => true]);
    }
    public function autocomplete(Request $request): \Illuminate\Http\JsonResponse
    {
        $term = $request->get('term');
        $results = \DB::table('GRV1_Users')
            ->where('email', 'LIKE', '%' . $term . '%')
            ->pluck('email');

        return response()->json($results);
    }
    public function update(Request $request, $id): \Illuminate\Http\JsonResponse
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



    // ADMIN/FESTIVALS
    public function festivals(): \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application
    {
        $festivals = \DB::table('GRV1_Festivals')->get(['Id_festival', 'type', 'name', 'start_datetime', 'end_datetime', 'created_at', 'updated_at']);
        $musicalGenres = \DB::table('GRV1_Musical_genres')->get(['Id_musical_genre', 'name']);
        $types = \DB::table('GRV1_Festivals')->distinct()->pluck('type');
        return view('admin.festivals', compact('festivals', 'musicalGenres', 'types'));
    }
    public function addFestival(Request $request): \Illuminate\Http\JsonResponse
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
    public function showFestival($id): \Illuminate\Http\JsonResponse
    {
        $festival = \DB::table('GRV1_Festivals')->where('Id_festival', $id)->first();
        return response()->json($festival);
    }
    public function deleteFestival($id): \Illuminate\Http\JsonResponse
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
    public function updateFestival(Request $request, $id): \Illuminate\Http\JsonResponse
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
    public function importJson(Request $request): \Illuminate\Http\JsonResponse
    {
        $request->validate([
            'jsonFile' => 'required|file|mimes:json',
        ]);

        try {
            $file = $request->file('jsonFile');
            $jsonData = file_get_contents($file->getRealPath());
            $data = json_decode($jsonData, true);

            if (!is_array($data)) {
                return response()->json(['message' => 'Le fichier JSON est invalide.'], 400);
            }

            foreach ($data as $festivalData) {
                $festival = Festival::updateOrCreate(
                    ['Id_recup_api' => $festivalData['Id_recup_api']],
                    [
                        'type' => $festivalData['type'] ?? null,
                        'name' => $festivalData['name'] ?? null,
                        'start_datetime' => $festivalData['start_date'] ?? null,
                        'end_datetime' => $festivalData['end_date'] ?? null,
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]
                );

                $musicalBandIds = [];
                if (isset($festivalData['artists']) && is_array($festivalData['artists'])) {
                    foreach ($festivalData['artists'] as $artistName) {
                        if (!empty($artistName)) {
                            $musicalBand = MusicalBand::firstOrCreate(['name' => $artistName]);
                            $musicalBandIds[] = $musicalBand->Id_musical_band;
                        }
                    }
                }

                if (!empty($musicalBandIds)) {
                    foreach ($musicalBandIds as $musicalBandId) {
                        DB::table('GRV1_Festivals_Musical_Bands')->updateOrInsert(
                            ['Id_festival' => $festival->Id_festival, 'Id_musical_band' => $musicalBandId],
                            ['created_at' => now(), 'updated_at' => now()]
                        );
                    }
                }

                if (isset($festivalData['programmation']) && is_array($festivalData['programmation'])) {
                    foreach ($festivalData['programmation'] as $dayData) {
                        $program = DB::table('GRV1_Programs')->updateOrInsert(
                            ['Id_festival' => $festival->Id_festival, 'day_presence' => $dayData['day']],
                            ['created_at' => now(), 'updated_at' => now()]
                        );

                        if ($program) {
                            foreach ($dayData['artists'] as $artistData) {
                                if (!empty($artistData['name'])) {
                                    $musicalBand = MusicalBand::firstOrCreate(['name' => $artistData['name']]);
                                    DB::table('GRV1_Musical_Bands_Programs')->updateOrInsert(
                                        ['Id_musical_band' => $musicalBand->Id_musical_band, 'Id_program' => $program->Id_program],
                                        ['created_at' => now(), 'updated_at' => now()]
                                    );
                                }
                            }
                        }
                    }
                }
            }

            return response()->json(['message' => 'JSON importé avec succès !']);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Erreur lors de l\'importation du JSON : ' . $e->getMessage()], 500);
        }
    }
    // ADMIN/PROMOTIONS
    public function promotions(): \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application
    {
        return view('admin.promotions');
    }
    public function getOffers(): \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application
    {
        $offers = \DB::table('GRV1_Offers')
            ->leftJoin('GRV1_Partners', 'GRV1_Offers.Id_partner', '=', 'GRV1_Partners.Id_partner')
            ->select('GRV1_Partners.name as partner_name', 'GRV1_Offers.type', 'GRV1_Offers.name', 'GRV1_Offers.description', 'GRV1_Offers.condition_purchase', 'GRV1_Offers.created_at', 'GRV1_Offers.Id_offer')
            ->get();

        $partners = \DB::table('GRV1_Partners')->select('Id_partner', 'name')->get();
        $types = \DB::table('GRV1_Offers')->select('type')->distinct()->get();

        return view('admin.promotions', compact('offers', 'partners', 'types'));
    }
    public function addOffer(Request $request): \Illuminate\Http\JsonResponse
    {
        $request->validate([
            'type' => 'required|string|max:50',
            'name' => 'required|string|max:50',
            'description' => 'required|string',
            'condition_purchase' => 'required|string',
            'created_at' => 'required|date',
        ]);

        $offerId = \DB::table('GRV1_Offers')->insertGetId([
            'type' => $request->type,
            'name' => $request->name,
            'description' => $request->description,
            'condition_purchase' => $request->condition_purchase,
            'created_at' => $request->created_at,
            'updated_at' => now(),
            'Id_partner' => 1, // Remplacez par la valeur appropriée
        ]);

        $offer = \DB::table('GRV1_Offers')->select('Id_offer', 'type', 'name', 'description', 'condition_purchase', 'created_at')->where('Id_offer', $offerId)->first();

        return response()->json($offer);
    }
    public function showOffer($id): \Illuminate\Http\JsonResponse
    {
        $offer = \DB::table('GRV1_Offers')
            ->leftJoin('GRV1_Partners', 'GRV1_Offers.Id_partner', '=', 'GRV1_Partners.Id_partner')
            ->select('GRV1_Partners.name as partner_name', 'GRV1_Offers.type', 'GRV1_Offers.name', 'GRV1_Offers.description', 'GRV1_Offers.condition_purchase', 'GRV1_Offers.created_at', 'GRV1_Offers.Id_offer')
            ->where('GRV1_Offers.Id_offer', $id)
            ->first();

        if ($offer) {
            return response()->json($offer);
        } else {
            return response()->json(['error' => 'Offre non trouvée'], 404);
        }
    }
    public function updateOffer(Request $request, $id): \Illuminate\Http\JsonResponse
    {
        $request->validate([
            'type' => 'required|string|max:50',
            'name' => 'required|string|max:50',
            'description' => 'required|string',
            'condition_purchase' => 'required|string',
            'created_at' => 'required|date',
        ]);

        \DB::table('GRV1_Offers')->where('Id_offer', $id)->update([
            'type' => $request->type,
            'name' => $request->name,
            'description' => $request->description,
            'condition_purchase' => $request->condition_purchase,
            'created_at' => $request->created_at,
            'updated_at' => now(),
        ]);

        $offer = \DB::table('GRV1_Offers')
            ->leftJoin('GRV1_Partners', 'GRV1_Offers.Id_partner', '=', 'GRV1_Partners.Id_partner')
            ->select('GRV1_Partners.name as partner_name', 'GRV1_Offers.type', 'GRV1_Offers.name', 'GRV1_Offers.description', 'GRV1_Offers.condition_purchase', 'GRV1_Offers.created_at', 'GRV1_Offers.Id_offer')
            ->where('GRV1_Offers.Id_offer', $id)
            ->first();

        return response()->json($offer);
    }
    public function deleteOffer($id): \Illuminate\Http\JsonResponse
    {
        try {
            \DB::table('GRV1_Offers')->where('Id_offer', $id)->delete();
            return response()->json(['message' => 'Offre supprimée avec succès.'], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Erreur lors de la suppression de l\'offre : ' . $e->getMessage()], 500);
        }
    }
    // ADMIN/TRANSACTIONS
    public function transactions(): \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application
    {
        $groovers = \DB::table('GRV1_Groovers')->select('name', 'firstname', 'nb_groovies', 'level')->get();
        return view('admin.transactions', compact('groovers'));
    }
    //ADMIN/ACTUALITES
    public function actualites(): \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application
    {
        return view('admin.actualites');
    }
    // ADMIN/NOTIFICATIONS
    public function notifications(): \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application
    {
        $notifications = \DB::table('GRV1_Notifications')
            ->join('GRV1_Users_Notifications', 'GRV1_No     tifications.Id_notification', '=', 'GRV1_Users_Notifications.Id_notification')
            ->join('GRV1_Users', 'GRV1_Users_Notifications.Id_user', '=', 'GRV1_Users.Id_user')
            ->select('GRV1_Notifications.importance', 'GRV1_Notifications.message', 'GRV1_Notifications.created_at', 'GRV1_Users.email')
            ->get();

        return view('admin.notifications', compact('notifications'));
    }
}
