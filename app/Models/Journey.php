<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Journey extends Model
{
    protected $table = 'GRV1_Journeys';
    protected $primaryKey = 'Id_journey';
    public $timestamps = true;
    protected $fillable = ['departure_city', 'arrival_city', 'departure_date', 'arrival_date', 'departure_time', 'arrival_time', 'status', 'Id_parent', 'groovie_won', 'Id_transport'];

    public function parentJourney(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Journey::class, 'Id_parent');
    }

    public function transport(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Transport::class, 'Id_transport');
    }

    public function users(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(User::class, 'GRV1_Users_Journeys', 'Id_journey', 'Id_user');
    }

    public function festivals(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Festival::class, 'GRV1_Festivals_Journeys', 'Id_journey', 'Id_festival');
    }
}
