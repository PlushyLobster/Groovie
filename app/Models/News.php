<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $table = 'GRV1_News';
    protected $primaryKey = 'Id_new';
    public $timestamps = true;
    protected $fillable = ['title', 'content', 'publication_datetime'];
}
