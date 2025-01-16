<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table = 'GRV1_Users';

    protected $primaryKey = 'Id_user';

    public $timestamps = true;

    protected $fillable = ['active','username','email','password','cgu_validated'];

    public function admins(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(Admin::class, 'Id_user');
    }
    public function groovers(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(Groover::class, 'Id_user');
    }
    public function tickets(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Ticket::class, 'Id_user');
    }
    public function notifications(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Notification::class, 'GRV1_Users_Notifications', 'Id_user', 'Id_notification');
    }
    public function journeys(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Journey::class, 'GRV1_Users_Journeys', 'Id_user', 'Id_journey');
    }
    public function transports(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Transport::class, 'GRV1_Users_Transports', 'Id_user', 'Id_transport');
    }
    public function festivals(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Festival::class, 'GRV1_Users_Festivals', 'Id_user', 'Id_festival');
    }

}
