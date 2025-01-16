<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Challenge extends Model
{
    protected $table = 'GRV1_Challenges';
    protected $primaryKey = 'Id_challenge';
    public $timestamps = true;
    protected $fillable = ['name', 'reward', 'titled'];

    public function groovers(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Groover::class, 'GRV1_Groovers_Challenges', 'Id_challenge', 'Id_groover');
    }
}
