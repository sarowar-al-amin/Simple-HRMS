<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EnglishCommunicationSkill extends Model
{
    use HasFactory;
    protected $guarded = [];

    protected $primaryKey = 'user_id';
    public $incrementing = false;
    protected $keyType = 'string';

    public $timestamps = false;
}
