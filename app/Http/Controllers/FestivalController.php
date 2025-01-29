<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\{Festival, MusicalGenre, User};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FestivalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application
    {
        $data = [
            'festivals' => Festival::all()
        ];
        return view('festival.listeFestival', $data);
    }

    public function mesFestivals(): \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application
    {
        $user = Auth::user();
        $user->load(['festivals.musicalGenres']);
        $data = [
            'user' => $user
        ];
        return view('festival.mesFestivals', $data);
    }
    /**
     * Display the specified resource.
     */
    public function show(Festival $festival): \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application
    {
        $festival->load('musicalGenres', 'musicalBands', 'programs');

        $programmation = $festival->programs()->with('musicalBands')->get()->map(function ($program) {
            return [
                'event_name' => $program->name,
                'day_presence' => $program->day_presence,
                'start_time' => $program->start_time,
                'artists' => $program->musicalBands->map(function ($band) {
                    return $band->name;
                })->toArray()
            ];
        })->toArray(); // Convertir en tableau

        $uniqueDates = collect($programmation)->pluck('day_presence')->unique()->sortBy(function ($date) {
            return Carbon::parse($date);
        });

        $data = [
            'festival' => $festival,
            'programmation' => $programmation,
            'uniqueDates' => $uniqueDates,
        ];

        return view('festival.detailFestival', $data);
    }
}
