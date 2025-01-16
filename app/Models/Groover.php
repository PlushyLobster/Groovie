<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Groover extends Model
{
    protected $table = 'GRV1_Groovers';
    protected $primaryKey = 'Id_groover';
    public $timestamps = true;
    protected $fillable = ['Id_user','nb_groovies', 'name', 'firstname','city'];

    // relations a rajouter
}
