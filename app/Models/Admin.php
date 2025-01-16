<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    protected $table = 'GRV1_Admins';
    protected $primaryKey = 'Id_admin';
    public $timestamps = true;
    protected $fillable = ['Id_user', 'Name', 'firstname', 'super_admin'];

    // relations a rajouter
}
