<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    protected $table = 'GRV1_Games';
    protected $primaryKey = 'Id_game';
    public $timestamps = true;
    protected $fillable = ['name','link','type'];

    // relations a rajouter
}
