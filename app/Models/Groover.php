<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Groover extends Model
{
    protected $table = 'GRV1_Groovers';
    protected $primaryKey = 'Id_groover';
    public $timestamps = false;
    protected $fillable = ['Id_user', 'Name', 'Surname', 'Email', 'Password', 'Phone'];

    // relations a rajouter
}
