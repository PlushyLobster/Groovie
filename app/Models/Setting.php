<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $table = 'GRV1_Settings';
    protected $primaryKey = 'Id_setting';
    public $timestamps = true;
    protected $fillable = ['geoloc_active', 'language_pref', 'favorite_theme'];

    public function offers(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Offer::class, 'GRV1_Offers_Settings', 'Id_setting', 'Id_offer');
    }

    public function musicalGenres(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(MusicalGenre::class, 'GRV1_Settings_Musical_genres', 'Id_setting', 'Id_musical_genre');
    }

    public function transports(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Transport::class, 'GRV1_Transports_Settings', 'Id_setting', 'Id_transport');
    }

    public function groovers(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Groover::class, 'GRV1_Groovers_Settings', 'Id_setting', 'Id_groover');
    }
}
