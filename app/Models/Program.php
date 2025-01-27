<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    protected $table = 'GRV1_Programs';
    protected $primaryKey = 'id_program';
    public $timestamps = true;
    protected $fillable = ['day_presence'];

    public function festivals(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Festival::class, 'festival_id');
    }
    public function musicalBands(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(MusicalBand::class, 'GRV1_Programs_Musical_Bands', 'program_id', 'musical_band_id');
    }
}
