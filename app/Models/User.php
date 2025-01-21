<?php

namespace App\Models;

use App\Notifications\ResetPasswordNotification;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract
{
    use Authenticatable, Notifiable;

    protected $table = 'GRV1_Users';

    protected $primaryKey = 'Id_user';

    public $timestamps = true;

    protected $fillable = ['active','username','email','password','cgu_validated'];
    public function getEmailForPasswordReset()
    {
        return $this->email; // Assurez-vous que 'email' est le champ correct
    }
    public function sendPasswordResetNotification($token): void
    {
        $this->notify(new ResetPasswordNotification($token));
    }
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
