<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'path',
        'alt',
        'slider'
    ];

    public function user(){
        return $this->belongsTo(\App\Models\User::class);
    }
}
