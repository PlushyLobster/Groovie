<?php

namespace App\Http\Controllers;

use App\Models\{Festival, MusicalGenre};
use Illuminate\Http\Request;

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
        return view('festival.mesFestivals');
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
        });

        $data = [
            'festival' => $festival,
            'programmation' => $programmation,
        ];

        return view('festival.detailFestival', $data);
    }
}
