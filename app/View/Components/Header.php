<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\Groover;

class Header extends Component
{
    public string $initialsHead;

    public function __construct()
    {
        $user = auth()->user();
        $groover = Groover::where('Id_user', $user->Id_user)->first();
        $this->initialsHead = strtoupper(substr($groover->firstname, 0, 1) . substr($groover->name, 0, 1));
    }

    public function render()
    {
        return view('include.header');
    }
}
