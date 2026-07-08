<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Issue extends Model
{
 
 use HasFactory;
    protected $fillable = [
        'user_id',
        'titel',
        'beschrijving',
        'locatie',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
}
