<?php

namespace App\Http\Controllers;

use App\Models\{Festival, MusicalGenre};
use Illuminate\Http\Request;

class FestivalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = [
            'festivals' => Festival::all()
        ];
        return view('festival.listeFestival', $data);
    }

    public function mesFestivals()
    {
        return view('festival.mesFestivals');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Festival $festival)
    {
        $festival->load('musicalGenre');
        $data = [
            'festival' => $festival,
        ];
        return view('festival.detailFestival', $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Festival $festival)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Festival $festival)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Festival $festival)
    {
        //
    }
}
