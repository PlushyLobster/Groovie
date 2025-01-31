<?php

namespace App\Http\Controllers;

use App\Models\Journey;
use Illuminate\Http\Request;

class trajetController extends Controller
{
    public function trajet()
    {
        return view('trajet.trajet');
    }

    public function experience()
    {
        return view('trajet.experience');
    }
}
