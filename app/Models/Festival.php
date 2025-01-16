<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Festival extends Model
{
    protected $table = 'GRV1_Festivals';
    protected $primaryKey = 'Id_festival';
    public $timestamps = true;
    protected $fillable = ['type', 'name', 'start_datetime','end_datetime'];

    // relations a rajouter
}
