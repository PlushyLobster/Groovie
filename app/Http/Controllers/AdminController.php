<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $admins = Admin::all(['Id_admin', 'name', 'firstname', 'super_admin', 'created_at', 'updated_at']);
        return view('admin.dashboard', compact('admins'));
    }
}
