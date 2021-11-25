<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserMetadata extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'key',
        'value',
    ];
    
    public $timestamps = false;
}
