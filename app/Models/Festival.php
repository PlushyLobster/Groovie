<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Festival extends Model
{
    protected $table = 'GRV1_Festivals';
    protected $primaryKey = 'Id_festival';
    public $timestamps = true;
    protected $fillable = ['Id_recup_api', 'type', 'name', 'start_datetime', 'end_datetime', 'created_at', 'updated_at'];
    protected array $dates = ['start_datetime', 'end_datetime'];

    public function musicalGenres(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(MusicalGenre::class, 'GRV1_Festivals_Musical_genres', 'Id_festival', 'Id_musical_genre');
    }

    public function tickets(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Ticket::class, 'Id_festival');
    }

    public function playlists(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Playlist::class, 'Id_festival');
    }

    public function journeys(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Journey::class, 'GRV1_Festivals_Journeys', 'Id_festival', 'Id_journey');
    }

    public function users(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(User::class, 'GRV1_Users_Festivals', 'Id_festival', 'Id_user');
    }
    public function programs(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Program::class, 'Id_festival');
    }
    public function musicalBands(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(MusicalBand::class, 'GRV1_Festivals_Musical_Bands', 'Id_festival', 'Id_musical_band');
    }
}
