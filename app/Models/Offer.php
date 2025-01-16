<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    protected $table = 'GRV1_Offers';
    protected $primaryKey = 'Id_offer';
    public $timestamps = true;
    protected $fillable = ['type', 'name', 'description', 'condition_purchase', 'Id_journey', 'Id_partner'];

    public function partner(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Partner::class, 'Id_partner');
    }

    public function journey(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Journey::class, 'Id_journey');
    }

    public function settings(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Setting::class, 'GRV1_Offers_Settings', 'Id_offer', 'Id_setting');
    }
}
