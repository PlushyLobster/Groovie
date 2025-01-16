<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Groover extends Model
{
    protected $table = 'GRV1_Groovers';
    protected $primaryKey = 'Id_groover';
    public $timestamps = true;
    protected $fillable = ['Id_user', 'nb_groovies', 'name', 'firstname', 'city'];

    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class, 'Id_user');
    }

    public function challenges(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Challenge::class, 'GRV1_Groovers_Challenges', 'Id_groover', 'Id_challenge');
    }

    public function settings(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Setting::class, 'GRV1_Groovers_Settings', 'Id_groover', 'Id_setting');
    }

    public function transports(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Transport::class, 'GRV1_Groovers_Transports', 'Id_groover', 'Id_transport');
    }
}
