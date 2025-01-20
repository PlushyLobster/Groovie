<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $admins = Admin::all(['Id_admin', 'name', 'firstname', 'super_admin', 'created_at', 'updated_at']);
        return view('admin.dashboard', compact('admins'));
    }

    public function clients()
    {
        $users = \DB::table('GRV1_Users')->get(['Id_user', 'active', 'email', 'cgu_validated', 'created_at', 'updated_at']);
        return view('admin.clients', compact('users'));
    }
    public function transactions()
    {
        return view('admin.transactions');
    }
    public function festivals()
    {
        $festivals = \DB::table('GRV1_Festivals')->get(['Id_festival', 'type', 'name', 'start_datetime', 'end_datetime', 'created_at', 'updated_at']);
        return view('admin.festivals', compact('festivals'));
    }
    public function promotions()
    {
        return view('admin.promotions');
    }

    public function actualites()
    {
        return view('admin.actualites');
    }
}
