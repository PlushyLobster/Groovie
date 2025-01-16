<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    protected $table = 'GRV1_Notifications';
    protected $primaryKey = 'Id_notification';
    public $timestamps = true;
    protected $fillable = ['importance', 'message'];

    public function users(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(User::class, 'GRV1_Users_Notifications', 'Id_notification', 'Id_user');
    }
}
