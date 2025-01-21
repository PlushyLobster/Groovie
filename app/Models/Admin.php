<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    protected $table = 'GRV1_Admins';
    protected $primaryKey = 'Id_admin';
    public $timestamps = true;
    protected $fillable = ['Id_user', 'name', 'firstname', 'super_admin'];

    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class, 'Id_user');
    }
    public function festivals()
    {
        $festivals = \DB::table('GRV1_Festivals')->get(['Id_festival', 'type', 'name', 'start_datetime', 'end_datetime', 'created_at', 'updated_at', 'Id_musical_genre']);
        return view('admin.festivals', compact('festivals'));
    }
}
