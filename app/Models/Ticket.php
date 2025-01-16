<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $table = 'GRV1_Tickets';
    protected $primaryKey = 'Id_ticket';
    public $timestamps = true;
    protected $fillable = ['number', 'date_of_use', 'Id_user', 'Id_festival'];

    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class, 'Id_user');
    }

    public function festival(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Festival::class, 'Id_festival');
    }
}
