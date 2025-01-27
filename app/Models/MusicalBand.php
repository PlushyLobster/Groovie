<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MusicalBand extends Model
{
    protected $table = 'GRV1_Musical_Bands';
    protected $primaryKey = 'Id_musical_band';
    public $timestamps = true;
    protected $fillable = ['name'];

    public function festivals(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Festival::class, 'GRV1_Musical_Bands_Festivals', 'Id_musical_band', 'Id_festival');
    }
    public function programs(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Program::class, 'GRV1_Musical_Bands_Programs', 'Id_musical_band', 'Id_program');
    }
}
