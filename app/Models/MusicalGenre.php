<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MusicalGenre extends Model
{
    protected $table = 'GRV1_Musical_genres';
    protected $primaryKey = 'Id_musical_genre';
    public $timestamps = true;
    protected $fillable = ['name'];

    public function festivals(): \Illuminate\Database\Eloquent\Relations\belongsToMany
    {
        return $this->belongsToMany(Festival::class, 'Id_musical_genre');
    }

    public function settings(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Setting::class, 'GRV1_Settings_Musical_genres', 'Id_musical_genre', 'Id_setting');
    }
}
