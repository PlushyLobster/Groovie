<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table = 'GRV1_Users';
    protected $primaryKey = 'Id_user';
    public $timestamps = false;
    protected $fillable = ['Id_user','active','username','email','password','cgu_validated'];

    public function notifications(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Notification::class, 'GRV1_Users_Notifications', 'Id_user', 'Id_notification');
    }
    public function groovers(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Groover::class, 'GRV1_Users_Groovers', 'Id_user', 'Id_groover');
    }
}
