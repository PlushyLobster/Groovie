<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transport extends Model
{
    protected $table = 'GRV1_Transports';
    protected $primaryKey = 'Id_transport';
    public $timestamps = true;
    protected $fillable = ['creator', 'type', 'nb_slot'];

    public function journey(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(Journey::class, 'Id_transport');
    }

    public function settings(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Setting::class, 'GRV1_Transports_Settings', 'Id_transport', 'Id_setting');
    }

    public function groovers(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Groover::class, 'GRV1_Groovers_Transports', 'Id_transport', 'Id_groover');
    }

    public function users(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(User::class, 'GRV1_Users_Transports', 'Id_transport', 'Id_user');
    }
}
