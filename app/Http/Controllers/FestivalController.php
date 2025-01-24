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
    /**
     * Display the specified resource.
     */
    public function show(Festival $festival): \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application
    {
        $festival->load('musicalGenre');
        $data = [
            'festival' => $festival,
        ];
        return view('festival.detailFestival', $data);
    }
}
