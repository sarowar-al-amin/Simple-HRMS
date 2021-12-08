<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SalaryReviewMetadata extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
        'feedbacks' => 'array',
        'justifications' => 'array',
        'behaviours' => 'array'
    ];

    public $timestamps = false;
}
