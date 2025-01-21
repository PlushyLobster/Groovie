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

    public function clients(): \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application
    {
        $users = User::get();
        return view('admin.clients', compact('users'));
    }
    public function transactions(): \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application
    {
        return view('admin.transactions');
    }
    public function festivals(): \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application
    {
        $festivals = \DB::table('GRV1_Festivals')->get(['Id_festival', 'type', 'name', 'start_datetime', 'end_datetime', 'created_at', 'updated_at']);
        return view('admin.festivals', compact('festivals'));
    }
    public function promotions(): \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application
    {
        return view('admin.promotions');
    }

    public function actualites(): \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application
    {
        return view('admin.actualites');
    }
    public function notifications(): \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application
    {
        return view('admin.notifications');
    }
}
