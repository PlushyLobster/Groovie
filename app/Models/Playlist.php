<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Playlist extends Model
{
    protected $table = 'GRV1_Playlists';
    protected $primaryKey = 'Id_playlist';
    public $timestamps = true;
    protected $fillable = ['name', 'link', 'Id_partner', 'Id_festival'];

    public function festival(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Festival::class, 'Id_festival');
    }

    public function partner(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Partner::class, 'Id_partner');
    }
}
