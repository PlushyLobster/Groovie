<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Challenge extends Model
{
    protected $table = 'GRV1_Challenges';
    protected $primaryKey = 'Id_challenge';
    public $timestamps = true;
    protected $fillable = ['name', 'reward', 'titled'];

    // relations a rajouter
}
